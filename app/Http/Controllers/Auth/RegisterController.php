<?php

namespace App\Http\Controllers\Auth;

use App\Model\DataMaster\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use Illuminate\Http\Request;
use DB;


class RegisterController extends Controller
{

    use RegistersUsers;

      /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    public function ShowDaftarForm(){
        return view ('Auth/Daftar');
    }


    public function Register(Request $req){

        $message = [
            'required' => 'Form ini harus di isi',
            'min' => 'jumlah karakter kurang atau lebih',
            'unique' => 'posel atau email telah digunakan',
        ];

        $this->validate($req, [

            'name' => 'required|min:2|max:30',
            'email' => 'required|min:4|unique:users,email',
            'password' => 'required|confirmed',

        ], $message);

        $r = new User;
        $r->name = $req->name;
        $r->email = $req->email;
        $r->role = 'Siswa';
        $r->password = bcrypt($req->password);
        $r->status_anggota = 0;
        $r->save();
        return redirect()->route('user.dashboard');
    }
}
