<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('subcategories.index', compact('categories', 'subcategories'));
    }

    //create subcategory
    public function create()
    {
        return view('subcategories.create');
    }

    //Store subcategory
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255|unique:subcategories',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subcategory = new Subcategory();
        $subcategory->title = $request->title;
        $subcategory->slug = $request->slug;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        return back()->with('success', 'Subcategory created successfully');
}

}
