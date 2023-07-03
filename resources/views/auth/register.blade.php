<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jV.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        
        <!--Icon-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <script>
            $(document).ready(function () {
    
            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');
    
            allWells.hide();
    
            navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                    $item = $(this);
    
            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
            });
    
            allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;
    
            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }
    
            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
            });
    
            $('div.setup-panel div a.btn-primary').trigger('click');
            });
        </script>
    </head>
    <body>
        <div class="reg-form vh-100">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-step m-5 p-5 mt-3">
                        <div class="welcome-text mt-5 pt-3 px-3 ml-3">
                            <h1>Hello!</h1>
                            <p class="mb-0">Register now and join us with our journey!</p> 
                            <p class="fs-6 mt-0 mb-5">Already have an account?
                                <a href="{{ route('login') }}" >Log in</a>
                            </p>
                        </div>    
                        <!--Step Form Progress Bar-->
                        <div class="stepw mx-5 px-5 d-flex justify-content-center">
                            <div class="stepwizard-row setup-panel mx-4 px-4" >
                                <div class="stepwizard-step ">
                                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                    <p class="fs-6 mx-4 mb-0 mt-0">Account</p>
                                    <p class="fs-6 mx-4 mt-0">Information</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-2" type="button" class="btn btn-default btn-circle">2</a>
                                    <p class="fs-6 mx-4 mb-0 mt-0">User</p>
                                    <p class="fs-6 mx-4 mt-0">Type</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-3" type="button" class="btn btn-default btn-circle">3</a>
                                    <p class="fs-6 mx-4 mb-0 mt-0">Personal</p>
                                    <p class="fs-6 mx-4 mt-0">Information</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-4" type="button" class="btn btn-default btn-circle">4</a>
                                    <p class="fs-6 mx-4 mb-0 mt-0">Upload</p>
                                    <p class="fs-6 mx-4 mt-0">Profile</p>
                                </div>
                            </div>
                        </div>
                        <!--Step Form-->
                        <form method="POST" action="{{ route('register') }}" class="register-form mt-4 px-5" enctype="multipart/form-data">
                            @csrf
                            <!--Account Information-->
                            <div class="row setup-content" id="step-1">
                                <div class="col-xs-12">
                                    <div class="col-md-12 mx-5">    
                                        <div class="form-group">
                                            <div class="col-md-9 fs-5">
                                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                            </div>
                                            <div class="col-md-10">
                                                <input id="name" type="text" class="registration form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-9 fs-5">
                                                <label for="wmail" class="form-label">{{ __('Email') }}</label>
                                            </div>
                                            <div class="col-md-10 mb-1">
                                                <input id="email" type="email" class="registration form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-9 fs-5">
                                                <label for="name" class="form-label">{{ __('Password') }}</label>
                                            </div>
                                            <div class="col-md-10 mb-1">
                                                <input id="password" type="password" class="registration form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                    
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-9 fs-5">
                                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                            </div>
                                            <div class="col-md-10">
                                                <input id="password-confirm" type="password" class="registration form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="row md-10">
                                           <div class="col-md-10 mt-4 pr-0 mr-0 d-flex justify-content-end"> 
                                                <div class="col-md-10 mt-4 pr-0 mr-0 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-primary nextBtn btn-lg" style="background-color: #8cc1fc; border:none" id="nextBtn">
                                                        {{ __('Next') }}
                                                    </button>
                                                </div>
                                               
                                                

                                              
                                            </div>
                                        </div>
                                        
                                        
                                          
                                        

                                      
                                            
                                    

                                       
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <!--User Type-->
                            <div class="row setup-content" id="step-2">
                                <div class="col-xs-12">
                                    <div class="col-md-12 mx-5">
                                        <div class="form-group">
                                            <div class="col-md-10">
                                                <select name="usertype" id="usertype" required class="form-select mb-2" required autocomplete="usertype">
                                                    <option value="">User Type</option>
                                                    <option value="AnimalShelter" @if (old('usertype') == 'AnimalShelter') selected @endif>Animal Shelter</option>
                                                    <option value="Adopter" @if (old('usertype') == 'Adopter') selected @endif>Adopter</option>
                                                </select>
                                                @error('usertype')
                                                    <div class="text-red-500">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row md-10">
                                            <div class="col-md-10 mt-4 pr-0 mr-0 d-flex justify-content-end">
                                                <div class="col-md-10 mt-4 pr-0 mr-0 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-primary nextBtn btn-lg" style="background-color: #8cc1fc; border:none" id="nextBtn">
                                                        {{ __('Next') }}
                                                    </button>
                                                </div>
                                               
                                                

                                              
                                            </div>
                                        </div>
                                    
                          
                                    </div>
                                </div>
                            </div>
                            <!--Personal Information-->
                            <div class="row setup-content" id="step-3">
                                <div class="col-xs-12">
                                    <div class="col-md-12 mx-5">
                                        <!--if Adopter -->
                                        <div class="adopter-form" id="adopter-form">
                                            <div class="form-group step_adopter">
                                                <div class="col-md-9 fs-5">
                                                    <label for="first_name" class="form-label">{{ __('First Name') }}</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input id="first_name" type="text" class="registration form-control @error('first_name') is-invalid @enderror" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>
                                                    @error('first_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group step_adopter">
                                                <div class="col-md-9 fs-5">
                                                    <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input id="last_name" type="text" class="registration form-control @error('last_name') is-invalid @enderror" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>
                                                    @error('last_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div> 
                                            <div class="form-group step_adopter">
                                                <div class="col-md-9 fs-5">
                                                    <label for="address" class="form-label">{{ __('Address') }}</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input id="address" type="text" class="registration form-control @error('address') is-invalid @enderror" placeholder="Address" name="address" value="{{ old('address') }}"  autocomplete="address" autofocus>
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group step_adopter">
                                                <div class="col-md-9 fs-5">
                                                    <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input id="phone_number" type="tel" class="registration form-control @error('phone_number') is-invalid @enderror" placeholder="Mobile No." name="phone_number" value="{{ old('phone_number') }}" autocomplete="phone_number" autofocus>
                                                    @error('phone_number')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row md-10">
                                                <div class="col-md-10 mt-4 pr-0 mr-0 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-primary nextBtn btn-lg" id="nextBtn">
                                                        {{ __('Next') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        
                                        <!--if Animal Shelter -->
                                        <div class="shelter-form" id="shelter-form">
                                            <div class="form-group step_animal_shelter">
                                                <div class="col-md-9 fs-5">
                                                    <label for="shelter_name" class="form-label">{{ __('Shelter Name') }}</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input id="shelter_name" type="text" class="registration form-control @error('shelter_name') is-invalid @enderror" placeholder="Shelter Name" name="shelter_name" value="{{ old('shelter_name') }}" autocomplete="shelter_name" autofocus>
                                                    @error('shelter_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group step_animal_shelter">
                                                <div class="col-md-9 fs-5">
                                                    <label for="shelter_address" class="form-label">{{ __('Address') }}</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input id="shelter_address" type="text" class="registration form-control @error('shelter_address') is-invalid @enderror" placeholder="Address" name="shelter_address" value="{{ old('shelter_address') }}"  autocomplete="shelter_address" autofocus>
                                                    @error('shelter_address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group step_animal_shelter">
                                                <div class="col-md-9 fs-5">
                                                    <label for="shelter_number" class="form-label">{{ __('Contact No.') }}</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input id="shelter_number" type="tel" class="registration form-control @error('shelter_number') is-invalid @enderror" placeholder="Contact No." name="shelter_number" value="{{ old('shelter_number') }}" autocomplete="shelter_number" autofocus>
                                                    @error('shelter_number')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group step_animal_shelter">
                                                <div class="col-md-9 fs-5">
                                                    <label for="shelter_type" class="form-label">{{ __('Type of Shelter') }}</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <select name="shelter_type" id="shelter_type" class="form-select mb-2" autocomplete="shelter_type">
                                                        <option value="">Shelter Type</option>
                                                        <option value="municipal" @if (old('shelter_type') == 'muncipal') selected @endif>Municipal</option>
                                                        <option value="private" @if (old('shelter_type') == 'private') selected @endif>Private</option>
                                                        <option value="nonprofit" @if (old('shelter_type') == 'nonprofit') selected @endif>Non-Profit</option>
                                                        
                                                    </select>
                                                    @error('user_type')
                                                        <div class="text-red-500">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row md-10">
                                                <div class="col-md-10 mt-4 pr-0 mr-0 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-primary nextBtn btn-lg" style="border:none; background-color:#8cc1fc"id="nextBtn">
                                                        {{ __('Next') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function () {
                                  $('.shelter-form').hide();
                                  $('.adopter-form').hide();
                                  
                                  $('#usertype').on('change', function () {
                                    var selectedRole = $(this).val();
                                    if (selectedRole === 'Adopter') {
                                      $('.shelter-form').hide();
                                      $('.adopter-form').show();
                                     
                                    } else if (selectedRole === 'AnimalShelter') {
                                      $('.adopter-form').hide();
                                      $('.shelter-form').show();
                                     
                                    }
                                  });
                                });
                                </script>
                                 
                            <!--Uplod Profile-->
                            <div class="row setup-content justify-content-center" id="step-4">
                                <div class="col-xs-12">
                                 
                                    <label for="image" style="cursor: pointer;" class=" d-flex justify-content-center align-items-center">
                                      <img id="preview-image-before-upload"
                                           src="{{ asset('/img/upload image.jpg') }}"
                                           alt="preview image"
                                           style="width:50%; object-fit: cover; border-radius:2vh "
                                           class="md-12 ">
                                    </label>
                                    <input class="form-control @error('image') is-invalid @enderror"
                                           type="file"
                                           name="image"
                                           accept="image/*"
                                           id="image"
                                           style="display:none">
                               
                                </div>          
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
                                </script>
                                <div class="row md-8">
                                  <div class="row md-12">
                                    <div class="col-md-12 mt-4 text-center">
                                      <button type="submit" class="btn reg-btn text-uppercase fs-5 fw-bold text-white px-3 py-2">
                                        {{ __('Register') }}
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                        
                        </form>      
                    </div>
                </div>  
                <div class="col-md-6">
                    <div class="registerdesign d-flex align-items-center no" style="background-image: url('{{asset('img/BG Paws.png')}}')";>
                        <img src="{{asset('img/Reg-Dog.png')}}" class="img-fluid d-flex vh-100"style="object-fit: cover; text-align:center">
                        
                    </div>
                </div> 
            </div>
        </div>
    </body>
</html>