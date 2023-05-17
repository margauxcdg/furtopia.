<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->usertype = $request->input('usertype');
        $user->save();

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
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
