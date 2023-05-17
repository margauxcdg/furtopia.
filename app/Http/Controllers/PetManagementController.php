<?php

namespace App\Http\Controllers;

use App\Models\PetManagement;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $adoption = PetManagement::select('pet_management.*')
            ->join('pets', 'pet_management.pet_id', '=', 'pets.id')
            ->where('pets.user_id', $userId)
            ->orderByRaw("CASE status 
                WHEN 'pending' THEN 1 
                WHEN 'rejected' THEN 2 
                WHEN 'approved' THEN 3
                ELSE 4
            END")
            ->get();
    
        return view('petmanagement', compact('adoption'));
    }
    

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function application($id)
    {
        $adoption = PetManagement::findOrFail($id);
        return view('application', compact('adoption'));
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $pet_id)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:20',
            'age' => 'required|integer|min:18',
            'occupation' => 'required|string|max:255',
        ]);
    
        $pets = Pet::findOrFail($pet_id);
    
        $adoption = new PetManagement;
        $adoption->pet_id = $pet_id;
        $adoption->adopter_name = $validated['fullname'];
        $adoption->adopter_address = $validated['address'];
        $adoption->adopter_phone = $validated['phonenumber'];
        $adoption->adopter_age = $validated['age'];
        $adoption->adopter_occupation = $validated['occupation'];
        $adoption->save();
        $request->session()->flash('message', 'Adoption application submitted successfully!');
    
        return view('profile', compact('pets', 'adoption'));
    }
    
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PetManagement  $petManagement
     * @return \Illuminate\Http\Response
     */
    public function show($pet_id)
    {
        $pets = Pet::findOrFail($pet_id);
        return view('adoptForm', ['pets' => $pets]);
    }

    public function approveApplication($id)
    {
        $adoption = PetManagement::findOrFail($id);
        $adoption->status = 'approved';
        $adoption->save();
        return redirect()->back();
    }
    
    public function declineApplication($id)
    {
        $adoption = PetManagement::findOrFail($id);
        $adoption->status = 'rejected';
        $adoption->save();
        return redirect()->back();
    }
    
    public function edit(PetManagement $petManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PetManagement  $petManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PetManagement $petManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PetManagement  $petManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(PetManagement $petManagement)
    {
        //
    }
}
