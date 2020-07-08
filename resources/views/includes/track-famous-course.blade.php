<h2 class="text-capitalize track-title pt-2 pb-2 text-center"><span class="track-head"> Famouse Courses</span></h2>
<div class="container track-course pt-4 pb-4">

    <?php $i= 0; ?>
    @foreach ($tracks as $track)
<h2 class="track-name mb-3">last courses in <span class="course-head"><a href="/tracks/{{$track->name}}">{{$track->name}}</a></span></h2>

    <div class="row ">
        @foreach ($track->courses()->orderBy('id','desc')->limit(4)->get() as $course)
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4 mx-auto">
            <div class="course my-auto">
                <div class="card mx-auto">
                    <div class="card-img-top">
                        @if ($course->photo)
                    <a href="/courses/{{$course->slug}}"><img src="/images/{{$course->photo->filename}}" class="img-fluid" ></a>
                        @else
                        <a href="/courses/{{$course->slug}}"><img src="/images/1.jpg" class="track-img img-fluid"></a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="course-title h-100 text-center ">
                            <a href="/courses/{{$course->slug}}"><h5 class="pl-3">welcome to {{\Str::limit($course->title,20)}}</h5></a>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between mt-5">
                        <h5 class="pl-3 {{$course->status == 0 ? 'text-success' : 'text-danger'}}">{{$course->status == 0 ? 'Free' : 'Paid'}}</h5>
                        <h5 class="pl-3">{{count($course->users)}} user</h5>
                    </div>
                </div>
            </div>
        </div>
        @endforeach



            @if($i == 1)
            <div class="container">
                <h2 class="text-capitalize track-h2 offset-lg-3 offset-sm-1 mt-3">famous topics for you</h2>
                <div class="track-famous container-fluid text-center mt-4 mb-4 ">
                    <div class="tracks">
                        <ul class="list-unstyled">
                            @foreach ($famous_tracks as $track)
                            <li>
                            <a href="/tracks/{{$track->name}}" class="btn tracks-name d-inline-block font-weight-bold">{{$track->name}}</a>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
            @endif

            @if($i == 1)
            @auth
            <div class="container">
                <div class="row ml-5">
                    <h2 class="text-capitalize track-h2 offset-lg-2 offset-sm-1 mt-5">recommended courses for you</h2>
            <div class="recommend text-center mb-5 mt-3 w-100">
                <div class="row pt-4">
                    @foreach ($recommended_course as $course_r)
                        <div class="card mb-3 offset-lg-1 offset-sm-3">
                            <div class="row no-gutters mx-auto">
                              <div class="col-10 col-md-6 col-sm-8">
                                @if ($course_r->photo)
                                <a href="/courses/{{$course_r->slug}}"><img src="/images/{{$course_r->photo->filename}}" class="img-fluid" ></a>
                                @else
                                <a href="/courses/{{$course_r->slug}}"><img src="/images/1.jpg" class="track-img img-fluid"></a>
                                @endif
                              </div>
                              <div class="col-10 col-md-6 col-sm-8">
                                <div class="card-body">
                                  <h5 class="card-title"><a href="/courses/{{$course_r->slug}}"><h5 class="pl-3">welcome to {{\Str::limit($course_r->title,20)}}</h5></a>
                                </h5>
                                <div class="d-flex justify-content-between mt-5">
                                    <h5 class="pl-3 {{$course_r->status == 0 ? 'text-success' : 'text-danger'}}">{{$course_r->status == 0 ? 'Free' : 'Paid'}}</h5>
                                    <h5 class="pl-3">{{count($course_r->users)}} user</h5>
                                </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
                </div>
            </div>
            @endauth

            @endif


    </div><!-- row -->
    <?php $i++; ?>
    @endforeach
</div><!-- container-fluid -->

