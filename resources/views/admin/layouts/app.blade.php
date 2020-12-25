<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
	<link rel="icon" href="{{asset('images/cropped-favicon-cluemasters-180x180.png')}}" type="image/gif" sizes="16x16">
    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    @stack('styles')

</head>
<style>
    img, svg {
        vertical-align: middle;
        margin-left: -136px;
}
button, select {
    text-transform: none;
    background-color: white;
    padding-left: 30px;
    padding-right: 30px;
    border-radius: 4px;
    height: 34px;
    margin: 0px;
    border-color: #c6d4da;
    border-style: double;
    position: relative;
    top: 10px;
    margin-right: 54px;
}
.customButton{
    text-transform: none;
    background-color: white;
    padding-left: 30px;
    padding-right: 30px;
    border-radius: 4px;
    height: 34px;
    margin: 0px;
    border-color: #c6d4da;
    border-style: double;
    position: relative;
    top: 10px;
    margin-right: 45px;
}
.customButtonId{
    text-transform: none;
    background-color: white;
    padding-left: 30px;
    padding-right: 30px;
    border-radius: 4px;
    height: 34px;
    margin: 0px;
    border-color: #c6d4da;
    border-style: double;
    position: relative;
    top: 10px;
    margin-right: 20px;
}
	#navbarSupportedContent{
		display:flex !important;
	}
	.mce-notification-warning *, .mce-notification-warning .mce-progress .mce-text{
		display:none;
	}
	.mce-notification-warning *, .mce-notification-warning .mce-progress .mce-text{
		display:none !important
	}
	.dropdown-toggle:after{
			display:none !important;
		}
.customContainer{
max-width: 100% !important;
}
.customRow{
    justify-content: end !important;
}
.card-header:first-child {
    border: 0px;
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
    background: #fff;
    font-weight: bold;
    font-size: 20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
.addBox {
    height: 150px;
    border: 1px solid #c0c0c0;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    flex-direction: column;
}
#label {
    cursor: pointer;
    padding: 7px 25px;
    border: 1px solid #c0c0c0;
    border-radius: 6px;
}
#pp{
    font-weight: bold;
    margin: 0px;
}
#upload-photo {
   opacity: 0;
   position: absolute;
   z-index: -1;
}
#navbarDropdown:focus{
    outline: transparent !important;
}
.customButton:focus{
    outline: transparent !important;
}
.customButtonId:focus{
    outline: transparent !important;
}
.customBtnClass{
    background: transparent;
                        border: 1px solid rgb(192, 192, 192);
                        padding: 6px 50px;
}
.customContainerS{
	max-width:100%;
	}
.timediv {
    background-color: white;
    display: inline-flex;
    border: 1px solid #ccc;
    color: #555;
  }
  
  .timeinput {
    border: none;
    color: #555;
    text-align: center;
    width: 60px;
  }

</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container customContainerS">
                <img src="{{asset('public/images/logo.png')}}" style=" margin-left:0px;" />
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                         <li class="nav-item dropdown">
                                <button id="navbarDropdown" style="    text-transform: none;
                                background-color:white;
                                padding-left:30px;
                                padding-right:30px;
                                border-radius:4px;
                                height:34px;
                                display:flex;
                                align-items:center;
                                color:#000;
                                margin:0px;
                                border-color:#c6d4da;
                                border-style:double;
                                position: relative;
                                top: 10px;
                                margin-right: 45px;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Template <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" onclick="window.location.href='{{ route('templates') }}'" href="#">Main Template</a>
                                    <a class="dropdown-item" onclick="window.location.href='{{ route('templateEditions') }}'" href="#">
                                    Template Edition
                                    </a>
									<a class="dropdown-item" onclick="window.location.href='{{ route('indexfinalTemplate') }}'" href="#">
                                    Final Template
                                    </a>    
                                </div>
                            </li>
                        <button onclick="window.location.href='{{route('challenges')}}'" class="customButton">Challenge</button>
                        <button class="customButtonId" onclick="window.location.href='{{route('adventures')}}'">Adventure</button>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                            </li>
                        
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @yield('js')
</body>
</html>
