<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->usertype = $request->input('usertype');
        $user->save();

    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        if ($image) {
            $filename = $image->getClientOriginalName();
            $image->move(public_path('img'), $filename);
        } else {
            $filename = null;
        }
        
        if ($request->input('usertype') === 'Adopter') {
            $Adopter = new Adopter();
            $Adopter->first_name = $request->input('first_name');
            $Adopter->last_name = $request->input('last_name');
            $Adopter->address = $request->input('address');
            $Adopter->phone_number = $request->input('phone_number');
            $Adopter->profile = $request->input('profile');
            $user->Adopter()->save($Adopter);
        } else {
            $AnimalShelter = new AnimalShelter();
            $AnimalShelter->shelter_name = $request->input('shelter_name');
            $AnimalShelter->shelter_address = $request->input('shelter_address');
            $AnimalShelter->shelter_number = $request->input('shelter_number');
            $AnimalShelter->shelter_type = $request->input('shelter_type');
            $AnimalShelter->shelter_profile = $request->input('shelter_profile');
            $user->AnimalShelter()->save( $AnimalShelter);
        }
        return redirect('/home');
    }

}
