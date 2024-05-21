<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'imageUrl' => 'https://i.pinimg.com/236x/20/04/0c/20040c00a7f0bc43d9d8bd948310655d.jpg',
                'name' => 'Legend Of The Northen Blade',
                'description' => 'Legend Of The Northern Blade (북검전기) is a Korean novel series created by Woo-Gak. ',
                'status' => 'On Going',
                'rating' => '⭐⭐⭐⭐⭐'
            ],
            

            [
                'imageUrl' => 'https://i.pinimg.com/236x/25/18/22/2518222c2edb62a0f640005d62f2984f.jpg',
                'name' => "Academy's Genuis Swordmaster",
                'description' => 'Ronan lived a wasteful life filled with regrets. A second chance befalls him at the end of his futile life. ',
                'status' => 'On Going',
                'rating' => '⭐⭐⭐⭐⭐'
            ],

            [
                'imageUrl' => 'https://i.pinimg.com/236x/00/1b/e5/001be5f0a36d61ee8cae9044c5a153a3.jpg',
                'name' => 'Return Of The Crazy Demon',
                'description' => 'The Mad Demon, Jaha Lee, dreams of becoming the God of Martial Arts ',
                'status' => 'On Going',
                'rating' => '⭐⭐⭐⭐'
            ],
            
            [
                'imageUrl' => 'https://i.pinimg.com/236x/c6/ca/6e/c6ca6eac718ba8e490c8f45e80aecd5b.jpg',
                'name' => 'Return Of Mount Hua Sect',
                'description' => 'Chung Myung, The 13th Disciple of the Great Flowery Mountain Sect, One of the 3 Great Swordsmen,',
                'status' => 'On Going',
                'rating' => '⭐⭐⭐⭐'
            ],
            
        ];

        foreach ($data as $d) {
            Portfolio::create($d);
        }
    }
}
