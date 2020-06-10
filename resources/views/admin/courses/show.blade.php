@extends('layouts.app', ['title' => __('Course Management')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('preview Course') . ' '. auth()->user()->name,
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-dark border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                            <h3 class="mb-0 text-danger">{{ __('Course Management') }}</h3>
                            </div>
                            <div class="col-4  text-right">
                            <a href="{{route('courses.index')}}" class="btn btn-sm btn-primary">{{__('Back to list')}}</a>
                            </div>
                        </div>
                    </div>

                    @include('includes.errors')
                    <div class="card-body">
                    <div class="row text-center">
                        <div class="col-sm-6">
                             @if ($course->photo)
                             <img src="/images/{{$course->photo->filename}}" height="200px" class="card-img-top" alt="course photo">
                             @else
                             <img src="/images/1.jpg" height="200px" class="card-img-top" alt="course photo">
                             @endif
                        </div>
                        <div class="col-sm-6">
                            <h4 class="card-title">Course Name : <span class="font-italic text-success">{{$course->title}}</span></h4>
                          <h4 class="card-title">track for :
                          <span class="font-italic text-info">
                              <a href="/admin/tracks/{{$course->track->id}}">{{$course->track->name}}</a>
                          </span>
                          </h4>
                          <h5 class="card-title {{$course->status == 0 ? "text-success" : "text-danger"}}">{{$course->status == 0 ? "Free" : "Paid"}}</h5>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-dark border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                            <h3 class="mb-0 text-danger">{{ __('Course Videos') }}</h3>
                            </div>
                            <div class="col-2 ml-auto text-right">
                            <a href="{{$course->id}}/videos/create" class="btn btn-sm btn-primary">{{__('New Video')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-bod">
                        <table class="table align-items-center table-flush">

                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Video Id</th>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">Course link</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($course->videos as $video)
                                <tr>
                                    <td title="{{$video->title}}"><a href="videos/{{$video->id}}">{{\Str::limit($video->title, 20)}}</a></td>
                                    <td>{{$video->id}}</td>
                                    <td>
                                       <a href="admin/courses/{{$video->course->id}}">{{$video->course->title}}</a>
                                    </td>
                                    <td title="{{$video->link}}">{{\Str::limit($video->link,30)}}</td>

                                    <td>{{$video->created_at->format('d/m/y H:i')}}</td>
                                    <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                            <form action="{{route('videos.destroy', $video)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                            <a class="dropdown-item" href="{{route('videos.edit' ,$video)}}">{{__("Edit")}}</a>
                                            <button type="button" class="dropdown-item"
                                             onclick="confirm('{{__('Are you sure you want to delete this user?')}}') ?
                                              this.parentElement.submit() : ''">{{__("Delete")}}</button>
                                            </form>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="card bg-secondary shadow">
                    <div class="card-header bg-dark border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                            <h3 class="mb-0 text-danger">{{ __('Course Quizzes') }}</h3>
                            </div>
                            <div class="col-4  ml-auto text-right">
                            <a href="{{$course->id}}/quizzes/create" class="btn btn-sm btn-primary">{{__('New quiz')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-bod">
                        <table class="table align-items-center table-flush">

                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Quiz Name</th>
                                     <th scope="col">Quiz Id</th>
                                     <th scope="col">Course Name</th>
                                     <th scope="col">Num Questions</th>
                                     <th scope="col">Creation Date</th>
                                     <th scope="col"></th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($course->quizzes as $quiz)
                                <tr>
                                    <td title="{{$quiz->name}}"><a href="{{route('Quizzes.show',$quiz)}}">{{$quiz->name}}</a></td>
                                        <td>{{$quiz->id}}</td>
                                        <td>
                                           <a href="courses/{{$quiz->course->id}}">{{$quiz->course->title}}</a>
                                        </td>
                                        <td>{{count($quiz->questions)}}</td>
                                        <td>{{$quiz->created_at->diffforHumans()}}</td>
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                <form action="{{route('Quizzes.destroy', $quiz)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                <a class="dropdown-item" href="{{route('Quizzes.edit' ,$quiz)}}">{{__("Edit")}}</a>
                                                <button type="button" class="dropdown-item"
                                                 onclick="confirm('{{__('Are you sure you want to delete this user?')}}') ?
                                                  this.parentElement.submit() : ''">{{__("Delete")}}</button>
                                                </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
