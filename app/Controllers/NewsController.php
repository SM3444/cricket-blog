<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class NewsController extends BaseController
{
    public function index()
    {

        return view('news/index');
    }

    public function ajaxNews()
    {
        $apiKey = env('mediastack.key');
        $page = $this->request->getGet('page') ?? 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $url = "http://api.mediastack.com/v1/news?access_key={$apiKey}&keywords=cricket&languages=en&limit={$limit}&offset={$offset}";

        $client = \Config\Services::curlrequest();

        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);
        $articles = $data['data'] ?? [];


        return $this->response->setJSON($articles);
    }
}
