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
        DB::table('category')->insert([
            'name' => Str::random(10),
            'imagePath' => "/images/sample.jpeg",
        ]);
        DB::table('category')->insert([
            'name' => Str::random(10),
            'imagePath' => "/images/sample.jpeg",
        ]);
        DB::table('category')->insert([
            'name' => Str::random(10),
            'imagePath' => "/images/sample.jpeg",
        ]);

        DB::table('item')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'imagePath' => "/images/sample.jpeg",
            'categoryID' => 1,
            'price' => 1.20,
        ]);

        DB::table('item')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'imagePath' => "/images/sample.jpeg",
            'categoryID' => 1,
            'price' => 1.20,
        ]);

        DB::table('item')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'imagePath' => "/images/sample.jpeg",
            'categoryID' => 2,
            'price' => 1.20,
        ]);

        DB::table('item')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'imagePath' => "/images/sample.jpeg",
            'categoryID' => 3,
            'price' => 1.20,
        ]);

        DB::table('item')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'imagePath' => "/images/sample.jpeg",
            'categoryID' => 1,
            'price' => 1.20,
        ]);
    }
}
