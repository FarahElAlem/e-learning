<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class VideoController extends Controller
{
  public function index()
  {
      return Response()->json(Video::get());
  }

  public function create(Request $request)
  {
      Video::create(array(
      'path' => $request->input('path')
    ));

      return Response()->json(array('success' => true));
  }

  public function update(Request $request,$id)
  {
      $video = Video::findOrFail($id);
      $video->path = $request->input('path');
      $video->save();

      return Response()->json(array('success' => true));
  }

  public function destroy($id)
  {
    $video = Video::destroy($id);

    return Response()->json(array('success'=>(bool)$video));
  }

  public function show($id)
  {
    return Response()->json(Video::findOrFail($id));
  }
}
