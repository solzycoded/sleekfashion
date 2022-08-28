<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
    */
    public function run()
    {
        // $this->call(UsersTableSeeder::class); 

        // CREATE CATEGORIES
        //gender_id (men - 1, women - 2, category_id (shoes - 15, watches - 16, sunglasses - 17, bagpacks - 18, tshirts - 13, shirts - 14), product_name, price, description

        //forwomen
        //T-SHIRT
        // DatabaseSeeder::createCollections(2, 13, 'red t-shirt', 175);
        // DatabaseSeeder::createCollections(2, 13, 'pink t-shirt', 185);
        // DatabaseSeeder::createCollections(2, 13, 'orange t-shirt', 200);
        // DatabaseSeeder::createCollections(2, 13, 'purple t-shirt', 150);

        // //SHIRT
        // DatabaseSeeder::createCollections(2, 14, 'a shirt', 175);
        // DatabaseSeeder::createCollections(2, 14, 'gray shirt (for women)', 185);
        // DatabaseSeeder::createCollections(2, 14, 'white shirt (for women)', 200);
        // DatabaseSeeder::createCollections(2, 14, 'black shirt (for women)', 150);

        // //SHOE
        // DatabaseSeeder::createCollections(2, 15, 'black shoe', 175);
        // DatabaseSeeder::createCollections(2, 15, 'blue shoe', 190);
        // DatabaseSeeder::createCollections(2, 15, 'green shoe', 280);
        // DatabaseSeeder::createCollections(2, 15, 'purple shoe', 170);

        // //formen
        // //T-SHIRT
        // DatabaseSeeder::createCollections(1, 13, 'white t-shirt (for men)', 175);
        // DatabaseSeeder::createCollections(1, 13, 'sky t-shirt', 185);
        // DatabaseSeeder::createCollections(1, 13, 'yellow t-shirt', 200);
        // DatabaseSeeder::createCollections(1, 13, 'black t-shirt (for men)', 150);

        //SHIRT
        // DatabaseSeeder::createCollections(1, 14, 'gray shirt (for men)', 175);
        // DatabaseSeeder::createCollections(1, 14, 'blue shirt (for men)', 185);
        // DatabaseSeeder::createCollections(1, 14, 'sky-blue shirt', 200);
        // DatabaseSeeder::createCollections(1, 14, 'green shirt (for men)', 150);

        // //SHOE
        // DatabaseSeeder::createCollections(1, 15, 'a shoe (for men)', 175);
        // DatabaseSeeder::createCollections(1, 15, 'this shoe', 190);
        // DatabaseSeeder::createCollections(1, 15, 'that shoe', 280);
        // DatabaseSeeder::createCollections(1, 15, 'your shoe', 170);
    }

    private static function createCategories($category){ 
        DB::table('categories')->insert([
            'category' => $category,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    private static function createGenders($gender){ 
        DB::table('genders')->insert([
            'gender' => $gender,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    private static function createCollections($gender_id, $category_id, $product_name, $price){ 
        DB::table('collections')->insert([
            'gender_id' => $gender_id,
            'category_id' => $category_id,
            'product_name' => $product_name,
            'price' => $price,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}