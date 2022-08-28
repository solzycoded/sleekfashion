<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Models\Category;
use App\Http\Models\Gender;

class CategoriesController extends Controller
{
    // read
    public function index(){
        $categories = Category::orderBy('category', 'asc')->get();
        $genders = Gender::all();

        // return view('/index', compact('title', 'description'));
        return view('collections.categories.index', compact('categories', 'genders')); 
        // ->with('categories', $categories));
    }

    public function show($id){
        return view('collections.categories.index', [
            'category' => Category::findOrFail($id)
        ]);
    }

    // create
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'category' => 'required'
            // ,
            // 'company' => ['required', Rule::unique('listings', 'company')],
            // 'location' => 'required',
            // 'website' => 'required',
            // 'email' => 'required',
            // 'tags' => 'required',
            // 'description' => 'required',
        ]);
        
        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); 
        }

        Listing::create($formFields);
        
        // message (name of component)
        return redirect('/')->with('message', 'Category created successfully!!');
    }

    // update
    public function edit(Category $category)
    {
        // 
        return view('collections.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $category = Category::find($id);

        $category->category = $input['category'];

        $category->save();
        // $formFields = $request->validate([
        //     'title' => 'required',
        //     'company' => ['required', Rule::unique('listings', 'company')],
        //     'location' => 'required',
        //     'website' => 'required',
        //     'email' => 'required',
        //     'tags' => 'required',
        //     'description' => 'required',
        // ]);
        
        // if($request->hasFile('logo')) {
        //     $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        // }

        // $category->create($formFields);
        
        // message (name of component)
        return back()->with('message', 'Category created successfully!!');
    }

    // delete 
    public function destroy(Request $request, Category $category)
    {
        $category->delete();

        return redirect('/')->with('message', 'Category deleted successfully!');
    }
}