<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Section;

class SectionController extends Controller
{
  public function index()
  {
      $section = Section::with('sectionChild')->get()->where('section_id',null);
      return Response()->json($section);
  }

  public function create(Request $request)
  {
      // check input parameter
      // if (is_null($request->input('name')) || is_null($request->input('description'))) {
      //   return Response()->json(array('success' => false), 404);
      // }
      Section::create(array(
      'course_id' => $request->input('course'),
      'title' => $request->input('title'),
      'description' => $request->input('description'),
      'order' => $request->input('order'),
      'section_id' => $request->input('section_id'),
    ));

      return Response()->json(array('success' => true));
  }

  public function update(Request $request,$id)
  {
      $section = Section::findOrFail($id);
      $section->title = $request->input('title');
      $section->section_id = $request->input('section_id');
      $section->order = $request->input('order');
      $section->description = $request->input('description');
      $section->save();

      return Response()->json(array('success' => true));
  }

  public function destroy($id)
  {
    $section = Section::destroy($id);
    return Response()->json(array('success'=>(bool)$section));
  }


  public function show($id)
  {
    $section = Section::findOrFail($id);
    $section->quiz;
    return Response()->json($section);
  }
}
