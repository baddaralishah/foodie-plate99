<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        //dd($data);
        $newUser=new User();
        $newUser->name=$data['name'];
        $newUser->email= $data['email'];
        $newUser->password=bcrypt($data['password']);
        $newUser->role=$data['role'];

        $file=Input::file('image');
        if(!empty($file)) {
            $newFilename = $file->getClientOriginalName();
            $newFilename = "-plate99-".time()."-".$newFilename;
            $destinationPath = public_path() . '/profileImages/';
            $file->move($destinationPath, $newFilename);
        }
        $newUser->image=$newFilename;
        $newUser->about=$data['about'];
        $newUser->address=$data['address'];
        $newUser->city=$data['city'];
        $newUser->country=$data['country'];
        $newUser->contact=$data['contact'];
        $newUser->save();
        return $newUser;
    }
}
