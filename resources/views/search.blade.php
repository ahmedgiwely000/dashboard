@extends('layouts.user')

@section('content')
<div class="container">
        <div class="search">
            <h3><?php echo count($courses);?> courses match your request</h2>
            <div class="row ">
                <div class="col-sm-8">
                    @foreach ($courses as $course)
                <div class="course">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="course-img">
                                    @if ($course->photo)
                                <a href="/courses/{{$course->slug}}/"><img src="/images/{{$course->photo->filename}}" class=""></a>
                                      @else
                                    <a href="/courses/{{$course->slug}}/"><img src="/images/8.jpg" class=""></a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-8">
                                    <h4 class="font-weight-bold"><a href="/courses/{{$course->slug}}/">{{\Str::limit($course->title,20)}}</a>
                                        <span class="float-right status {{$course->status == 0 ? 'bg-success' : 'bg-danger'}}">{{$course->status == 0 ? 'Free' : 'Paid'}}</span>
                                    </h4>
                                    <p class="">{{\Str::limit($course->description,70)}}</p>
                                    <h5 class="mt-4 mb-3">Track :
                                       <a href="/tracks/{{$course->track->name}}">{{$course->track->name}}</a>
                                       <span class="float-right font-weight-bold">
                                        <span class="{{ count($course->users) ? 'text-success' : 'text-danger'}}">{{count($course->users) > 0 ? count($course->users)  : 'not users'}}</span>
                                        <span class="{{ count($course->users) ? 'text-success' : 'text-danger'}}">{{count($course->users) > 0 ? 'user enrolled' : ''}}</span>
                                       </span>
                                    </h5>
                            </div>
                    </div>
                </div>

                @endforeach
                </div><!-- col-sm-8 -->
                <div class="col-sm-4">

                </div>
            </div><!-- row -->
        </div>
</div><!-- container -->

@endsection
