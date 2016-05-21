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

}
