<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Subcategory;
use App\UserDish;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\View\View;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::find(Auth::User()->id);
        $cat=Subcategory::all();
        if($user->role=='admin' && $user->status=='active') {
            Return View('user.newStory',compact('cat'));
        }
        if($user->role=='user' && $user->status=='active') {
            Return View('user.newStory',compact('cat'));

        }
        else{
        return ['message'=>'You are not authorized to perform this task'];
        }
    }

    public function timeline(){
        $dishes=UserDish::all();
        $user=User::find(Auth::User()->id);
        if($user->role=='admin' && $user->status=='active') {
            Return View('user.timeline',compact('dishes'));
        }
        if($user->role=='user' && $user->status=='active') {
            Return View('user.timeline',compact('dishes'));

        }
        else{
            return ['message'=>'You are not authorized to perform this task'];
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user=User::find(Auth::User()->id);
        $cat=Subcategory::all();
        if($user->role=='admin' && $user->status=='active'){
            $dish=new Dish();
            $dish->name=$request->get('name');
            $dish->description=$request->get('description');
            $dish->sub_category_id=$request->get('subCat_id');
            $dish->upload_type=$request->get('type');

            $file = Input::file('image');
            if (!empty($file)) {
                $newFilename = $file->getClientOriginalName();
                $newFilename = "-plate99-" . time() . "-" . $newFilename;
                $destinationPath = public_path() . '/storyImages/';
                $file->move($destinationPath, $newFilename);
                $dish->image = $newFilename;
            }
            $dish->save();

            $connection = new UserDish();
            $connection->uploader_id=Auth::User()->id;
            $connection->dish_id=$dish->id;
            $connection->city=$request->get('city');
            $connection->location=$request->get('location');
            $connection->save();

            return view('user.newStory',compact('cat','user'));
        }
        if($user->role=='user' && $user->status=='active'){

            $dish=new Dish();
            $dish->name=$request->get('name');
            $dish->description=$request->get('description');
            $dish->sub_category_id=$request->get('subCat_id');
            $dish->upload_type=$request->get('type');

            $file = Input::file('image');
            if (!empty($file)) {
                $newFilename = $file->getClientOriginalName();
                $newFilename = "-plate99-" . time() . "-" . $newFilename;
                $destinationPath = public_path() . '/storyImages/';
                $file->move($destinationPath, $newFilename);
                $dish->image = $newFilename;
            }
            $dish->save();


            return view('user.newStory',compact('cat','user'));
        }
        else{
            return ['message'=>'You are not authorized to perform this task'];
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        dd($request->get('search'));
        $dishes=UserDish::where([
            ['location', '=', $request->get('search')],
            ['city', '=', $request->get('search')],
            ]);
        dd($dishes);
        $user=User::find(Auth::User()->id);
        if($user->role=='admin' && $user->status=='active') {
            Return View('user.timeline',compact('dishes'));
        }
        if($user->role=='user' && $user->status=='active') {
            Return View('user.timeline',compact('dishes'));

        }
        else{
            return ['message'=>'You are not authorized to perform this task'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Return View('specificDish');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Return View('specificDishEditingForm');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Return Redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Return View('dish');
    }
}
