<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PushNotification;

class PushNotificationController extends Controller
{
    //index
    public function index()
    {
        return view('push_notifications.index');
    }

    //push
    public function push(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required',
        ]);
        $notification = new PushNotification();
        $notification->title = $request->input('title');
        $notification->body = $request->input('body');
        $notification->img = $request->input('img');
        $notification->save();

        //$fIREBASE_SERVER_KEY = env('FIREBASE_SERVER_KEY');
        $url = 'https://fcm.googleapis.com/fcm/send';
        $dataArr = array('click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'id' => $request->id,'status'=>"done");
        $notification = array('title' =>$request->title, 'text' => $request->body, 'image'=> $request->img, 'sound' => 'default', 'badge' => '1',);
        $arrayToSend = array('to' => "/topics/all", 'notification' => $notification, 'data' => $dataArr, 'priority'=>'high');
        $fields = json_encode ($arrayToSend);
        $headers = array (
            'Authorization: key=' . "AAAAo9KT6zk:APA91bGQv5NcNJ3qRhTwYIf9hW8BqzMb_xNYxS3CUlMmvuFt6g3I2X_UO1aiIg9o-a8PGp_VPgrm1Ls8VJmmIGxOlm695_4lDGRFt06gg3jA5bhB10gFoCPxnm0bKZwKK6lwEPvDAIO_",
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
        return redirect()->back()->with('success', 'Notification Sent successfully');
}
}