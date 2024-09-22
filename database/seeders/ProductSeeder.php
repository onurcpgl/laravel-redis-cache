<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    
    public function run(): void
    {
        $product_name_first = [
            "Nebula",
            "Vortex",
            "Titan",
            "Apex",
            "Blaze",
            "Quantum",
            "Zypher",
            "Nova",
            "Pulse",
            "Falcon"
        ];

        $product_name_second = [
            "Fusion",
            "Echo",
            "Vertex",
            "Stratos",
            "Nexus",
            "Ember",
            "Cascade",
            "Phantom",
            "Rogue",
            "Element"
        ];


        for ($i=0; $i < 1000; $i++) { 
            Product::create([
                'name' => $product_name_first[array_rand($product_name_first)] . " " . $product_name_second[array_rand($product_name_second)],
                'price' => random_int(10,1000),
                'description' => 'This is a sample product.',
            ]);
        }

    
    }
}
