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
    <div class="adopt-form">
        <div class="adoptform">
            <p class="text-center fs-2 fw-bold"> Pet Adoption Form </p>
            <form method="POST" action="{{ route('adoptForm.store', ['pet_id' => $pets->id]) }}" class="adoptionform" enctype="multipart/form-data">
                    @csrf
                    <div class="petinfo">
                        <div class="row">
                            <div class="col-md-2 p-0">
                                <img src="{{ asset('img/' . $pets->image) }}" alt="{{ $pets->name}}" style="width: 75px; height: 75px; border-radius:5px; object-fit:cover;">
                            </div>
                            <div class="col-md-6 p-0">
                                <p class="shelter-name m-0 fw-bold" style="font-size: 30px;">{{ $pets->name}}</p>
                                <p class="shelter-name m-0" style="font-size: 15px;">Age: {{ $pets->age}}</p>
                                <input type="hidden" name="pet_name" value="{{ $pets->name }}">
                                <input type="hidden" name="pet_age" value="{{ $pets->age }}">
                            </div>
                        </div>   
                        <hr class="pethr">
                    </div>
                   

                      <!--Adopter's Information-->
                    <div class="content mt-3">
                        <div class="col-md-12">
                            <div class="col-md-12">    
                                <div class="form-group">
                                    <div class="col-md-9 fs-5">
                                        <label for="fullname" class="form-label">{{ __('Full Name') }}</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="adoption form-control" placeholder="Full Name" name="fullname" value="{{ old('fullname') }}" required autocomplete="fullname" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9 fs-5">
                                        <label for="address" class="form-label">{{ __('Address') }}</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="address" type="text" class="adoption form-control" placeholder="Address" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9 fs-5">
                                        <label for="phonenumber" class="form-label">{{ __('Phone Number') }}</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="phonenumber" type="tel" class="adoption form-control" placeholder="Phone Number" name="phonenumber" value="{{ old('phonenumber') }}" required autocomplete="phonenumber" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9 fs-5">
                                        <label for="age" class="form-label">{{ __('Age') }}</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="age" type="number" class="adoption form-control" placeholder="Age" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9 fs-5">
                                        <label for="occupation" class="form-label">{{ __('Occupation') }}</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="occupation" type="text" class="adoption form-control" placeholder="Occupation" name="occupation" value="{{ old('occupation') }}" required autocomplete="occupation" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row md-12">
                            <div class="col-md-12 mt-4 pr-0 mr-0 d-flex text-center">
                                <button type="submit" class="btn upload-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                 
                    
            </form>
        </div>
      
    </div>
    
    

</div>
@endsection