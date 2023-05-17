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

  <div class="results">
      <p class="fw-bold fs-3" style="color: #394889;"> Search Results</p>
      @if(count($pets) === 0)
      <div class="center">
        <img src="img/sorry-cat.png" alt="">
        <p class="fw-bold fs-5" style="color:#d4d4d3">Sorry, we couldn't find what you were looking for.</p>
        <p style="font-size: 18px; color:#d4d4d3;">Please try again with different search terms or filters.</p>
      </div>
      @else
      
          <x-pet-profiles :pets="$pets"></x-pet-profiles>
      @endif
  </div>
</div>



   
@endsection