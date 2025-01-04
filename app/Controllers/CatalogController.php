<?php

namespace App\Controllers;

use App\Models\CatalogModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;
use ReflectionException;

class CatalogController extends BaseController
{
    use ResponseTrait;

    public function update_view(): string
    { 
        $findString = "";
        if($this->request->is('json')) 
            $findString = $this->request->getJsonVar('strFind') ?? "";

        $model = model(CatalogModel::class);

        $data = [
            'list' => $model->getList($findString)->paginate(5),
            'pager' => $model->pager,
            'title' => 'Catalog',
            'findString' => $findString
        ];

        return view('catalogs/index', $data);
    }

    public function index(): string
    {
        return view('templates/header')
         .$this->update_view()
         .view('templates/footer');
    }

    public function api(int $id = 0): ResponseInterface
    {
        $model = model(CatalogModel::class);
        
        if( $id === 0 ){
            $data = [
                'list' => $model->findAll(),
                'title' => 'Catalog',
            ];
        }else{
            $data = $model->getById($id);
        }
        return $this->respond($data, 200);
    }

    public function edit(int $id = 0): string
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
    
    public function new(): string
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

    /**
     * @throws ReflectionException
     */
    public function update(): string
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
                    'title' => $post['title'],
                ]);
            }
        }
        return $this->index();
    }
}
