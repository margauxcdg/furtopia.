<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pet;
use App\Models\PetManagement;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $category = $request->category;
        $petsQuery = Pet::when($category, function ($query, $category) {
            return $query->where('animal_type', $category);
        })->whereNotIn('id', function ($query) {
            $query->select('pet_id')->from('pet_management')->where('status', 'approved');
        })->orderBy('created_at', 'desc');
    
        $pets = $petsQuery->paginate(15);
        return view('home', ['pets' => $pets, 'category' => $category]);
    }
    

    
    
}