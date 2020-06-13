<?php

namespace App\Http\Controllers;
use App\User;
use App\Track;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $user_courses = User::findOrFail(10)->courses;
        $tracks = Track::with('courses')->orderBy('id','desc')->get();
        return view('home',compact('user_courses','tracks'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
