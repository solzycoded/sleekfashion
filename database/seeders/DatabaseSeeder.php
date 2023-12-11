<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\UserRole;
use App\Models\User;
use App\Models\Profile;

use App\Models\Gender;
use App\Models\Category;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductGender;

use App\Models\ProductCollection;

use App\Models\Order;
use App\Models\CustomerOrder;
use App\Models\Address;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // userrole table
        UserRole::create([
            'name' => 'admin'
        ]);
        UserRole::create([
            'name' => 'customer'
        ]);

        Address::factory(10)->create();

        // categories table
        $this->seedCategories();

        // with factory (fake data)
        // User::factory(10)->create(); // user factory
        // Product::factory(20)->create(); // product factory
        // Collection::factory(10)->create(); // category factory
        ProductCollection::factory(30)->create(); // productcollection factory

        /* without factory */

        // gender table
        Gender::create([
            'sex' => 'male'
        ]);
        Gender::create([
            'sex' => 'female'
        ]);

        // productimages table
        $this->seedProductImages();

        // profiles
        // Profile::factory(1)->create();

        // customer orders
        // CustomerOrder::factory(40)->create();
    }

    private function seedCategories(){
        $categories = ['t-shirt', 'shirt', 'shoes', 'watches', 'sunglasses', 'backpacks', 'bracelets', 'belts', 'rings', 'hats'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }

    // seed product images and product genders, tables
    private function seedProductImages(){
        $path = "/assets/img/gallery/";
        $images = ["shoes-blog-1.png", "bagpacks-1.png", "bagpacks-2.png", "bagpacks-3.png", "him.png", "shirt-1.png", "shirt-3.png", "shirt-3.png", "sunglasses.png", "watch-1.png", "watches.png", "watches.png", "bagpacks-2.png", "bagpacks-1.png", "bagpacks-4.png", "sunglasses.png", "him.png", "him.png", "watch-2.png", "watch-3.png"];

        $allProducts = Product::all();

        for ($i = 0; $i < count($allProducts); $i++) {
            $productId = $allProducts[$i]->id;

            $image = $path . $images[rand(0, count($images) - 1)];
            $this->productImage($productId, $image); // add an image to each product

            $this->productGender($productId); // add an image to each product
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
            'gender_id'  => $genderId
        ]);
    }
}