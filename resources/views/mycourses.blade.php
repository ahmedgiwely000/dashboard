@extends('layouts.user')

@section('content')
@if (count($user->courses) > 0)
<div class="container-fluid mt-5">
    <h2 class="track-name mb-5">your courses Mr : <span class="course-head">{{Auth()->user()->name}}</span></h2>
        <div class="row">
            @foreach ($user_courses as $course)
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4 mx-auto">
                <div class="course my-auto">
                    <div class="card mx-auto">
                        <div class="card-img-top">
                            @if ($course->photo)
                        <a href="/courses/{{$course->slug}}"><img src="/images/{{$course->photo->filename}}" class="img-fluid"></a>
                            @else
                            <a href="/courses/{{$course->slug}}"><img src="/images/1.jpg" class="track-img img-fluid"></a>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="course-title h-100 text-center ">
                                <a href="/courses/{{$course->slug}}"><h5 class="pl-3">welcome to {{\Str::limit($course->title,20)}}</h5></a>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between mt-5">
                            <h5 class="pl-3 {{$course->status == 0 ? 'text-success' : 'text-danger'}}">{{$course->status == 0 ? 'Free' : 'Paid'}}</h5>
                            <h5 class="pl-3">{{count($course->users)}} user</h5>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@else
    <div class="container-fluid mt-5">
         <h2 class="track-name mb-5 text-center">No courses Mr : <span class="course-head">{{Auth()->user()->name}}</span></h2>
    </div>
@endif

@endsection
