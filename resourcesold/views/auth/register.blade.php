@extends('layouts.default')
@push('css')
    <style>
        body {
            font-family: Montserrat;
        }
        .styleContainer{
            top: 0px;
            left: 0px;
            width: 100%;
            height: auto;
            background: #1C4251 0% 0% no-repeat padding-box;
            opacity: 1;
            max-width: 100%;
        }
        .customRowArea{
            padding: 50px;
            text-align: center;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
        .customPara {
            display: inline-block;
            text-align: center;
            letter-spacing: 0px;
            color: #FFFFFF;
            opacity: 1;
            font-size: 16px;
            font-weight: 600;
        }
        .customImage{
            width: 260px;
            margin: 0 auto;
            padding-bottom: 30px;
        }
        .customInputForms{
            width: 500px;
            margin: 25px auto;
            background: #E74218 0% 0% no-repeat padding-box;
            border-radius: 0px;
            opacity: 1;
            padding: 50px 30px;
            border: 0px;
        }
        .customFomInputStyle{
            border-top: 0px;
            border-right: 0px;
            font-size: 16px;
            border-left: 0px;
            border-bottom: 2px solid #efefef;
            background: transparent;
            width: 100%;
            
        }
        .customFomInputStyle:focus{
            border-bottom: 2px solid #efefef;
            outline: transparent;
            color: #fff;
            border-bottom: 2px solid #efefef;
        }
        .customFomInputStyle:active{
            border-bottom: 2px solid #efefef;
            outline: transparent;
            color: #fff;
        }
        input {
            color: #fff;
        }
        .customButton:focus{
            outline: transparent !important;
        }
        .customButton{
            cursor: pointer;
            width: 267px;
            font-weight: 600;
            margin: 25px auto;
            background: #E74218 0% 0% no-repeat padding-box;
            border-radius: 3px;
            opacity: 1;
            padding: 13px 30px;
            border: 0px;
            color: #fff;
            font-size: 18px;
        }
        .customLocalImage{
            width: 232px;
            margin: 0 auto;
        }
        .customImageQuestionMark{
            position: absolute;
            width: 100px;
            transform: rotate(-33deg);
            top: 90px;
        }
        .customImageQuestionMark2{
            position: absolute;
            width: 100px;
            transform: rotate(33deg);
            top: 35%;
            right: 117px;
            bottom: 65%;
        }
		.custompara2 {
			color: white;
			font-size: 14px;
		}

        @media (max-width: 676px) {
            .customInputForms {
                width: 100%;
                margin: 25px auto;
                background: #E74218 0% 0% no-repeat padding-box;
                border-radius: 5px;
                opacity: 1;
                padding: 13px 30px;
                border: 0px;
            }
            .customButton {
                cursor: pointer;
                width: 100%;
                font-weight: 600;
                margin: 25px auto;
                background: #E74218 0% 0% no-repeat padding-box;
                border-radius: 3px;
                opacity: 1;
                padding: 13px 30px;
                border: 0px;
                color: #fff;
                font-size: 18px;
            }
        }
        ::placeholder {
          color: #fff;
          opacity: 1; /* Firefox */
        }
    </style>
@endpush
@section('content')
<div class="container styleContainer">
    <div class=" customRowArea">
        <img class="customImageQuestionMark" src="{{asset('images/1stpage-questionmark.png')}}" />
        <img class="customImage" src="{{asset('images/logo_clue-masters.png')}}" />
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="customInputForms">
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Enter your name" autofocus="on"  class="customFomInputStyle" style="margin-bottom: 35px;" />
                
                <input type="password" name="password" placeholder="Enter your password"   class="customFomInputStyle" style="margin-bottom: 35px;" />
                <input type="password" name="password_confirmation" placeholder="Confirm your password"   class="customFomInputStyle"  />
                
            </div>
            
            <button class="customButton" type="submit">
                <span id="textArea">{{ __('Register') }}</span>
                <i class="fa fa-refresh fa-spin" id="loader" style="display: none;"></i>
            </button>
    </form>
		<span class="custompara2">
             {{ __('common.text16') }} <a href="https://cluemasters.de/spiele/escape-spiele/" target="_blank">Online Shop</a>.
        </span>
        <img class="customImageQuestionMark2" src="{{asset('images/1stpage-questionmark.png')}}" />
        <img class="customLocalImage" src="{{asset('images/1stpage-locks.png')}}" />
    </div>
</div>
@endsection
