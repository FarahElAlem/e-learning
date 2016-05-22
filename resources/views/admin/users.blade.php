@extends('layouts.appAdmin')

@section('content')
<div class="content-wrapper" ng-app="AdminApp">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User In Course
      <small>advanced management</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">User</a></li>
      <li class="active">All</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Hover Data Table</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-hover" >
              <thead>
              <tr>
                <th>No.</th>
                <th>Firstname</th>
                <th>Email</th>
              </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
              <tr>
                <td><a  href="{{ url('/admin/user/edit')}}/{{$user->id}}">{{$user->id}}</a></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
              </tr>
                @endforeach
              </tbody>
              <tfoot>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

@endsection

@section('script')
@endsection
