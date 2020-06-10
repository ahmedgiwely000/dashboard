@extends('layouts.app', ['title' => __('Admin Profile')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('edit Admin') . ' '. auth()->user()->name,
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                            <h3 class="mb-0">{{ __('Admin Management') }}</h3>
                            </div>
                            <div class="col-4  text-right">
                            <a href="{{route('Admins.index')}}" class="btn btn-sm btn-primary">{{__('Back to list')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">


                    <form action="{{route('Admins.update' , $user)}}" method="POST" autocomplete="off">
                        @csrf
                        @method('patch')
                    <h6 class="heading-small text-muted mb-4">{{__('User information')}}</h6>
                    <div class="pl-lg-4">

                        <div class="form-group{{ $errors->has('name') ? 'has-danger' : ' '}}">
                            <label for="inputName" class="form-control-label">{{__('Name')}}</label>
                        <input type="text" name="inputName" value="{{$user->name}}" id="inputName" class="form-control
                        form-control-alternative{{ $errors->has('name') ? 'is-invaild' : ' '}}" placeholder="{{__('Name')}}" value="{{old('name')}}"
                        required autofocus>

                        @if ($errors->has('name'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? 'has-danger' : ' '}}">
                            <label for="inputEmail" class="form-control-label">{{__('Email')}}</label>
                            <input type="email" name="inputEmail" value="{{$user->email}}" id="inputEmail" class="form-control
                        form-control-alternative{{ $errors->has('email') ? 'is-invaild' : ' '}}" placeholder="{{__('Email')}}" value="{{old('email')}}"
                        required autofocus>

                        @if ($errors->has('email'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('email')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? 'has-danger' : ' '}}">
                            <label for="inputPassword" class="form-control-label">{{__('Password')}}</label>
                            <input type="password" name="inputPassword" value="{{$user->password}}" id="inputPassword" class="form-control
                        form-control-alternative{{ $errors->has('password') ? 'is-invaild' : ' '}}" placeholder="{{__('password')}}" value="{{old('email')}}"
                        required >

                        @if ($errors->has('password'))
                        <span class="invaild-feedback" role="alert">
                        <strong>{{$errors->first('password')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group">
                            <label for="input-password-confirmation" class="form-control-label">{{__('Confirm Password')}}</label>
                            <input type="password" value="{{$user->password}}" name="password-confirmation" id="input-password-confirmation" class="form-control
                        form-control-alternative" placeholder="{{__('Confirm Password')}}" value=""
                        required >
                        </div>

                        <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{__('Ubdate')}}</button>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
