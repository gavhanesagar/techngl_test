<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Country;
use App\UserInfo;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $locationData = Location::get();
        $countries =  Country::get()->toArray();
        return view('auth.register', compact('countries', 'locationData'));
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
            'country' => ['required']
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $locationData = Location::get();
        $countryCode =$locationData->countryCode;
        $countryName = $locationData->countryName;

        if (!empty($data)) {
            $countryData = Country::where('country_code',$data['country'])
                ->first()
                ->toArray();
            
            $countryName = $countryData['name'];
            $countryCode = $data['country'];
        }

        UserInfo::create([
            'user_id' => $user->id,
            'country_code' => $countryCode,
            'country' => $countryName,
            'city' => $locationData->cityName,
            'postal_code' => $locationData->zipCode,
            'ip_address' => $locationData->ip,
            'latitude' => $locationData->latitude,
            'longitude' => $locationData->longitude
        ]);

        return $user;
    }
}
