@extends('layouts.user')

@section('content')
@include('includes.home_picture')

@auth
    @include('includes.mycourses')
@endauth

@include('includes.track-famous-course')
@endsection

