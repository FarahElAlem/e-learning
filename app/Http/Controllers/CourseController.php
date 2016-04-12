<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Course;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function usercourse(Request $request)
    {
        return view('courses.usercourses');
    }

    public function courses(Request $request)
    {
        $courses = Course::all();
        return view('courses.courses', [
        'courses' => $courses,
      ]);
    }

    public function course($id, Request $request)
    {
      return view('course.index');
    }
}
