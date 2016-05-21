@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row">
      <div class="col-sm-12">
        <ol class="breadcrumb">
          <li><a href="/learning/public/course/learn/sectioncourse/{{$course->id}}">{{$course->name}}</a></li>
          {!!$path!!}
          <li class="active">{{$section->title}}</li>
        </ol>
      </div>
        <div class="col-sm-12">
          <h1>{{$section->title}}</h1>
          <div class="row">
            <div class="col-sm-12">
          <video class="art-preview lazy video-js vjs-default-skin vjs-big-play-centered vjs-16-9" data-setup='{ "example_option": true, "techOrder": ["html5","flash"] }' controls>
            <source src="../../../../../video/{{$video->path}}" type="video/mp4">
          </video>
          </div>
        </div>
        </div>
    </div>
</div>
@endsection
