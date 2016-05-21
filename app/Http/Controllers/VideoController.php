<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class VideoController extends Controller
{
    public function index()
    {
        return Response()->json(Video::get());
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            if ($request->File('file')->isValid()) {
                $file = $request->File('file');
                $fileName = base64_encode($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
                $destinationPath = '../video';
                $file->move($destinationPath, $fileName);
            } else {
                return 'Error';
            }
        } else {
            return 'Error';
        }
        Video::create(array(
      'path' => $fileName,
      'section_id' => $request->input('section_id'),
      'length' => $request->input('length')
    ));

        return Response()->json(array('success' => Video::orderby('updated_at', 'desc')->first()));
    }

    public function update(Request $request, $id)
    {
        if ($request->hasFile('file')) {
            if ($request->File('file')->isValid()) {
                $file = $request->File('file');
                $fileName = base64_encode($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
                $destinationPath = '../video';
                $file->move($destinationPath, $fileName);
            } else {
                return 'Error2';
            }
        } else {
            return 'Error1';
        }
        $video = Video::findOrFail($id);
        $video->path = $fileName;
        $video->section_id = $request->input('section_id');
        $video->length = $request->input('length');
        $video->save();

        return Response()->json(array('success' => Video::orderby('updated_at', 'desc')->first()));
    }

    public function destroy($id)
    {
        $video = Video::destroy($id);

        return Response()->json(array('success' => (bool) $video));
    }

    public function show($id)
    {
        return Response()->json(Video::findOrFail($id));
    }
}
