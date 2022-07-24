<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Models\Video;
use App\Models\Category;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function video()
    {
        //categories
        $categories = Category::all();
        //Videos
        $videos = Media::orderBy('created_at', 'desc')->where('type', 'video')->paginate(10);
        return view('media.video.index', compact('categories', 'videos'));
    }

    //api mediaApi
    public function mediaApi()
    {
        $videos = Media::orderBy('created_at', 'desc')->get();
        return response()->json($videos);
    }

    //Video Api for category id
    public function videoApi($id)
    {
        $videos = Media::orderBy('created_at', 'desc')->where('type', 'video')->where('category_id', $id)->get();
        return response()->json($videos);
    }

    //search
    public function searchVideo(Request $request)
    {
        $output = "";
        $videos = Media::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%')
            ->paginate(10);

        foreach ($videos as $key => $video) {
            //key is the index of the array and starts from 1
            $key = $key + 1;
            $output.=
                '<tr>
                    <td>'.$key.'</td>
                    <td>
                        <div class="d-flex px-2">
                        <div>
                            <img src="'.$video->thumbnail.'" class="avatar avatar-sm rounded-circle me-2" alt="">
                        </div>
                        <div class="my-auto">
                            <h6 class="mb-0 text-sm">'.$video->title.'</h6>
                        </div>
                        </div>
                    </td>
                    <td>'.$video->title.'</td>
                    <td>'.$video->description.'</td>
                    <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Button group">
                        
                                <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="/media/'.$video->id.'/edit">
                                <i class="fa fa-pencil text-xs"></i>
                                </a>

                                <form action="/media/video/destroy/'.$video->id.'" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <button type="submit" class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" onclick="
                                        return confirm(\'Are you sure you want to delete this record?\')">
                                    <i class="fa fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                    </td>
                </tr>';

        }
        return response($output);
    }

    public function audio()
    {
        //Audio
        $audio = Media::orderBy('created_at', 'desc')->where('type', 'audio')->paginate(10);
        //categories
        $categories = Category::all();
        return view('media.audio.index', compact('categories', 'audio'));
    }

    //Audio Api for category id
    public function audioApi($id)
    {
        $audio = Media::orderBy('created_at', 'desc')->where('type', 'audio')->where('category_id', $id)->get();
        return response()->json($audio);
    }

    //search
    public function searchAudio(Request $request)
    {
        $output = "";

        $audios = Media::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%')->where('type', 'audio')
            ->paginate(10);

        foreach ($audios as $key => $audio) {
            //key is the index of the array and starts from 1

            $key = $key + 1;
            $output.=
                '<tr>
                    <td>'.$key.'</td>
                    <td>
                        <div class="d-flex px-2">
                        <div>
                            <img src="'.$audio->thumbnail.'" class="avatar avatar-sm rounded-circle me-2" alt="">
                        </div>
                        <div class="my-auto">
                            <h6 class="mb-0 text-sm">'.$audio->title.'</h6>
                        </div>
                        </div>
                    </td>
                    <td>'.$audio->title.'</td>
                    <td>'.$audio->description.'</td>
                    <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Button group">
                        
                                <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="/media/'.$audio->id.'/edit">
                                <i class="fa fa-pencil text-xs"></i>
                                </a>

                                <form action="/media/audio/destroy/'.$audio->id.'" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <button type="submit" class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" onclick="
                                        return confirm(\'Are you sure you want to delete this record?\')">
                                    <i class="fa fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                    </td>
                </tr>';

        }
        return response($output);
    }
}
