<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Quiz;
class QuizController extends Controller
{

    public function index()
    {
        $quizzes = Quiz::orderBy('id','desc')->paginate(20);
        return view('admin.quizzes.index',compact('quizzes'));    }


    public function create()
    {
        return view('admin.quizzes.create');
    }


    public function store(Request $request)
    {
        $rules =[
            'name' =>'required|min:3|max:50',
            'course_id' =>'required|integer',
        ];

        $this->validate($request, $rules);
        if(Quiz::create($request->all())){
            return redirect('/admin/Quizzes')->withStatus('quiz successfully created');
        }
    }

    public function edit($id)
    {
        $quiz = Quiz::find($id);
        return view('admin.quizzes.edit',compact('quiz'));
    }


    public function update(Request $request, $id)
    {
         $quiz = Quiz::find($id);
            $quiz->name =$request->name;
            $quiz->course_id =$request->course_id;

            $quiz->save();
            return redirect('/admin/Quizzes')->withStatus('quiz successfully Updated');
    }

    public function show($id)
    {
        $quiz = Quiz::find($id);
        return view('admin.quizzes.show' ,compact('quiz','id'));
    }


    public function destroy($id)
    {
        $Quiz = Quiz::find($id);
        $Quiz->delete();
        return redirect('/admin/Quizzes')->withStatus('quiz successfully deleted');
    }
}
