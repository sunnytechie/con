<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Cyc;
use App\Models\Cyccategory;
use Illuminate\Http\Request;
use App\Models\Cycsubcategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class CycController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('hello');
        $title = "Church Year Calendar";
        $cycs = Cyc::orderBy('created_at', 'desc')->get();
        $categories = Cyccategory::orderBy('id', 'desc')->get();
        $subcategories = Cycsubcategory::orderBy('id', 'desc')->get();

        return view('cyc.index', compact('cycs', 'title', 'categories', 'subcategories'));
    }

    public function categoryStore(Request $request) {
        //dd($request->all());
        //validate request
        $validator = Validator::make($request->all(), [
            'title' => 'nullable',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return back()
            ->withInput()
            ->with('success', "Please try again.");
        }

        $imagePath = request('image')->store('cycimages', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        $category = new Cyccategory();
        $category->title = $request->title;
        $category->image = $imagePath;
        $category->save();

        return back()
            ->with('success', "Category Added successfully.");

    }

    public function subcategoryStore(Request $request) {
        //dd($request->all());
        //validate request
        $validator = Validator::make($request->all(), [
            'title' => 'nullable',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
            ->withInput()
            ->with('success', "Please try again.");
        }

        $category = new Cycsubcategory();
        $category->title = $request->title;
        $category->cyccategory_id = $request->category_id;
        $category->save();

        return back()
            ->with('success', "Sub Category Added successfully.");

    }

    public function calendar() {
        $calendars = Calendar::orderBy('id', 'desc')->get();
        $title = "Church Calender of the Year.";

        return view('calendar.index', compact('calendars', 'title'));
    }

    public function calendarEdit($id) {
        $calendar = Calendar::find($id);
        $title = "Church Calender of the Year.";

        return view('calendar.edit', compact('calendar', 'title'));
    }

    public function calendarStore(Request $request) {
        //dd($request->all());
        //validate request
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'color' => 'required',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return back()
            ->withInput()
            ->with('success', "Please try again.");
        }

        $calendar = new Calendar();
        $calendar->color = $request->color;
        $calendar->date = $request->date;
        $calendar->content = $request->content;
        $calendar->save();

        return back()
            ->with('success', "Published Successfully");
    }

    public function calendarUpdate(Request $request, $id) {
        //dd($request->all());
        //validate request
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'color' => 'required',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return back()
            ->withInput()
            ->with('success', "Please try again.");
        }

        $calendar = Calendar::find($id);
        $calendar->color = $request->color;
        $calendar->date = $request->date;
        $calendar->content = $request->content;
        $calendar->save();

        return back()
            ->with('success', "Updated Successfully");
    }

    public function calendarDestroy($id) {
        $calendar = Calendar::find($id);
        $calendar->delete();

        return back()
            ->with('success', "Deleted Successfully.");
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cyc.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'subcategory_id' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
            ->withInput()
            ->with('success', "Please try again.");
        }

        $cyc = new Cyc;
        $cyc->cyc_title = $request->title;
        $cyc->cycsubcategory_id = $request->subcategory_id;
        $cyc->content = $request->content;
        $cyc->save();

        return back()->with('success', 'New CYC published successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cyc = Cyc::find($id);
        $title = $cyc->cyc_title;
        $subcategories = Cycsubcategory::orderBy('id', 'desc')->get();

        return view('cyc.edit', compact('cyc', 'title', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'subcategory_id' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
            ->withInput()
            ->with('success', "Please try again.");
        }

        $cyc = Cyc::find($id);
        $cyc->cyc_title = $request->title;
        $cyc->cycsubcategory_id = $request->subcategory_id;
        $cyc->content = $request->content;
        $cyc->save();

        //redirect to back with success message
        return redirect()->back()->with('success', 'CYC updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cyc = Cyc::find($id);
        $cyc->delete();
        return redirect()->back()->with('success', 'CYC deleted successfully');
    }
}
