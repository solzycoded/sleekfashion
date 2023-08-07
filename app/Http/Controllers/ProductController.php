<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Gender;
use App\Models\ProductCollection;
 
class ProductController extends Controller
{
    // CREATE
    public function storeViewAllTrigger(Request $request){
        $target = $request['target'];

        $this->storeTrigger($target);

        return response()->json([
            'success' => session()->has('target')
        ], 200);
    }

    private function storeTrigger($target){
        session()->flash('target', $target);
        // session(['target' => $target]);
    }

    // READ
    public function index(){
        $bestDeals = Product::orderBy('price', 'asc')->get()->take(12);
        $newArrivals = Product::orderBy('created_at', 'asc')->get()->take(16);
        $allProducts = $this->filter();

        $allCategories = $this->getCategories();
        $allCollections = $this->getCollections();
        $allGenders = $this->getGenders();
        $shoppingcart = (new ShoppingCartController())->index();
        $exclusiveCollection = ProductCollection::searchCollection(['column' => 'name', 'value' => 'exclusive'])->get()->take(4);

        return view('index', [
            'bestDeals'           => $bestDeals,
            'allProducts'         => $allProducts,
            'allCategories'       => $allCategories,
            'allCollections'      => $allCollections,
            'allGenders'          => $allGenders,
            'shoppingcart'        => $shoppingcart,
            'exclusiveCollection' => $exclusiveCollection,
            'newArrivals'         => $newArrivals
        ]);
    }

    private function getCategories(){
        $categoryController = new CategoryController();

        $categories = $categoryController->index();
        
        return $categories;
    }

    private function getCollections(){
        $collectionController = new CollectionController();

        $collections = $collectionController->index();
        
        return $collections;
    }

    private function getGenders(){
        $genderController = new GenderController();

        $genders = $genderController->index();
        
        return $genders;
    }

    private function validateFilter(){
        $request = request()->validate([
            'search' => 'nullable|string',
            'lowestPrice' => 'nullable|integer',
            'highestPrice' => 'nullable|integer',
            'category' => 'nullable|string',
            'collection' => 'nullable|string',
            'gender' => 'nullable|string',
        ]);

        return $request;
    }

    private function filter(){
        $allProducts = Product::orderBy('title', 'asc');
        
        $this->swapPriceRange(); // set price (swap lowest price, with highest price, if they're not accurate)

        $request = $this->validateFilter(); // validate field values

        $search = request('search') ?? "";
        $lowestPrice = request('lowestPrice') ?? "";
        $highestPrice = request('highestPrice') ?? "";
        $category = $this->setCategory();
        $collection = $this->setCollection();
        $gender = $this->setGender();
        
        $this->setFilter(); // change the ids of (gender, collection, category) to their respective values / names

        if(!empty($search)){
            $search = '%' . $search . '%';

            $allProducts = $allProducts->where(
                fn($query) => 
                    $query->where('title', 'like', $search)
                        ->orWhere('details', 'like', $search)
            );
        }

        if(!empty($lowestPrice)){
            $allProducts = $this->filterPrice($allProducts, $lowestPrice, '>=');
        }

        if(!empty($highestPrice)){
            $allProducts = $this->filterPrice($allProducts, $highestPrice, '<');
        } 

        if(!empty($category)){
            $allProducts = $allProducts->join('categories', 'categories.id', 'products.category_id')
                ->where('categories.id', $category);
        }

        if(!empty($collection)){
            $allProducts = $allProducts->join('product_collections', 'product_collections.product_id', 'products.id')
                ->join('collections', 'collections.id', 'product_collections.collection_id')
                ->where('collections.id', $collection);
        }

        if(!empty($gender)){
            // $gender = request('gender') ?? "";
            
            $allProducts = $allProducts->join('product_genders', 'product_genders.product_id', 'products.id')
                ->join('gender', 'gender.id', 'product_genders.gender_id')
                ->where('gender.id', $gender);
        }

        $hasFilter = request()->hasAny(['search', 'lowestPrice', 'highestPrice', 'collection', 'gender', 'category']);
        if($hasFilter){ // make the "view all" products page, reload
            $this->storeTrigger('.view-all');
        }

        // with query string, includes (the current / existing queries, in the anchor tags of the pagination buttons)
        return $allProducts->select(['products.*'])->paginate(12)->withQueryString();
    }

    private function filterPrice($collection, $price, $condition){
        $filter = $collection->where('price', $condition, $price);

        return $filter;
    }

    private function getCategory($id){
        if(!empty($id)){
            return (new CategoryController())->show($id)->name;
        }

        return "";
    }

    private function getCollection($id){
        if(!empty($id)){
            return (new CollectionController())->show($id)->name;
        }

        return "";
    }

    private function getGender($id){
        if(!empty($id)){
            return (new GenderController())->show($id)->sex;
        }

        return "";
    }

    private function setGetRequest(string $query, string $column, $table){
        $id = request($query);

        if(!is_numeric($id) && is_string($id)){
            $gender = $table->firstWhere($column, 'like', '%' . $id);

            $id = isset($gender->id) ? $gender->id : 0;
            request()->merge([$query => $id]);
        }

        return $id;
    }

    private function setGender(){
        return $this->setGetRequest('gender', 'sex', new Gender());
    }

    private function setCollection(){
        return $this->setGetRequest('collection', 'name', new Collection());
    }

    private function setCategory(){
        return $this->setGetRequest('category', 'name', new Category());
    }

    private function swapPriceRange(){
        $lowest = request('lowestPrice'); // get lowest price
        $highest = request('highestPrice'); // get highest price

        if(!empty($highest) && $lowest > $highest){
            $h = $highest;

            $highest = $lowest;
            $lowest = $h;
        }

        $this->mergeRequest('lowestPrice', $lowest);
        $this->mergeRequest('highestPrice', $highest);
    }

    private function mergeRequest($key, $value){
        if(request()->has($key)){
            request()->merge([$key => $value]); // re-set lowest price
        }
    }

    public function show(){
        $attributes = request()->validate([
            'product_id' => 'bail|required|numeric:integer|exists:products,id'
        ]);

        $productDetails = Product::firstWhere('id', $attributes['product_id']);
            // ->join('product_genders', 'product_genders.product_id', 'products.id')
            // ->join('gender', 'gender.id', 'product_genders.gender_id')
            // ->select('products.*', 'gender.sex AS sex')
            // ->first();

        $userId = isset(auth()->user()->id) ? auth()->user()->id : 0;

        return response()->json([
            'success'        => isset($productDetails->id),
            'productDetails' => $productDetails,
            'inCart'         => $productDetails->inCart($userId),
            'isSaved'        => $productDetails->isSaved($userId)
        ], 200);
    }

    private function setFilter(){
        $category = $this->getCategory(request('category')); // set category
        $this->mergeRequest('category', $category);

        $collection = $this->getCollection(request('collection')); // set collection
        $this->mergeRequest('collection', $collection);

        $gender = $this->getGender(request('gender')); // set gender
        $this->mergeRequest('gender', $gender);
    }

    // UPDATE

    // DELETE

    // OTHERS
}
