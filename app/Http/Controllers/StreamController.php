<?php

namespace App\Http\Controllers;

use App\Models\Stream;
use Illuminate\Http\Request;

class StreamController extends Controller
{
    //edit
    public function edit()
    {
        //get the last stream
        $stream = Stream::latest()->first();
        $title = "Streaming link and TV";

        $id = $stream->id;
        $stream_url = $stream->stream_url;
        $stream_type = $stream->stream_type;
        $stream_status = $stream->stream_status;

        return view('stream.edit', compact('stream', 'title', 'stream_url', 'stream_type', 'stream_status', 'id'));
    }

    //update
    public function update(Request $request, $id)
    {
        //validate the request
        $request->validate([
            'title' => 'required',
            'stream_url' => 'required',
            'stream_type' => 'required',
            'stream_status' => 'required',
        ]);

        //update the stream
        $stream = Stream::find($id);
        $stream->title = $request->title;
        $stream->stream_url = $request->stream_url;
        $stream->stream_type = $request->stream_type;
        $stream->stream_status = $request->stream_status;
        $stream->save();

        return back()->with('success', 'Stream updated successfully');
    }

    //API for streams details
    public function streamDetailsApi()
    {
        //get last stream
        $stream = Stream::latest()->first();
        $stream = Stream::find($stream);
        return response()->json($stream);
    }
}
