<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Electronics']);
        Category::create(['name' => 'Books']);

        Brand::create(['name' => 'Apple']);
        Brand::create(['name' => 'Samsung']);
        Brand::create(['name' => 'Sony']);

        Product::create([
            'name' => 'iPhone',
            'description' => 'Latest iPhone model',
            'price' => 999.99,
            'category_id' => 1,
            'brand_id' => 1
        ]);

        Product::create([
            'name' => 'Samsung Galaxy',
            'description' => 'Latest Samsung model',
            'price' => 899.99,
            'category_id' => 1,
            'brand_id' => 2
        ]);
    }
}
