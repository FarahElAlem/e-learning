<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Course;
use Symfony\Component\Console\Input\Input;

class CourseController extends Controller
{
    public function index()
    {
        return Response()->json(Course::get());
    }

    public function create(Request $request)
    {
        // check input parameter
        if (is_null($request->input('name')) || is_null($request->input('description'))) {
          return Response()->json(array('success' => false), 404);
        }



        Course::create(array(
        'name' => $request->input('name'),
        'description' => $request->input('description'),
      ));

        return Response()->json(array('success' => true));
    }

    public function update(Request $request,$id)
    {
        $course = Course::findOrFail($id);
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->save();

        return Response()->json(array('success' => true));
    }

    public function destroy($id)
    {
      $course = Course::destroy($id);

      return Response()->json(array('success'=>$course==1));
    }

    public function show($id)
    {
      return Response()->json(Course::findOrFail($id));
    }

}
