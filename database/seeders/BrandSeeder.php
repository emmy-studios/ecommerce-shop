<?php

namespace Database\Seeders;

use App\Models\Brands\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brand = Brand::firstOrCreate([
            'name' => 'Generic',
        ]);
    }
}
