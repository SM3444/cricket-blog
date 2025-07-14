<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class NewsController extends BaseController
{
    public function index()
    {
        $apiKey = env('mediastack.key');
        $page = $this->request->getGet('page') ?? 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $url = "http://api.mediastack.com/v1/news?access_key={$apiKey}&keywords=cricket&languages=en&limit={$limit}&offset={$offset}";

        $client = \Config\Services::curlrequest();

        try {
            $response = $client->get($url); // No verify needed for HTTP
            $data = json_decode($response->getBody(), true);
            $articles = $data['data'] ?? [];
            $total = $data['pagination']['total'] ?? 0;
        } catch (\Exception $e) {
            log_message('error', 'Mediastack API Error: ' . $e->getMessage());
            $articles = [];
            $total = 0;
        }

        $totalPages = ceil($total / $limit);

        return view('news/index', [
            'articles' => $articles,
            'title' => 'Latest Cricket News',
            'currentPage' => $page,
            'totalPages' => $totalPages,
        ]);
    }
}
