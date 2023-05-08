<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\UserRole;
use App\Models\Gender;
use App\Models\User;
use App\Models\Category;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductGender;

use App\Models\Collection;
use App\Models\ProductCollection;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // with factory (fake data)
        User::factory(10)->create(); // user factory
        Product::factory(20)->create(); // category factory
        Collection::factory(10)->create(); // category factory
        ProductCollection::factory(30)->create(); // category factory

        /* without factory */

        // userrole table
        UserRole::create([
            'name' => 'admin'
        ]);

        UserRole::create([
            'name' => 'customer'
        ]);
        // END userrole table

        // gender table
        Gender::create([
            'sex' => 'male'
        ]);
        
        Gender::create([
            'sex' => 'female'
        ]);
        // END gender table

        // categories table
        $this->seedCategories();
        // END categories table

        // productimages table
        $this->seedProductImages();
        // END productimages table

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

    private function seedCategories(){
        $categories = ['t-shirt', 'shirt', 'shoes', 'watches', 'sunglasses', 'backpacks', 'bracelets', 'belts', 'rings', 'hats'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }

    private function seedProductImages(){
        $path = "/assets/img/gallery/";

        $images = ["shoes-blog-1.png", "bagpacks-1.png", "bagpacks-2.png", "bagpacks-3.png", "him.png", "shirt-1.png", "shirt-3.png", "shirt-3.png", "sunglasses.png", "watch-1.png", "watches.png", "watches.png", "bagpacks-2.png", "bagpacks-1.png", "bagpacks-4.png", "sunglasses.png", "him.png", "him.png", "watch-2.png", "watch-3.png"];

        for ($i = 1; $i <= 20; $i++) {
            $image = $path . $images[$i - 1];
            $this->productImage($i, $image); // add an image to each product

            $this->productGender($i); // add an image to each product
        }
    }

    private function productImage($productId, $image){
        ProductImage::create([
            'product_id' => $productId,
            'image'      => $image
        ]);
    }

    private function productGender($productId){
        $genders = ['male', 'female'];
        $genderId = Gender::where('sex', $genders[rand(0, 1)])->first()->id;

        ProductGender::create([
            'product_id' => $productId,
            'gender_id'      => $genderId
        ]);
    }
}