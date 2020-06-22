@extends('layouts.user')

@section('content')
<div class="container-fluid question p-4">
    @if (session('status'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" >&times;</span>
            </button>
        </div>
    @endif
    <div class="row quiz-container">
        <h2 class=" pl-5  mb-5 font-italic font-weight-bold">{{$course->title}} : <span class="text-success font-weight-bold">{{$quiz->name}}</span> </h2>
        <div class="col-8 offset-3">
        <form action="/courses/{{$course->slug}}/quizzes/{{$quiz->name}}" method="POST" autocomplete="off">
            @csrf
                @foreach ($quiz->questions as $question)
                <div class="form-group">
                <label for="answer" class="font-italic font-weight-bold">Q- {{$question->title}} ? <span class="text-danger">( {{$question->score}} points )</span></label>
                    @if ($question->type == "text")
                    <input type="text" name="answer{{$question->id}}" id="answer" placeholder="your answer" class="form-control">
                    @else
                    <?php $answers = explode(',', $question->answers); ?>
                    @foreach ($answers as $answer)
                    <div class="radio">
                    <label for=""><input type="radio" value="{{$answer}}" name="answer{{$question->id}}"> {{$answer}}</label>
                    </div>
                    @endforeach
                    @endif
                    <hr>
                </div>
                @endforeach
                <input type="submit" value="Submit" class="btn btn-dark">
            </form>
        </div>
    </div>
</div>
@endsection
