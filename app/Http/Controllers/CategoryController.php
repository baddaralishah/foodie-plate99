<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $user=User::find(Auth::User()->id);
        $cat=Category::all();
        $subCat=Subcategory::all();
        if($user->role=='admin' && $user->status=='active'){
            return view('admin.addNewCategory',compact('cat','subCat'));
        }else{
            return ['message'=>'You are not authorized to perform this task'];
        }
    }

    public function createCategory(Request $request)
    {
        $user=User::find(Auth::User()->id);
        if($user->role=='admin' && $user->status=='active'){
            $category=new Category();
            $category->name=$request->get('name');
            $category->save();
            $cat=Category::all();
            $subCat=Subcategory::all();
            return view('admin.addNewCategory',compact('cat','user','subCat'));
        }else{
            return ['message'=>'You are not authorized to perform this task'];
        }
    }

    public function createSubCategory(Request $request){
        $user=User::find(Auth::User()->id);
        if($user->role=='admin' && $user->status=='active'){
            $subcategory=new Subcategory();
            $subcategory->name=$request->get('name');
            $subcategory->category_id=$request->get('catPatch');
            $subcategory->save();
            $cat=Category::all();
            $subCat=Subcategory::all();
            return view('admin.addNewCategory',compact('cat','user','subCat'));
        }else{
            return ['message'=>'You are not authorized to perform this task'];
        }
    }
}
