<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyCoursesController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $user_courses = $user->courses;
        return view('mycourses',compact('user_courses'));
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
