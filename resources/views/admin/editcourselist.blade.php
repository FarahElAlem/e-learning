@extends('layouts.appAdmin')

@section('content')

<div class="content-wrapper" ng-app="AdminApp">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Curriculum
      <small>Name Course</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data tables</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
<div class="row">
  <div class="col-md-8">
    <div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Curriculum</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="panel panel-success">
  <!-- Default panel contents -->
  <div class="panel-heading"><strong>Section 1 - </strong></div>
  <div class="panel-body">
    <p>...</p>
  </div>

  <!-- List group -->
  <ul class="list-group">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Morbi leo risus</li>
    <li class="list-group-item">Porta ac consectetur ac</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
</div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
  </div>
</div>
  </section>
  <!-- /.content -->
</div>

@endsection

@section('script')
@endsection
