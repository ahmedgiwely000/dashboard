<?php

namespace App\Http\Controllers\Admin;
use App\Course;
use App\Video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseVideoController extends Controller
{

    public function create($id)
    {
        $course =Course::find($id);
        return view('admin.courses.createvideo',compact('course','id'));
    }

}
