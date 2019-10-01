<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Patient;
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
    protected $redirectTo = '/usermanager';

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'Nic' => ['required', 'string', 'min:10','max:12'],
            'phone-number' => ['required', 'integer', 'min:10'],
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
        $user1= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 'patient',
        ]);
        $patient=Patient::create([

            'fullname' => $data['name'],
            'gender'=>$data['Gender'],
            'dob'=>$data['dob'],
            'nic'=>$data['Nic'],
            'address1'=>$data['Address1'],
            'address2'=>$data['Address2'],
            'city'=>$data['City'],
            'phone'=>$data['phone-number'],
            'email' => $data['email'],
            'username' => $data['Username'],
            'password' => Hash::make($data['password']),

            ]);

            return $user1;
    }


}
