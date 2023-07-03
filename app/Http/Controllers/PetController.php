<?php

namespace App\Http\Controllers;

use App\Models\AnimalShelter;
use App\Models\Pet;
use App\Models\User;
use App\Models\PetGallery;
use App\Models\Likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewPetPosted;




class PetController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::user()->id;
        $petsQuery = Pet::where('user_id', $userId)->orderBy('created_at', 'desc');
    
        $category = $request->category;
        if ($category) {
            $petsQuery = $petsQuery->where('animal_type', $category)->orderBy('created_at', 'desc');
        }
        $pets = $petsQuery->paginate(15);
    

        return view('petgallery', ['pets' => $pets,  'category' => $category]);


    }

    public function create(Request $request)
    {   
       return view('post');        
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'animal_type' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $image = $request->file('image');
        if ($image) {
            $filename = $image->getClientOriginalName();
            $image->move(public_path('img'), $filename);
        } else {
            $filename = null;
        }
    
        $user = Auth::user();
        $pets = Pet::create([
            'name' => $request['name'],
            'animal_type' => $request['animal_type'],
            'age' => $request['age'],
            'gender' => $request['gender'],
            'color' => $request['color'],
            'description' => $request['description'],
            'image' => $filename,
            'user_id' => $user->id,
        ]);
    
        return redirect()->route('petgallery.index')->with('success', 'Pet added successfully');
    }
    
    public function like($id)
    {
        $pet = Pet::find($id);

        if (!$pet) {
            return response()->view('errors.404', [], 404);
        }
    
        if (session()->has('liked_pets') && in_array($id, session()->get('liked_pets'))) {
            $pet->like--;
            session()->forget('liked_pets.' . array_search($id, session('liked_pets')));
        } else {
            $pet->like++;
            session()->push('liked_pets', $id);
        }
    
        $pet->save();
    
        return redirect()->back();
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $pets = Pet::where('name', 'LIKE', "%$query%")
                    ->orWhere('color', 'LIKE', "%$query%")
                    ->orWhere('age', 'LIKE', "%$query%")
                    ->orWhere('gender', 'LIKE', "%$query%")
                    ->orWhere('animal_type', 'LIKE', "%$query%")
                    ->get();
        return view('searchresults', ['pets' => $pets]);
    }


    public function show($id)
    {
        
        $pets = Pet::find($id);
        return view('profile', ['pets' => $pets]);
    }

    public function edit($id)
    {
        $pets = Pet::find($id);
        return view('editPet', ['pets' => $pets]);
    }
    public function update(Request $request, $id)
    {
        $pets = Pet::find($id);
        $image = $request->file('image');
        if ($image) {
            $filename = $image->getClientOriginalName();
            $image->move(public_path('img'), $filename);
        } else {
            $filename = $pets->image;
        }

        $pets->name =$request->name;
        $pets->age =$request->age;
        $pets->animal_type =$request->animal_type;
        $pets->gender =$request->gender;
        $pets->color =$request->color;
        $pets->description =$request->description;
        $pets->image =$filename;
        $pets->save();

        return view('profile', ['pets' => $pets]);
    
    }

    public function destroy($id)
    {
        $pets = Pet::find($id);

        $pets->delete();
        return redirect()->route('petgallery.index');
    }
}
