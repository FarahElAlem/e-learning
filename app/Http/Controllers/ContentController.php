<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContentController extends Controller
{
  public function index()
  {
      return Response()->json(Content::get());
  }

  public function create(Request $request)
  {
      Content::create(array(
      'article' => $request->input('article')
    ));

      return Response()->json(array('success' => true));
  }

  public function update(Request $request,$id)
  {
      $content = Content::findOrFail($id);
      $content->article = $request->input('article');
      $content->save();

      return Response()->json(array('success' => true));
  }

  public function destroy($id)
  {
    $content = Content::destroy($id);

    return Response()->json(array('success'=>(bool)$content));
  }

  public function show($id)
  {
    return Response()->json(Content::findOrFail($id));
  }
}
