<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
class AllCoursesController extends Controller
{

    public function index()
    {
        $courses = Course::paginate(16);
        return view('allcourses',compact('courses'));
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
