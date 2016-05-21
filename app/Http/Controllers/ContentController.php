<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Content;

class ContentController extends Controller
{
  public function index()
  {
      return Response()->json(Content::get());
  }

  public function create(Request $request)
  {
      Content::create(array(
      'article' => $request->input('article'),
      'section_id' => $request->input('section_id')
    ));
    
    return Response()->json(array('success' => Content::orderby('updated_at', 'desc')->first()));
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
