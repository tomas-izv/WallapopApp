<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Electronics']);
        Category::create(['name' => 'Motorcycles']);
        Category::create(['name' => 'Cars']);
        Category::create(['name' => 'Sports']);
        Category::create(['name' => 'Home']);
        Category::create(['name' => 'Technology']);
        Category::create(['name' => 'Fashion']);
        Category::create(['name' => 'Toys']);
        Category::create(['name' => 'Books']);
        Category::create(['name' => 'Others']);
    }
}