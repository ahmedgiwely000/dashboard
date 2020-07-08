@extends('layouts.user')

@section('content')
<div class="container mt-5">
    <div class="row ml-auto">
        @if (\Auth::check())
            <h2 class="track-name mb-5 font-weight-bold font-italic">All courses Mr : <span class="course-head">{{Auth()->user()->name}}</span></h2>
            @else
            <h2 class="track-name mb-5 font-weight-bold font-italic">All courses:</h2>
        @endif
    </div>
        <div class="row">
            @foreach ($courses as $course)
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
        <div class="container mt-3">
            <div class="row">
                <div class="col-8 offset-5 mr-5">
                    <h6 class="">{{$courses->links()}}</h6>
                </div>
            </div>
        </div>

    </div>
@endsection
