<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Mockery\Matcher\Not;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //index
        $title = "Push Notification";
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        return view('notifications.index', compact('notifications', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "New Push Notification";
         return view('notifications.create', compact('title'));
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
        //validation request
        $request->validate([
            'title' => 'required',
            'details' => 'required',
        ]);

        //dd($request->all());

        $notification = New Notification;
        $notification->title = $request->title;
        $notification->details = $request->details;
        $notification->save();

        $fcmServerKey = getenv('FIREBASE_SERVER_KEY');

        //dd($apiKey);

        if (!$fcmServerKey) {
            // Handle the case when the API key is not found in the environment
            return back()->with('success', "Server Key not found, Sorry your Notification was not sent 😒");
        }

        $url = 'https://fcm.googleapis.com/fcm/send';
        $dataArr = array('click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'id' => $notification->id,'status'=>"done");
        $notification = array('title' =>$notification->title, 'text' => $notification->details, 'image'=> 'nill', 'sound' => 'default', 'badge' => '1',);
        $arrayToSend = array('to' => "/topics/all", 'notification' => $notification, 'data' => $dataArr, 'priority'=>'high');
        $fields = json_encode($arrayToSend);

        $headers = array(
            'Authorization: key=' . $fcmServerKey,
            'Content-Type: application/json'
        );

        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

        $result = curl_exec ( $ch );
        //dd($result);
        curl_close ( $ch );

        return back()->with('success', 'Push Notification sent successfully 😊.');
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
        //Edit Section
        $notification = Notification::find($id);
        $notificationId = $notification->id;
        $notificationTitle = $notification->title;
        $notificationDetails = $notification->details;

        return view('notifications.edit', compact('notificationId', 'notificationTitle', 'notificationDetails'));
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
        //validate
        $request->validate([
            'title' => 'required',
            'details' => 'required',
        ]);

        //dd($request->all());

        $notification = Notification::find($id);
        $notification->title = $request->title;
        $notification->details = $request->details;

        $notification->save();

        return back()->with('success', 'Push Notification Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $notification = Notification::find($id);
        $notification->delete();

        return back()->with('success', 'Push Notification Deleted.');
    }
}
