<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //index admin
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }


    //store admin
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|min:6',
        ]);
        $admin = new User;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request->role;
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect()->route('admin.index')->with('success', 'User created successfully');
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
            'password' => 'required|min:6',
        ]);
        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request->role;
        $admin->password = bcrypt($request->password);
        $admin->save();

        return back()->with('success', 'User updated successfully');
        //return redirect()->route('admin.index')->with('success', 'User updated successfully');
    }

    //destroy admin
    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'User deleted successfully');
    }


}
