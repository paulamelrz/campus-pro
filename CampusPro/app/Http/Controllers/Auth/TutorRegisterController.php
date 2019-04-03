tut-reg-<?php

namespace App\Http\Controllers\Auth;

use App\Tutor;
use App\Http\Controllers\Controller;
use Illuminate\http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class TutorRegisterController extends Controller
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
    //protected $redirectTo = '/tutor';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:tutor');
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
            'tutRegname' => ['required', 'string', 'max:255'],
            'tutRegemail' => ['required', 'string', 'email', 'max:255', 'unique:tutors'],
            'tutRegpassword' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function showRegisterForm(){
        //return login form view
        return view('auth.tutor-register');
    }
    
   protected function create(Request $data)
    {
        $this->validator($data->all())->validate();
        
        Tutor::create([
            'name' => $data['tutRegname'],
            'email' => $data['tutRegemail'],
            'password' => Hash::make($data['tutRegpassword']),
        ]);

        return redirect()->intended(route('tutor.login'));
    }

}
