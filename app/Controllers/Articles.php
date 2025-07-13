<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleModel;
use CodeIgniter\HTTP\ResponseInterface;

class Articles extends BaseController
{
    public function index()
    {
        $model = new ArticleModel();
        $data['articles'] = $model->findAll();
        return view('articles/index', $data);
    }

    public function view($id)
    {
        $model = new ArticleModel();
        $data['article'] = $model->find($id);
        return view('articles/view', $data);
    }
}
