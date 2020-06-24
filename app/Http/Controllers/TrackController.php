<?php

namespace App\Http\Controllers;
use App\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{

    public function index($name)
    {   $track = Track::where('name',$name)->first();
        $courses = $track->courses;
        return view ('track_courses', compact('courses' ,'track'));
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
