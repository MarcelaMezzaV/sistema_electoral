<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        //para que se pueda acceder a registro solo si estoy logueado
        //$this->middleware('auth');
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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['image','mimes:jpeg,bmp,png']
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
        $filename="";
        if (isset($data['avatar'])) {
            $avatar = $data['avatar'];
            $filename = time() . '.' . $avatar->getClientOriginalName();//para la extencion getClientOriginalEntension()
            $img = Image::make($avatar);
            // resize image to fixed size
            $img->resize(100, 100);
            $img->save(public_path().'/imgs/'. $filename);//si se quiere mas carpetas se debe crear la ruta mkdir($save_path, 666, true);
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'remember_token' => $data['_token'],
            'password' => Hash::make($data['password']),
            'avatar' => $filename
        ]);

    }
}
