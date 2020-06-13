<h2 class="text-capitalize track-title pt-2 pb-2 text-center"><span class="track-head"> Famouse Courses</span></h2>
<div class="container-fluid track-course pt-4 pb-4">

    @foreach ($tracks as $track)

    <h2 class="track-name">last courses in <span class="course-head">{{$track->name}}</span></h2>

    <div class="row">
        @foreach ($track->courses()->limit(4)->get() as $course)

        <div class="col-sm-3 mb-4">
            <div class="course">
                <div class="card">
                    <div class="card-img-top">
                        @if ($course->photo)
                        <a href=""><img src="/images/{{$course->photo->filename}}" ></a>
                        @else
                        <a href=""><img src="/images/1.jpg" class="track-img"></a>
                        @endif
                    </div>
                <div class="card-title text-center pt-3">
                        <a href=""><h5 class="pl-3">welcome to {{\Str::limit($course->title,20)}}</h5></a>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <h5 class="pl-3 {{$course->status == 0 ? 'text-success' : 'text-danger'}}">{{$course->status == 0 ? 'Free' : 'Paid'}}</h5>
                        <h5 class="pl-3">{{count($course->users)}} user</h5>
                    </div>
                </div>
            </div>

        </div>

        @endforeach
    </div>

    @endforeach
</div>

