<?php

namespace App\Http\Controllers;
use App\Course;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        $q = $request->q;
        $courses = Course::where('title' , 'LIKE' , '%'.$q.'%')->get();
        return view('search',compact('courses'));
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
