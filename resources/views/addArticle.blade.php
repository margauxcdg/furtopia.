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

    <div class="addArticle">
        <form method="POST" action="{{route('storeArticle')}}" enctype="multipart/form-data">
            @csrf
            <div style="display: flex; flex-direction: column;">
                <div style="margin-bottom: 10px;">
                  <label for="title">Title</label>
                  <input type="text" id="title" name="title" required style="border: none; border-bottom: 1px solid rgb(194, 189, 189); outline: none; width: 100%;">
                </div>
                <div>
                  <label for="author">Author:</label>
                  <input type="text" id="author" name="author" required style="border: none; border-bottom: 1px solid rgb(194, 189, 189); outline: none; width: 100%;">
                </div>
              </div>
              
              <div style="margin-bottom: 10px;">
                <label for="category">Category:</label>
                <select id="category" name="category" required style="border: none; border-bottom: 2px solid  rgb(194, 189, 189); outline: none; width: 100%; padding: 5px; margin-bottom: 10px;">

                  <option value="">Select a category</option>
                  <option value="Training and Behavior">Training and Behavior</option>
                  <option value="Nutrition and Feeding">Nutrition and Feeding</option>
                  <option value="Grooming and Hygiene">Grooming and Hygiene</option>
                  <option value="Health and Wellness">Health and Wellness</option>
                  <option value="Adopting and Fostering">Adopting and Fostering</option>
                </select>
              </div>
              <div style="margin-bottom: 10px;">
                <label for="content">Article Content:</label>
                <textarea id="content" name="content" class="ckeditor form-control" rows="40" required style="width: 100%; border: 1px solid #ccc; padding: 10px;"></textarea>
            
                <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
                  <script type="text/javascript">
                      $(document).ready(function() {
                        $('.ckeditor').ckeditor();
                      });
                  </script>

              </div>
              <div style="margin-bottom: 10px;">
                <label for="image" class="form-label">Article Image:</label>
                <div class="input-group">
                  <div class="input-group mb-3">
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <label class="input-group-text" for="image"></label>
                  </div>
                  </div>
                  
                
                  
                </div>
              </div>
              <div>
                <button type="submit" class="btn upload-btn">Post</button>
              </div>
              
              
        </form>
    </div>
   
      
  
    
    

</div>
@endsection