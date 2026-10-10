<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1,
                'name' => 'Keyboard',
                'description' => 'Keyboard untuk komputer',
                'price' => 150000,
                'stock' => 20,
            ],
            [
                'category_id' => 1,
                'name' => 'Mouse',
                'description' => 'Mouse untuk komputer',
                'price' => 75000,
                'stock' => 30,
            ],
            [
                'category_id' => 2,
                'name' => 'Buku Tulis',
                'description' => 'Buku tulis untuk keperluan sekolah',
                'price' => 10000,
                'stock' => 50,
            ],
            [
                'category_id' => 3,
                'name' => 'Flashdisk',
                'description' => 'Flashdisk untuk penyimpanan data',
                'price' => 60000,
                'stock' => 15,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
