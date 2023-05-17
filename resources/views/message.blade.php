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
    <script src="https://cdn.tiny.cloud/1/2nh2mwbq8appium0eyzd2wc5fwudbi6tf1hbftf4vsu0jh42/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js" integrity="sha512-fqz2E8Gg/N7h9PfMWYwkH00v0yNzK8L3KZbK8fC7zB/H33t/BPuNB8GJH3k1u0L/Gw3V0+8kjB5QoB+3qF2yDg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-1k/pNvwbifgy//LyUR+TmY+eONcN01lGtJ4k4m/mOuzx/6rH2F2XdZ0MgRlqKUW/aB5pysVnLlzUP7UZG8/nDw==" crossorigin="anonymous"></script>
  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/message.css') }}" rel="stylesheet">
    <link rel=”stylesheet” href=”css/bootstrap.css”>
    <link rel=”stylesheet” href=”css/bootstrap-responsive.css”>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-dQz+QmE/j3l7+NQCUuLX5ES57+nK1lINlZz5wMEZR87T3KP+QjH4T5nV2sQc6tMQZbVg7+UR+R1V/Gj/hizG5w==" crossorigin="anonymous" />

    

    <!--Icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-fX9w5EaKQx5CnJv+gWzC1AOhd+ZKtfJBSnSYFb/r+P7VjLJyML1pMh3c3jK7+uYG9YYvfRtR49A2oGIwYPdGAw==" crossorigin="anonymous" />

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
    <div id="app">
     <!--Navbar-->
     <nav class="navbar fixed-top navbar-expand-md navbar-light">
        <!--Logo-->
        <div class="conlogo d-flex justify-content-start">
                    <div class="logo">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{asset('img/logo.png')}}" class="logo p-1">
                        </a>
                    </div>
                </div>

            <div class="container">
            
               <!-- Navbar Items-->
               <ul class="navbar-nav ms-auto d-flex align-items-center">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <svg fill="none" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M19.238 13.682l-.908.42zm.629 1.645l.996-.087zm-1.315 2.055l.339.94-.34-.94zm-13.79-3.7l-.908-.419.908.42zm-.629 1.645l-.996-.087zm1.315 2.055l-.339.94.34-.94zM6 10.776h1zm12.094.428l-.908.419.908-.42zM17 8.5v2.276h2V8.5zM7 10.776V8.5H5v2.276zM5.67 14.1l1.144-2.478-1.816-.838-1.144 2.478zm11.516-2.478l1.144 2.479 1.816-.839-1.144-2.478zm-.39 4.877H12v2h4.795v-2zM12 16.5H7.205v2H12zm6.33-2.399c.204.443.34.738.432.968s.106.317.108.344l1.993-.173a3.23 3.23 0 0 0-.244-.912 22.95 22.95 0 0 0-.473-1.065zM16.795 18.5c.465 0 .854 0 1.165-.016a3.23 3.23 0 0 0 .93-.161l-.677-1.882c-.026.01-.11.033-.358.046-.247.013-.573.013-1.06.013zm2.075-3.087a1 1 0 0 1-.657 1.028l.678 1.882a3 3 0 0 0 1.972-3.083zm-15.016-2.15a22.95 22.95 0 0 0-.473 1.065 3.229 3.229 0 0 0-.244.912l1.993.173c.002-.027.016-.114.108-.344s.228-.525.432-.968zm3.35 3.237c-.486 0-.812 0-1.059-.013-.248-.013-.332-.037-.358-.046l-.678 1.882c.303.109.62.144.93.16.312.017.7.017 1.166.017v-2zm-4.067-1.26a3 3 0 0 0 1.972 3.083l.678-1.882a1 1 0 0 1-.657-1.028zM5 10.776c0 .003 0 .006-.002.009l1.816.838c.122-.266.186-.555.186-.847zm12 0c0 .292.064.581.186.847l1.816-.838a.022.022 0 0 1-.002-.01h-2zM12 3.5a5 5 0 0 1 5 5h2a7 7 0 0 0-7-7zm0-2a7 7 0 0 0-7 7h2a5 5 0 0 1 5-5zM9.164 20.014a1 1 0 1 0-.328 1.972zm6 1.972a1 1 0 1 0-.328-1.972zm-6.328 0l.698.117.329-1.973-.699-.116zm5.63.117l.698-.117-.328-1.972-.699.116zm-4.932 0c1.633.272 3.3.272 4.932 0l-.329-1.973c-1.415.236-2.86.236-4.274 0z" fill="currentColor"/></svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end p-3" aria-labelledby="navbarDropdown">
                        <p class="fw-bold fs-5 m-2"> Notifications </p>
                        
                        <div class="row g-2 align-items-center">
                            <div class="col-auto">
                                <a class="dropdown-item mb-2" style="background-color:#F5F5F5; border: solid 1px #F5F5F5; border-radius:20px">
                                    @if(Auth::user()->usertype === 'AnimalShelter')
                                        <svg height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m14 21.414-5-5.001 1.413-1.413 3.587 3.586 7.585-7.586 1.415 1.415z"/><path d="m16 2a14 14 0 1 0 14 14 14 14 0 0 0 -14-14zm0 26a12 12 0 1 1 12-12 12 12 0 0 1 -12 12z"/><path d="m0 0h32v32h-32z" fill="none"/></svg>
                                        <p class="p-1 mt-2" style="display: inline-block;">Ravi Singh submitted an application</p>
                                    @elseif(Auth::user()->usertype === 'Adopter')
                                    <svg height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg" fill="orange">
                                        <path d="m14 21.414-5-5.001 1.413-1.413 3.587 3.586 7.585-7.586 1.415 1.415z"/>
                                        <path d="m16 2a14 14 0 1 0 14 14 14 14 0 0 0 -14-14zm0 26a12 12 0 1 1 12-12 12 12 0 0 1 -12 12z"/>
                                        <path d="m0 0h32v32h-32z" fill="none"/>
                                      </svg>
                                      
                                    <p class="p-1 mt-2" style="display: inline-block;">Your adoption has been approved!</p>
                                    @endif
                                  
                                  </a>
                                  <a class="dropdown-item mb-2" style="background-color:#F5F5F5; border: solid 1px #F5F5F5; border-radius:20px">
                                    @if(Auth::user()->usertype === 'AnimalShelter')
                                        <svg height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m14 21.414-5-5.001 1.413-1.413 3.587 3.586 7.585-7.586 1.415 1.415z"/><path d="m16 2a14 14 0 1 0 14 14 14 14 0 0 0 -14-14zm0 26a12 12 0 1 1 12-12 12 12 0 0 1 -12 12z"/><path d="m0 0h32v32h-32z" fill="none"/></svg>
                                        <p class="p-1 mt-2" style="display: inline-block;">Maeve submitted an application</p>
                                    @elseif(Auth::user()->usertype === 'Adopter')
                                    <svg height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg" fill="orange">
                                        <path d="m14 21.414-5-5.001 1.413-1.413 3.587 3.586 7.585-7.586 1.415 1.415z"/>
                                        <path d="m16 2a14 14 0 1 0 14 14 14 14 0 0 0 -14-14zm0 26a12 12 0 1 1 12-12 12 12 0 0 1 -12 12z"/>
                                        <path d="m0 0h32v32h-32z" fill="none"/>
                                      </svg>
                                      
                                    <p class="p-1 mt-2" style="display: inline-block;">A new pet has been posted!</p>
                                    @endif
                                  
                                  </a>
                            </div>
                          </div>
                          
                        
                    </div>
                </li>
                    <li class="nav-item" style="width:50px">
                        <a href="/messages" class="nav-link {{request()->is('messages') ? 'active' : ''}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-circle-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1" />
                                <line x1="12" y1="12" x2="12" y2="12.01" />
                                <line x1="8" y1="12" x2="8" y2="12.01" />
                                <line x1="16" y1="12" x2="16" y2="12.01" />
                            </svg>
                        </a>
                    </li>
                    
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                    @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                 <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                    @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <svg fill="none" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M19 21v-1.45c0-.977 0-1.465-.113-1.864a3 3 0 0 0-2.073-2.073c-.399-.113-.887-.113-1.864-.113h-6.9c-.977 0-1.465 0-1.864.113a3 3 0 0 0-2.073 2.073C4 18.085 4 18.573 4 19.55V21M16.2 7.06c0 2.245-1.88 4.065-4.2 4.065S7.8 9.305 7.8 7.06 9.68 2.996 12 2.996s4.2 1.82 4.2 4.064z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                </ul>

            </div>
        </div>
    </nav>
    <div class="side-inner mt-6">

        @if(Auth::check())
        <div class="profile">
           
                @if(Auth::user()->usertype === 'AnimalShelter' && Auth::user()->animalshelter && Auth::user()->animalshelter->shelter_profile)
                <img src="{{ asset('img/' . Auth::user()->animalshelter->shelter_profile) }}" alt="Profile Image" class="img-fluid">
                @elseif(Auth::user()->usertype === 'Adopter' && Auth::user()->adopter && Auth::user()->adopter->profile)
                    <img src="{{ asset('img/' . Auth::user()->adopter->profile) }}" alt="Profile Image" class="img-fluid">
                @else
                    <img src="img/User-pic.png" alt="Default Profile Image" class="img-fluid">
                @endif
           
                <h3 class="name fw-bold">{{ Auth::user()->name }}</h3>
                <p class="usertype">{{ Auth::user()->usertype }}</p>
            
        </div>
    @endif
    

         <!-- Sidebar -->
        <div class="nav-menu">
          <ul>
                <li class="nav-item list-unstyled align-items-center">
                    <a href="/home" class="nav-link {{request()->is('home') ? 'active' : ''}}"> 
                        <svg width="24" height="24" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-3">
                            <path d="M3 9.5L12 4L21 9.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M19 13V19.4C19 19.7314 18.7314 20 18.4 20H5.6C5.26863 20 5 19.7314 5 19.4V13" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                            Home
                    </a>
                </li>
               
                <li class="nav-item list-unstyled allign-items-center">
                        <a href="/petcare" class="nav-link {{request()->is('petcare') ? 'active' : ''}}"> 
                        <svg fill="none" height="24" width="24" xmlns="http://www.w3.org/2000/svg" class="me-3">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <rect height="18" rx="2" width="18" x="3" y="3"/><path d="M3 7h18M7 11.5h10M7 16h6"/>
                            </g>
                        </svg>
                            Pet Care
                        </a>
                </li>
                @if(Auth::check())
                    @if(Auth::user()->usertype == 'AnimalShelter')
                        <li class="nav-item list-unstyled allign-items-center">
                            <a href="/petgallery" class="nav-link {{request()->is('petgallery') ? 'active' : ''}}"> 
                                <i class="nav-icon fas fa-image me-3"></i> Pet Gallery
                            </a>    
                        </li>
                        <li class="nav-item list-unstyled allign-items-center">
                            <a href="/petmanagement"class="nav-link {{ request()->is('petmanagement') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-tasks me-3"></i> Pet Management
                            </a>
                        </li>
                    @endif
                @endif
            </li>
          </ul>
        </div>
      </div>
      
    </aside>
    
        <main class="py-1">
            <div class="side-message">
                <p class="mx-5 my-4 fw-bold fs-4">Messages (1) </p>
                 <div class="message-list mx-5">
                     <div class="search-message">
                         <div class="row">
                             <div class="col-sm-12">
                                 <div class="d-flex">
                                     <input class="form-control" type="search" placeholder="Search messages" aria-label="Search">
                                     <button class="search btn" type="submit">
                                         <svg fill="none" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                             <g stroke="currentColor" stroke-linecap="round" stroke-width="2">
                                             <circle cx="9.375" cy="9.375" r="6.375"/>
                                             <path d="M14.333 14.333L20 20"/>
                                             </g>
                                         </svg>
                                     </button>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="m-list mt-4">
                         <div class="row">
                             <div class="col-sm-12">
                                 <div class="message d-flex">
                                     <div class="message-avatar">
                                        @if(Auth::user()->usertype === 'AnimalShelter')
                                         <img src="img/User.png" alt="Image">
                                         @elseif(Auth::user()->usertype === 'Adopter')
                                         <img src="img/pawsandclaws.jpg" alt="Image">
                                         @endif
                                     </div>
                                     <div class="message-content">
                                        @if(Auth::user()->usertype === 'AnimalShelter')
                                         <p class="fs-4 fw-bold">Ravi Singh
                                             <span class="message-time text-right" style="margin-left: 4vh">18:30 PM</span>
                                         </p>
                                         <p class="fw-bold">Not really, as long as it's friendly...</p>
                                         
                                         @elseif(Auth::user()->usertype === 'Adopter')
                                         <p class="fs-4 fw-bold">Paws and C..
                                            <span class="message-time">18:30 PM</span>
                                        </p>
                                        <p>You:Not really, as long as it's...</p>
                                         @endif
                                     </div>
                                 </div>      
                                 <div class="message d-flex">
                                    <div class="message-avatar">
                                        <img src="img/User-pic.png" alt="Image">
                                    </div>
                                    <div class="message-content">
                                        @if(Auth::user()->usertype === 'AnimalShelter')
                                        <p class="fs-4 fw-bold">Maeve Rojas
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Hi there, I'm interested in adopting...</p>
                                        @elseif(Auth::user()->usertype === 'Adopter')
                                        <p class="fs-4 fw-bold">Animalia Ki...
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Do you have any preferences...</p>
                                        @endif

                                    </div>
                                </div>    
                                <div class="message d-flex">
                                    <div class="message-avatar">
                                        <img src="img/User-pic.png" alt="Image">
                                    </div>
                                    <div class="message-content">
                                        @if(Auth::user()->usertype === 'AnimalShelter')
                                        <p class="fs-4 fw-bold">Maeve Rojas
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Hi there, I'm interested in adopting...</p>
                                        @elseif(Auth::user()->usertype === 'Adopter')
                                        <p class="fs-4 fw-bold">Animalia Ki...
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Do you have any preferences...</p>
                                        @endif

                                    </div>
                                </div>    
                                <div class="message d-flex">
                                    <div class="message-avatar">
                                        <img src="img/User-pic.png" alt="Image">
                                    </div>
                                    <div class="message-content">
                                        @if(Auth::user()->usertype === 'AnimalShelter')
                                        <p class="fs-4 fw-bold">Maeve Rojas
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Hi there, I'm interested in adopting...</p>
                                        @elseif(Auth::user()->usertype === 'Adopter')
                                        <p class="fs-4 fw-bold">Animalia Ki...
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Do you have any preferences...</p>
                                        @endif

                                    </div>
                                </div>    
                                <div class="message d-flex">
                                    <div class="message-avatar">
                                        <img src="img/User-pic.png" alt="Image">
                                    </div>
                                    <div class="message-content">
                                        @if(Auth::user()->usertype === 'AnimalShelter')
                                        <p class="fs-4 fw-bold">Maeve Rojas
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Hi there, I'm interested in adopting...</p>
                                        @elseif(Auth::user()->usertype === 'Adopter')
                                        <p class="fs-4 fw-bold">Animalia Ki...
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Do you have any preferences...</p>
                                        @endif

                                    </div>
                                </div>    
                                <div class="message d-flex">
                                    <div class="message-avatar">
                                        <img src="img/User-pic.png" alt="Image">
                                    </div>
                                    <div class="message-content">
                                        @if(Auth::user()->usertype === 'AnimalShelter')
                                        <p class="fs-4 fw-bold">Maeve Rojas
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Hi there, I'm interested in adopting...</p>
                                        @elseif(Auth::user()->usertype === 'Adopter')
                                        <p class="fs-4 fw-bold">Animalia Ki...
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Do you have any preferences...</p>
                                        @endif

                                    </div>
                                </div>    
                                <div class="message d-flex">
                                    <div class="message-avatar">
                                        <img src="img/User-pic.png" alt="Image">
                                    </div>
                                    <div class="message-content">
                                        @if(Auth::user()->usertype === 'AnimalShelter')
                                        <p class="fs-4 fw-bold">Maeve Rojas
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Hi there, I'm interested in adopting...</p>
                                        @elseif(Auth::user()->usertype === 'Adopter')
                                        <p class="fs-4 fw-bold">Animalia Ki...
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Do you have any preferences...</p>
                                        @endif

                                    </div>
                                </div>    
                                <div class="message d-flex">
                                    <div class="message-avatar">
                                        <img src="img/User-pic.png" alt="Image">
                                    </div>
                                    <div class="message-content">
                                        @if(Auth::user()->usertype === 'AnimalShelter')
                                        <p class="fs-4 fw-bold">Maeve Rojas
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Hi there, I'm interested in adopting...</p>
                                        @elseif(Auth::user()->usertype === 'Adopter')
                                        <p class="fs-4 fw-bold">Animalia Ki...
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Do you have any preferences...</p>
                                        @endif

                                    </div>
                                </div>    
                                <div class="message d-flex">
                                    <div class="message-avatar">
                                        <img src="img/User-pic.png" alt="Image">
                                    </div>
                                    <div class="message-content">
                                        @if(Auth::user()->usertype === 'AnimalShelter')
                                        <p class="fs-4 fw-bold">Maeve Rojas
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Hi there, I'm interested in adopting...</p>
                                        @elseif(Auth::user()->usertype === 'Adopter')
                                        <p class="fs-4 fw-bold">Animalia Ki...
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Do you have any preferences...</p>
                                        @endif

                                    </div>
                                </div>    
                                <div class="message d-flex">
                                    <div class="message-avatar">
                                        <img src="img/User-pic.png" alt="Image">
                                    </div>
                                    <div class="message-content">
                                        @if(Auth::user()->usertype === 'AnimalShelter')
                                        <p class="fs-4 fw-bold">Maeve Rojas
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Hi there, I'm interested in adopting...</p>
                                        @elseif(Auth::user()->usertype === 'Adopter')
                                        <p class="fs-4 fw-bold">Animalia Ki...
                                            <span class="message-time text-right">13:20 PM</span>
                                        </p>
                                        <p>Do you have any preferences...</p>
                                        @endif

                                    </div>
                                </div>    
                               
                             </div>
                         </div>
                     </div>
                 </div>        
             </div>
           
                <!-- Main container -->
                <div class="container2">
            
                    <!-- msg-header section starts -->
                    <div class="msg-header">
                        <div class="container1 m-3">
                            @if(Auth::user()->usertype === 'AnimalShelter')
                            <img src="img/User.png" class="msgimg">
                            <div class="active mt-3">
                                <p>Ravi Singh</p>
                            </div>
                            @elseif(Auth::user()->usertype === 'Adopter')
                            <img src="img/pawsandclaws.jpg" class="msgimg">
                            <div class="active mt-3">
                                <p>Paws and Claws</p>
                            </div>
                            @endif
                        </div>
            
            
                    </div>
                    <!-- msg-header section ends -->
            
                    <!-- Chat inbox  -->
                    <div class="chat-page">
                        <div class="msg-inbox">
                            <div class="chats">
            
                                <!-- Message container -->
                                <div class="msg-page">
            
                                    <!-- Incoming messages -->
                                    @if(Auth::user()->usertype === 'AnimalShelter')
                                    <div class="received-chats">
                                        <div class="received-chats-img">
                                            @if(Auth::user()->usertype === 'AnimalShelter')
                                            <img src="img/User.png">
                                            @elseif(Auth::user()->usertype === 'Adopter')
                                            <img src="img/pawsandclaws.jpg">
                                            @endif
                                           
            
                                        </div>
                                        <div class="received-msg">
                                            <div class="received-msg-inbox">
                                                <p>Hi there, I'm interested in adopting a pet. Can you help me find the right one?</p>
                                                <span class="time">22:06 PM | APR 30 </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Outgoing messages -->
                                    <div class="outgoing-chats">
                                        <div class="outgoing-chats-img">
                                            @if(Auth::user()->usertype === 'AnimalShelter' && Auth::user()->animalshelter && Auth::user()->animalshelter->shelter_profile)
                                            <img src="{{ asset('img/' . Auth::user()->animalshelter->shelter_profile) }}" alt="Profile Image" class="msgimg img-fluid">
                                            @elseif(Auth::user()->usertype === 'Adopter' && Auth::user()->adopter && Auth::user()->adopter->profile)
                                                <img src="{{ asset('img/' . Auth::user()->adopter->profile) }}" alt="Profile Image" class="img-fluid msgimg">
                                            @else
                                                <img src="img/User-pic.png" alt="Default Profile Image" class="img-fluid msgimg">
                                            @endif
            
                                        </div>
                                        <div class="outgoing-msg">
                                            <div class="outgoing-chats-msg">
                                                <p class="multi-msg">Absolutely! We have a variety of pets available for adoption. 
                                                </p>
                                                <p class="multi-msg">Can you tell me a bit about what you're looking for?</p>
            
            
                                                <span class="time">13:45 PM | May 1 </span>
                                            </div>
                                        </div>
                                    </div>

                                    @elseif(Auth::user()->usertype === 'Adopter')
                                    <div class="outgoing-chats">
                                        <div class="outgoing-chats-img">
                                            @if(Auth::user()->usertype === 'AnimalShelter' && Auth::user()->animalshelter && Auth::user()->animalshelter->shelter_profile)
                                            <img src="{{ asset('img/' . Auth::user()->animalshelter->shelter_profile) }}" alt="Profile Image" class="msgimg img-fluid">
                                            @elseif(Auth::user()->usertype === 'Adopter' && Auth::user()->adopter && Auth::user()->adopter->profile)
                                                <img src="{{ asset('img/' . Auth::user()->adopter->profile) }}" alt="Profile Image" class="img-fluid msgimg">
                                            @else
                                                <img src="img/User-pic.png" alt="Default Profile Image" class="img-fluid msgimg">
                                            @endif
            
                                        </div>
                                        <div class="outgoing-msg">
                                            <div class="outgoing-chats-msg">
                                                <p>Hi there, I'm interested in adopting a pet. Can you help me find the right one?</p>
                                                <span class="time">22:06 PM | APR 30 </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="received-chats">
                                        <div class="received-chats-img">
                                            @if(Auth::user()->usertype === 'AnimalShelter')
                                            <img src="img/User.png">
                                            @elseif(Auth::user()->usertype === 'Adopter')
                                            <img src="img/pawsandclaws.jpg">
                                            @endif
                                           
            
                                        </div>
                                        <div class="received-msg">
                                            <div class="received-msg-inbox">
                                                
                                                <p class="multi-msg">Absolutely! We have a variety of pets available for adoption. 
                                                </p>
                                                <p class="multi-msg">Can you tell me a bit about what you're looking for?</p>
            
            
                                                <span class="time">13:45 PM | May 1 </span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif


                                    @if(Auth::user()->usertype === 'AnimalShelter')
                                    <div class="received-chats">
                                        <div class="received-chats-img">
                                            @if(Auth::user()->usertype === 'AnimalShelter')
                                            <img src="img/User.png">
                                            @elseif(Auth::user()->usertype === 'Adopter')
                                            <img src="img/pawsandclaws.jpg">
                                            @endif
                                        
            
            
                                        </div>
                                        <div class="received-msg">
                                            <div class="received-msg-inbox">
                                                <p class="single-msg"> I'm looking for a small dog or a cat. I live in an apartment, so it can't be too big.</p>
                                                <span class="time">14:01 PM | May 1 </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="outgoing-chats">
                                        <div class="outgoing-chats-img">
                                            @if(Auth::user()->usertype === 'AnimalShelter' && Auth::user()->animalshelter && Auth::user()->animalshelter->shelter_profile)
                                            <img src="{{ asset('img/' . Auth::user()->animalshelter->shelter_profile) }}" alt="Profile Image" class="img-fluid">
                                            @elseif(Auth::user()->usertype === 'Adopter' && Auth::user()->adopter && Auth::user()->adopter->profile)
                                                <img src="{{ asset('img/' . Auth::user()->adopter->profile) }}" alt="Profile Image" class="img-fluid">
                                            @else
                                                <img src="img/User-pic.png" alt="Default Profile Image" class="img-fluid msgimg">
                                            @endif
            
                                        </div>
                                        <div class="outgoing-msg">
                                            <div class="outgoing-chats-msg">
                                                <p>Great, we have plenty of small dogs and cats available. Do you have any preference on color or age?</p>
            
                                                <span class="time">18:28 PM | May 1 </span>
                                            </div>
                                        </div>
                                    </div>

                                    @elseif(Auth::user()->usertype === 'Adopter')
                                    <div class="outgoing-chats">
                                        <div class="outgoing-chats-img">
                                            @if(Auth::user()->usertype === 'AnimalShelter' && Auth::user()->animalshelter && Auth::user()->animalshelter->shelter_profile)
                                            <img src="{{ asset('img/' . Auth::user()->animalshelter->shelter_profile) }}" alt="Profile Image" class="img-fluid">
                                            @elseif(Auth::user()->usertype === 'Adopter' && Auth::user()->adopter && Auth::user()->adopter->profile)
                                                <img src="{{ asset('img/' . Auth::user()->adopter->profile) }}" alt="Profile Image" class="img-fluid">
                                            @else
                                                <img src="img/User-pic.png" alt="Default Profile Image" class="img-fluid msgimg">
                                            @endif
            
                                        </div>
                                        <div class="outgoing-msg">
                                            <div class="outgoing-chats-msg">
                                               
                                                <p class="single-msg"> I'm looking for a small dog or a cat. I live in an apartment, so it can't be too big.</p>
                                                <span class="time">14:01 PM | May 1 </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="received-chats">
                                        <div class="received-chats-img">
                                            @if(Auth::user()->usertype === 'AnimalShelter')
                                            <img src="img/User.png">
                                            @elseif(Auth::user()->usertype === 'Adopter')
                                            <img src="img/pawsandclaws.jpg">
                                            @endif
                                        
            
            
                                        </div>
                                        <div class="received-msg">
                                            <div class="received-msg-inbox">
                                                <p>Great, we have plenty of small dogs and cats available. Do you have any preference on color or age?</p>
            
                                                <span class="time">18:28 PM | May 1 </span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    @if(Auth::user()->usertype === 'AnimalShelter')
                                    <div class="received-chats">
                                        <div class="received-chats-img">
                                            @if(Auth::user()->usertype === 'AnimalShelter')
                                            <img src="img/User.png">
                                            @elseif(Auth::user()->usertype === 'Adopter')
                                            <img src="img/pawsandclaws.jpg">
                                            @endif
                                            
            
                                        </div>
                                        <div class="received-msg">
                                            <div class="received-msg-inbox">
                                               
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(Auth::user()->usertype === 'Adopter')
                                    <div class="outgoing-chats">
                                        <div class="outgoing-chats-img">
                                            @if(Auth::user()->usertype === 'AnimalShelter' && Auth::user()->animalshelter && Auth::user()->animalshelter->shelter_profile)
                                            <img src="{{ asset('img/' . Auth::user()->animalshelter->shelter_profile) }}" alt="Profile Image" class="img-fluid">
                                            @elseif(Auth::user()->usertype === 'Adopter' && Auth::user()->adopter && Auth::user()->adopter->profile)
                                                <img src="{{ asset('img/' . Auth::user()->adopter->profile) }}" alt="Profile Image" class="img-fluid">
                                            @else
                                                <img src="img/User-pic.png" alt="Default Profile Image" class="img-fluid msgimg">
                                            @endif
            
                                        </div>
                                        <div class="outgoing-msg">
                                            <div class="outgoing-chats-msg">
                                               
                                                <p class="single-msg"> Not really, as long as it's friendly and good with kids.</p>
                                                <span class="time">18:30 PM | May 1 </span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    
            
            
            
                                </div>
                            </div>
            
                            <!-- msg-bottom section -->
            
            
                            <div class="msg-bottom">
            
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Write message...">
            
                                    <span class="input-group-text send-icon m-0 p-1">
                                        <button type="button" class = "btn send-message">
                                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M20.34,9.32l-14-7a3,3,0,0,0-4.08,3.9l2.4,5.37h0a1.06,1.06,0,0,1,0,.82l-2.4,5.37A3,3,0,0,0,5,22a3.14,3.14,0,0,0,1.35-.32l14-7a3,3,0,0,0,0-5.36Zm-.89,3.57-14,7a1,1,0,0,1-1.35-1.3l2.39-5.37A2,2,0,0,0,6.57,13h6.89a1,1,0,0,0,0-2H6.57a2,2,0,0,0-.08-.22L4.1,5.41a1,1,0,0,1,1.35-1.3l14,7a1,1,0,0,1,0,1.78Z"/></svg>
                                        </button> 
                                    </span>
            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
</body>
@yield('javascript')
</html>
