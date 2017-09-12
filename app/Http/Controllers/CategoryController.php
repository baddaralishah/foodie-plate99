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
        if($user->role=='admin' && $user->status=='active'){
            return view('user.addNewCategory',compact('cat'));
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
            return view('user.addNewCategory',compact('cat','user'));
        }else{
            return ['message'=>'You are not authorized to perform this task'];
        }
    }

    public function createSubCategory(Request $request){
        //dd($request->get('catPatch'));
        $user=User::find(Auth::User()->id);
        if($user->role=='admin' && $user->status=='active'){
            $subcategory=new Subcategory();
            $subcategory->name=$request->get('name');
            $subcategory->category_id=$request->get('catPatch');
            $subcategory->save();
            $cat=Category::all();
            return view('user.addNewCategory',compact('cat'));
        }else{
            return ['message'=>'You are not authorized to perform this task'];
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Return View('specificCategory');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Return View('specificCategoryEditingForm');
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
        Return View('category');
    }
}
