<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Models\Media;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\PushNotification;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class AudioController extends Controller
{
    public function store(Request $request)
    {
        //validate the request...
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required',
            'audio' => 'required|mimes:mp3,m4a,ogg,oga,wav|max:20000',
            //'url' => '',
            'thumbnail' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'duration' => 'required',
            'downloadable' => 'nullable',
            'notification' => 'nullable',
        ]);

        if ($validator->fails()) {
            $errors = implode(', ', $validator->errors()->all());
            return back()
            ->withInput()
            ->with('success', $errors);
        }

        //Var for type of media
        $type = 'audio';

        $imagePath = request('thumbnail')->store('media/audio/images', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        ////if ($request->hasFile('audio')) {
            $audioPath = request('audio')->store('media', 'public');
            $audio = Media::create([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'audio' => $audioPath,
                'thumbnail' => Env('APP_URL') . '/storage/' . $imagePath,
                'duration' => $request->duration,
                'downloadable' => 1,
                'notification' => $request->notification,
                'type' => $type,
            ]);
        ////} else {
        ////    $audio = Media::create([
        ////        'title' => $request->title,
        ////        'description' => $request->description,
        ////        'category_id' => $request->category_id,
        ////        'url' => $request->url,
        ////        'thumbnail' => $request->thumbnail,
        ////        'duration' => $request->duration,
        ////        'downloadable' => $request->downloadable,
        ////        'notification' => $request->notification,
        ////        'type' => $type,
        ////    ]);
        ////}

        //Push Notification
        $url = 'https://fcm.googleapis.com/fcm/send';
            $dataArr = array('click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'id' => $request->id,'status'=>"done");
            $notification = array('title' =>$request->title, 'text' => $request->body, 'sound' => 'default', 'badge' => '1',);
            $arrayToSend = array('to' => "/topics/all", 'notification' => $notification, 'data' => $dataArr, 'priority'=>'high');
            $fields = json_encode ($arrayToSend);
            $headers = array (
                'Authorization: key=' . 'AAAAo9KT6zk:APA91bHFFW8sx44n64q-DSgTr9SCjbf-Ji1uHlG8GrEWRaQDCqw6-XZFqAxch1pVRWYRy7jdnXlXA-SqIg0O1oyxH5--aGeYJlwi03YPKOuZpk0Bqo8J85xnxDaRXjlZdCuxCKdoMdzF',
                'Content-Type: application/json'
            );
            $ch = curl_init ();
            curl_setopt ( $ch, CURLOPT_URL, $url );
            curl_setopt ( $ch, CURLOPT_POST, true );
            curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
            curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

            $result = curl_exec ( $ch );
            //var_dump($result);
        curl_close ( $ch );

        return redirect()->route('media.audio')->with('success', 'Audio created successfully');
    }

    //Edit Audio
    public function edit($id)
    {
        //Total number of videos
        $totalVideos = Media::where('type', 'video')->count();
        //Total number of Audios
        $totalAudios = Media::where('type', 'audio')->count();
        //categories
        $categories = Category::all();
        //audios
        $audios = Media::all();
        //Variable to store the audio
        $audio = Media::find($id);
        $audioID = $audio->id;
        $audioTitle = $audio->title;
        $audioDescription = $audio->description;
        $audioCategory = $audio->category_id;
        $audioAudio = $audio->audio;
        $audioUrl = $audio->url;
        $audioThumbnail = $audio->thumbnail;
        $audioDuration = $audio->duration;
        $audioDownloadable = 1;
        $audioNotification = $audio->notification;
        $title = $audioTitle;
        $media = Media::find($id);

        return view('media.audio.edit', compact('audio', 'categories', 'title', 'audios', 'audioID', 'audioTitle', 'audioDescription', 'audioCategory', 'audioAudio', 'audioUrl', 'media', 'audioThumbnail', 'audioDuration', 'audioDownloadable', 'audioNotification', 'totalVideos', 'totalAudios'));
    }

    //Update Audio
    public function update(Request $request, $id)
    {
        $valaidation = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required',
            'audio' => 'nullable|mimes:mp3,m4a,ogg,oga,wav|max:20000',
            'thumbnail' => 'nullable|mimes:png,jpg,jpeg,gif|max:10000',
            'duration' => 'required',
            'downloadable' => 'nullable',
            'notification' => 'nullable',
        ]);

        if ($valaidation->fails()) {
            $errors = implode(', ', $valaidation->errors()->all());
            return back()->withInput()->with('success', $errors);
        }

            //store audio
            if ($request->has('audio')) {
                $audioPath = request('audio')->store('media', 'public');
            }

            if ($request->has('thumbnail')) {
                $imagePath = request('thumbnail')->store('media/audio/images', 'public');
                $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
                $image->save();
            }

            $audio = Media::find($id);
            $audio->title = $request->title;
            $audio->description = $request->description;
            $audio->category_id = $request->category_id;
            if ($request->has('audio')) {
                $audio->audio = $audioPath;
            }
            if ($request->has('thumbnail')) {
                $audio->thumbnail = Env('APP_URL') . '/storage/' . $imagePath;
            }
            $audio->duration = $request->duration;
            $audio->downloadable = 1;
            $audio->notification = $request->notification;
            $audio->save();


        //Push Notification
        $url = 'https://fcm.googleapis.com/fcm/send';
            $dataArr = array('click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'id' => $request->id,'status'=>"done");
            $notification = array('title' =>$request->title, 'text' => $request->body, 'sound' => 'default', 'badge' => '1',);
            $arrayToSend = array('to' => "/topics/all", 'notification' => $notification, 'data' => $dataArr, 'priority'=>'high');
            $fields = json_encode ($arrayToSend);
            $headers = array (
                'Authorization: key=' . 'AAAAo9KT6zk:APA91bHFFW8sx44n64q-DSgTr9SCjbf-Ji1uHlG8GrEWRaQDCqw6-XZFqAxch1pVRWYRy7jdnXlXA-SqIg0O1oyxH5--aGeYJlwi03YPKOuZpk0Bqo8J85xnxDaRXjlZdCuxCKdoMdzF',
                'Content-Type: application/json'
            );
            $ch = curl_init ();
            curl_setopt ( $ch, CURLOPT_URL, $url );
            curl_setopt ( $ch, CURLOPT_POST, true );
            curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
            curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

            $result = curl_exec ( $ch );
            //var_dump($result);
        curl_close ( $ch );

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
