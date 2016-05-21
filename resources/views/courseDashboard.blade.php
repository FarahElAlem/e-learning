@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-4" style="height:220px; display: block;overflow:hidden;">
          <img src="/learning/image/{{$course->src}}" style="max-width:100%;" />
        </div>
        <div class="col-sm-8">
          <div class="row">
            <h1>{{$course->name}}</h1>
            <h4>{{$course->about}}</h4>
          </div>
          <div class="row">
            <a href="../learn/sectioncourse/{{$course->id}}" target="_blank"><button type="button" class="btn btn-success btn-lg">Continue</button></a>
          </div>
        </div>
    </div>
  </br>
    <div class="row">
      <div class="col-sm-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">Details</a></li>
          </ul>
<!-- Nav content -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="overview">
    </br>
      <div class="row">
        <div class="col-xs-8">
          {!!$course->description!!}
        </div>
        <div class="col-xs-4">
          <ul class="list-group">
            <li class="list-group-item">Video: {{floor($course->videoDuration/3600)}} Hours {{round($course->videoDuration/60)-(floor($course->videoDuration/3600)*60)}} min</li>
            <li class="list-group-item">Student: {{$course->studentcount}}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
      </div>
    </div>
</div>
@endsection
