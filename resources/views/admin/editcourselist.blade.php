@extends('layouts.appAdmin')

@section('content')

<div class="content-wrapper" ng-app="AdminApp">
  <!-- Content Header (Page header) -->
  <div  ng-controller="CourseItemController" ng-init="init({{$id}},{{$pagetype}})">

    <!-- Modal -->
    <div class="modal fade" ng-controller="ActionSectionController" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Section</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Name</label>
              <input type="text" ng-model="title" class="form-control" placeholder="Enter title">
            </div>
            <div class="form-group">
              <label>Description</label>
              <input type="text" ng-model="description" class="form-control" placeholder="Enter description">
            </div>
            <div class="form-group">
              <button class="btn btn-block btn-danger" ng-click="deleteSection()">Delete Section</button>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" ng-click="saveTitle()">Save changes</button>
          </div>
        </div>
      </div>
    </div>


  <section class="content-header" >
    <h1>
      Curriculum
      <small><%coursename%> Course</small>
    </h1>
    <ol class="breadcrumb" ng-bind-html="path">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data tables</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
<div class="row">
  <div class="col-md-4">
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Add Section</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <form ng-controller="AddSectionController">
      <div class="box-body">

        <div class="form-group">
          <label>Name</label>
          <input type="text" ng-model="name" class="form-control" placeholder="Enter Name">
        </div>
        <div class="form-group">
          <label>Description</label>
          <input type="text" ng-model="objective" class="form-control" placeholder="Enter Description">
        </div>
        <div class="form-group">
          <label>Section</label>
          <select class="form-control" ng-model="sectionid">
            <option value="@if($pagetype==0) {{$id}}  @endif">This course</option>
            <option ng-repeat="section in courseData.section" value="<%section.id%>">Section <%section.title%></option>
          </select>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary" ng-click="addSection()">Submit</button>
      </div>
    </form>
    </div>
    <!-- /.box -->
  </div>

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
    <div class="panel panel-success" ng-repeat="section in courseData.section">
  <!-- Default panel contents -->
  <div class="panel-heading" data-toggle="modal"  ng-click="senddata(section)"  data-target="#myModal"><strong>Section <%$index+1%> - <%section.title%></strong></div>
  <ul class="list-group">
    <li class="list-group-item"  ng-model="section.section" data-jqyoui-options="{revert: 'invalid'}" jqyoui-droppable="{index: <%$index%>,onDrop: onDragCus(section.section)}" jqyoui-draggable="{animate:true, index: <%$index%>, insertInline: true}"
                        data-drag="true" data-drop="true" ng-repeat="subsection in section.section" ng-controller="SectionController">
      <div class="row">
        <div class="col-xs-12 col-md-10">
          Lecture : <span data-toggle="modal" ng-click="senddata(subsection)" data-target="#myModal"><%subsection.title%> </a></br>
          <%type%>
        </div>
        <div class="col-xs-12 col-md-2">
         <div class="btn-group" ng-show="haveContent">
  <button type="button" class="btn " ng-click="publishContent()" ng-class="{'btn-warning':isPublish=='Unpublish','btn-success':isPublish=='Publish'}"><%isPublish%></button>
  <button type="button" class="btn dropdown-toggle" ng-class="{'btn-warning':isPublish=='Unpublish','btn-success':isPublish=='Publish'}" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#" type="button" data-toggle="modal" ng-click="openModal()" data-target="#editModal<%subsection.id%>">Edit</a></li>
  </ul>
</div>
<a ng-if="type=='Section'" href="{{url('/admin/course/section')}}/<%section.id%>" ><button  class="btn btn-block btn-success">Next Section</button></a>
<button ng-hide="haveContent" type="button" class="btn btn-block btn-success" data-toggle="modal" ng-click="openModal()" data-target="#editModal<%subsection.id%>">Add</button>
       </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="editModal<%subsection.id%>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><%action%> <span ng-show="pass"><%type%></span> <%subsection.title%> Lecture</h4>
            </div>
            <div class="modal-body">
              <div ng-show="pass">
              <div ng-show="content">
                  <div class="m-b-10">
                      <form name="uploadVideo" class="m-b-10" ng-controller="VideoUploadController">
                          <div class="form-group">
                            <label for="exampleInputFile">Plese select your video file.</label>
                            <input ng-model="file" ngf-select name="file" ngf-max-size="2000MB" type="file" id="exampleInputFile">
                            <p class="help-block" ng-show="progress"><%percent%> %</p>
                          </div>
                          <div class="m-10">
                              <video ngf-src="file" controls>
                              </video>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary" ng-click="upload(subsection.id,'#editModal'+subsection.id)">Save changes</button>
                          </div>
                      </form>
                  </div>
              </div>
              <div ng-hide="content">
                  <div text-angular ng-model="subsection.article"></div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" ng-click="saveArticle('#editModal'+subsection.id)">Save changes</button>
                  </div>

              </div>
              </div>
              <div ng-hide="pass">
                <div class="row">
                  <div class="col-md-4 col-centered">
                        <a class="btn btn-app" ng-click="addVideo()">
                    <i class="fa fa-edit"></i> Video
                  </a>
                  </div>
                  <div class="col-md-4 col-centered">
                    <a class="btn btn-app"  ng-click="addArticle()">
                <i class="fa fa-edit"></i> Article
              </a>
                  </div>
                  <div class="col-md-4">
                    <a class="btn btn-app" href="{{url('/admin/course/section')}}/<%subsection.id%>">
                <i class="fa fa-edit"></i> Section
              </a>
                  </div>
                </div>
              </div>

          </div>
          </div>
        </div>
    </li>
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


</div>

@endsection

@section('script')
@endsection
