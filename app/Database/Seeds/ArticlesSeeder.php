<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ArticlesSeeder extends Seeder
{
     public function run()
    {
        $data = [
            [
                'title' => 'Cricket World Cup 2023 Preview',
                'content' => 'The Cricket World Cup 2023 is set to be one of the most exciting tournaments. Teams are preparing rigorously...',
                'author' => 'Admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Top 10 Cricket Players of the Decade',
                'content' => 'Over the last decade, these 10 cricket players have dominated the game with their skills and records...',
                'author' => 'Editor',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'How T20 Cricket Changed the Game',
                'content' => 'T20 cricket revolutionized the way the game is played, attracting millions of new fans worldwide...',
                'author' => 'Guest Writer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => "The Rise of Women's Cricket",
                'content' => "Women's cricket has seen a meteoric rise in popularity and viewership over the past few years...",
                'author' => 'Sports Analyst',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'The Evolution of Cricket Gear',
                'content' => 'From traditional pads to modern helmets, cricket gear has evolved significantly over the years...',
                'author' => 'Gear Expert',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'The Future of Cricket Broadcasting',
                'content' => 'As technology advances, the way we watch and engage with cricket is changing rapidly...',
                'author' => 'Media Expert',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        // Using Query Builder to insert batch data
        $this->db->table('articles')->insertBatch($data);
    }
}
