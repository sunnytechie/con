<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class VideoController extends Controller
{
    //Store
    public function store(Request $request)
    {
        //validate the request...
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required',
            'video' => 'mimes:mp4,m4v,ogg,ogv,webm,mov,flv,wmv|max:20000',
            'url' => '',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'duration' => 'required',
            'downloadable' => '',
            'notification' => '',
        ]);

        //store thumbnail
        $imagePath = request('thumbnail')->store('media', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        //store video if it is not empty
        if ($request->hasFile('video')) {
            $videoPath = request('video')->store('media', 'public');
            $video = Video::create([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'video' => $videoPath,
                'thumbnail' => $imagePath,
                'duration' => $request->duration,
                'downloadable' => $request->downloadable,
                'notification' => $request->notification,
            ]);
        } else {
            $video = Video::create([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'url' => $request->url,
                'thumbnail' => $imagePath,
                'duration' => $request->duration,
                'downloadable' => $request->downloadable,
                'notification' => $request->notification,
            ]);
        }


        return back()->with('success', 'Video created successfully');
    }

    //Edit Video
    public function edit(Video $id)
    {
        //Videos
        $videos = Video::all();
        //Categories
        $categories = Category::all();
        //video
        $video = Video::find($id->id);
        $videoID = $video->id;
        $videoTitle = $video->title;
        $videoDescription = $video->description;
        $videoCategory = $video->category_id;
        $videoVideo = $video->video;
        $videoThumbnail = $video->thumbnail;
        $videoDuration = $video->duration;
        $videoDownloadable = $video->downloadable;
        $videoNotification = $video->notification;
        $videoUrl = $video->url;

        //return view        
        return view('media.video.edit', compact('videos', 'categories', 'video', 'videoTitle', 'videoDescription', 'videoCategory', 'videoVideo', 'videoThumbnail', 'videoDuration', 'videoDownloadable', 'videoNotification', 'videoUrl', 'videoID'));
    }

    //Update Video
    public function update(Request $request, $id)
    {
        //validate the request...
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required',
            'video' => 'mimes:mp4,m4v,ogg,ogv,webm,mov,flv,wmv|max:20000',
            'url' => '',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'duration' => 'required',
            'downloadable' => '',
            'notification' => '',
        ]);

        

        //if video and thumbnail are not empty

        if ($request->hasFile('video') && $request->hasFile('thumbnail')) {
            //store video
            $videoPath = request('video')->store('media', 'public');
            //store thumbnail
            $imagePath = request('thumbnail')->store('media', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
            //update video
            $video = Video::find($id);
            $video->title = $request->title;
            $video->description = $request->description;
            $video->category_id = $request->category_id;
            $video->video = $videoPath;
            $video->thumbnail = $imagePath;
            $video->duration = $request->duration;
            $video->downloadable = $request->downloadable;
            $video->notification = $request->notification;
            $video->save();
        } elseif ($request->hasFile('video') && !$request->hasFile('thumbnail')) {
            //store video
            $videoPath = request('video')->store('media', 'public');
            //update video
            $video = Video::find($id);
            $video->title = $request->title;
            $video->description = $request->description;
            $video->category_id = $request->category_id;
            $video->video = $videoPath;
            $video->duration = $request->duration;
            $video->downloadable = $request->downloadable;
            $video->notification = $request->notification;
            $video->save();
        } elseif (!$request->hasFile('video') && $request->hasFile('thumbnail')) {
            //store thumbnail
            $imagePath = request('thumbnail')->store('media', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
            //update video
            //update video
            $video = Video::find($id);
            $video->title = $request->title;
            $video->description = $request->description;
            $video->category_id = $request->category_id;
            $video->thumbnail = $imagePath;
            $video->duration = $request->duration;
            $video->downloadable = $request->downloadable;
            $video->notification = $request->notification;
            $video->save();
        } else {
            //update video
            $video = Video::find($id);
            $video->title = $request->title;
            $video->description = $request->description;
            $video->category_id = $request->category_id;
            $video->url = $request->url;
            $video->duration = $request->duration;
            $video->downloadable = $request->downloadable;
            $video->notification = $request->notification;
            $video->save();
        }

        return back()->with('success', 'Video updated successfully');
    }

    //Delete Video
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return back()->with('success', 'Video deleted successfully');
    }

}
