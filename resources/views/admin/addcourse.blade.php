@extends('layouts.appAdmin')

@section('content')

<div class="content-wrapper" ng-app="AdminApp">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Course
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">User</a></li>
      <li class="active">Add User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
<div class="row">
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add Course</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" ng-controller="CourseAddController">
        <div class="box-body">
          <div class="form-group" ng-class="{'has-error': msg.name}">
            <label for="email">Name</label>
            <input type="text" class="form-control" ng-model="name" placeholder="Enter name">
            <span class="help-block"><%msg.name[0]%></span>
          </div>
          <div class="form-group">
  <label>Subtitle</label>
  <textarea class="form-control" rows="3" ng-model="about" placeholder="Enter ..."></textarea>
</div>
<div class="form-group">
    <label>Course Image</label>
              <input class="mdl-textfield__input ng-valid ng-touched ng-dirty ng-valid-pattern ng-valid-min-size ng-valid-max-size ng-valid-validate-fn ng-valid-max-height ng-valid-min-height ng-valid-max-width ng-valid-min-width ng-valid-ratio ng-valid-max-duration ng-valid-min-duration ng-valid-validate-async-fn ng-valid-parse" id="upload-with-form" type="file" ngf-select ng-model="file"  name="file" accept="image/*">
              <img ngf-thumbnail="file">
          </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary" ng-click="addCourse()">Submit</button>
        </div>
      </div>
      </form>
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
