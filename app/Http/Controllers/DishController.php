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
    public function index()
    {
        $user=User::find(Auth::User()->id);
        $cat=Subcategory::all();
        if($user->role=='admin' && $user->status=='active') {
            Return View('admin.newStory',compact('cat'));
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
        $cat=Subcategory::all();
        $user=User::find(Auth::User()->id);
        if($user->role=='admin' && $user->status=='active') {
            Return View('admin.timeline',compact('dishes','cat'));
        }
        if($user->role=='user' && $user->status=='active') {
            Return View('user.timeline',compact('dishes','cat'));

        }
        else{
            return ['message'=>'You are not authorized to perform this task'];
        }
    }
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

            return view('admin.newStory',compact('cat','user'));
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
    public function search(Request $request)
    {
        if($request->get('catPatch')=='Nill'){
        $dishes=UserDish::where('city', '=', $request->get('search'))->get();
        $user=User::find(Auth::User()->id);
        $cat=Subcategory::all();
        if($user->role=='admin' && $user->status=='active') {
            Return View('admin.timeline',compact('dishes','cat'));
        }
        if($user->role=='user' && $user->status=='active') {
            Return View('user.timeline',compact('dishes','cat'));

        }
        else{
            return ['message'=>'You are not authorized to perform this task or Problem in Searching'];
        }
        }
        else{
            $alldishes=Dish::where('sub_category_id',$request->get('catPatch'))->get();
            foreach ($alldishes as $rawFilter){
                $dishes[]=UserDish::where([
                    ['dish_id','=',$rawFilter->id],
                    ['city', '=', $request->get('search')]
                    ])->get();

            }
            $user=User::find(Auth::User()->id);
            $cat=Subcategory::all();
            if($user->role=='admin' && $user->status=='active') {
                Return View('admin.timelineWithCat',compact('dishes','cat'));
            }
            if($user->role=='user' && $user->status=='active') {
                Return View('user.timelineWithCat',compact('dishes','cat'));

            }
            else{
                return ['message'=>'You are not authorized to perform this task or Problem in Searching'];
            }
        }

    }

}
