<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Quiz;

class QuizQuestionController extends Controller
{

    public function create($id)
    {
        $quiz =Quiz::find($id);
        return view('admin.quizzes.creatquestion',compact('quiz','id'));
    }


}
