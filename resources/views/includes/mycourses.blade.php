<div class="container-fluid color-carousel">
    <div class="row my-auto">
        <div class="col-12">
            <!--Carousel Wrapper-->
<div id="carousel-with-lb" class="carousel  slide carousel-multi-item" data-interval='2000' data-ride="carousel">

    <!--Controls-->

    <div class="controls-top" >
      <a class="btn-floating left-arrow" href="#carousel-with-lb" data-slide="prev"><i
          class="fas fa-chevron-left"></i></a>
      <a class="btn-floating  right-arrow" href="#carousel-with-lb" data-slide="next"><i
          class="fas fa-chevron-right"></i></a>
    </div>


    <!--/.Controls-->
    <!--Slides and lightbox-->

    <div class="carousel-inner mdb-lightbox" role="listbox">
      <div id="mdb-lightbox-ui"></div>

      <div class="row course_reasume">
        <div class="col-4 offset-sm-2">
            <h3 class="text-capitalize font-weight-bold text-muted">reasume learning</h3>
        </div>
        <div class="col-5 text-decoration">
            <h2 class="font-weight-bold"><a href="/mycourses">My Courses</a></h2>
        </div>
    </div>
@foreach ($user_courses as $course)
        <!--First slide-->
      <div class="carousel-item course-card t-5 pb-5 <?php if($loop->first) echo 'active'; ?> ">
        <div class="row course ">
            <div class="col-sm-4">
                <figure class="col-md-4 d-md-inline-block">
                    <a href="/courses/{{$course->slug}}" data-size="1600x1067">
                      @if ($course->photo)
                      <img src="/images/{{$course->photo->filename}}" class="">
                      @else
                      <img src="./images/10.jpg" class="">
                      @endif
                    </a>
                </figure>
            </div>
            <div class="col-sm course_text ">
            <h2 class="text-white">course in <a href="/courses/{{$course->slug}}"><strong>{{$course->title}}</strong></a></h2>
            <h3 class="text-white">for track <a href="/courses/{{$course->track->name}}"><strong>{{$course->track->name}}</strong></a></h3>
            </div>
        </div>

      </div>
      <!--/.First slide-->
@endforeach

    </div>
    <!--/.Slides-->

  </div>
  <!--/.Carousel Wrapper-->

        </div><!-- col-lg-8 -->
    </div><!-- row -->
</div><!-- container -->
