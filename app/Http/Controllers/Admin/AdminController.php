<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('owner');
    }

    public function index()
    {
        $Auth_id = Auth::user()->id;
        $users = User::where('admin', 1)->whereNotIn('id' , [$Auth_id])->orderBy('id' ,'desc')->paginate(15);
        return view('admin.Admins.index' ,['users' => $users]);
    }

    public function create()
    {
        return view('admin.Admins.create');
    }


    public function store(Request $request)
    {
        // dd($request->all());
        // $this->validate($request,[
        //     'TitlePost'=> 'required',
        //     'category_id_Post'=> 'required',
        //     'ContentPost'=> 'required',
        // ]);

        // $user->create($request->merge(['password' => Hash::make($request->get('password'))])->all());
        // return redirect()->route('Admins.index')->withStatus(__('User successfully created.'));

        $users = User::create([
            'name'=>$request->inputName,
            'email'=>$request->inputEmail,
            'password'=>Hash::make($request->inputPassword),
            'admin'=>$request->admin,
        ]);
        return redirect('/admin/Admins')->withStatus('tracks successfully created');
    }

    public function show($id)
    {
    }

    public function edit(User $user ,$id)
    {
        $user = User::find($id);
         return view('admin.Admins.edit', compact('user'));

        // $user =User::find($id);
        // return view('admin.Admins.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $admin = User::find($id);
            $admin->name =$request->inputName;
            $admin->email =$request->inputEmail;
            $admin->password =Hash::make($request->inputPassword);

            $admin->save();
            return redirect('/admin/Admins');


        //     $user->update([
        //     'name'=>$request->inputName,
        //     'email'=>$request->inputEmail,
        //     'password'=>$request->inputPassword,
        // ]);

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/Admins');
    }
}
