<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class QuizController extends Controller
{
  public function index()
  {
      return Response()->json(Quiz::get());
  }

  public function create(Request $request)
  {
      Quiz::create(array(
      'question' => $request->input('question')
    ));

      return Response()->json(array('success' => true));
  }

  public function update(Request $request,$id)
  {
      $quiz = Quiz::findOrFail($id);
      $quiz->question = $request->input('question');
      $quiz->save();

      return Response()->json(array('success' => true));
  }

  public function destroy($id)
  {
    $quiz = Quiz::destroy($id);

    return Response()->json(array('success'=>(bool)$quiz));
  }

  public function show($id)
  {
    return Response()->json(Quiz::findOrFail($id));
  }
}
