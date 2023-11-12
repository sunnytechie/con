<?php

namespace App\Http\Controllers;

use App\Models\Bcpcategory;
use Illuminate\Http\Request;
use App\Models\Bcpsubcategory;
use Illuminate\Support\Facades\Validator;

class BcpController extends Controller
{
    //index
    public function index() {
        $title = "Book of common prayer";
        $bcps = Bcpsubcategory::orderBy('id', 'desc')->get();
        $categories = Bcpcategory::orderBy('id', 'desc')->get();
        return view('bcp.index', compact('bcps', 'title', 'categories'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'title' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
            ->withInput()
            ->with('success', "Please try again.");
        }

        $bcp = new Bcpsubcategory();
        $bcp->title = $request->title;
        $bcp->content = $request->content;
        $bcp->bcpcategory_id = $request->category_id;
        $bcp->save();

        return back()
            ->with('success', "Published Successfully");
    }

    public function edit($id) {
        $title = "Book of common prayer";
        $bcp = Bcpsubcategory::find($id);
        $categories = Bcpcategory::orderBy('id', 'desc')->get();
        return view('bcp.edit', compact('bcp', 'title', 'categories'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'title' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
            ->withInput()
            ->with('success', "Please try again.");
        }

        $bcp = Bcpsubcategory::find($id);
        $bcp->title = $request->title;
        $bcp->content = $request->content;
        $bcp->bcpcategory_id = $request->category_id;
        $bcp->save();

        return back()
            ->with('success', "Updated Successfully");
    }

    public function destroy($id) {
        $bcp = Bcpsubcategory::find($id);
        $bcp->delete();

        return back()
            ->with('success', "Deleted Successfully");
    }

    //Categories
    public function category() {
        $title = "Categories - Book of common prayer";
        $categories = Bcpcategory::orderBy('id', 'desc')->get();

        return view('bcp.category', compact('categories', 'title'));
    }

    public function categoryStore(Request $request) {
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
            ->withInput()
            ->with('success', "Please try again.");
        }

        $category = new Bcpcategory();
        $category->title = $request->title;
        $category->description = $request->content;
        $category->save();

        return back()
            ->with('success', "Added Successfully");
    }

    public function categoryDestory($id) {
        //delete associate
        $subcategories = Bcpsubcategory::where('bcpcategory_id', $id)->get();
        if ($subcategories) {
            foreach ($subcategories as $subcategory) {
                $subcategory->delete();
            }
        }

        $category = Bcpcategory::find($id);
        $category->delete();

        return back()
            ->with('success', "Deleted with all it associates.");
    }
}
