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
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        return view('notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        return back()->with('success', 'Push Notification sent.');
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

        return back()->with('success', 'Push Notification edited.');
    }
}
