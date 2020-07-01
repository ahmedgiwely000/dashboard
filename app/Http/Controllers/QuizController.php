<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Quiz;
use App\Questions;
use App\User;
class QuizController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($slug , $name)
    {
        $course = Course::where('slug',$slug)->first();
        $quiz = $course->quizzes()->where('name' ,$name)->first();
        return view('quiz',compact('quiz','course'));
    }


    public function submit($slug , $name , Request $request)
    {
        $quiz = Quiz::where('name', $name)->first();
        $questions = $quiz->questions;
        $questions_ids=[];
        $questions_right_answers=[];
        $quiz_score = 0;

        foreach ($questions as $question) {
            $questions_ids[]= $question->id;
            $questions_right_answers[]= $question->right_answer;
            $quiz_score += $question->score;

        }

        for ($i=0; $i < count($questions_ids) ; $i++) {
            $my_answer = trim($request['answer'.$questions_ids[$i]]);
            $the_answer = trim($questions_right_answers[$i]);

            if ($my_answer != $the_answer ) {
                return redirect("/courses/{$slug}/quizzes/{$name}")->withStatus("your answer (" .$my_answer. ") is no correct");
         }
        }

        $user = auth()->user(); 

        $user->Quizzes()->attach([$quiz->id]);
        $user->score += $quiz_score;

        if($user->save()){
            return redirect("/courses/".$quiz->course->slug)->withStatus("Well Done You've solved
            (" .$quiz->name. ") Quiz and earned (" .$quiz_score. ") points");
        }


    }

    public function create()
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
