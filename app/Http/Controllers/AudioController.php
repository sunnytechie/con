<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Models\Media;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AudioController extends Controller
{
    public function store(Request $request)
    {
        //validate the request...
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required',
            'audio' => 'mimes:mp3,m4a,ogg,oga,wav|max:20000',
            'url' => '',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'duration' => 'required',
            'downloadable' => '',
            'notification' => '',
        ]);

        //Var for type of media
        $type = 'audio';    
        //store thumbnail
        $imagePath = request('thumbnail')->store('media', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        //If Audio is empty, then store the url
        if ($request->hasFile('audio')) {
            $audioPath = request('audio')->store('media', 'public');
            $audio = Media::create([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'audio' => $audioPath,
                'thumbnail' => $imagePath,
                'duration' => $request->duration,
                'downloadable' => $request->downloadable,
                'notification' => $request->notification,
                'type' => $type,
            ]);
        } else {
            $audio = Media::create([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'url' => $request->url,
                'thumbnail' => $imagePath,
                'duration' => $request->duration,
                'downloadable' => $request->downloadable,
                'notification' => $request->notification,
                'type' => $type,
            ]);
        }
        
        return back()->with('success', 'Audio created successfully');
    }

    //Edit Audio
    public function edit(Media $id)
    {
        //categories
        $categories = Category::all();
        //audios
        $audios = Media::all();
        //Variable to store the audio
        $audio = Media::find($id->id);
        $audioID = $audio->id;
        $audioTitle = $audio->title;
        $audioDescription = $audio->description;
        $audioCategory = $audio->category_id;
        $audioAudio = $audio->audio;
        $audioUrl = $audio->url;
        $audioThumbnail = $audio->thumbnail;
        $audioDuration = $audio->duration;
        $audioDownloadable = $audio->downloadable;
        $audioNotification = $audio->notification;
        
        return view('media.audio.edit', compact('audio', 'categories', 'audios', 'audioID', 'audioTitle', 'audioDescription', 'audioCategory', 'audioAudio', 'audioUrl', 'audioThumbnail', 'audioDuration', 'audioDownloadable', 'audioNotification'));
    }

    //Update Audio
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required',
            'audio' => 'mimes:mp3,m4a,ogg,oga,wav|max:20000',
            'url' => '',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'duration' => 'required',
            'downloadable' => '',
            'notification' => '',
        ]);

        //Store Audio
        //store thumbnail

        //If Audio and Thumbnail are empty, then store the url
        if ($request->hasFile('audio') && $request->hasFile('thumbnail')) {
            //store audio
            $audioPath = request('audio')->store('media', 'public');
            //store thumbnail
            $imagePath = request('thumbnail')->store('media', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
            //update audio
            $audio = Media::find($id);
            $audio->title = $request->title;
            $audio->description = $request->description;
            $audio->category_id = $request->category_id;
            $audio->audio = $audioPath;
            $audio->thumbnail = $imagePath;
            $audio->duration = $request->duration;
            $audio->downloadable = $request->downloadable;
            $audio->notification = $request->notification;
            $audio->save();
        } elseif ($request->hasFile('audio') && !$request->hasFile('thumbnail')) {
            //store audio
            $audioPath = request('audio')->store('media', 'public');
            //update audio
            $audio = Media::find($id);
            $audio->title = $request->title;
            $audio->description = $request->description;
            $audio->category_id = $request->category_id;
            $audio->audio = $audioPath;
            $audio->duration = $request->duration;
            $audio->downloadable = $request->downloadable;
            $audio->notification = $request->notification;
            $audio->save();
        } elseif (!$request->hasFile('audio') && $request->hasFile('thumbnail')) {
            //store thumbnail
            $imagePath = request('thumbnail')->store('media', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
            //update audio
            //update audio
            $audio = Media::find($id);
            $audio->title = $request->title;
            $audio->description = $request->description;
            $audio->category_id = $request->category_id;
            $audio->thumbnail = $imagePath;
            $audio->duration = $request->duration;
            $audio->downloadable = $request->downloadable;
            $audio->notification = $request->notification;
            $audio->save();
        } else {
            //update audio
            $audio = Media::find($id);
            $audio->title = $request->title;
            $audio->description = $request->description;
            $audio->category_id = $request->category_id;
            $audio->url = $request->url;
            $audio->duration = $request->duration;
            $audio->downloadable = $request->downloadable;
            $audio->notification = $request->notification;
            $audio->save();
        }

        return back()->with('success', 'Audio updated successfully');
    }

    //Delete Audio
    public function destroy($id)
    {
        $audio = Media::find($id);
        $audio->delete();
        return back()->with('success', 'Audio deleted successfully');
    }
}
