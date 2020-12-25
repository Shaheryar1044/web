@extends('layouts.default')
@php
    $temp = isset($adventure) ? $adventure->template->image : '/public/images/escape-image.jpg';
@endphp

@push('css')
    <style>
		p{
			color: #1c4251;
			margin-top: 20px;
			margin-bottom: 0px !important;
			background: #ffffff00;
			width: 100%;	
			text-align: center;
			padding-left: 2%;
			padding-right: 2%;
			
		}
        .styleContainerBgImage{
            width: 100%;
            height: 100vh;
            opacity: 1;
            max-width: 100%;
			background-image: url('{{$temp}}') !important;
            background-repeat: no-repeat;
            background-size: cover;
            z-index: 999999;
            position: absolute;
            display: flex;
            top:0;
            left:0;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }
        #overlay {
            position: fixed; /* Sit on top of the page content */
            display: none; /* Hidden by default */
            width: 100%; /* Full width (cover the whole page) */
            height: 100%; /* Full height (cover the whole page) */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,2); /* Black background with opacity */
            z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
            cursor: pointer; /* Add a pointer on hover */
        }
        .customClassh3{
            font-size: 42px;
            color: #fff;
            font-weight: 600;
            margin-top: 30px;
            text-align: center;
        }
        .customClassh4{
            text-align: center;
            font-size: 25px;
            color: #fff;
            font-weight: 500;
        }
        .customClassh41{
            text-align: center;
            color: #fff;
            margin-top: 42px;
            font-size: 18px;
            font-weight: 600;
        }
        .customImage {
            color: #E74218;
            background: #fff;
            padding: 19px 20px;
            font-size: 35px;
            border-radius: 100px;
            border: 3px solid #E74218;
            cursor: pointer;
            margin-top: 11px;
            margin-bottom: 23px;
        }
        .customPara1{
            background: #ffffffcc;
            width: 60%;
            border-radius: 3px;
            margin-top: 40px;
			margin-bottom: 40px;
        }
        .customStyleB{
			font-weight: bold;
        }
        @media (max-width: 676px) {
            .customImage {
                color: #E74218;
                background: #fff;
                padding: 17px 20px;
                font-size: 35px;
                border-radius: 100px;
                border: 3px solid #E74218;
                cursor: pointer;
                margin-top: 0px;
            }
            .customPara1 {
                background: #ffffffcc;
                padding: 20px;
                width: 80%;
                border-radius: 3px;
                margin-top: 0px;
            }
        }
        .customBtnStart{
            color: #fff;
            padding: 12px 50px;
            border-radius: 3px;
            border: 0px;
            background: #E74218;
            font-weight: 500;
        }
        .customClassBtnRow{
            width: 90%;
			padding-top: 23px;
            text-align: center;
        }
        .customBtnStart:focus{
            outline: none !important;
        }
		p.customPara1 {
    		display: none;
		}
		#myVideo {
		  position: fixed;
		  right: 0;
		  bottom: 0;
		  min-width: 100%; 
		  min-height: 100%;
			z-index:-1;
		}
		#myBtn:focus{
			outline:none !important;
		}
    </style>
@endpush
@section('content')
    <div class="styleContainerBgImage">
        <div id="overlay">
        </div>
        <h3 class="customClassh3">{{isset($adventure) ? $adventure->template->name : ''}}</h3>
		@if($adventure->template->type == 2)
		<button id="myBtn" style="border:0px;background:transparent;border-radius:100%;" onclick="videoStartPause()">
			<i class="fa fa-play customImage" style="padding-left: 20px;"></i>
		</button>
			<video autoplay loop id="myVideo">
				<source src="{{asset($adventure->template->video)}}" type="video/mp4">
				Your browser does not support HTML5 video.
			</video>
		@else
			@if($adventure->template->audio != '')
			<h4 class="customClassh41">{{__('common.text13')}}</h4>
			<i class="fa fa-pause customImage" onclick="play_video()" id="play_video" style="padding-left: 20px;display: none;"></i>
			<i class="fa fa-play customImage" onclick="pause_video()" style="padding-left: 25px;" id="pause_video"> </i>
			@endif
		@endif
        @if(isset($adventure))
            <audio controls style="display:none;" id="myAudio">
                <source src="{{$adventure->template->audio}}" type="audio/mp3">
                Your browser does not support the audio element.
            </audio>
        @endif
        <div class="customPara1">
			<p class="customStyleB">{{__('common.text12')}}<br>
			@if($locale == 'de')
				{!!  isset($adventure->template->template_text) ? $adventure->template->template_text : '' !!}
			@elseif($locale == 'en')
				{!!  isset($adventure->template->template_text_en) ? $adventure->template->template_text_en : '' !!}
			@elseif($locale == 'fr')
				{!!  isset($adventure->template->template_text_fr) ? $adventure->template->template_text_fr : '' !!}
			@else
				{!!  isset($adventure->template->template_text) ? $adventure->template->template_text : '' !!}
			@endif
			</p></div>
        <div class="customClassBtnRow">
            <button class="customBtnStart" onclick="start_puzzle()">{{__('common.text11')}}</button>
        </div>
    </div>
@endsection
@push('js')
    <style>
        .swal-overlay{
            z-index: 999999;
        }
    </style>
    <script>
		var video = document.getElementById("myVideo");
		var btn = document.getElementById("myBtn");
		function videoStartPause() {
		  if (video.paused) {
			video.play();
			btn.innerHTML = '<i class="fa fa-play customImage" style="padding-left: 25px;"> </i>';
		  } else {
			video.pause();
			btn.innerHTML = '<i class="fa fa-pause customImage" style="padding-left: 20px;"></i>';
		  }
		}
        var x = document.getElementById("myAudio");
		console.log('aaaaaaaaa');
		console.log(x);
        function play_video() {
            x.pause();
            $('#play_video').hide();
            $('#play_video1').hide();
            $('#pause_video').show();
            $('#pause_video1').show();
        }
        function pause_video() {
            x.play();
            $('#play_video').show();
            $('#play_video1').show();
            $('#pause_video').hide();
            $('#pause_video1').hide();
        }
        function start_puzzle(){
            // swal("Success", "Challenge Started Successfully!", "success");
        	 setTimeout(() => {
				 window.location.href='/game-start/{{$adventure->event_id}}/{{$groupId}}';
            },1000);
		}
    </script>
@endpush
