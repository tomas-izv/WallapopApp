<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\Category;
use App\Models\User;

class SalesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();
        $users = User::all();

        // Electronics
        Sale::create([
            'product' => 'iPhone 13 Pro',
            'description' => 'Like new, 256GB, Space Gray',
            'price' => 799.99,
            'isSold' => false,
            'category_id' => $categories->where('name', 'Electronics')->first()->id,
            'user_id' => $users->first()->id,
        ]);

        // Cars
        Sale::create([
            'product' => 'Toyota Camry 2020',
            'description' => 'Excellent condition, 30,000 miles',
            'price' => 18500.00,
            'isSold' => false,
            'category_id' => $categories->where('name', 'Cars')->first()->id,
            'user_id' => $users->first()->id,
        ]);

        // Fashion
        Sale::create([
            'product' => 'Nike Air Max',
            'description' => 'New in box, size 42',
            'price' => 120.00,
            'isSold' => false,
            'category_id' => $categories->where('name', 'Fashion')->first()->id,
            'user_id' => $users->last()->id,
        ]);

        // Books
        Sale::create([
            'product' => 'Harry Potter Collection',
            'description' => 'Complete series, hardcover',
            'price' => 89.99,
            'isSold' => false,
            'category_id' => $categories->where('name', 'Books')->first()->id,
            'user_id' => $users->last()->id,
        ]);

        // Technology
        Sale::create([
            'product' => 'Gaming PC',
            'description' => 'RTX 3080, 32GB RAM, i9 processor',
            'price' => 1500.00,
            'isSold' => false,
            'category_id' => $categories->where('name', 'Technology')->first()->id,
            'user_id' => $users->first()->id,
        ]);
    }
}