@extends('layouts.app')

@section('content')
<div class="jumbotron" style="background-image: url(image/header.png)">
  <div class="container">
    <h1>How-to Tutorials & Free Online Courses</h1>
    <p>More than 20,750 Free How-to Tutorials, Inspiration and Videos to help you learn. Updated daily.</p>
    <p></p>
  </div>
</div>
<div class="container">
  @include('coursecard')
</div>
@endsection
