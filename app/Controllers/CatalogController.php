<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CatalogModel;
use CodeIgniter\API\ResponseTrait;

class CatalogController extends BaseController
{
    public function index()
    {
        $model = model(CatalogModel::class);
        //dd($model);

        //$list = $model->getList();

        $data = [
              'list' => $model->getList(),
              'title' => 'Catalog',
        ];

        return view('templates/header')
         . view('catalogs/index', $data)
         . view('templates/footer');
        
        //return $this->respond($data, 200);
    }

    public function api()
    {
        $model = model(CatalogModel::class);
     
        $data = [
              'list' => $model->getList(),
              'title' => 'Catalog',
        ];

        return $this->respond($data, 200);
    }

    public function edit(int $id = 0)
    {
        helper('form');    

        $model = model(CatalogModel::class);

        $data = $model->getById($id);

        if ($data === null) {
            throw new PageNotFoundException('Cannot find the news item: id=' . $id);
        }

        $data['titleForm'] = 'Edit item';

        return view('templates/header')
            . view('catalogs/edit', $data)
            . view('templates/footer');
    }
    
    public function new()
    {
        helper('form');
        $data = [
            'titleForm' => 'Create new',
            'id' => 0, 
            'name' => '',
            'title'  => ''
        ];

        return view('templates/header')
            . view('catalogs/edit', $data)
            . view('templates/footer');
    }
    
    public function update()
    {
        helper('form');

        $data = $this->request->getPost(['id','name', 'title','action']);
        $model = model(CatalogModel::class);

        if( $data['action'] === 'delete'){
            $model->deleteById($data['id']);
        }else{        
            if($data['id'] !== 0){
                // Checks whether the submitted data passed the validation rules.
                if (! $this->validateData($data, [
                    'name' => 'required|max_length[50]|min_length[0]',
                    'title'  => 'required|max_length[5000]|min_length[0]',
                ])) {
                    // The validation fails, so returns the form.
                    return $this->new();
                }
            }
            
            // Gets the validated data.
            $post = $this->validator->getValidated();
            if($data['id'] != 0){
                $model->update($data['id'],[
                'name' => $post['name'],
                'title'  => $post['title'],
                ]);
            }
            else{
                $model->save([
                    'name' => $post['name'],
                    'title'  => $post['title'],
                ]);
            }
        }

        return $this->index();
    }
}
