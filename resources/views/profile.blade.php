@php
    $isActive = request()->is('home');
@endphp
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
    <div class="profile">
        <div class=row>
            <div class="col-md-6">
                <div class="img-pet">
                    <img src="{{asset('img/'.$pets->image)}}" class="card-img-top d-flex " alt="{{ $pets->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="pet-details mx-3 mt-3">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="pet-name fw-bold">
                                {{ $pets->name }}
                                <span class="gemder">
                                    @if ($pets['gender'] == 'Female')
                                    <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 15C15.3137 15 18 12.3137 18 9C18 5.68629 15.3137 3 12 3C8.68629 3 6 5.68629 6 9C6 12.3137 8.68629 15 12 15ZM12 15V19M12 21V19M12 19H10M12 19H14" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                @else
                                    <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.2323 9.74707C13.1474 8.66733 11.6516 8 10 8C6.68629 8 4 10.6863 4 14C4 17.3137 6.68629 20 10 20C13.3137 20 16 17.3137 16 14C16 12.3379 15.3242 10.8337 14.2323 9.74707ZM14.2323 9.74707L20 4M20 4H16M20 4V8" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>   
                                @endif
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <p class="mb-0 petdetails">Age</p>
                            <p class="mt-0 pt-0 fs-6">{{ $pets->age }}</p>
                        </div>
                        <div class="col-md-2 text-center">
                            <p class="mb-0 petdetails">Color</p>
                            <p class="mt-0 fs-6">{{ $pets->color }}</p>
                        </div>
                        <div class="col-md-1 mt-1">
                            <form action="{{ route('pets.like', $pets->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="like-button @if(session()->has('liked_pets') && in_array($pets->id, session()->get('liked_pets'))) liked @endif mt-2">
                                    <i class="fas fa-heart"></i></button>
                            </form>   
                        </div>
                        <div class="col-md-1 mt-2">
                            <a href="/messages" class="send-message ml-2 mt-2 m-0 p-0 btn">
                               
                                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M20.34,9.32l-14-7a3,3,0,0,0-4.08,3.9l2.4,5.37h0a1.06,1.06,0,0,1,0,.82l-2.4,5.37A3,3,0,0,0,5,22a3.14,3.14,0,0,0,1.35-.32l14-7a3,3,0,0,0,0-5.36Zm-.89,3.57-14,7a1,1,0,0,1-1.35-1.3l2.39-5.37A2,2,0,0,0,6.57,13h6.89a1,1,0,0,0,0-2H6.57a2,2,0,0,0-.08-.22L4.1,5.41a1,1,0,0,1,1.35-1.3l14,7a1,1,0,0,1,0,1.78Z"/>
                                    </svg>
                                
                            </a>
                        </div>
                        
                        
                        
                    </div>
                    <hr class="pethr mt-0">
                    <div class="shelter-details">
                        <div class="row">
                            <div class="col-md-1">
                                <img src="{{ asset('img/' . $pets->user->animalshelter->shelter_profile) }}" alt="{{ $pets->user->name }}" style="width: 45px; height: 45px; border-radius:20px">
                            </div>
                            <div class="col-md-6">
                                <p class="shelter-name m-0 fw-bold" style="font-size: 16px;">{{ $pets->user->animalshelter->shelter_name}}</p>
                                <p class="shelter-address m-0" style="font-size: 14px;">{{ $pets->user->animalshelter->shelter_address}}</p>
                            </div>  
                        </div>   
                    </div>
                    <div class="pet-description mt-3">
                        <p style="text-align: justify;">{{ $pets->description}}</p>
                    </div>
                    <div class="d-flex justify-content-end m-1">
                        @if(Auth::check())
                            @if(Auth::user()->usertype == 'Adopter')
                            <a href="{{ route('adoptForm', ['pet_id' => $pets->id]) }}" class="btn adopt text-uppercase fw-bold {{ $isActive ? 'active' : '' }}" style="padding: 0 2vh 0 2vh; font-size: 20px">Adopt!</a>
                            @elseif(Auth::user()->usertype == 'AnimalShelter' && $pets->user_id == Auth::user()->id)
                                <div class="d-flex gap-2">
                                    <a href="/petgallery/edit/{{$pets['id'] }}" class="btn adopt text-uppercase fw-bold" style="padding: 0 2vh 0 2vh; font-size:20px">Edit</a>
                                    <form action="{{route('delete', ['id' => $pets['id']])}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" value="Delete" name="submit" class="btn adopt text-uppercase fw-bold" style="padding: 0 2vh 0 2vh; font-size:20px; background-color:#FF2E2E;" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                </div>

                              
                                
                            @endif
                        @endif
                    </div>
                </div>  
            </div>
        </div>
        <hr class="pethr">
        <div class="similar">
            @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        
        </div>
    </div>

</div>
@endsection