@extends('layouts.app')

@section('content')
<div class="container">
    <!--Search Bar-->
    <div class="searchbar">
        <div class="row justify-content-end">
          <div class="col-sm-5">
            <form class="d-flex"action="{{ route('searchresults') }}" method="GET">
              <input class="form-control ms-2" name="query" type="search" placeholder="Search for pet..." aria-label="Search">
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

    <a href="{{ url()->previous() }}" class="btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 8 8 12 12 16"></polyline><line x1="16" y1="12" x2="8" y2="12"></line></svg>
    </a>
    <div class="gallery">
        <div class="row justify-content-center">
          <div class="category">
           <P class="fw-bold" style="color: #8cc1fc; text-decoration: underline">{{ $petCare->category }}</P> 
          </div>
          <div class="articleTitle text-center">
            <h1 style="font-size:50px">{{ $petCare->title }}</h1>
          </div>
          
            <div class="col-md-8">
              <p class="text-center">By {{ $petCare->author }} </p>
              <div class="article-image" >
                  <img src="{{ asset($petCare->image) }}" class="img-fluid mb-3 justify-content-between" alt="{{ $petCare->title }}" style="height:500px; object-fit:cover">
              </div>
            
            
              <div class="articleBody mt-3">
                <div class="article-content">
                  {!! $petCare->content !!}
                </div>
              </div>
                

                  
            </div>
        </div>

    </div>
  </div>
  
@endsection