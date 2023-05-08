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

        return view('index', [
            'bestDeals' => $bestDeals,
            'allProducts' => $allProducts,
            'allCategories' => $allCategories,
            'allCollections' => $allCollections,
            'allGenders' => $allGenders
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
        
        $request = $this->validateFilter(); // validate field values
        $request = $this->setFilterValues($request); // if any filter field is null / uninitialized, replace it with ""

        $this->setFilter($request);

        $search = session('search') ?? "";

        $lowestPrice = session('lowestPrice') ?? "";
        $highestPrice = session('highestPrice') ?? "";

        $category = session('category') ?? "";
        $collection = session('collection') ?? "";
        $gender = session('gender') ?? "";

        // this filter, tries to be as exact as possible
        // SOMETHING IS WRONG WITH THE SEARCH FILTER, find out what it is, please
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
                ->where('categories.id', $request['category']);
        }
        if(!empty($collection)){
            $allProducts = $allProducts->join('product_collections', 'product_collections.product_id', 'products.id')
                ->join('collections', 'collections.id', 'product_collections.collection_id')
                ->where('collections.id', $request['collection']);
        }
        if(!empty($gender)){
            $allProducts = $allProducts->join('product_genders', 'product_genders.product_id', 'products.id')
                ->join('gender', 'gender.id', 'product_genders.gender_id')
                ->where('gender.id', $request['gender']);
        }

        // make the "view all" products page, reload
        if(isset($request['search']) || 
            isset($request['lowestPrice']) || 
            isset($request['highestPrice']) || 
            isset($request['category']) || 
            isset($request['collection']) || 
            isset($request['gender'])){

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

    private function swapPriceRange($lowest, $highest){
        if(!empty($highest) && $lowest > $highest){
            $h = $highest;

            $highest = $lowest;
            $lowest = $h;
        }

        return ['lowest' => $lowest, 'highest' => $highest];
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

    private function setFilterValues($filter){
        // , 'lowestPrice' => $price['lowest'], 'highestPrice' => $price['highest'], 'category' => $category, 'collection' => $collection, 'gender' => $gender
        $parameters = ['search', 'lowestPrice', 'highestPrice', 'category', 'collection', 'gender'];

        foreach ($parameters as $value) {
            $filter[$value] = $filter[$value] ?? "";
        }
        
        return $filter;
    }

    private function setFilter($filter){
        $price = $this->swapPriceRange($filter['lowestPrice'], $filter['highestPrice']); // set price

        $category = $this->getCategory($filter['category']); // set category
        $collection = $this->getCollection($filter['collection']); // set collection
        $gender = $this->getGender($filter['gender']); // set gender

        session(['search' => $filter['search'], 'lowestPrice' => $price['lowest'], 'highestPrice' => $price['highest'], 'category' => $category, 'collection' => $collection, 'gender' => $gender]);
    }

    // update

    // delete
}
