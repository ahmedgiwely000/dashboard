<div class="home_picture">
    <div class="container-fluid">
        <div class="background-text text-center">
            <p class="text-capitalize">start learning <span class="text-success">{{\App\Course::all()->count()}}</span> Courses for <strong>free</strong></p>
            <p class="font-weight-bold text-capitalize">More Than
            <span class="text-color">{{\App\User::all()->count()}}</span> Users Have inrolled in
            <span class="text-color">{{\App\Course::all()->count()}}</span> Courses in
            <span class="text-color">{{\App\Track::all()->count()}}</span> Tracks
            </p>
            <a class="btn btn-primary" href="{{route('register')}}">Register to Learning</a>
            <a class="btn btn-outline-light" href="{{route('register')}}">My Courses</a>
        </div>
    </div>
</div>
