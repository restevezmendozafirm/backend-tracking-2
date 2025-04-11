<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;

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
            'lname' => ['required', 'string', 'max:250'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['image', 'mimes:jpeg,png,jpg,gif', 'unique:users'],
            'phone' => ['required', 'string', 'max:250'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $filename = '';
        if ($request->file('avatar') != '' && $request->file('avatar') != null) {
            $image = $request->file('avatar');
            $filename = time() . '.' . $image->extension();
            $image->move(public_path('images/users'), $filename);
            //Storage::putFileAs('public/images', $image, $filename);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
            'avatar' => $filename,
        ]);

        return redirect('/home');
    }

    // protected function create(Request $request)
    // {
    //     $image = $request['avatar'];
    //     $filename = time() . '.' . $image->extension();
    //     Storage::putFileAs('public/images', $image, $filename);

    //     $user = User::create([
    //         'name' => $request['name'],
    //         'email' => $request['email'],
    //         'password' => Hash::make($request['password']),
    //         'avatar' => $filename,
    //     ]);

    //     return $user;
    // }
}
