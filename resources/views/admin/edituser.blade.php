@extends('layouts.appAdmin')

@section('content')

<div class="content-wrapper" ng-app="AdminApp">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
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
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit User</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" ng-controller="EditUserController" ng-init="init({{$id}})">
        <div class="box-body">
          <div class="form-group" ng-class="{'has-error': msg.name}">
            <label for="email">Name</label>
            <input type="text" class="form-control" ng-model="name" placeholder="Enter name">
            <span class="help-block"><%msg.name[0]%></span>
          </div>
          <div class="form-group" ng-class="{'has-error': msg.name}">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" ng-model="email" placeholder="Enter email">
            <span class="help-block"><%msg.email[0]%></span>
          </div>
          <div class="form-group" ng-class="{'has-error': msg.password}">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" ng-model="password" placeholder="Password">
            <span class="help-block"><%msg.password[0]%></span>
          </div>
          <div class="form-group" ng-class="{'has-error': msg.repassword}">
            <label for="exampleInputPassword1">Password Again</label>
            <input type="password" class="form-control" ng-model="repassword" placeholder="Re-Enter Password">
            <span class="help-block"><%msg.repassword%></span>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" ng-model="isAdmin"> Admin
            </label>
          </div>
          <button type="button" ng-controller="DeleteUserController" ng-click="delete({{$id}})" class="btn btn-block btn-danger">Delete This User</button>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary" ng-click="save()">Submit</button>
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
