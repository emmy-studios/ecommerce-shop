<?php

namespace Database\Seeders;

use App\Models\Categories\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::firstOrCreate([
            'name' => 'Home',
        ]);
        $category = Category::firstOrCreate([
            'name' => 'Men',
        ]);
        $category = Category::firstOrCreate([
            'name' => 'Women',
        ]);
        $category = Category::firstOrCreate([
            'name' => 'Tech',
        ]);
    }
}
