@extends('layouts.user')

@section('content')

<div class="container p-5">
    <div class="row">
        <div class="course-header">
            <div class="row">
                <div class="col-sm-8 mt-3 pl-5">
                <h2 class="mb-5 ">learn <span class="course-head">{{$course->title}}</span>
                    <span class="float-right status {{$course->status == 0 ? 'bg-success' : 'bg-danger'}}">{{$course->status == 0 ? 'Free' : 'Paid'}}</span>
                </h2>
                <h2>{{$course->description}}</h2>
                <h2 class="mt-4 mb-3">Track :
                   <a href="/tracks/{{$course->track->name}}">{{$course->track->name}}</a>
                   <span class="float-right font-weight-bold">
                    <span class="{{ count($course->users) ? 'text-success' : 'text-danger'}}">{{count($course->users) > 0 ? count($course->users)  : 'not users'}}</span>
                    <span class="{{ count($course->users) ? 'text-success' : 'text-danger'}}">{{count($course->users) > 0 ? 'user enrolled' : ''}}</span>
                   </span>
                </h2>
                </div>

                <div class="col-sm-4">
                    @if ($course->photo)
                      <img src="/images/{{$course->photo->filename}}" class="course-img ">
                      @else
                      <img src="/images/8.jpg" class="course-img ">
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row videos pt-3 mt-5">
        <div class="col-sm-12">
            <h2 class="mb-3 font-italic font-weight-bold">course videos :</h2>
            @if (count($course->videos) > 0)
            @foreach ($course->videos as $video)
                <div class="video mb-4">
                   <a href="{{$video->link}}" data-toggle="modal" data-target="#show-video"><i class=" fab ml-3 mr-4 fa-youtube text-danger"></i>{{$video->title}}</a>
                </div>
            @endforeach
            @else
                    <p class="text-center text-info">sorry this course does not include any <strong class="text-danger">videos .</strong></p>
            @endif
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" >&times;</span>
            </button>
        </div>
    @endif
    <div class="row Quizzes pt-3 mt-5">
        <div class="col-sm-12">
            <h2 class="mb-3 font-italic font-weight-bold">Course Quizzes :</h2>
            @if (count($course->quizzes) > 0)
            @foreach ($course->quizzes as $quiz)
                <div class="Quiz mb-4 ml-3">
                <a href="/courses/{{$course->slug}}/quizzes/{{$quiz->name}}" target="blank"><i class=" fa mr-3 fa-question text-danger"></i>{{$quiz->name}}</a>
                </div>
            @endforeach
            @else
                    <p class="text-center text-info">sorry this course does not include any <strong class="text-danger">quizzes .</strong></p>
            @endif
        </div>
    </div>

      <!-- Modal -->
  <div class="modal fade" id="show-video" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Video Preview</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body w-100">
        <iframe class="" width="460" height="400" src=""
             frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
