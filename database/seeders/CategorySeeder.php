<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Special Product'],
            ['name' => 'Special Graduation'],
            ['name' => 'Special Weddings'],
            ['name' => 'Special Cake'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}