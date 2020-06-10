<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Track;
class TrackCourseController extends Controller
{

    public function create($id)
    {
        $track =Track::find($id);
        return view('admin.tracks.createcourse',compact('track','id'));
    }

}
