<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder{
    public function run(): void {
        $categories = [
        ['content' => '1.商品のお届けについて',],
        ['content' => '2.商品の交換について',],
        ['content' => '3.商品トラブル',],
        ['content' => '4.ショップへのお問い合わせ',],
        ['content' => '5.その他',],
        ];

        foreach($categories as $category){
            Category::create($category);
        }
    }
}
