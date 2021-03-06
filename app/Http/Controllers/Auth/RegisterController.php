<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/beranda';

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
    protected function validator(array $data)
    {
        return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'min:6', 'unique:users'],
        'no_handphone' => ['required', 'string', 'min:10', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $name = $data['name'];
        $username = $data['username'];
        $no_handphone = $data['no_handphone'];
        $password = Hash::make($data['password']);

        if($data['role'] == 'nasabah'){
            return User::create([
            'name' => $name,
            'username' => $username,
            'no_handphone' => $no_handphone,
            'role' => '0',
            'password' => $password,
            ]);
        }
        else if($data['role'] == 'pegawai'){
            return User::create([
            'name' => $name,
            'username' => $username,
            'no_handphone' => $no_handphone,
            'role' => '1',
            'password' => $password,
            ]);
        }
    }
}
