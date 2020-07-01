@extends('layouts.app', ['title' => __('Course Management')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Add Course') . ' '. auth()->user()->name,
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                            <h3 class="mb-0">{{ __('Course Management') }}</h3>
                            </div>
                            <div class="col-4  text-right">
                            <a href="{{route('courses.index')}}" class="btn btn-sm btn-primary">{{__('Back to list')}}</a>
                            </div>
                        </div>
                    </div>
                    @include('includes.errors')
                    <div class="card-body">
                    <form action="{{route('courses.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        <h6 class="heading-small text-muted mb-4">{{__('Course information')}}</h6>
                    <div class="pl-lg-4">
                        {{-- Title --}}
                        <div class="form-group{{ $errors->has('title') ? 'has-danger' : ' '}}">
                            <label for="input-title" class="form-control-label">{{__('Title')}}</label>
                            <input type="text" name="title" id="input-title" class="form-control
                        form-control-alternative{{ $errors->has('title') ? 'is-invaild' : ' '}}" placeholder="{{__('Title')}}" value="{{old('title')}}"
                        required autofocus>

                        @if ($errors->has('title'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('title')}}</strong>
                        </span>
                        @endif
                        </div>

                        {{-- slug --}}
                        {{-- <div class="form-group{{ $errors->has('slug') ? 'has-danger' : ' '}}">
                            <label for="input-slug" class="form-control-label">{{__('Slug')}}</label>
                            <input type="text" name="slug" id="input-slug" class="form-control
                        form-control-alternative{{ $errors->has('slug') ? 'is-invaild' : ' '}}" placeholder="{{__('slug')}}" value="{{old('title')}}"
                        required autofocus>

                        @if ($errors->has('slug'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('slug')}}</strong>
                        </span>
                        @endif
                        </div> --}}
                        
                        {{-- Description --}}
                        <div class="form-group{{ $errors->has('description') ? 'has-danger' : ' '}}">
                            <label for="input-description" class="form-control-label">{{__('Description')}}</label>
                            <input type="text" name="description" id="input-description" class="form-control
                        form-control-alternative{{ $errors->has('description') ? 'is-invaild' : ' '}}" placeholder="{{__('description')}}" value="{{old('title')}}"
                        required autofocus>

                        @if ($errors->has('description'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('description')}}</strong>
                        </span>
                        @endif
                        </div>

                        {{-- Track_id --}}
                        <div class="form-group{{ $errors->has('track_id') ? 'has-danger' : ' '}}">
                            <label for="input-track_id" class="form-control-label">{{__('Track')}}</label>
                            <select name="track_id" id="input-track_id" required class="form-control">
                                @foreach (\App\Track::all() as $track)
                                <option value="{{$track->id}}">{{$track->name}}</option>
                                @endforeach
                            </select>


                        @if ($errors->has('track_id'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('track_id')}}</strong>
                        </span>
                        @endif
                        </div>

                        {{-- Status --}}
                        <div class="form-group{{ $errors->has('status') ? 'has-danger' : ' '}}">
                            <label for="" class="form-control-label">{{__('Course Status')}}</label>
                            <select name="status" id="input-status" required class="form-control">
                                <option value="0">Free</option>
                                <option value="1">Paid</option>
                            </select>


                        @if ($errors->has('status'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('status')}}</strong>
                        </span>
                        @endif
                        </div>
                        {{-- link --}}
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
                        <div class="form-group{{ $errors->has('img') ? 'has-danger' : ' '}}">
                            <label for="input-img" class="form-control-label">{{__('Image')}}</label>
                            <input type="file" name="img" id="input-img" class="form-control
                        form-control-alternative{{ $errors->has('img') ? 'is-invaild' : ' '}}" required>

                        @if ($errors->has('img'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('img')}}</strong>
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
