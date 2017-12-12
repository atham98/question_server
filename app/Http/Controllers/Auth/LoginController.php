<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function username()
    {
        return 'name';
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/panel';

    use AuthenticatesUsers;

    public function login()
    {
        $this->validate(request(), [
            'name' => 'required|min:5|max:255',
            'password' => 'required|min:5|max:255'
        ]);
        $password = request('password');
        $auth = Auth::attempt(['name' => request('name'),'password' => $password],true);
        if(!$auth) {
            return redirect(route('login'));
        }else{
            return redirect(route('adminSettings'));
        }
    }
}
