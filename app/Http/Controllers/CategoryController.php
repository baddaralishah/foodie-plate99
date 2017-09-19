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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::find(Auth::User()->id);
        $cat=Category::all();
        $subCat=Subcategory::all();
        if($user->role=='admin' && $user->status=='active'){
            return view('user.addNewCategory',compact('cat','subCat'));
        }else{
            return ['message'=>'You are not authorized to perform this task'];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategory(Request $request)
    {
        $user=User::find(Auth::User()->id);
        if($user->role=='admin' && $user->status=='active'){
            $category=new Category();
            $category->name=$request->get('name');
            $category->save();
            $cat=Category::all();
            $subCat=Subcategory::all();
            return view('user.addNewCategory',compact('cat','user','subCat'));
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
            return view('user.addNewCategory',compact('cat','user','subCat'));
        }else{
            return ['message'=>'You are not authorized to perform this task'];
        }
    }

    public function deleteCategory($id)
    {
        dd($id);
    }

    public function deleteSubCategory($id)
    {
        dd($id);
    }
}
