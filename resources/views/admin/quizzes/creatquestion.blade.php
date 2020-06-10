@extends('layouts.app', ['title' => __('Questions Management')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Create Question') . ' '. auth()->user()->name,
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                            <h3 class="mb-0">{{ __('Question Management') }}</h3>
                            </div>
                            <div class="col-4  text-right">
                            <a href="{{route('Questions.index')}}" class="btn btn-sm btn-primary">{{__('Back to list')}}</a>
                            </div>
                        </div>
                    </div>

                    @include('includes.errors')

                    <div class="card-body">

                    <form action="{{route('Questions.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        <h6 class="heading-small text-muted mb-4">{{__('Questions information')}}</h6>
                    <div class="pl-lg-4">

                        {{-- Title --}}
                        <div class="form-group{{ $errors->has('title') ? 'has-danger' : ' '}}">
                            <label for="input-title" class="form-control-label">{{__('Question title')}}</label>
                        <input type="text" name="title"  id="input-title" class="form-control
                        form-control-alternative{{ $errors->has('title') ? 'is-invaild' : ' '}}" placeholder="{{__('Question name')}}"
                        required autofocus>

                        @if ($errors->has('title'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('title')}}</strong>
                        </span>
                        @endif
                        </div>
                        {{-- Answers --}}
                        <div class="form-group{{ $errors->has('answers') ? 'has-danger' : ' '}}">
                            <label for="input-answers" class="form-control-label">{{__('Question answers')}}</label>
                        <textarea name="answers"  id="input-answers" class="form-control
                        form-control-alternative{{ $errors->has('answers') ? 'is-invaild' : ' '}}" placeholder="{{__('Answers')}}"
                        required></textarea>

                        @if ($errors->has('answers'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('answers')}}</strong>
                        </span>
                        @endif
                        </div>
                        {{-- right answer --}}
                        <div class="form-group{{ $errors->has('right_answer') ? 'has-danger' : ' '}}">
                            <label for="input-right_answer" class="form-control-label">{{__('Right Answer')}}</label>
                        <input type="text" name="right_answer"  id="input-right_answer" class="form-control
                        form-control-alternative{{ $errors->has('right_answer') ? 'is-invaild' : ' '}}" placeholder="{{__('Right Answer')}}"
                        required autofocus>

                        @if ($errors->has('right_answer'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('right_answer')}}</strong>
                        </span>
                        @endif
                        </div>

                        {{-- Score --}}
                        <div class="form-group{{ $errors->has('score') ? 'has-danger' : ' '}}">
                            <label for="input-score" class="form-control-label">{{__('Question Score')}}</label>
                            <select name="score" id="input-score" required class="form-control">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="40">40</option>
                                <option value="45">45</option>
                            </select>


                        @if ($errors->has('score'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('score')}}</strong>
                        </span>
                        @endif
                        </div>

                        {{-- Quiz_id --}}
                        <div class="form-group{{ $errors->has('quiz_id') ? 'has-danger' : ' '}}">
                            <label for="input-quiz_id" class="form-control-label">{{__('Quiz Title')}}</label>
                            <select name="quiz_id" id="input-quiz_id" required class="form-control">
                                <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                            </select>


                        @if ($errors->has('quiz_id'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('quiz_id')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{__('Save')}}</button>
                        </>
                    </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

