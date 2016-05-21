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
        $course = Course::get();
        return Response()->json($course);
    }

    public function create(Request $request)
    {
        // check input parameter
        if (is_null($request->input('name')) || is_null($request->input('about'))) {
          return Response()->json(array('success' => false), 404);
        }

        Course::create(array(
        'name' => $request->input('name'),
        'about' => $request->input('about'),
      ));

        return Response()->json(array('success' => true,'data'=>Course::orderby('updated_at', 'desc')->first()));
    }

    public function update(Request $request,$id)
    {
        $course = Course::findOrFail($id);
        if($request->has('name'))$course->name = $request->input('name');
        if($request->has('description'))$course->description = $request->input('description');
        if($request->has('status')) $course->status = (int)$request->input('status');
        $course->save();

        return Response()->json(array('success' => 'true'));
    }

    public function destroy($id)
    {
      $course = Course::destroy($id);

      return Response()->json(array('success'=>(bool)$course));
    }

    public function show($id)
    {
      return Response()->json(Course::findOrFail($id));
    }

}
