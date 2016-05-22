<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function dashboard(){
      return "Dashboard";
    }

    public function index(){
      return view('admin.starter');
    }

    public function user(){
      return view('admin.user');
    }

    public function addUser(){
      return view('admin.adduser');
    }

    public function editUser($id,Request $request){
      $data['id'] = $id;
      return view('admin.edituser',$data);
    }

    public function course(){
      return view('admin.course');
    }

    public function editCourse($id){
      $data['id'] = $id;
      return view('admin.editcourse',$data);
    }

    public function section($id) {
      $data['id'] = $id;
      $data['pagetype'] = 0;
      return view('admin.editcourselist',$data);
    }

    public function courseList($id){
      $data['id'] = $id;
      $data['pagetype'] = 1;
      return view('admin.editcourselist',$data);
    }
}
