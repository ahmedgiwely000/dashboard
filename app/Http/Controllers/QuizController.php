<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
class QuizController extends Controller
{

    public function index($slug , $name)
    {
        $course = Course::where('slug',$slug)->first();
        $quiz = $course->quizzes()->where('name' ,$name)->first();
        return view('quiz',compact('quiz','course'));
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
