<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\AnimalShelter;
use App\Models\Adopter;

class RegisterController extends Controller
{
   
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'usertype' => $data['usertype'],
        ]);
        $image = $data['image'];
        if ($image) {
            $filename = $image->getClientOriginalName();
            $image->move(public_path('img'), $filename);
        } else {
            $filename = null;
        }
        
    
        if($data['usertype'] === 'Adopter') {
            $adopter = Adopter::create([
                'user_id' => $user->id,
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'address' => $data['address'],
                'phone_number' => $data['phone_number'],
                'profile' => $filename,
                
            ]);
            
        } else if($data['usertype'] === 'AnimalShelter') {
            $animalshelter = AnimalShelter::create([
                'user_id' => $user->id,
                'shelter_name' => $data['shelter_name'],
                'shelter_address' => $data['shelter_address'],
                'shelter_number' => $data['shelter_number'],
                'shelter_type' => $data['shelter_type'],
                'shelter_profile' => $filename,
               
            ]);
        }
        return $user;
    }
    

    

    
}