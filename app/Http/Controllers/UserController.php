<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function index(){
    //     $users = DB::table('users')->get();
    //     return view('users', compact('users'));
    // }

    // public function destroy($id){
    //     DB::table('users')->where('id',$id)->delete();
    //     return redirect()->route('users.index')->with('Success', 'User Deleted Successfully');
    // }

    public function index(){
        $users = DB::table('users')->get();
        return view('users',compact('users'));
    }

    public function desstroy($id){
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('users.index')->with('success', 'Deleted Successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'number' => 'required|numeric',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'number' => $request->number,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User added successfully!');
    }

    
    public function insert(Request $request){
        $request->validate([
            'name' => 'required|alpha',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'number' => 'required|numeric',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'number' => $request->number,
            'password'=> Hash::make($request->password)
        ]);

        return redirect()->route('users.index');
    }

    // public function destroy($id)
    // {
    //     DB::table('users')->where('id', $id)->delete();
    //     return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    // }

    

    public function edit($id)
{
    $user = DB::table('users')->where('id', $id)->first();
    return view('edit', compact('user'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|regex:/^[a-zA-Z\s]+$/',
        'email' => 'required|email',
        'address' => 'required',
        'number' => 'required|numeric',
        'password' => 'nullable|min:6',
        'confirm_password' => 'nullable|same:password'
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'address' => $request->address,
        'number' => $request->number,
    ];

    if ($request->password) {
        $data['password'] = Hash::make($request->password);
    }

    DB::table('users')->where('id', $id)->update($data);

    return redirect()->route('users.index')->with('success', 'User updated successfully!');
}

}
