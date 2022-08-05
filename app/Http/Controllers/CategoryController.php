<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    //Category Api
    public function categoriesApi()
    {
        $categories = Category::orderBy('title')->get();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'type' => 'required',
            'thumbnail' => ['required', 'image'],
        ]);

        $imagePath = request('thumbnail')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        Category::create([
            'thumbnail' => $imagePath,
            'title' => $data['title'],
            'type' => $data['type'],
        ]);       

        return back()->with('success', 'Category created successfully');
}

//Edit Category
public function edit(Category $category)
{
    $categories = Category::all();
    $subcategories = Subcategory::all();
    $category = Category::find($category->id);
    $categoryID = $category->id;
    $categoryTitle = $category->title;
    $categoryType = $category->type;
    $categoryThumbnail = $category->thumbnail;
    return view('categories.edit', compact('category', 'categoryTitle', 'categoryThumbnail', 'categoryID', 'categories', 'subcategories', 'categoryType'));
}

    //Update Category
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'title' => 'required',
            'type' => 'required',
            'thumbnail' => 'image',
        ]);

        if ($request->hasFile('thumbnail')) {
            $imagePath = request('thumbnail')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
            $category->update([
                'thumbnail' => $imagePath,
                'title' => $data['title'],
                'type' => $data['type'],
            ]);
        }
        else {
            $category->update([
                'title' => $data['title'],
                'type' => $data['type'],
            ]);
        }

        return back()->with('success', 'Category updated successfully');
    }


    //destroy category
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Category deleted successfully');
    }

}