<?php

namespace App\Http\Controllers;

use App\Models\Media;
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
            'thumbnail' => 'required|url',
            'duration' => 'required',
            'downloadable' => '',
            'notification' => '',
        ]);

        //Var for type of media
        $type = 'video';

        //store thumbnail
        //$imagePath = request('thumbnail')->store('media', 'public');
        //$image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        //$image->save();

        //store video if it is not empty
        if ($request->hasFile('video')) {
            $videoPath = request('video')->store('media', 'public');
            $video = Media::create([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'video' => $videoPath,
                'thumbnail' => $request->thumbnail,
                'duration' => $request->duration,
                'downloadable' => $request->downloadable,
                'notification' => $request->notification,
                'type' => $type,
            ]);
        } else {
            $video = Media::create([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'url' => $request->url,
                'thumbnail' => $request->thumbnail,
                'duration' => $request->duration,
                'downloadable' => $request->downloadable,
                'notification' => $request->notification,
                'type' => $type,
            ]);
        }


        return back()->with('success', 'Video created successfully');
    }

    //Edit Video
    public function edit(Media $id)
    {
        //Total number of videos
        $totalVideos = Media::where('type', 'video')->count();
        //Total number of Audios
        $totalAudios = Media::where('type', 'audio')->count();
        //Videos
        $videos = Media::all();
        //Categories
        $categories = Category::all();
        //video
        $video = Media::find($id->id);
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
        return view('media.video.edit', compact('videos', 'categories', 'video', 'videoTitle', 'videoDescription', 'videoCategory', 'videoVideo', 'videoThumbnail', 'videoDuration', 'videoDownloadable', 'videoNotification', 'videoUrl', 'videoID', 'totalVideos', 'totalAudios'));
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
            'thumbnail' => 'required|url',
            'duration' => 'required',
            'downloadable' => '',
            'notification' => '',
        ]);

        //if video and thumbnail are not empty

        if ($request->hasFile('video')) {
            //store video
            $videoPath = request('video')->store('media', 'public');
            //store thumbnail
            //$imagePath = request('thumbnail')->store('media', 'public');
            //$image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            //$image->save();
            //update video
            $video = Media::find($id);
            $video->title = $request->title;
            $video->description = $request->description;
            $video->category_id = $request->category_id;
            $video->video = $videoPath;
            $video->thumbnail = $request->thumbnail;
            $video->duration = $request->duration;
            $video->downloadable = $request->downloadable;
            $video->notification = $request->notification;
            $video->save();
        } else {
            //update video
            $video = Media::find($id);
            $video->title = $request->title;
            $video->description = $request->description;
            $video->category_id = $request->category_id;
            $video->thumbnail = $request->thumbnail;
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
        $video = Media::find($id);
        $video->delete();
        return back()->with('success', 'Video deleted successfully');
    }

}
