<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{

    public function index()
    {
        $questions = Question::orderBy('id','desc')->paginate(30);
        return view('admin.questions.index',compact('questions'));
    }


    public function create()
    {
        return view('admin.questions.create');
    }

    public function store(Request $request)
    {
        $rules =[
            'title' =>'required|min:3|max:100',
            'quiz_id' =>'required|integer',
            'answers' =>'required|min:5|max:1000',
            'right_answer' =>'required|min:3|max:50',
            'score' =>'required|integer',
            'type' =>'required|in:text,checkbox',
        ];

        $this->validate($request, $rules);
        if(Question::create($request->all())){
            return redirect('/admin/Questions')->withStatus('Question successfully created');
        }
    }

    public function edit($id)
    {
        $question = Question::find($id);
        return view('admin.questions.edit',compact('question' ,'id'));
    }

    public function update(Request $request, $id)
    {
        $rules =[
            'title' =>'required|min:3|max:100',
            'answers' =>'required|min:5|max:1000',
            'right_answer' =>'required|min:3|max:50',
            'quiz_id' =>'required|integer',
            'score' =>'required|integer',
            'type' =>'required|in:text,checkbox',
        ];
        $this->validate($request, $rules);

        $question = Question::find($id);
            $question->title =$request->title;
            $question->quiz_id =$request->quiz_id;
            $question->answers =$request->answers;
            $question->right_answer =$request->right_answer;
            $question->score =$request->score;
        if($question->isDirty()){
            $question->save();
            return redirect('/admin/Questions')->withStatus('Questions successfully updated');
        }else{
            return redirect('/admin/Questions/'.$question->id.'/edit')->withStatus('nothing updated');
        }

    }

    public function show($id)
    {
        //
    }


    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect('/admin/Questions')->withStatus('question successfully deleted');
    }
}
