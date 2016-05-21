<?php
use App\User;
use App\Course;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $data['courses'] = Course::all()->where('status',1);
    return view('welcome',$data);
});
Route::get('/home',function(){
  return view('home');
});
Route::auth();
Route::get('/course-list',function(){
  $data['courseList'] = Course::get()->where('status',1);
  $data['duration'] = 0;
  foreach($data['courseList'] as $course)
  foreach($course->sections()->get() as $section)
  {
    if($section->video!=null&&$section->status==1){
    $course->duration =  $section->video->length;
    }
  }
  return view('course-list.courses',$data);
});
Route::get('course/{id}','CourseLearnController@index');
Route::get('my-courses',['middleware'=> 'auth',function(Request $request){
  $user = Auth::user()->id;
  $user = User::findOrFail($user);
  $data['courses'] = $user->courses;
  return view('mycourse',$data);
}]);
Route::get('profile/{id}',['middleware'=> 'auth',function(Request $request,$id){
  return view('profile');
}]);
Route::post('profile',function(Request $request){
  $validator = Validator::make($request->all(),[
    'name' => 'required|max:255',
    'password' => 'required|min:6|confirmed'
  ]);
  if($validator->fails())
  {
    return redirect('profile/'.Auth::user()->id)->withErrors($validator)->withInput();
  }
  $user = Auth::user();
  $user->name = $request->input('name');
  $user->password = bcrypt($request->input('password'));
  $user->save();
  return Redirect::to('profile/'.Auth::user()->id);
});
Route::get('course/learn/sectioncourse/{id}',['middleware'=> 'auth', 'uses'=>'CourseLearnController@sectionMain']);
Route::get('course/take/{id}',['middleware'=> 'auth', 'uses'=>'CourseLearnController@takeCourse']);
Route::get('course/learn/{id}',['middleware'=> 'auth', 'uses'=>'CourseLearnController@learn']);
Route::get('course/learn/section/{id}',['middleware'=> 'auth', 'uses'=>'CourseLearnController@section']);
Route::get('course/learn/{id}/article/{contentId}',['middleware'=> 'auth', 'uses'=> 'CourseLearnController@article']);
Route::get('course/learn/{id}/video/{contentId}',['middleware'=> 'auth', 'uses'=>'CourseLearnController@video']);
Route::group(array('prefix'=>'api'),function()
{
  Route::get('section/all/{id}','SectionController@showAll');
  Route::resource('course','CourseController');
  Route::resource('section','SectionController');
  Route::resource('content','ContentController');
  Route::post('video/{id}','VideoController@update');
  Route::resource('video','VideoController');
  Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
  Route::post('authenticate', 'AuthenticateController@authenticate');
  Route::post('authenticate/create','Auth/AuthController@create');
  Route::resource('user','UserController');
  Route::post('image','UploadVideoController@create');
});

Route::group(array('prefix'=>'admin'),function()
{
  Route::get('/','AdminController@index');
  Route::get('user','AdminController@dashboard');
});
