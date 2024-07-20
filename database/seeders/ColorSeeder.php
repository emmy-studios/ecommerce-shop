<?php

namespace Database\Seeders;

use App\Models\Products\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $color = Color::firstOrCreate([
            'product_color' => 'Black',
        ]);
        $color = Color::firstOrCreate([
            'product_color' => 'White',
        ]);
        $color = Color::firstOrCreate([
            'product_color' => 'Red',
        ]);
        $color = Color::firstOrCreate([
            'product_color' => 'Blue',
        ]);
        $color = Color::firstOrCreate([
            'product_color' => 'Yellow',
        ]);
        $color = Color::firstOrCreate([
            'product_color' => 'Pink',
        ]);
        $color = Color::firstOrCreate([
            'product_color' => 'Brown',
        ]);
        $color = Color::firstOrCreate([
            'product_color' => 'Orange',
        ]);
        $color = Color::firstOrCreate([
            'product_color' => 'Gray',
        ]);
        $color = Color::firstOrCreate([
            'product_color' => 'Green',
        ]);
        $color = Color::firstOrCreate([
            'product_color' => 'Teal',
        ]);
    }
}
