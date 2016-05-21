@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @if(Session::has('take'))
    @if(Session::get('take')=='1')
        <div class="alert alert-success" role="alert">Ready Enroll this Course!</div>
      @endif
      @endif
      <div class="col-sm-12">
        <h1>{{$course->name}}</h1>
        <h4>{{$course->about}}</h4>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <video controls data-setup='{ "example_option": true, "techOrder": ["html5","flash"] }' class="art-preview lazy video-js vjs-default-skin vjs-big-play-centered vjs-16-9" src="/learning/video/QW5ndWxhciAyIEZ1bmRhbWVudGFscyAgVWRlbXkubXA0.mp4"></video>
        </div>
        <div class="col-sm-4">
          <div class="row">
            <div class="col-xs-12">
              @if(isset($user)&&$course->users->where('id',$user->id)->count()>0)
              <a href="learn/{{$course->id}}"><button type="button" class="btn btn-success btn-lg">Learn This Course</button></a>
              @else
              <a href="take/{{$course->id}}"><button type="button" class="btn btn-success btn-lg">Take This Course</button></a>
              @endif
            </div>
          </div>
        </br>
          <div class="row">
            <div class="col-xs-12">
              <ul class="list-group">
                <li class="list-group-item">Video: {{floor($course->videoDuration/3600)}} Hours {{round($course->videoDuration/60)-(floor($course->videoDuration/3600)*60)}} min</li>
                <li class="list-group-item">Student: {{$course->studentcount}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      </div>
    </br>
      <div class="row">
        <div class="col-sm-8">
          {!!$course->description!!}
        </div>
      </div>
</div>
@endsection
