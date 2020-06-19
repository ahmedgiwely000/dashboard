<?php

namespace App\Http\Controllers;
use App\User;
use App\Track;
use App\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $user_courses = User::findOrFail(4)->courses;
        $tracks = Track::with('courses')->orderBy('id','desc')->get();

        $famous_tracks_ids = Course::pluck('track_id')->countBy()->sort()->reverse()->keys()->take(10);
        $famous_tracks = Track::withCount('courses')->whereIn('id',$famous_tracks_ids)->orderBy('courses_count','desc')->get();

        $user_course_ids = User::findOrFail(4)->courses()->pluck('id');
        $user_tracks_ids = User::findOrFail(4)->tracks()->pluck('id');
        $recommended_course = Course::whereIn('track_id',$user_tracks_ids)->whereNotIn('id',$user_course_ids)->limit(4)->get();

        return view('home',compact('user_courses','tracks','famous_tracks','recommended_course'));
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
