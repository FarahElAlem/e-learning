<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    function index()
    {
      return User::all();
    }

    function show($id)
    {
        return Response()->json(User::findOrFail($id));
    }

    public function update(Request $request,$id)
    {
      $validator = Validator::make($request->all(),['name'=>'required|max:255','email'=>'required|email']);
      if($validator->fails())
      {
        return response()->json($validator->messages(),405);
      }
        $user = User::findOrFail($id);
        if($request->has('name'))$user->name = $request->input('name');
        if($request->has('password'))$user->password = bcrypt($request->input('password'));
        if($request->has('email'))$user->email = $request->input('email');
        if($request->has('isAdmin')&&$request->input('isAdmin')=="true")
        {
          if(!$user->hasRole('admin'))$user->roles()->attach(1);
        }
        else {
          $user->detachAllRoles();
        }
        $user->save();
        return Response()->json(array('success' => true,'user'=>$user));
    }

    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),['name'=>'required|max:255','email'=>'required|email|unique:users','password'=>'required|min:6|confirmed']);
      if($validator->fails())
      {
        return response()->json($validator->messages(),405);
      }
      User::create(array(  'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password'))));
        return Response()->json(array('success'));
    }

    public function destroy($id)
    {
      $user = User::destroy($id);
      return Response()->json(array('success'=>(bool)$user));
    }
}
