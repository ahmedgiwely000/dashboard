<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('admin', 0)->orderBy('id' ,'desc')->paginate(15);
        return view('admin.users.index' ,['users' => $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        // dd($request->all());
        // $this->validate($request,[
        //     'TitlePost'=> 'required',
        //     'category_id_Post'=> 'required',
        //     'ContentPost'=> 'required',
        // ]);


        $users = User::create([
            'name'=>$request->inputName,
            'email'=>$request->inputEmail,
            'password'=>Hash::make($request->inputPassword),
            'admin'=>$request->admin,
        ]);

        return redirect('/admin/users');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $user =User::find($id);
        return view('admin.users.edit')->with('user', $user);
    }

    public function update(Request $request, User $user)
    {
            $user->update([
            'name'=>$request->inputName,
            'email'=>$request->inputEmail,
            'password'=>Hash::make($request->inputPassword),
        ]);

        return redirect('/admin/users');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/users');
    }
}
