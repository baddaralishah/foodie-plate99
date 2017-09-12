<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::find(Auth::User()->id);

        if($user->role=='user' && $user->status=='active'){
            return view('user.viewUser',compact('user'))->with('error');
        }
        if($user->role=='admin' && $user->status=='active'){
            return view('user.viewAdmin',compact('user'));
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allUsers()
    {
        $user=User::find(Auth::User()->id);
        $users=User::all();
        if($user->role=='admin' && $user->status=='active'){
            Return View('user.allusers',compact('users'));
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
            return View('user.allusers',compact('users'));

        }else{
            $user->status='active';
            $user->save();
            $users=User::all();
            return View('user.allusers',compact('users'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // Return View('newUserAddition');
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
        Return View('specificUser');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Return View('specificUserEditingForm');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
                return view('user.viewAdmin', compact('user'));
            } else {
                return Redirect::back();
            }
        }else{
            return ['message'=>'You are not authorized as your account is deactived by admin'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Return View('viewAllUsers');
    }
}
