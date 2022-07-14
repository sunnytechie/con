<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\News;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //All news
        $news = News::paginate(10);;
        return view('news.index', compact('news'));
    }

    //create
    public function create()
    {
        return view('news.new');
    }

    //store
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author' => '',
            'bible_verse' => '',
            'news_date' => '',
        ]);

        //store thumbnail
        //store image file in public/books/images
        $imagePath = request('thumbnail')->store('news/image', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        $news = new News;
        $news->title = $request->title;
        $news->details = $request->details;
        $news->news_date = $request->news_date;
        $news->thumbnail = $imagePath;
        $news->author = $request->author;
        $news->bible_verse = $request->bible_verse;
        $news->save();
        return back()->with('success', 'News created successfully');
    }

    //edit
    public function edit($id)
    {
        $news = News::find($id);
        $newsId = $news->id;
        $newsTitle = $news->title;
        $newsDetails = $news->details;
        $newsDate = $news->news_date;
        $newsImage = $news->thumbnail;
        $newsAuthor = $news->author;
        $newsBibleVerse = $news->bible_verse;
        return view('news.edit', compact('newsTitle', 'newsDetails', 'newsDate', 'newsImage', 'newsAuthor', 'newsBibleVerse', 'newsId'));
    }

    //update
    public function update(Request $request, $id)
    {
        //validate
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'thumbnail' => '',
            'author' => '',
            'bible_verse' => '',
            'news_date' => '',
        ]);

        //store thumbnail
        //store image file in public/books/images
        if ($request->has('thumbnail')) {
        $imagePath = request('thumbnail')->store('news/image', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        }

        $news = News::find($id);
        $news->title = $request->title;
        $news->details = $request->details;
        $news->news_date = $request->news_date;
        if ($request->has('thumbnail')) {
            $news->thumbnail = $imagePath;
        }
        $news->author = $request->author;
        $news->bible_verse = $request->bible_verse;
        $news->save();
        return back()->with('success', 'News updated successfully');
    }

    //destroy
    public function destroy(News $id)
    {
        $news = News::find($id);
        $news->delete();
        return back()->with('success', 'News deleted successfully');
    }
}
