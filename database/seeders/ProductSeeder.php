<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing products to avoid duplication on re-seeding
        Product::truncate();

        $imageFiles = File::files(public_path('images'));

        $productsData = [
            'product-item1.jpg' => ['name' => 'Pipe Flower', 'price' => 250000, 'category' => 'Special Product'],
            'product-item2.jpg' => ['name' => 'Artifical Flower', 'price' => 300000, 'category' => 'Special Product'],
            'product-item3.jpg' => ['name' => 'Money Flower', 'price' => 750000, 'category' => 'Special Product'],
            'product-item4.jpg' => ['name' => 'Bouquet Sayur', 'price' => 150000, 'category' => 'Special Product'],
            'product-item5.jpg' => ['name' => 'Money Bouquet 2', 'price' => 100000, 'category' => 'Special Product'],
            'product-item6.jpg' => ['name' => 'Fresh Flower', 'price' => 500000, 'category' => 'Special Graduation'],
            'product-item7.jpg' => ['name' => 'Fresh Basket', 'price' => 950000, 'category' => 'Special Graduation'],
            'product-item8.jpg' => ['name' => 'Romantic Rose', 'price' => 900000, 'category' => 'Special Graduation'],
            'product-item9.jpg' => ['name' => 'Classic bouquet', 'price' => 800000, 'category' => 'Special Graduation'],
            'product-item10.jpg' => ['name' => 'Fresh Vegetable', 'price' => 750000, 'category' => 'Special Weddings'],
            'bos-cake.jpg' => ['name' => 'BOS CAKE', 'price' => 120000, 'category' => 'Special Cake'],
            'birthday-cake.jpg' => ['name' => 'Birthday Cake', 'price' => 120000, 'category' => 'Special Cake'],
            'morris123.jpg' => ['name' => 'ENGAGEMENT CAKE', 'price' => 120000, 'category' => 'Special Cake'],
            // Add other images and their categories as needed
        ];

        foreach ($imageFiles as $file) {
            $fileName = $file->getFilename();

            if (isset($productsData[$fileName])) {
                $data = $productsData[$fileName];
                $description = 'Deskripsi untuk ' . $data['name'] . '.';

                // Copy image to storage/app/public/products
                if (!Storage::disk('public')->exists('products/' . $fileName)) {
                    Storage::disk('public')->put('products/' . $fileName, File::get($file->getPathname()));
                }

                Product::create([
                    'name' => $data['name'],
                    'description' => $description,
                    'price' => $data['price'],
                    'image' => 'products/' . $fileName,
                    'category' => $data['category'],
                ]);
            }
        }
    }
}
