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
        <div class="applicant mx-5 my-3">
            <p class="fw-bold p-3 border-bottom d-inline-block" style="border-bottom: 1px solid #394889; color: #394889">About Applicant</p>
            <div class="row">
                <div class="col-md-6">
                    <p class="fw-bold px-3 text-uppercase m-0" style="font-size:30px; color:#8cc1fc">{{$adoption->adopter_name}}</p>
                    <p class=" px-3 text-uppercase m-0">{{$adoption->adopter_occupation}}, {{$adoption->adopter_age}} </p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end">
                        @if($adoption->status == 'pending')
                        <form action="{{ route('approveApplication', ['id' => $adoption->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn upload-btn me-3">Accept</button>
                        </form>
                        <form action="{{ route('declineApplication', ['id' => $adoption->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn delete-btn">Decline</button>
                        </form>
                        @elseif($adoption->status == 'approved')
                        <button type="button" class="btn upload-btn me-3">Approved</button>
                        @else
                        <button type="button" class="btn delete-btn me-3" >Declined</button>
                        @endif
                    </div>
                </div>  
            </div>
            
           
            <div class="row">
                <div class="col-md-3 mt-5">
                    <p class="px-3 m-0 fw-bold">Contact Information</p>
                    <p class="px-3 m-0">Address:</p>
                    <p class="px-3 m-0">Phone no.:</p>
                    
                </div>
                <div class="col-md-4 mt-5">
                    <p class="m-0 mt-4"></p>
                    <p class=" px-3 m-0">{{$adoption->adopter_address}}</p>
                    <p class=" px-3 m-0">{{$adoption->adopter_phone}}</p>
                </div>
            </div>
            
            <p class="fw-bold p-3 mt-5 border-bottom d-inline-block" style="border-bottom: 1px solid #394889; color: #394889">About Pet</p>
            <div class="row">
                <div class="col-md-1">
                    <img src="{{ asset('/img/' . $adoption->pet->image) }}" alt="{{ $adoption->pet->name }}" style="width: 100px; height:100px; object-fit:cover; border-radius:50px">    
                </div>
                <div class="col-md-6">
                    <p class="fw-bold px-3 text-uppercase m-0" style="font-size:30px; color:#8cc1fc">{{$adoption->pet->name}}</p>
                    <p class=" px-3 m-0">{{$adoption->pet->age}} </p>
                </div>
            </div>
        </div>
    </div>
    
    

</div>
@endsection