<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Pet;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    public function adoptionform(Request $request)
{
    // Validate the form data
   
}

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
            'pet_id' => 'required',
        ]);
    
        $adoption = new Adoption;
    
        $adoption->fullname = $request->fullname;
        $adoption->email = $request->email;
        $adoption->phone_number = $request->phone_number;
        $adoption->address = $request->address;

        $pet = Pet::find($validatedData['pet_id']);
    
        $adoption->pet_name = $pet->name;
        $adoption->pet_age = $pet->age;
    
        $adoption->save();
 
        return redirect()->route('pet.show', $validatedData['pet_id']);
    }

   public function show($pet_id)
{
    $pets = Pet::findOrFail($pet_id);
    return view('adoptionform', ['pets' => $pets]);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdoptionForm  $adoptionForm
     * @return \Illuminate\Http\Response
     */
    public function edit(AdoptionForm $adoptionForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdoptionForm  $adoptionForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdoptionForm $adoptionForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdoptionForm  $adoptionForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdoptionForm $adoptionForm)
    {
        //
    }
}
