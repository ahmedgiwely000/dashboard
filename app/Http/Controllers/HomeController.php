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
        $tracks = Track::with('courses')->orderBy('id','desc')->get();
        $famous_tracks_ids = Course::pluck('track_id')->countBy()->sort()->reverse()->keys()->take(10);
        $famous_tracks = Track::withCount('courses')->whereIn('id',$famous_tracks_ids)->orderBy('courses_count','desc')->get();

        if(\Auth::check()){
            $user = auth()->user();
            $user_courses = $user->courses;
            $user_course_ids = $user->courses()->pluck('id');
            $user_tracks_ids = $user->tracks()->pluck('id');
            $recommended_course = Course::whereIn('track_id',$user_tracks_ids)->whereNotIn('id',$user_course_ids)->limit(4)->get();
            return view('home',compact('user_courses','tracks','famous_tracks','recommended_course'));
        }else{
            return view('home',compact('tracks','famous_tracks'));
        }

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
