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
    

    <div class="ctgry">
        <p class="fw-bold fs-3" style="color: #394889;">Categories</p>
        <!--Categories Button-->
        <form method="get" action="{{ route('home') }}">
            <div class="btnCategory">
                <div class="btnCategory">
                  <button type="submit" name="category" value="" class="{{ empty($category) ? 'selected' : '' }}">All</button>
                  <button type="submit" name="category" value="Cat" class="{{ $category == 'Cat' ? 'selected' : '' }}">Cats</button>
                  <button type="submit" name="category" value="Dog" class="{{ $category == 'Dog' ? 'selected' : '' }}">Dogs</button>
                </div>
            </div>
        </form>

        <x-pet-profiles :pets="$pets"></x-pet-profiles>
        <div class="pagination m-4" style="display:flex; justify-content: flex-end;">
            {{ $pets->links() }}
        </div>
        
       
        <script>
            $(document).ready(function() {
                // Show all animal posts by default
                $('#pet-post').children().show();
    
                // Listen for click events on filter buttons
                $('.btnCategory button').click(function() {
                    var filter = $(this).data('target');
    
                    // Show only the animal posts with matching data-type attribute
                    $('#pet-post').children().hide();
                    $('#pet-post').find('[data-type="' + filter + '"]').show();
                });
            });
        </script>
    </div>
</div>

  
@endsection
