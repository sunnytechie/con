<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    //Store
    public function store(Request $request)
    {
        //validate the request...
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required',
            'video' => 'mimes:mp4,m4v,ogg,ogv,webm,mov,flv,wmv|max:20000',
            'url' => 'nullable',
            'thumbnail' => 'required|mimes:jpg,png|max:10000',
            'duration' => 'nullable',
            'downloadable' => 'nullable',
            'notification' => 'nullable',
        ]);

        if ($validator->fails()) {
            $errors = implode(', ', $validator->errors()->all());
            return back()
            ->withInput()
            ->with('success', $errors);
        }

        $imagePath = request('thumbnail')->store('media/video/images', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        //Var for type of media
        $type = 'video';

        //store video if it is not empty
        if ($request->hasFile('video')) {
            $videoPath = request('video')->store('media', 'public');
            $video = Media::create([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'video' => $videoPath,
                'thumbnail' => Env('APP_URL') . '/storage/' . $imagePath,
                'duration' => $request->duration,
                'downloadable' => $request->downloadable,
                'notification' => $request->notification,
                'type' => $type,
                'downloadable' => 1,
            ]);
        } else {
            $video = Media::create([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'url' => $request->url,
                'thumbnail' => Env('APP_URL') . '/storage/' . $imagePath,
                'duration' => $request->duration,
                'downloadable' => $request->downloadable,
                'notification' => $request->notification,
                'type' => $type,
                'downloadable' => 1,
            ]);
        }

        ////Push Notification
        ////$url = 'https://fcm.googleapis.com/fcm/send';
        ////    $dataArr = array('click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'id' => $request->id,'status'=>"done");
        ////    $notification = array('title' =>$request->title, 'text' => $request->body, 'sound' => 'default', 'badge' => '1',);
        ////    $arrayToSend = array('to' => "/topics/all", 'notification' => $notification, 'data' => $dataArr, 'priority'=>'high');
        ////    $fields = json_encode ($arrayToSend);
        ////    $headers = array (
        ////        'Authorization: key=' . 'AAAAo9KT6zk:APA91bHFFW8sx44n64q-DSgTr9SCjbf-Ji1uHlG8GrEWRaQDCqw6-XZFqAxch1pVRWYRy7jdnXlXA-SqIg0O1oyxH5--aGeYJlwi03YPKOuZpk0Bqo8J85xnxDaRXjlZdCuxCKdoMdzF',
        ////        'Content-Type: application/json'
        ////    );
        ////    $ch = curl_init ();
        ////    curl_setopt ( $ch, CURLOPT_URL, $url );
        ////    curl_setopt ( $ch, CURLOPT_POST, true );
        ////    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        ////    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        ////    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

        ////    $result = curl_exec ( $ch );
            ////var_dump($result);
        ////    curl_close ( $ch );

        return redirect()->route('media.video')->with('success', 'Video created successfully');
    }

    //Edit Video
    public function edit($id)
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
        $video = Media::find($id);
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
        $title = $video->title;
        $media = Media::find($id);

        //return view
        return view('media.video.edit', compact('videos', 'media', 'title', 'categories', 'video', 'videoTitle', 'videoDescription', 'videoCategory', 'videoVideo', 'videoThumbnail', 'videoDuration', 'videoDownloadable', 'videoNotification', 'videoUrl', 'videoID', 'totalVideos', 'totalAudios'));
    }

    //Update Video
    public function update(Request $request, $id)
    {
        //validate the request...
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required',
            'video' => 'mimes:mp4,m4v,ogg,ogv,webm,mov,flv,wmv|max:20000',
            'url' => 'nullable',
            'thumbnail' => 'nullable|mimes:png,jpg,jpeg,gif|max:10000',
            'duration' => 'nullable',
            'downloadable' => 'nullable',
            'notification' => 'nullable',
        ]);

        if ($validator->fails()) {
            $errors = implode(', ', $validator->errors()->all());
            return back()
            ->withInput()
            ->with('success', $errors);
        }


       //     //store video
            //$videoPath = request('video')->store('media', 'public');
            //store thumbnail
            //$imagePath = request('thumbnail')->store('media', 'public');
            //$image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200)    //$image->save()    //update vide    $video = Media::find($id)    $video->title = $request->title    $video->description = $request->description    $video->category_id = $request->category_id    $video->video = $videoPath    $video->thumbnail = $request->thumbnail    $video->duration = $request->duration    $video->downloadable = $request->downloadable    $video->notification = $request->notification    $video->save()} else {
            //update video
            $video = Media::find($id);
            $video->title = $request->title;
            $video->description = $request->description;
            $video->category_id = $request->category_id;
            if ($request->hasFile('video')) {
                $videoPath = request('video')->store('media', 'public');
                $video->video = $videoPath;
            }
            if ($request->hasFile('thumbnail')) {
                $imagePath = request('thumbnail')->store('media/video/images', 'public');
                $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
                $image->save();
                $video->thumbnail = Env('APP_URL') . '/storage/' . $imagePath;
            }
            $video->url = $request->url;
            $video->duration = $request->duration;
            $video->downloadable = 1;
            $video->notification = $request->notification;
            $video->save();


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
