<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */



    public function run()
    {

        $this->call(UserSeeder::class);

        $categories = [
            ['name' => 'Gaming-PCs',        'description' => 'Für Arbeit und Freizeit', 'imagepath' => 'images/ci2.jpeg'],
            ['name' => 'PC-Komponenten',    'description' => 'Für Bastler',             'imagepath' => 'images/start.jpeg'],
            ['name' => 'Gaming-Laptops',    'description' => 'Für Gamer',               'imagepath' => 'images/gaming.jpeg'],
        ];
        DB::table('categories')->insertOrIgnore($categories);
    
        for($i = 1; $i <= 12; $i++) {
            $product = Product::create([
                'name'        => 'Product' . $i,
                'description' => 'Das ist ein guter Laptop ' . $i,
                'price'       => rand(10, 100),
                'quantity'    => rand(1, 50),
                'imagepath'   => 'images/ci2.jpeg',
            ]);
            // Produkt mit 1-3 zufälligen Kategorien verknüpfen
            $categoryIds = [1, 2, 3];
            shuffle($categoryIds);
            $product->categories()->attach(array_slice($categoryIds, 0, rand(1, 3)));
        }
    }
    
}
