@extends('layouts.app')

@section('content')
<div class="container">
    <!--Search Bar-->
    <div class="searchbar">
        <div class="row justify-content-end">
            <div class="col-sm-5">
            <form class="d-flex" action="{{ route('searchresults') }}" method="GET">
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

    <div class="applicationlist">
        <div class="head text-center">
            <div class="text mx-4">
                <div class="row">
                    <div class="col-md-1">
                        <p class="pt-3">Applicant No.</p>
                    </div>
                    <div class="col-md-4">
                        <p class="pt-4">Applicant Name</p>
                    </div>
                    <div class="col-md-3">
                        <p class="pt-4">Date</p>
                    </div>
                    <div class="col-md-2">
                        <p class="pt-4">Pet</p>
                    </div>
                    <div class="col-md-2">
                        <p class="pt-4">Status</p>
                    </div>
                </div>
            </div>    
        </div>
        <div class="list">
            @foreach($adoption as  $key => $adoption)
            <div class="text mx-3">
                <div class="row" style="background-color: {{ $key % 2 == 0 ? 'rgba(255, 140, 0, 0.2)' : 'white' }}">
                    <div class="row">
                        <div class="col-md-1 text-center">
                            <p>{{$adoption->id}}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p>{{$adoption->adopter_name}}</p>
                        </div>
                        <div class="col-md-3 text-center">
                            <p>{{ $adoption->created_at->format('M j, Y') }}</p>
                        </div>
                        <div class="col-md-2 text-center">
                            <p>{{ $adoption->pet->name }}</p>
                        </div>
                        <div class="col-md-2 text-center">
                            <a href="{{ route('application', ['id' => $adoption->id]) }}
                                " style="color: black;">{{ ucfirst($adoption->status) }}</a>
                        </div>
                        
                        
                    </div>
                </div>
                
            </div>
            
            @endforeach
        </div>
        
        
    </div>
</div>
  

@endsection