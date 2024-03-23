<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class itemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => "Beverages",
            'imagePath' => "/images/sample.jpeg",
        ]);
        DB::table('categories')->insert([
            'name' => "Foods",
            'imagePath' => "/images/sample.jpeg",
        ]);
        DB::table('categories')->insert([
            'name' => "Snacks",
            'imagePath' => "/images/sample.jpeg",
        ]);

        DB::table('items')->insert([
            'name' => "Burger ".Str::random(5),
            'description' => "This is a burger.",
            'imagePath' => "/images/sample.jpeg",
            'categoryID' => 1,
            'price' => 10.20,
        ]);

        DB::table('items')->insert([
            'name' => "Burger ".Str::random(5),
            'description' => "This is a burger.",
            'imagePath' => "/images/sample.jpeg",
            'categoryID' => 1,
            'price' => 15.25,
        ]);

        DB::table('items')->insert([
            'name' => "Burger ".Str::random(5),
            'description' => "This is a burger.",
            'imagePath' => "/images/sample.jpeg",
            'categoryID' => 2,
            'price' => 20.60,
        ]);

        DB::table('items')->insert([
            'name' => "Burger ".Str::random(5),
            'description' => "This is a burger.",
            'imagePath' => "/images/sample.jpeg",
            'categoryID' => 3,
            'price' => 1.80,
        ]);

        DB::table('items')->insert([
            'name' => "Burger ".Str::random(5),
            'description' => "This is a burger.",
            'imagePath' => "/images/sample.jpeg",
            'categoryID' => 1,
            'price' => 5.90,
        ]);
    }
}
