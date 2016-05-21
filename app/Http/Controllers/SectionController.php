<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;
use App\Section;

class SectionController extends Controller
{
  public function index()
  {
    $data = array();
      $section = Section::with('sectionChild')->orderBy('order')->get()->where('section_id',null);
      foreach($section as $sec)
      {
        array_push($data,$sec);
      }
      return Response()->json($data);
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

      return Response()->json(array('success' => Section::orderby('updated_at', 'desc')->first()));
  }

  public function update(Request $request,$id)
  {
      $section = Section::findOrFail($id);
      if($request->has('title'))$section->title = $request->input('title');
      if($request->has('section_id'))$section->section_id = $request->input('section_id');
      if($request->has('order'))$section->order = $request->input('order');
      if($request->has('description')) $section->description = $request->input('description');
      if($request->has('serise')) $section->serise = $request->input('serise');

      $section->save();
      $data;
      if($request->has('status'))
      {
        $section->status = (int)$request->input('status');
        $section->save();
        $section = $section->sectionParent;
        $chk = false;
        while($section!=null)
        {
          foreach($section->section as $sec)
          {
            if($sec->status==1)
            {
              $chk = true;
              break;
            }
          }
          $section->status = $chk;
          $section->save();
          $section = $section->sectionParent;
        }
      }
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
    $section->load('quiz','content','video','section');
    foreach($section->section as $sec)
    {
      $sec->load('quiz','content','video','section');
    }
    return Response()->json($section);
  }

  public function showAll($id)
  {
    $data = array();
    $section = Section::with('section')->orderby('order')->get()->where('section_id',null)->where('course_id',(int)$id);
    $section->load('quiz','content','video','section');
    foreach($section as $sec)
    {
      array_push($data,$sec);
    }
    $course = Course::findOrFail($id)->name;
    return Response()->json(['section'=>$data,'course_id'=>$id,'title'=>$course]);
  }
}
