<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Gender;
 
class ProductController extends Controller
{
    // create
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

    // read
    public function index(){
        $bestDeals = Product::orderBy('price', 'asc')->get()->take(12);
        $allProducts = $this->filter();

        $allCategories = $this->getCategories();
        $allCollections = $this->getCollections();
        $allGenders = $this->getGenders();
        $shoppingcart = (new ShoppingCartController())->index();

        return view('index', [
            'bestDeals' => $bestDeals,
            'allProducts' => $allProducts,
            'allCategories' => $allCategories,
            'allCollections' => $allCollections,
            'allGenders' => $allGenders,
            'shoppingcart' => $shoppingcart
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
            'category' => 'nullable|integer|exists:categories,id',
            'collection' => 'nullable|integer|exists:collections,id',
            'gender' => 'nullable|integer|exists:gender,id',
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
        $category = request('category') ?? "";
        $collection = request('collection') ?? "";
        $gender = request('gender') ?? "";

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
            $categoryController = new CategoryController();

            return $categoryController->show($id)->name;
        }

        return "";
    }

    private function getCollection($id){
        if(!empty($id)){
            $collectionController = new CollectionController();

            return $collectionController->show($id)->name;
        }

        return "";
    }

    private function getGender($id){
        if(!empty($id)){
            $genderController = new GenderController();

            return $genderController->show($id)->sex;
        }

        return "";
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

    public function show(Request $request){
        $productTitle = $request['productTitle'];

        $productDetails = Product::where('title', $productTitle)
            ->join('product_genders', 'product_genders.product_id', 'products.id')
            ->join('gender', 'gender.id', 'product_genders.gender_id')
            ->select('products.*', 'gender.sex AS sex')
            ->first();

        return response()->json([
            'success' => isset($productDetails),
            'productDetails' => $productDetails
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

    // update

    // delete
}
