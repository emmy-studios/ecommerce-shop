<?php

namespace Database\Seeders;

use App\Models\Products\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ize = Size::firstOrCreate([
            'product_size' => 'Small',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => 'Medium',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => 'Large',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => 'S',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => 'M',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => 'L',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => 'XL',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => 'XXL',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => 'XXXL',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => '28',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => '30',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => '32',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => '34',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => '36',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => '38',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => '40',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => '42',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => '44',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => '46',
        ]);
        $ize = Size::firstOrCreate([
            'product_size' => '48',
        ]);
    }
}
