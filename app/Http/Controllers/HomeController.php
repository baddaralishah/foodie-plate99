<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Http\Requests;
use App\User;
use App\UserDish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user=User::find(Auth::User()->id);

        if($user->role=='user' && $user->status=='active'){
            return view('user.viewUser',compact('user'))->with('error');
        }
        if($user->role=='admin' && $user->status=='active'){
            return view('admin.viewAdmin',compact('user'));
        }else{
            return Redirect::back();
        }
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);
        $user=User::find(Auth::User()->id);
        $user->password=Hash::make($request->get('password'));
        $user->save();
        Auth::logout();
        return redirect()->back();
    }
    public function allUsers()
    {
        $user=User::find(Auth::User()->id);
        $users=User::all();
        if($user->role=='admin' && $user->status=='active'){
            Return View('admin.allusers',compact('users'));
        }else{
            Return ['message'=>'You are not authorized to avail this section'];
        }
    }

    public function userStatus(Request $request,$id){
        $user=User::find($id);
        if($user->status=='active'){
            $user->status='deactive';
            $user->save();
            $users=User::all();
            return View('admin.allusers',compact('users'));

        }else{
            $user->status='active';
            $user->save();
            $users=User::all();
            return View('admin.allusers',compact('users'));

        }
    }

    public function update(Request $request)
    {

        $user=User::find(Auth::User()->id);

        if($user->status=='active') {
            $user->name = $request->get('name');
            $user->address = $request->get('address');
            $user->city = $request->get('city');
            $user->country = $request->get('country');
            $user->about = $request->get('about');


            $file = Input::file('image');
            if (!empty($file)) {
                $newFilename = $file->getClientOriginalName();
                $newFilename = "-plate99-" . time() . "-" . $newFilename;
                $destinationPath = public_path() . '/profileImages/';
                $file->move($destinationPath, $newFilename);
                $user->image = $newFilename;
            }
            $user->save();

            if ($user->role == 'user') {
                return view('user.viewUser', compact('user'));
            }
            if ($user->role == 'admin') {
                return view('admin.viewAdmin', compact('user'));
            } else {
                return Redirect::back();
            }
        }else{
            return ['message'=>'You are not authorized as your account is deactived by admin'];
        }
    }

    public function storyControlSection(){
        $user=User::find(Auth::User()->id);
        if($user->role=='admin' && $user->status=='active'){
            $dishes=Dish::all();
            Return View('admin.controllStory',compact('user','dishes'));
        }else{
            Return ['message'=>'You are not authorized to avail this section'];
        }
    }

    public function statusStory($id){
        $dishe=Dish::find($id);
        $user=User::find(Auth::User()->id);
        if($user->role=='admin' && $user->status=='active'){
        if($dishe->status=='active'){
            $dishe->status='deactive';
            $dishe->save();
            $dishes=Dish::all();
            return View('admin.controllStory',compact('dishes','user'));

        }else{
            $dishe->status='active';
            $dishe->save();
            $dishes=Dish::all();
            return View('admin.controllStory',compact('dishes','user'));

        }
        }else{
            return['message'=>'You are not authorized to perfrom this task'];
        }
    }

    public function indiviualHistory(){
        $user=User::find(Auth::User()->id);
        if($user->role=='user') {
            $dishes = UserDish::where('uploader_id', $user->id)->get();
            return View('user.storyHistory', compact('dishes', 'user'));

        }else{
            return ['message'=>'UnAuthorized invasion'];
        }
    }
}
