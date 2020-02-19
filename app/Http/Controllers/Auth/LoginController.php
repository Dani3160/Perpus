<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
use Hash;

class LoginController extends Controller
{
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function ShowMasukForm(){
		return view ('Auth/Masuk');
	}

	public function Login(Request $request){
		$input = $request->all();

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        
        if(DB::table('users')->where('email', $request->email)->first()) {
            if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
                if (auth()->user()->role == 'Siswa') {
                    return redirect()->route('user.dashboard');
                }
                if(auth()->user()->role == 'Operator'){
                    return redirect()->route('operator.dashboard');
                }
            }else{
                return redirect()->back()->withErrors(['Sandi salah'])
                ->withInput();
            }
        }else{
            return redirect()->back()->withErrors(['Email Tidak terdaftar.'])
            ->withInput();
        }
	}

}
