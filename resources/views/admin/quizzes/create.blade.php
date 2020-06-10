@extends('layouts.app', ['title' => __('Quiz Management')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Creat quiz') . ' '. auth()->user()->name,
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                            <h3 class="mb-0">{{ __('Quiz Management') }}</h3>
                            </div>
                            <div class="col-4  text-right">
                            <a href="{{route('Quizzes.index')}}" class="btn btn-sm btn-primary">{{__('Back to list')}}</a>
                            </div>
                        </div>
                    </div>

                    @include('includes.errors')

                    <div class="card-body">

                    <form action="{{route('Quizzes.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        <h6 class="heading-small text-muted mb-4">{{__('Quizzes information')}}</h6>
                    <div class="pl-lg-4">

                        {{-- Namename --}}
                        <div class="form-group{{ $errors->has('name') ? 'has-danger' : ' '}}">
                            <label for="input-name" class="form-control-label">{{__('Quiz name')}}</label>
                        <input type="text" name="name"  id="input-name" class="form-control
                        form-control-alternative{{ $errors->has('name') ? 'is-invaild' : ' '}}" placeholder="{{__('name')}}"
                        required autofocus>

                        @if ($errors->has('name'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
                        </div>

                        {{-- Course_id --}}
                        <div class="form-group{{ $errors->has('course_id') ? 'has-danger' : ' '}}">
                            <label for="input-course_id" class="form-control-label">{{__('Quizzes Course')}}</label>
                            <select name="course_id" id="input-course_id" required class="form-control">
                                @foreach (\App\Course::all() as $course)
                                <option value="{{$course->id}}">{{$course->title}}</option>
                                @endforeach
                            </select>


                        @if ($errors->has('course_id'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('course_id')}}</strong>
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

