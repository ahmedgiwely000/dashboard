@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-5 mb-5 mb-xl-0">
                <h2 class="text-white">Last Tracks</h2>
                @if (count($tracks))
                <div class="table-responsive">
                    <table class="table align-items-center table-flush bg-danger">

                        <thead class="text-dark font-italic font-weight-bold">
                            <tr>
                                <th scope="col">Track Name</th>
                                <th scope="col">No Courses</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody  class="text-white">

                            @foreach ($tracks as $track)
                            <tr>
                            <td title="{{$track->name}}"><a href="/admin/tracks/{{$track->id}}">{{\Str::limit($track->name,10)}}</a></td>
                                <td>{{count($track->courses)}} Course</td>
                                <td>{{$track->created_at->format('d/m/y H:i')}}</td>
                                <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                        <form action="{{route('tracks.destroy', $track)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        <a class="dropdown-item" href="{{route('tracks.edit' ,$track)}}">{{__("Edit")}}</a>
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
                @else
                <div class="text-uppercase text-danger font-weight-bold text-center">no tracks found</div>
                @endif
            </div>
            <div class="col-xl-7">
                <h2 class="text-white">Last Courses</h2>
                @if (count($courses))
                <div class="table-responsive">
                    <table class="table align-items-center table-flush bg-dark">

                        <thead class="text-white font-italic font-weight-bold">
                            <tr>
                                <th scope="col">course title</th>
                                <th scope="col">id</th>
                                <th scope="col">tracks</th>
                                <th scope="col">users</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody  class="text-white">

                            @foreach ($courses as $course)
                            <tr>
                            <td title="{{$course->title}}"><a href="/admin/tracks/{{$course->id}}">{{\Str::limit($course->title,20)}}</a></td>
                                <td>{{$course->id}}</td>
                                <td>{{$course->track->name}}</td>
                                <td>{{count($course->users)}}</td>
                                <td>{{$course->created_at->format('d/m/y H:i')}}</td>
                                <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                        <form action="{{route('courses.destroy', $course)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        <a class="dropdown-item" href="{{route('courses.edit' ,$course)}}">{{__("Edit")}}</a>
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
                @else
                <div class="text-uppercase text-danger font-weight-bold text-center">no courses found</div>
                @endif
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-5 mb-5 mb-xl-0">
                <h2 class="text-dark">Last users</h2>
                @if (count($users))
                <div class="table-responsive">
                    <table class="table align-items-center table-flush bg-dark">

                        <thead class="text-white font-italic font-weight-bold">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Verified</th>
                                <th scope="col"></th>
                        </thead>

                        <tbody  class="text-white">

                            @foreach ($users as $user)
                            <tr>
                                <td title="{{$user->name}}">{{\Str::limit($user->name,15)}}</td>
                                <td>
                                <a title="{{$user->email}}" href="mailto:admin@argon.com">{{\Str::limit($user->email,10)}}</a>
                                </td>
                                <td class="<?php if($user->email_verified_at) echo 'text-success'; else echo 'text-danger';?>">
                                        <?php
                                        if($user->email_verified_at){
                                            echo 'verified';
                                        }else{
                                            echo 'Unverified';
                                        }
                                        ?>
                                </td>
                                <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                        @if ($user->id != auth()->id())

                                        <form action="{{route('users.destroy', $user)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        <a class="dropdown-item" href="{{route('users.edit' ,$user)}}">{{__("Edit")}}</a>
                                        <button type="button" class="dropdown-item"
                                         onclick="confirm('{{__('Are you sure you want to delete this user?')}}') ?
                                          this.parentElement.submit() : ''">{{__("Delete")}}</button>
                                        </form>

                                        @else
                                            <a class="dropdown-item" href="{{route('users.edit' ,$user)}}">{{__("Edit")}}</a>
                                        @endif

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-uppercase text-danger font-weight-bold text-center">no courses found</div>
                @endif
            </div>
            <div class="col-xl-7">
                <h2 class="text-dark">Last Quizzes</h2>
                @if (count($quizzes))
                <div class="table-responsive">
                    <table class="table align-items-center table-flush bg-danger">

                        <thead class="text-dark font-italic font-weight-bold">
                            <tr>
                                <th scope="col">Quiz Name</th>
                                <th scope="col">Quiz Id</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Num Questions</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody  class="text-white">

                            @foreach ($quizzes as $quiz)
                            <tr>
                                <td title="{{$quiz->name}}"><a href="{{route('Quizzes.show',$quiz)}}">{{\Str::limit($quiz->name,10)}}</a></td>
                                <td>{{$quiz->id}}</td>
                                <td>
                                    <a href="courses/{{$quiz->course->id}}">{{\Str::limit($quiz->course->title,10)}}</a>
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
                @else
                <div class="text-uppercase text-danger font-weight-bold text-center">no quizzes found</div>
                @endif
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
