<?php

namespace App\Http\Controllers;

use App\Models\PetCare;
use Illuminate\Http\Request;

class PetCareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nutritionAndFeedingArticles = PetCare::where('category', 'Nutrition and Feeding')->get();
        $trainingAndBehaviorArticles = PetCare::where('category', 'Training and Behavior')->get();
        $groomingAndHygieneArticles = PetCare::where('category', 'Grooming and Hygiene')->get();
        $healthAndWellnessArticles = PetCare::where('category', 'Health and Wellness')->get();
        $adoptingAndFosteringArticles = PetCare::where('category', 'Adopting and Fostering')->get();
        
        return view('petcare', [
            'nutritionAndFeedingArticles' => $nutritionAndFeedingArticles,
            'trainingAndBehaviorArticles' => $trainingAndBehaviorArticles,
            'groomingAndHygieneArticles' => $groomingAndHygieneArticles,
            'healthAndWellnessArticles' => $healthAndWellnessArticles,
            'adoptingAndFosteringArticles' => $adoptingAndFosteringArticles,
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addArticle');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $petCare = new PetCare;

    $image = $request->file('image');
    if ($image) {
        $filename = $image->getClientOriginalName();
        $image->move(public_path('img'), $filename);
        $petCare->image = 'img/' . $filename; // save the path to the image in the database
    } 
    
    $petCare->title = $request->input('title');
    $petCare->author = $request->input('author');
    $petCare->category = $request->input('category');
    $petCare->content = $request->input('content');
    
    $petCare->save();

    return redirect()->route('petcare')->with('success', 'Post Success');
    } 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PetCare  $petCare
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $petCare = PetCare::findOrFail($id);

        return view('article', compact('petCare'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PetCare  $petCare
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petCare = PetCare::find($id);
        return view('editArticle', ['petCare' => $petCare]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PetCare  $petCare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $petCare = PetCare::find($id);
        $image = $request->file('image');
        if ($image) {
            $filename = $image->getClientOriginalName();
            $image->move(public_path('img'), $filename);
        } else {
            $filename = $petCare->image;
        }

        $petCare->title = $request->title;
        $petCare->author = $request->author;
        $petCare->category = $request->category;
        $petCare->content = $request->content;
        $petCare->image = $filename;

        
      

        $petCare->save();
        
        return redirect()->route('article', ['id' => $petCare->id]);
    
    
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PetCare  $petCare
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petCare = PetCare::find($id);

        $petCare->delete();
        return redirect()->route('petcare');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::where('title', 'LIKE', "%$query%")
                    ->orWhere('author', 'LIKE', "%$query%")
                    ->orWhereHas('category', function ($query) use ($searchTerm) {
                        $query->where('name', 'LIKE', "%$searchTerm%");
                    })
                    ->get();
        return view('searchresults', ['articles' => $articles]);
    }
    
}
