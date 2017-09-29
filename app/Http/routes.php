<?php
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    $message="Please Enter Your Query Here";
    return view('contact',compact('message'));
});

Route::post('/createQuery',function (Request $request) {
    $query=new \App\Support();
    $query->sender_Name=$request->get('name');
    $query->sender_Email=$request->get('email');
    $query->sender_Subject=$request->get('subject');
    $query->message=$request->get('message');
    $query->save();
    $message="Your query is uploaded with success. Stay tune with email you provided for response";
    return view('contact',compact('message'));
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/update', 'HomeController@update');
Route::post('/changePassword','HomeController@passwordUpdate');
Route::get('/allUsers','HomeController@allUsers');
Route::post('/statusProfile/{id}','HomeController@userStatus');
Route::post('/makeAdmin/{id}','HomeController@makeAdmin');


Route::get('/addCategory','CategoryController@index');
Route::post('/createCategory','CategoryController@createCategory');
Route::post('/createSubCategory','CategoryController@createSubCategory');

Route::get('/viewStoryForm','DishController@index');
Route::post('/createStory','DishController@create');
Route::post('/searchIt','DishController@search');

Route::get('/storyControlSection','HomeController@storyControlSection');
Route::post('statusStory/{id}','HomeController@statusStory');

Route::get('/timeline','DishController@timeline');
Route::get('indiviualHistory','HomeController@indiviualHistory');

Route::get('/displayAllQueries','HomeController@displayAllQueries');
Route::post('/statusQuery/{id}','HomeController@statusQuery');