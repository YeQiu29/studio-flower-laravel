<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Category;

class AssignProductCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:assign-categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assigns a default category to products with null category_id.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $defaultCategory = Category::first();

        if (!$defaultCategory) {
            $this->error('No categories found. Please create at least one category first.');
            return Command::FAILURE;
        }

        $productsWithoutCategory = Product::whereNull('category_id')->get();

        if ($productsWithoutCategory->isEmpty()) {
            $this->info('No products with null category_id found. All products already have a category.');
            return Command::SUCCESS;
        }

        $this->info('Assigning default category (' . $defaultCategory->name . ') to products with null category_id...');

        foreach ($productsWithoutCategory as $product) {
            $product->category_id = $defaultCategory->id;
            $product->save();
            $this->info('Assigned category to product: ' . $product->name);
        }

        $this->info('Category assignment complete.');

        return Command::SUCCESS;
    }
}