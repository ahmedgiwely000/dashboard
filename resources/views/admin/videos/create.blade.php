@extends('layouts.app', ['title' => __('Video Management')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Add video') . ' '. auth()->user()->name,
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                            <h3 class="mb-0">{{ __('Video Management') }}</h3>
                            </div>
                            <div class="col-4  text-right">
                            <a href="{{route('videos.index')}}" class="btn btn-sm btn-primary">{{__('Back to list')}}</a>
                            </div>
                        </div>
                    </div>

                    @include('includes.errors')

                    <div class="card-body">
                    <form action="{{route('videos.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        <h6 class="heading-small text-muted mb-4">{{__('Video information')}}</h6>
                    <div class="pl-lg-4">
                        {{-- Title --}}
                        <div class="form-group{{ $errors->has('title') ? 'has-danger' : ' '}}">
                            <label for="input-title" class="form-control-label">{{__('Video Title')}}</label>
                            <input type="text" name="title" id="input-title" class="form-control
                        form-control-alternative{{ $errors->has('title') ? 'is-invaild' : ' '}}" placeholder="{{__('Title')}}" value="{{old('title')}}"
                        required autofocus>

                        @if ($errors->has('title'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('title')}}</strong>
                        </span>
                        @endif
                        </div>

                        {{-- Course_id --}}
                        <div class="form-group{{ $errors->has('course_id') ? 'has-danger' : ' '}}">
                            <label for="input-course_id" class="form-control-label">{{__('Video Course')}}</label>
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

                        {{-- link course --}}
                        <div class="form-group{{ $errors->has('link') ? 'has-danger' : ' '}}">
                            <label for="input-link" class="form-control-label">{{__('Link')}}</label>
                            <input type="text" name="link" id="input-link" class="form-control
                        form-control-alternative{{ $errors->has('link') ? 'is-invaild' : ' '}}" placeholder="{{__('link')}}" value="{{old('link')}}"
                        required >

                        @if ($errors->has('link'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('link')}}</strong>
                        </span>
                        @endif
                        </div>

                        {{-- img --}}
                        {{-- <div class="form-group{{ $errors->has('img') ? 'has-danger' : ' '}}">
                            <label for="input-img" class="form-control-label">{{__('Image')}}</label>
                            <input type="file" name="img" id="input-img" class="form-control
                        form-control-alternative{{ $errors->has('img') ? 'is-invaild' : ' '}}" required>

                        @if ($errors->has('img'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('img')}}</strong>
                        </span>
                        @endif
                        </div> --}}


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
