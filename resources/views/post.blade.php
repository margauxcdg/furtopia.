@extends('layouts.app')

@section('content')
    <div class="container">
        <!--Search Bar-->
        <div class="searchbar">
          <div class="row justify-content-end">
            <div class="col-sm-5">
              <form class="d-flex">
                <input class="form-control ms-2" type="search" placeholder="Search for pet..." aria-label="Search">
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
            <p class="text-center fs-2 fw-bold"> Post a Pet </p>
            <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-12 ">
                  <label for="image" style="cursor: pointer;" class=" d-flex justify-content-center align-items-center">
                    <img id="preview-image-before-upload"
                         src="{{ asset('/img/upload image.jpg') }}"
                         alt="preview image"
                         style="height: 50%; width:50%; object-fit: cover; border-radius:2vh "
                         class="md-12 ">
                  </label>
                  <input class="form-control @error('image') is-invalid @enderror"
                         type="file"
                         name="image"
                         accept="image/*"
                         id="image"
                         style="display:none;">
                </div> 
                <div class="col-md-12 mt-5">
                  <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" required class="form-control">
                     @error('name')
                      <div class="text-red-500">{{ $message }}</div>
                     @enderror
                </div>    
                <div class="col-md-12">
                  <select name="animal_type" id="animal_type" required class="form-select mb-2">
                    <option value="">Pet Type</option>
                    <option value="cat" @if (old('animal_type') == 'cat') selected @endif>Cat</option>
                    <option value="dog" @if (old('animal_type') == 'dog') selected @endif>Dog</option>
                  </select>
                  @error('animal_type')
                    <div class="text-red-500">{{ $message }}</div>
                  @enderror

                  <select name="gender" id="gender" required class="form-select mb-2">
                    <option value="">Gender</option>
                    <option value="Male" @if (old('gender') == 'male') selected @endif>Male</option>
                    <option value="Female" @if (old('gender') == 'female') selected @endif>Female</option>
                  </select>
                  @error('gender')
                    <div class="text-red-500">{{ $message }}</div>
                  @enderror
                  
                  <input type="text" name="age" id="age" placeholder="Age" value="{{ old('age') }}" required class="form-control">
                  @error('age')
                    <div class="text-red-500">{{ $message }}</div>
                  @enderror
                </div>  
                <div class="col-md-12">
                  <input type="text" name="color" id="color" placeholder="Pet Color" value="{{ old('color') }}" required class="form-control mb-2">
                  @error('color')
                    <div class="text-red-500">{{ $message }}</div>
                  @enderror
                </div>    
                <div class="col-md-12">
                  <textarea name="description" id="description" rows="4" placeholder="Pet Description" class="form-control">{{ old('description') }}</textarea>
                  @error('description')
                    <div class="text-red-500">{{ $message }}</div>
                  @enderror
                </div>        
              </div>
              <div class="col-md-12 mt-2 text-center">
                <button type="submit" class="btn upload-btn">Post</button>
              </div>
            </div>
            </form>
          </div>
        </div>
    
  
    
   
       
      
    </div>
@endsection
@section('javascript')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
  $('#image').change(function() {
    let reader = new FileReader();
    reader.onload = (e) => {
  $('#preview-image-before-upload').attr('src', e.target.result);
  }
    reader.readAsDataURL(this.files[0]);
  });
});

$(document).ready(function() {
  $('#preview-image-before-upload').click(function() {
    $('#image').click();
  });
});
</script>
@endsection


