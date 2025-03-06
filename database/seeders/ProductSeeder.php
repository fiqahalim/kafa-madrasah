<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Al-Quran Terjemahan',
            'description' => 'Al-Quran dengan terjemahan bahasa Melayu.',
            'price' => 50.00,
            'stock' => 100,
        ]);

        Product::create([
            'name' => 'Sajadah Premium',
            'description' => 'Sajadah berkualiti tinggi untuk solat.',
            'price' => 25.00,
            'stock' => 200,
        ]);
    }
}
