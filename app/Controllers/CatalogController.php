<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CatalogModel;

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
}
