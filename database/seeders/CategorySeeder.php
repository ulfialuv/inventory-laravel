<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Elektronik',
                'description' => 'Peralatan elektronik',
            ],
            [
                'name' => 'Alat Tulis',
                'description' => 'Perlengkapan alat tulis',
            ],
            [
                'name' => 'Aksesori',
                'description' => 'Aksesori dan perlengkapan lainnya',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
