@extends('layouts.app')

@section('content')
<div class="container">
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
          <h4>{!!$content->article!!}</h4>
        </div>
    </div>
</div>
@endsection
