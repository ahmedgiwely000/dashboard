@extends('layouts.user')

@section('content')
<div class="container-fluid p-4">
    <div class="row quiz-container">
        <h2 class="float-left mb-3 font-italic font-weight-bold">{{$course->title}} : <span class="text-success font-weight-bold">{{$quiz->name}}</span> </h2>
        <div class="col-8 offset-2">
            <form action="">
                @foreach ($quiz->questions as $question)
                <div class="form-group">
                    <label for="input-answer">{{$question->title}} ?</label>
                    @if ($question->type == "text")
                    <input type="text" name="answer" id="input-answer" placeholder="your answer" class="form-control">
                    @else
                    <?php $answers = explode('  ', $question->answers); ?>
                    @foreach ($answers as $answer)
                    <div class="radio">
                        <label for=""><input type="radio" name="answer">{{$answer}}</label>
                    </div>
                    @endforeach
                    @endif
                    <hr>
                </div>
                @endforeach
                <input type="submit" value="Send" class="btn btn-dark">
            </form>
        </div>
    </div>
</div>
@endsection
