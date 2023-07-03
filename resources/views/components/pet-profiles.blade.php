<div class="pet-profile">
    <div class="con container-fluid py-4">
        <div class="row row-cols-6 gap-5" id="pet-post">
            @foreach ($pets as $pets)
            <a href="{{ route('profile', ['id' => $pets->id]) }}" class="text-decoration-none text-dark">
                <div class="card col p-2 cardcontainer" data-type="{{$pets->animal_type}}">
                    <img src="{{asset('img/'.$pets->image)}}" class="card-img-top d-flex" alt="{{ $pets->name }}">
                    <div class="card-body m-0 pt-0 p-1 custome-class">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0 fw-bold fs-3"> {{ $pets->name }}
                                @if ($pets['gender'] == 'Female')
                                    <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 15C15.3137 15 18 12.3137 18 9C18 5.68629 15.3137 3 12 3C8.68629 3 6 5.68629 6 9C6 12.3137 8.68629 15 12 15ZM12 15V19M12 21V19M12 19H10M12 19H14" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                @else
                                    <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.2323 9.74707C13.1474 8.66733 11.6516 8 10 8C6.68629 8 4 10.6863 4 14C4 17.3137 6.68629 20 10 20C13.3137 20 16 17.3137 16 14C16 12.3379 15.3242 10.8337 14.2323 9.74707ZM14.2323 9.74707L20 4M20 4H16M20 4V8" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>   
                                @endif
                            </p>
         
                            <div class="btn-group" role="group">
                               
                                <button type="button" class="btn send-message ml-2 mt-1 m-0 p-0" id="messages-button">
                                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                      <path d="M20.34,9.32l-14-7a3,3,0,0,0-4.08,3.9l2.4,5.37h0a1.06,1.06,0,0,1,0,.82l-2.4,5.37A3,3,0,0,0,5,22a3.14,3.14,0,0,0,1.35-.32l14-7a3,3,0,0,0,0-5.36Zm-.89,3.57-14,7a1,1,0,0,1-1.35-1.3l2.39-5.37A2,2,0,0,0,6.57,13h6.89a1,1,0,0,0,0-2H6.57a2,2,0,0,0-.08-.22L4.1,5.41a1,1,0,0,1,1.35-1.3l14,7a1,1,0,0,1,0,1.78Z"/>
                                    </svg>
                                  </button>
                                  
                                  <script>
                                    const messagesButton = document.getElementById('messages-button');
                                    messagesButton.addEventListener('click', () => {
                                      window.location.href = '/messages';
                                    });
                                  </script>
                                  
                                  
                                <form action="{{ route('pets.like', $pets->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="like-button @if(session()->has('liked_pets') && in_array($pets->id, session()->get('liked_pets'))) liked @endif mt-2">
                                        <i class="fas fa-heart"></i></button>
                                </form>           
                            </div>
                        </div>
                        <p class="pet-color fs-6 mb-0">Color: {{ $pets->color}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="pet-age fs-6 mb-0">Age: {{ $pets->age}} </p>
                            @if(Auth::check())
                                @if(Auth::user()->usertype == 'Adopter')
                                    <form action="{{ route('adoptForm', ['pet_id' => $pets->id]) }}" method="get">
                                        <input type="hidden" name="pet_id" value="{{ $pets->id }}">
                                        <button class="btn adopt text-uppercase fw-bold fs-5" type="submit">Adopt!</button>
                                    </form>
                                    @elseif(Auth::user()->usertype == 'AnimalShelter' && $pets->user_id == Auth::user()->id)
                                        <form action="/petgallery/edit/{{$pets['id'] }}" method="get">
                                            <input type="hidden" name="pet_id" value="{{ $pets->id }}">
                                            <button class="btn adopt text-uppercase fw-bold fs-5" type="submit">Edit</button>
                                        </form>
                                @endif
                            @endif
                            
                        </div>

                    </div>
                    
                </div>
           
            @endforeach
        </div>
    </div>
</div>









   