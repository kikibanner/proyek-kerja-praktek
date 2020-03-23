<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = \App\User::all();

        return view('settings.user', ['user' => $user]);
    }

    public function create(Request $request)
    {
        
        $user = new \App\User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password ;
        $user->role = $request->role ;
        $user->remember_token = str_random(60);
        $user->save();
        
        $datauser =\App\User::create($request->all());
        return redirect('\pengaturan')->with('success','Berhasil !');
    }

    public function edit($id)
    {
        $user = \App\User::find($id);
        return view('settings.edit',['user' => $user]);
    }

    public function update(Request $request,$id)
    {
        $user = \App\User::find($id);
        $password = $request->password;
        $user->password = bcrypt($password);
        $user->save();
        $user->update();
        return redirect('\pengaturan')->with('success','Data Berhasil Diperbarui!');
    }

    public function delete($id)
    {
        $user =  \App\User::find($id);
        $user->delete($user);
        return redirect('\pengaturan')->with('success','Data Berhasil Dihapus!');
    }

    public function detail($id)
    {
        $ipolt = \App\Ipolt::find($id);
        $user = \App\User::find($id);
        return view('settings.detail',['ipolt' => $ipolt],['user' => $user]);
    }
}
