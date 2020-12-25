<!DOCTYPE html>
<html>

<head>
    <title>Digital Escape Room | Cluemasters</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="https://cluemasters.de/wp-content/uploads/2020/10/cropped-favicon-cluemasters-32x32.png" sizes="32x32" />
<link rel="icon" href="https://cluemasters.de/wp-content/uploads/2020/10/cropped-favicon-cluemasters-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon" href="https://cluemasters.de/wp-content/uploads/2020/10/cropped-favicon-cluemasters-180x180.png" />
<meta name="msapplication-TileImage" content="https://cluemasters.de/wp-content/uploads/2020/10/cropped-favicon-cluemasters-270x270.png" />
    <style>
        body {
            font-family: Montserrat;
        }
        html{
            background: #1C4251 0% 0% no-repeat padding-box;
        }
		.customClassRow{
			z-index:9999;
            position: absolute;
            left: 32px;
            top: 20px;
        }
    </style>
    @stack('css')
</head>
<body>
<div class="row customClassRow">
	@php
		$url = \Request::fullUrl();
		$url = str_contains($url,'game-start');
	@endphp
	@if(!$url)
    <img onclick="window.location.href='{{route('setLocale',['de'])}}'" src="{{asset('images/german.png')}}" style="cursor:pointer;width: 40px;height:40px;" />
    <img onclick="window.location.href='{{route('setLocale',['en'])}}'"  src="{{asset('images/usa.png')}}" style="cursor:pointer;width: 40px;height:40px;" />
	<img onclick="window.location.href='{{route('setLocale',['fr'])}}'"  src="{{asset('images/france.png')}}" style="cursor:pointer;width: 40px;height:40px;" />
	
	@endif

                                   
                         
</div>
                            @guest
                            
                                <a class="nav-link pull-right" style="color:#fff;" href="{{ route('login') }}">{{ __('Login') }}</a>
                            
                            @if (Route::has('register'))
                                
                                    <a class="nav-link pull-right " style="color:#fff;" href="{{ route('register') }}">{{ __('Register') }}</a>
                                
                            @endif
                        @else
                            <a id="navbarDropdown" style="color:#fff;" class="nav-link dropdown-toggle pull-right" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        
                                </div>
                                @endguest
@yield('content')


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@stack('js')
</body>
</html>
