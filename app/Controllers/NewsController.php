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
        try {
            $apiKey = env('mediastack.key');
            $page = $this->request->getGet('page') ?? 1;
            $limit = 5;
            $offset = ($page - 1) * $limit;

            $url = "http://api.mediastack.com/v1/news?access_key={$apiKey}&keywords=cricket&languages=en&limit={$limit}&offset={$offset}";

            $client = \Config\Services::curlrequest();

            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);
            $articles = $data['data'] ?? [];
        } catch (\Exception $e) {
            log_message('error', 'Error fetching news: ', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return $this->response
                ->setStatusCode(500)
                ->setJSON(['error' => 'Something went wrong while fetching news.']);
        }


        return $this->response->setJSON($articles);
    }
}
