<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class AndroidUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::orderBy('id', 'desc')->get();
        return view('android.index', compact('users'));
    }

//search user by name or email

    public function Search(Request $request)
    {
        $output = "";
        $users = User::where('name', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->paginate(10);

            foreach ($users as $key => $user) {
                //key is the index of the array and starts from 1
                $key = $key + 1;
                $output.=
                    '<tr>
                        <td>'.$key.'</td>
                        <td>'.$user->name.'</td>
                        <td>'.$user->email.'</td>
                        <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Button group">

                            <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="/app/androidusers/'.$user->id.'">
                              <i class="fa fa-eye text-xs"></i>
                            </a>

                            <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="#">
                              <i class="fa fa-ban text-xs"></i>
                            </a>

                        </div>
                      </td>
                    </tr>';
            }

            return response($output);
    }

    //show user details
    public function show($id)
    {
        $user = User::find($id);
        $title = $user->name;

        return view('android.show', compact('user', 'title'));
    }

    public function destroy($id) {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        $member = Membership::where('user_id', $id)->first();
        if ($member) {
            $member->delete();
        }

        return back()->with('success', "User deleted");
    }
}
