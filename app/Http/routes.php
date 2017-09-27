<?php

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

//Route::get('myip', function (Request $request) {
//
//    $data = \Location::get();
//
//});

Route::get('/', function () {
    return view('welcome');
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