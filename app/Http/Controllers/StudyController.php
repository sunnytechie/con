<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        //Fountain = 1
        //Bible Study = 2
        //Daily dynamite = 3

    public function index()
    {
        $studies = Study::paginate(10);
        return view('study.index', compact('studies'));
    }

    //index for type 1
    public function indexFountain()
    {
        $studies = Study::where('type', 1)->paginate(10);
        return view('study.index.fountain', compact('studies'));
    }

    //index for type 2
    public function indexBibleStudy()
    {
        $studies = Study::where('type', 2)->paginate(10);
        return view('study.index.biblestudy', compact('studies'));
    }

    //index for type 3
    public function indexDailyDynamite()
    {
        $studies = Study::where('type', 3)->paginate(10);
        return view('study.index.dynamite', compact('studies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studies = new Study;
        $studies->type = $request->type;
        $studies->study_type_name = $request->study_type_name;
        $studies->study_name = $request->study_name;
        $studies->study_date = $request->study_date;
        $studies->head_date = $request->head_date;
        $studies->theme = $request->theme;
        $studies->sub_theme = $request->sub_theme;
        $studies->topic = $request->topic;
        $studies->study_text = $request->study_text;
        $studies->study_title = $request->study_title;
        $studies->study_content = $request->study_content;
        $studies->aims = $request->aims;
        $studies->introduction = $request->introduction;
        $studies->study_guide = $request->study_guide;
        $studies->conclusion = $request->conclusion;
        $studies->food_for_thought = $request->food_for_thought;
        $studies->memory_verse = $request->memory_verse;
        $studies->verse_content = $request->verse_content;
        $studies->anchor_verse_number = $request->anchor_verse_number;
        $studies->anchor_verse_text = $request->anchor_verse_text;
        $studies->anchor_verse_contents = $request->anchor_verse_contents;
        $studies->prayer = $request->prayer;
        $studies->study_year = $request->study_year;
        $studies->save();

        //return back with success message
        return back()->with('success', 'Published successfully.');
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
    public function editFountain($id)
    {
        $study = Study::find($id);

        //declare variables
        $id = $study->id;
        $type = $study->type;
        $study_type_name = $study->study_type_name;
        $study_name = $study->study_name;
        $study_date = $study->study_date;
        $head_date = $study->head_date;
        $theme = $study->theme;
        $sub_theme = $study->sub_theme;
        $topic = $study->topic;
        $study_text = $study->study_text;
        $study_title = $study->study_title;
        $study_content = $study->study_content;
        $aims = $study->aims;
        $introduction = $study->introduction;
        $study_guide = $study->study_guide;
        $conclusion = $study->conclusion;
        $food_for_thought = $study->food_for_thought;
        $memory_verse = $study->memory_verse;
        $verse_content = $study->verse_content;
        $anchor_verse_number = $study->anchor_verse_number;
        $anchor_verse_text = $study->anchor_verse_text;
        $anchor_verse_contents = $study->anchor_verse_contents;
        $prayer = $study->prayer;
        $study_year = $study->study_year;

        return view('study.edit.fountain', compact('id', 'study', 'type', 'study_type_name', 'study_name', 'study_date', 'head_date', 'theme', 'sub_theme', 'topic', 'study_text', 'study_title', 'study_content', 'aims', 'introduction', 'study_guide', 'conclusion', 'food_for_thought', 'memory_verse', 'verse_content', 'anchor_verse_number', 'anchor_verse_text', 'anchor_verse_contents', 'prayer', 'study_year'));
    }

    public function editBibleStudy($id)
    {
        $study = Study::find($id);

        //declare variables
        $id = $study->id;
        $type = $study->type;
        $study_type_name = $study->study_type_name;
        $study_name = $study->study_name;
        $study_date = $study->study_date;
        $head_date = $study->head_date;
        $theme = $study->theme;
        $sub_theme = $study->sub_theme;
        $topic = $study->topic;
        $study_text = $study->study_text;
        $study_title = $study->study_title;
        $study_content = $study->study_content;
        $aims = $study->aims;
        $introduction = $study->introduction;
        $study_guide = $study->study_guide;
        $conclusion = $study->conclusion;
        $food_for_thought = $study->food_for_thought;
        $memory_verse = $study->memory_verse;
        $verse_content = $study->verse_content;
        $anchor_verse_number = $study->anchor_verse_number;
        $anchor_verse_text = $study->anchor_verse_text;
        $anchor_verse_contents = $study->anchor_verse_contents;
        $prayer = $study->prayer;
        $study_year = $study->study_year;

        return view('study.edit.biblestudy', compact('id', 'study', 'type', 'study_type_name', 'study_name', 'study_date', 'head_date', 'theme', 'sub_theme', 'topic', 'study_text', 'study_title', 'study_content', 'aims', 'introduction', 'study_guide', 'conclusion', 'food_for_thought', 'memory_verse', 'verse_content', 'anchor_verse_number', 'anchor_verse_text', 'anchor_verse_contents', 'prayer', 'study_year'));
    }

    public function editDailyDynamite($id)
    {
        $study = Study::find($id);

        //declare variables
        $id = $study->id;
        $type = $study->type;
        $study_type_name = $study->study_type_name;
        $study_name = $study->study_name;
        $study_date = $study->study_date;
        $head_date = $study->head_date;
        $theme = $study->theme;
        $sub_theme = $study->sub_theme;
        $topic = $study->topic;
        $study_text = $study->study_text;
        $study_title = $study->study_title;
        $study_content = $study->study_content;
        $aims = $study->aims;
        $introduction = $study->introduction;
        $study_guide = $study->study_guide;
        $conclusion = $study->conclusion;
        $food_for_thought = $study->food_for_thought;
        $memory_verse = $study->memory_verse;
        $verse_content = $study->verse_content;
        $anchor_verse_number = $study->anchor_verse_number;
        $anchor_verse_text = $study->anchor_verse_text;
        $anchor_verse_contents = $study->anchor_verse_contents;
        $prayer = $study->prayer;
        $study_year = $study->study_year;

        return view('study.edit.dynamite', compact('id', 'study', 'type', 'study_type_name', 'study_name', 'study_date', 'head_date', 'theme', 'sub_theme', 'topic', 'study_text', 'study_title', 'study_content', 'aims', 'introduction', 'study_guide', 'conclusion', 'food_for_thought', 'memory_verse', 'verse_content', 'anchor_verse_number', 'anchor_verse_text', 'anchor_verse_contents', 'prayer', 'study_year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBibleStudy(Request $request, $id)
    {
        $study = Study::find($id);
        //if request is not empty
        if ($request->has('type')) {
            $study->type = $request->type;
        }
        if ($request->has('study_type_name')) {
            $study->study_type_name = $request->study_type_name;
        }
        if ($request->has('study_name')) {
            $study->study_name = $request->study_name;
        }
        if ($request->has('study_date')) {
            $study->study_date = $request->study_date;
        }
        if ($request->has('head_date')) {
            $study->head_date = $request->head_date;
        }
        if ($request->has('theme')) {
            $study->theme = $request->theme;
        }
        if ($request->has('sub_theme')) {
            $study->sub_theme = $request->sub_theme;
        }
        if ($request->has('topic')) {
            $study->topic = $request->topic;
        }
        if ($request->has('study_text')) {
            $study->study_text = $request->study_text;
        }
        if ($request->has('study_title')) {
            $study->study_title = $request->study_title;
        }
        if ($request->has('study_content')) {
            $study->study_content = $request->study_content;
        }
        if ($request->has('aims')) {
            $study->aims = $request->aims;
        }
        if ($request->has('introduction')) {
            $study->introduction = $request->introduction;
        }
        if ($request->has('study_guide')) {
            $study->study_guide = $request->study_guide;
        }
        if ($request->has('conclusion')) {
            $study->conclusion = $request->conclusion;
        }
        if ($request->has('food_for_thought')) {
            $study->food_for_thought = $request->food_for_thought;
        }
        if ($request->has('memory_verse')) {
            $study->memory_verse = $request->memory_verse;
        }
        if ($request->has('verse_content')) {
            $study->verse_content = $request->verse_content;
        }
        if ($request->has('anchor_verse_number')) {
            $study->anchor_verse_number = $request->anchor_verse_number;
        }
        if ($request->has('anchor_verse_text')) {
            $study->anchor_verse_text = $request->anchor_verse_text;
        }
        if ($request->has('anchor_verse_contents')) {
            $study->anchor_verse_contents = $request->anchor_verse_contents;
        }
        if ($request->has('prayer')) {
            $study->prayer = $request->prayer;
        }
        if ($request->has('study_year')) {
            $study->study_year = $request->study_year;
        }
        $study->save();

        //return back with success message
        return back()->with('success', 'Updated successfully.');
    }

    public function updateFountain(Request $request, $id)
    {
        $study = Study::find($id);
        //if request is not empty
        if ($request->has('type')) {
            $study->type = $request->type;
        }
        if ($request->has('study_type_name')) {
            $study->study_type_name = $request->study_type_name;
        }
        if ($request->has('study_name')) {
            $study->study_name = $request->study_name;
        }
        if ($request->has('study_date')) {
            $study->study_date = $request->study_date;
        }
        if ($request->has('head_date')) {
            $study->head_date = $request->head_date;
        }
        if ($request->has('theme')) {
            $study->theme = $request->theme;
        }
        if ($request->has('sub_theme')) {
            $study->sub_theme = $request->sub_theme;
        }
        if ($request->has('topic')) {
            $study->topic = $request->topic;
        }
        if ($request->has('study_text')) {
            $study->study_text = $request->study_text;
        }
        if ($request->has('study_title')) {
            $study->study_title = $request->study_title;
        }
        if ($request->has('study_content')) {
            $study->study_content = $request->study_content;
        }
        if ($request->has('aims')) {
            $study->aims = $request->aims;
        }
        if ($request->has('introduction')) {
            $study->introduction = $request->introduction;
        }
        if ($request->has('study_guide')) {
            $study->study_guide = $request->study_guide;
        }
        if ($request->has('conclusion')) {
            $study->conclusion = $request->conclusion;
        }
        if ($request->has('food_for_thought')) {
            $study->food_for_thought = $request->food_for_thought;
        }
        if ($request->has('memory_verse')) {
            $study->memory_verse = $request->memory_verse;
        }
        if ($request->has('verse_content')) {
            $study->verse_content = $request->verse_content;
        }
        if ($request->has('anchor_verse_number')) {
            $study->anchor_verse_number = $request->anchor_verse_number;
        }
        if ($request->has('anchor_verse_text')) {
            $study->anchor_verse_text = $request->anchor_verse_text;
        }
        if ($request->has('anchor_verse_contents')) {
            $study->anchor_verse_contents = $request->anchor_verse_contents;
        }
        if ($request->has('prayer')) {
            $study->prayer = $request->prayer;
        }
        if ($request->has('study_year')) {
            $study->study_year = $request->study_year;
        }
        $study->save();

        //return back with success message
        return back()->with('success', 'Updated successfully.');
    }

    public function updateDailyDynamite(Request $request, $id)
    {
        $study = Study::find($id);
        //if request is not empty
        if ($request->has('type')) {
            $study->type = $request->type;
        }
        if ($request->has('study_type_name')) {
            $study->study_type_name = $request->study_type_name;
        }
        if ($request->has('study_name')) {
            $study->study_name = $request->study_name;
        }
        if ($request->has('study_date')) {
            $study->study_date = $request->study_date;
        }
        if ($request->has('head_date')) {
            $study->head_date = $request->head_date;
        }
        if ($request->has('theme')) {
            $study->theme = $request->theme;
        }
        if ($request->has('sub_theme')) {
            $study->sub_theme = $request->sub_theme;
        }
        if ($request->has('topic')) {
            $study->topic = $request->topic;
        }
        if ($request->has('study_text')) {
            $study->study_text = $request->study_text;
        }
        if ($request->has('study_title')) {
            $study->study_title = $request->study_title;
        }
        if ($request->has('study_content')) {
            $study->study_content = $request->study_content;
        }
        if ($request->has('aims')) {
            $study->aims = $request->aims;
        }
        if ($request->has('introduction')) {
            $study->introduction = $request->introduction;
        }
        if ($request->has('study_guide')) {
            $study->study_guide = $request->study_guide;
        }
        if ($request->has('conclusion')) {
            $study->conclusion = $request->conclusion;
        }
        if ($request->has('food_for_thought')) {
            $study->food_for_thought = $request->food_for_thought;
        }
        if ($request->has('memory_verse')) {
            $study->memory_verse = $request->memory_verse;
        }
        if ($request->has('verse_content')) {
            $study->verse_content = $request->verse_content;
        }
        if ($request->has('anchor_verse_number')) {
            $study->anchor_verse_number = $request->anchor_verse_number;
        }
        if ($request->has('anchor_verse_text')) {
            $study->anchor_verse_text = $request->anchor_verse_text;
        }
        if ($request->has('anchor_verse_contents')) {
            $study->anchor_verse_contents = $request->anchor_verse_contents;
        }
        if ($request->has('prayer')) {
            $study->prayer = $request->prayer;
        }
        if ($request->has('study_year')) {
            $study->study_year = $request->study_year;
        }
        $study->save();

        //return back with success message
        return back()->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $study = Study::find($id);
        $study->delete();
        return back()->with('success', 'Deleted successfully.');
    }
}
