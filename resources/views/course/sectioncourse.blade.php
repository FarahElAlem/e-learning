@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="active">{{$course->name}}</li>
    </ol>
  </div>
  @include('sectionlist')
</div>
@endsection
