@extends('layouts.user')

@section('content')
<div class="container User mt-5">
    <h1 class="font-italic"> Profile : <span class="font-weight-bold">{{$user->name}}</span>  </h1>
    <div class="row mb-4 mt-4">
        <div class="col-sm-4">
            <div class="user-info">

                <div class="user-img">
                    <div id="message"></div>
                    <div id="uploaded_image">
                        @if ($user->photo)
                          <img src="/images/{{$user->photo->filename}}" class="img-fluid img-thumbnail">
                          @else
                          <img src="/images/1.jpg" class="img-fluid img-thumbnail">
                        @endif
                    </div>
                    <a id="upload_btn" href="" class="btn btn-primary btn-block mt-1"><i class="fas fa-cloud-upload-alt"></i> uploade</a>
                    <form id="form" method="POST" action="/profile" enctype="multipart/form-data">
                        @csrf
                        <input id="img_file" type="file" name="image">
                    </form>
                </div><!-- user-img -->

                <div class="user-data mt-4">
                    <h4>hellow <span class="text-primary"><i class="fa fa-user-shield "></i> {{$user->admin == 1 ? "Admin" : "user"}} </span>  </h4>
                    <p class="lead font-italic text-muted">your personality info ...</p>
                   <h4>{{$user->email}}</h4>
                   <h5 class="font-weight-bold"> member at : <span class="text-muted font-weight-bold">{{$user->created_at}}</span></h5>
                   <h5 class="font-weight-bold"> your score : <span class="text-success">{{$user->score}} points</span></h5>
                   <h2 class="{{$user->email_verified_at ? "text-success" : "text-danger"}}">{{$user->email_verified_at ? "verified" : "unverified"}}</h2>
                </div><!-- user-data -->

            </div><!-- user-info -->
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-7">
            <div class="user-data">
                <div class="card text-white">
                    <div class="card-title text-center text-white pt-1">
                        <h2>user information</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/profile">
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="username">User Name :</label>
                                    <input type="text" name="name" id="username" placeholder="your name" value="{{$user->name}}" class="form-control">
                                </div><!-- input-name -->
                                <div class="form-group">
                                    <label for="useremail">User Email :</label>
                                    <input type="email" name="mail" id="useremail" placeholder="your mail" value="{{$user->email}}" class="form-control">
                                </div><!-- input-email -->
                                <div class="form-group">
                                    <label for="userpassword">User Password :</label>
                                    <input type="password" name="password" id="userpassword" placeholder="your password" value="{{$user->password}}" class="form-control">
                                </div><!-- input-password -->
                                <div class="form-group">
                                    <label for="confirmpassword">Confirm Password :</label>
                                    <input type="password" name="password" id="confirmpassword" placeholder="confirm password" value="{{$user->password}}" class="form-control">
                                </div><!-- input-confirm password -->
                                <input type="submit" value="SAVE" class="btn btn-block btn-user">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
