@extends('layouts.app')
@section('content')
<div class="container">
  <h1>Courses Programs</h1>
  <div class="row">
    <div class="col-sm-12">
                  <h3>
                    All Courses
                  </h3>
      @foreach ($courseList as $course)
      <div data-filter-state="show" class="course-summary-card row row-gap-medium" style="margin-top: 30px; opacity: 1;">
    <div class="col-sm-3">
      <div class="row">
        <div class="col-xs-8 col-xs-offset-2 col-sm-12 col-sm-offset-0">
          <a href="course/{{$course->id}}">
            <img src="../image/{{$course->src}}" height="170" width="290" class="img-responsive img-bordered center-block" style="opacity: 1;">
          </a>
        </div>
      </div>
    </div>
    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-8">
          <h3 style="margin: 0;">
            <a href="course/{{$course->id}}">
              {{$course->name}}
            </a>
          </h3>

            <span class="h4">Video {{floor($course->videoDuration/3600)}} Hours {{round($course->videoDuration/60)-(floor($course->videoDuration/3600)*60)}} min</span>

        </div>
      </div>
      <div>
        {{$course->about}}
      </div>
    </div>
  </div>
  @endforeach

    </div>
  </div>
   </div>
@endsection
