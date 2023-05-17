@extends('layouts.app')

@section('content')
<div class="container">
    <!--Search Bar-->
    <div class="searchbar">
        <div class="row justify-content-end">
          <div class="col-sm-5">
            <form class="d-flex"action="{{ route('searchresults') }}" method="GET">
              <input class="form-control ms-2" name="query" type="search" placeholder="Search..." aria-label="Search">
              <button class="search btn" type="submit">
                <svg fill="none" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                  <g stroke="currentColor" stroke-linecap="round" stroke-width="2">
                    <circle cx="9.375" cy="9.375" r="6.375"/>
                    <path d="M14.333 14.333L20 20"/>
                  </g>
                </svg>
              </button>
            </form>
          </div>
        </div>
      </div>


    <div class="ctgry">
      <div class="carousel">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('img/carousel 1.jpg') }}" class="d-block w-100" alt="...">
              
            </div>
            <div class="carousel-item">
              <img src="{{ asset('img/carousel 2.jpg') }}" class="d-block w-100" alt="...">
             
            </div>
           
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    
             
    </div>
        <div class="article">
            @if(Auth::check())
              @if(Auth::user()->usertype == 'AnimalShelter')
                <div style="position: fixed; bottom: 20px; right: 20px;">
                  <a href="/petcare/addArticle" style="color: white; background-color: #8cc1fc; padding: 5px; border-radius: 5px; text-decoration: none; font-size: 15px;">
                    <i class="fas fa-plus-circle"></i>
                  Add Article</a>
                </div>
                @endif
              @endif
              <div class="behavior">
                <p class="headTitle fw-bold">Training and Behavior</p>
                <div class="wrapper" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
                  @foreach($trainingAndBehaviorArticles as $petCare)
                
                    <div class="item" style="position: relative; flex: 0 0 auto; width: 390px; height: 350px; margin-right: 10px;">
                      <div style="position: absolute; top: 0; left: 0;">
                        <img src="{{ asset($petCare->image) }}" class="d-block w-100" alt="..." style="border-radius: 10px; height:300px; object-fit:cover">
                        @if(Auth::check() && (Auth::user()->usertype == 'AnimalShelter' && Auth::user()->name == $petCare->author))
                          <div style="position: absolute; top: 5px; right: 5px;">
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none;">
                                <i class="fas fa-ellipsis-h" style="color: white; font-size: 1.5em;"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/petcare/editArticle/{{$petCare['id'] }}" style="text-transform: uppercase; font-weight: bold;">Edit</a>

                                <form action="{{route('deleteArticle', ['id' => $petCare['id']])}}" method="post">
                                  @csrf
                                  @method("DELETE")
                                  <button type="submit" value="Delete" name="submit" class="btn text-uppercase fw-bold" style="color:#FF2E2E;" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                              </div>
                            </div>
                          </div>
                        @endif
                        <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; width: 100%; border-radius: 0 0 10px 10px;">
                          <h2 style="margin: 0; color: white">{{ $petCare->title }}</h2>
                          <a href="{{ route('article', ['id' => $petCare->id]) }}" style="color: white; background-color: #8cc1fc; padding: 5px; border-radius: 5px; text-decoration: none; font-size: 15px">Read More</a>
                        </div>
                      </div>
                      
                    </div>
                 
                  @endforeach
                
                </div>
                
                
                 
              </div>
              <div class="Nutrition">
                <p class="headTitle fw-bold">Nutrition and Feeding</p>
                <div class="wrapper" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
                  @foreach( $nutritionAndFeedingArticles as $petCare)
                   
                    <div class="item" style="position: relative; flex: 0 0 auto; width: 390px; height: 350px; margin-right: 10px;">
                      <div style="position: absolute; top: 0; left: 0;">
                        <img src="{{ asset($petCare->image) }}" class="d-block w-100" alt="..." style="border-radius: 10px; height:300px; object-fit:cover">
                        @if(Auth::check() && (Auth::user()->usertype == 'AnimalShelter' && Auth::user()->name == $petCare->author))
                          <div style="position: absolute; top: 5px; right: 5px;">
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none;">
                                <i class="fas fa-ellipsis-h" style="color: white; font-size: 1.5em;"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/petcare/editArticle/{{$petCare['id'] }}" style="text-transform: uppercase; font-weight: bold;">Edit</a>

                                <form action="{{route('deleteArticle', ['id' => $petCare['id']])}}" method="post">
                                  @csrf
                                  @method("DELETE")
                                  <button type="submit" value="Delete" name="submit" class="btn text-uppercase fw-bold" style="color:#FF2E2E;" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                              </div>
                            </div>
                          </div>
                        @endif
                        <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; width: 100%; border-radius: 0 0 10px 10px;">
                          <h2 style="margin: 0; color: white">{{ $petCare->title }}</h2>
                          <a href="{{ route('article', ['id' => $petCare->id]) }}" style="color: white; background-color: #8cc1fc; padding: 5px; border-radius: 5px; text-decoration: none; font-size: 15px">Read More</a>
                        </div>
                      </div>
                      
                    </div>
                    
                  @endforeach
                
                </div>
                
                
                 
              </div>
              <div class="Grooming">
                <p class="headTitle fw-bold">Grooming and Hygiene</p>
                <div class="wrapper" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
                  @foreach( $groomingAndHygieneArticles as $petCare)
                   
                    <div class="item" style="position: relative; flex: 0 0 auto; width: 390px; height: 350px; margin-right: 10px;">
                      <div style="position: absolute; top: 0; left: 0;">
                        <img src="{{ asset($petCare->image) }}" class="d-block w-100" alt="..." style="border-radius: 10px; height:300px; object-fit:cover">
                        @if(Auth::check() && (Auth::user()->usertype == 'AnimalShelter' && Auth::user()->name == $petCare->author))
                          <div style="position: absolute; top: 5px; right: 5px;">
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none;">
                                <i class="fas fa-ellipsis-h" style="color: white; font-size: 1.5em;"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/petcare/editArticle/{{$petCare['id'] }}" style="text-transform: uppercase; font-weight: bold;">Edit</a>

                                <form action="{{route('deleteArticle', ['id' => $petCare['id']])}}" method="post">
                                  @csrf
                                  @method("DELETE")
                                  <button type="submit" value="Delete" name="submit" class="btn text-uppercase fw-bold" style="color:#FF2E2E;" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                              </div>
                            </div>
                          </div>
                        @endif
                        <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; width: 100%; border-radius: 0 0 10px 10px;">
                          <h2 style="margin: 0; color: white">{{ $petCare->title }}</h2>
                          <a href="{{ route('article', ['id' => $petCare->id]) }}" style="color: white; background-color: #8cc1fc; padding: 5px; border-radius: 5px; text-decoration: none; font-size: 15px">Read More</a>
                        </div>
                      </div>
                      
                    </div>
                    
                  @endforeach
                
                </div>
                
                
                 
              </div>
              <div class="Health">
                <p class="headTitle fw-bold">Health and Wellness</p>
                <div class="wrapper" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
                  @foreach( $healthAndWellnessArticles  as $petCare)
                   
                    <div class="item" style="position: relative; flex: 0 0 auto; width: 390px; height: 350px; margin-right: 10px;">
                      <div style="position: absolute; top: 0; left: 0;">
                        <img src="{{ asset($petCare->image) }}" class="d-block w-100" alt="..." style="border-radius: 10px; height:300px; object-fit:cover">
                        @if(Auth::check() && (Auth::user()->usertype == 'AnimalShelter' && Auth::user()->name == $petCare->author))
                          <div style="position: absolute; top: 5px; right: 5px;">
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none;">
                                <i class="fas fa-ellipsis-h" style="color: white; font-size: 1.5em;"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/petcare/editArticle/{{$petCare['id'] }}" style="text-transform: uppercase; font-weight: bold;">Edit</a>

                                <form action="{{route('deleteArticle', ['id' => $petCare['id']])}}" method="post">
                                  @csrf
                                  @method("DELETE")
                                  <button type="submit" value="Delete" name="submit" class="btn text-uppercase fw-bold" style="color:#FF2E2E;" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                              </div>
                            </div>
                          </div>
                        @endif
                        <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; width: 100%; border-radius: 0 0 10px 10px;">
                          <h2 style="margin: 0; color: white">{{ $petCare->title }}</h2>
                          <a href="{{ route('article', ['id' => $petCare->id]) }}" style="color: white; background-color: #8cc1fc; padding: 5px; border-radius: 5px; text-decoration: none; font-size: 15px">Read More</a>
                        </div>
                      </div>
                      
                    </div>
                    
                  @endforeach
                
                </div>
                
                
                 
              </div>
              <div class="Adopt">
                <p class="headTitle fw-bold">Adopting and Fostering</p>
                <div class="wrapper" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
                  @foreach( $adoptingAndFosteringArticles as $petCare)
                   
                    <div class="item" style="position: relative; flex: 0 0 auto; width: 390px; height: 350px; margin-right: 10px;">
                      <div style="position: absolute; top: 0; left: 0;">
                        <img src="{{ asset($petCare->image) }}" class="d-block w-100" alt="..." style="border-radius: 10px; height:300px; object-fit:cover">
                        @if(Auth::check() && (Auth::user()->usertype == 'AnimalShelter' && Auth::user()->name == $petCare->author))
                          <div style="position: absolute; top: 5px; right: 5px;">
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none;">
                                <i class="fas fa-ellipsis-h" style="color: white; font-size: 1.5em;"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/petcare/editArticle/{{$petCare['id'] }}" style="text-transform: uppercase; font-weight: bold;">Edit</a>

                                <form action="{{route('deleteArticle', ['id' => $petCare['id']])}}" method="post">
                                  @csrf
                                  @method("DELETE")
                                  <button type="submit" value="Delete" name="submit" class="btn text-uppercase fw-bold" style="color:#FF2E2E;" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                              </div>
                            </div>
                          </div>
                        @endif
                        <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; width: 100%; border-radius: 0 0 10px 10px;">
                          <h2 style="margin: 0; color: white">{{ $petCare->title }}</h2>
                          <a href="{{ route('article', ['id' => $petCare->id]) }}" style="color: white; background-color: #8cc1fc; padding: 5px; border-radius: 5px; text-decoration: none; font-size: 15px">Read More</a>
                        </div>
                      </div>
                      
                    </div>
                    
                  @endforeach
                
                </div>
                
                
                 
              </div>
              
      </div>
      <script>
      
     

   

    </div>
  </div>
  
@endsection