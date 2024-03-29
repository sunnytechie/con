<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //index admin
    public function index()
    {
        $admins = User::orderBy('created_at', 'desc')->where('is_admin', '1')->get();
        return view('admin.index', compact('admins'));
    }


    //store admin
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->is_admin = 1;
            $user->email_verified_at = now();
            $user->password = bcrypt($request->password);
            $user->save();

            return back()->with('success', 'Account created successfully');
        }

        $admin = new User;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request->role;
        $admin->is_admin = 1;
        $admin->email_verified_at = now();
        $admin->password = bcrypt($request->password);
        $admin->save();

        return back()->with('success', 'Account created successfully');
    }

    //edit admin
    public function edit($id)
    {
        //users
        $users = User::all();
        $admin = User::find($id);
        $adminRole = $admin->role;
        $adminId = $admin->id;
        $adminName = $admin->name;
        $adminEmail = $admin->email;
        $adminPassword = $admin->password;

        return view('admin.edit', compact('users', 'admin', 'adminRole', 'adminId', 'adminName', 'adminEmail'));
    }

    //update admin
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required',
            'password' => 'nullable',
        ]);
        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request->role;
        $admin->password = bcrypt($request->password);
        $admin->save();

        return back()->with('success', 'Account updated successfully');
        //return redirect()->route('admin.index')->with('success', 'User updated successfully');
    }

    //destroy admin
    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->delete();
        return back()->with('success', 'Account deleted successfully');
    }


}
