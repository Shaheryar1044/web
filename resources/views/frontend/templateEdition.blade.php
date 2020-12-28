@extends('layouts.default')
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@push('css')
     <link rel="stylesheet" href="{{asset('public/assets/screen4.css')}}">
<link href="{{asset('public/mdb.css')}}" rel="stylesheet">
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('public/css/jquery.jqZoom.css')}}" type="text/css"/>
<style>
	html{
		background:url('{{$adventure->edition->image}}');
		background-repeat:no-repeat;
		background-size:cover;
	}
	#body_screen4{
		height: -webkit-fill-available !important;
	}
	.viewer-box{
		left:420px !important;
	}
	.loop-section {
		background: rgb(255 255 255 / 79%) !important;
		min-height: fit-content !important;
		max-height: fit-content !important;
		padding-bottom: 14px;
	}
	.main-text-challenge {
		display: flex;
		align-items: center;
		margin-bottom: 10px;
	}
	.MsoNormal {
		font-size: 17px;
		font-family: 'Segoe UI Regular';
		font-weight: bold;
		display: block !important;
	}
	.main-text-challenge{

	}
	.img-fluid {
		height: auto;
		max-width: 1024px;
	}
	.main-section-para{
		font-size: 17px;
	}
	.zoom-box {
		width:100% !important;
	}
	@media screen and (max-width: 2000px) and (min-width: 500px) {
		#value1, #value2, #value3 {
			bottom: 10rem !important;
		}
	}
	@media screen and (max-width: 1049px) and (min-width: 991px) {
		.classImage {
			padding-bottom: 20px;
		}
	}
	@media (max-width:2000px) and (min-width:1500px) {
		.zoom-box img {
			vertical-align: bottom;
			margin-bottom: 20px;
			height: 440px;
			object-fit: fill;
			width: 740px;
		}
	}
	@media (max-width:991px) {
		#value1, #value2, #value3 {
			bottom: -10rem;
		}
		.main-text-challenge {
			text-align: left;
		}
		.main-section-para {
			font-family: 'Segoe UI REGULAR';
			font-size: 16px;
			font-weight: 600 !important;
			margin-top: 2px !important;
		}
		.MsoNormal {
			font-size: 14px;
			font-family: 'Segoe UI Regular';
			font-weight: bold;
			display: block !important;
		}
		.img-fluid {
			position: relative;
			top: 29px;
			max-width: 100%;
			min-height: 100px;
			max-height: 185px;
		}
		.head-top-right {
			font-family: 'Segoe UI Regular';
			text-align: center;
			color: #E74218;
			font-size: 25px;
			font-weight: bolder;
		}
		.zoom-box{
			width:100% !important;
		}
		.loop-section {
			background: #ffffffa1;
			margin-left: 0rem;
			margin-right: 0rem;
			width: 95%;
			margin: 0 auto;
		}
		.wrap {
			display: flex;
			justify-content: end;
			position: relative;
			bottom: -63px;
			left: -65px;
		}
	}
	.main-text-challenge{
		justify-content:center;
	}
	@media (max-width:500px) {
		button#exampleModalPreview2 {
			width: 100%;
			font-family: 'Segoe UI Regular';
			margin-bottom: 13px;
			text-align: center !important;
		}
		.responsive-hint-btns button{
			width: inherit !important;
			text-align: center !important;
			font-family: 'Segoe UI Regular';
			padding: 12px 0px !important;
		}
		.main-text-challenge {
			height: auto;
		}
		.customBox > img {
			bottom:-150px !important;
		}
		#add1{
			bottom: -65px !important;
		}
		#sub1{
			bottom: -137px !important;
		}
		#add2{
			bottom: -64px !important;
		}
		#sub2{
			bottom: -137px !important;
			left: 147px !important;
		}
		#add3{
			bottom: -63px !important;
		}
		#sub3{
			bottom: -135px !important;
		}
		#submitChallenge{
			bottom: -186px !important;
		}
		.wrap {
			display: flex;
			justify-content: end;
			position: relative;
			bottom: 63px;
		}
		.hint-section {
			/*height: 30vh;*/s
		}
		.main-section-para {
			font-family: 'Segoe UI REGULAR';
			font-size: 12px;
			font-weight: normal;
			margin-top: 2px !important;
		}
		.zoom-box{
			width:100% !important;
		}
		.zoom-box img {
			vertical-align: bottom;
			margin-bottom: 20px;
			height: auto !important;
			object-fit: contain;
		}
		.loop-section {
			background: #ffffffa1;
			height: 100%;
			margin-left: 0px !important;
			margin-right: 0px !important;
			margin: 0 auto !important;
		}
		#body_screen4{
			height: 120vh !important;
		}
	}
	#exampleModalPreview2{
		display:block !important;
	}
</style>
@endpush
@section('content')
    <div id="body_screen4" style="background:url('{{asset($adventure->edition->image)}}')">
    {{--top section--}}
        <section class="top-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                      <input type="text" name="" id="seconds-spent" readonly="" style="display: none;">

                    </div>
                    <div class="col-6">
                        <div class="float-right">
                           @if($adventure->count_down)
                                <div data-interval="30" class="head-top-right timer" data-timer-name="Timer1">00:00</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- end-top-section --}}

        {{-- start-main-section --}}
        <section class="loop-section">
            <div class="container">
                <div class="row text-center">
                    @foreach($adventure->challenges as $challenge)
                        <div class="col-sm-12 text-to-hide" id="challenge-{{$loop->iteration}}" @if($loop->iteration > 1) style="display:none"; @endif >
							<div class="challenge-paras">
								<p style="font-weight:500;display:block !important;margin-top:10px;" class='pagination-para' style="margin-top:25px;"> {{$loop->iteration}}/{{count($adventure->challenges)}}  {{__('common.text20')}}</p>
							</div>
							<div class="main-text-challenge">
								<span class='main-section-para px-5' style="margin-top:5px;">
									@if($locale == 'de')
										@if($challenge->text_above_challenge)
											@php
												$textD = $challenge->text_above_challenge;
											@endphp
										@elseif($challenge->text_above_challenge_en)
											@php
												$textD = $challenge->text_above_challenge_en;
											@endphp
										@elseif($challenge->text_above_challenge_fr)
											@php
												$textD = $challenge->text_above_challenge_fr;
											@endphp
										@else
										@endif
										@php
											$string = strip_tags($textD);
											echo html_entity_decode($string);
										@endphp
									@elseif($locale == 'en')
										@if($challenge->text_above_challenge_en)
											@php
												$textD = $challenge->text_above_challenge_en;
				                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 							@endphp
										@elseif($challenge->text_above_challenge)
											@php
												$textD = $challenge->text_above_challenge;
											@endphp
										@elseif($challenge->text_above_challenge_fr)
											@php
												$textD = $challenge->text_above_challenge_fr;
											@endphp
										@else
										@endif
										@php
											$string = strip_tags($textD);
											echo html_entity_decode($string);
										@endphp
									@elseif($locale == 'fr')
										@if($challenge->text_above_challenge_fr)
											@php
												$textD = $challenge->text_above_challenge_fr;
											@endphp
										@elseif($challenge->text_above_challenge_en)
											@php
												$textD = $challenge->text_above_challenge_en;
											@endphp
										@elseif($challenge->text_above_challenge)
											@php
												$textD = $challenge->text_above_challenge;
											@endphp
										@else
										@endif
										@php
											$string = strip_tags($textD);
											echo html_entity_decode($string);
										@endphp
									@else
										@if($challenge->text_above_challenge)
											@php
												$textD = $challenge->text_above_challenge;
											@endphp
										@elseif($challenge->text_above_challenge_en)
											@php
												$textD = $challenge->text_above_challenge_en;
											@endphp
										@elseif($challenge->text_above_challenge_fr)
											@php
												$textD = $challenge->text_above_challenge_fr;
											@endphp
										@else
										@endif
										@php
											$string = strip_tags($textD);
											echo html_entity_decode($string);
										@endphp
									@endif
								</span>
							</div>
                            @if($challenge->challenge_type == 'picture')
                                <div class="zoom-box" style="position:relative;width:50%;display:inline-block;margin-top:5px;">
                                    <img class="classImage img-fluid" src="{{asset($challenge->files[0]->file_path)}}" width="500" height="250" />
                                </div>
                            @elseif($challenge->challenge_type == 'sound')
                                <audio src="$challenge->files[0]->file_path" class="img-fluid w-50 loop-img"></audio>
                            @else
                                <video  autoplay class="img-fluid w-50 loop-img">
                                  <source src="$challenge->files[0]->file_path" type="video/mp4">
                                </video>
                            @endif
                            <input type="hidden" class="hiddeninputs" id="challengeCode-{{$loop->iteration}}" value="{{$challenge->final_code}}">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        {{-- start-main-section --}}
    <section class="icon text-right hint-section">
        <div class="container-fluid">
            @include('frontend.counter')
                          @if($adventure->challenge_notes)
            <div class="row">
                    <div class="col">
                        <a href="#" data-toggle="modal" onclick="addHint()"><i class="fas fa-question question-icon"></i></a>
                        @foreach($adventure->challenges as $challenge)
                        	@if($challenge->hints && $challenge->hint1)
                            <input type="hidden" value="{{$challenge->id}}" id="challangeId-{{$loop->iteration}}" />
                            <input type="hidden" value="{{str_replace(' ','',$challenge->hint1)}}" id="hint1-{{$loop->iteration}}" />
                            <input type="hidden" value="{{str_replace(' ','',$challenge->hint2)}}" id="hint2-{{$loop->iteration}}" />
                            <input type="hidden" value="{{str_replace(' ','',$challenge->hint3)}}" id="hint3-{{$loop->iteration}}" />
                            <div class="cha-No-{{$challenge->id}}">
                                <div class="modal fade right" id="exampleModalPreview1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint1)}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
                                    <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
                                        <div class="modal-content-full-width modal-content ">
                                            <div class=" modal-header-full-width  modal-header text-center">
                                                <p class="hint-number" style="display:block !important;" id="hint-number-{{$loop->iteration}}">{{$loop->iteration}}</p>
                                                <button type="button" class="close " onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}" data-dismiss="modal" aria-label="Close">
                                                    <i class="fas fa-times close-icon"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <h4 class="text-left fadeIn my-5 pt-3 hint-heading" id="hint1-{{$challenge->id}}">
									@if($locale == 'de')
										@if($challenge->hint1)
											{{$challenge->hint1}}
										@elseif($challenge->hint1_en)
											{{$challenge->hint1_en}}
										@elseif($challenge->hint1_fr)
											{{$challenge->hint1_fr}}
										@endif
									@elseif($locale == 'en')
										@if($challenge->hint1_en)
											{{$challenge->hint1_en}}
										@elseif($challenge->hint1)
											{{$challenge->hint1}}
										@elseif($challenge->hint1_fr)
											{{$challenge->hint1_fr}}
										@endif
									@elseif($locale == 'fr')
										@if($challenge->hint1_fr)
											{{$challenge->hint1_fr}}
										@elseif($challenge->hint1)
											{{$challenge->hint1}}
										@elseif($challenge->hint1_en)
											{{$challenge->hint1_en}}
										@endif
									@else
										@if($challenge->hint1_fr)
											{{$challenge->hint1_fr}}
										@elseif($challenge->hint1)
											{{$challenge->hint1}}
										@elseif($challenge->hint1_en)
											{{$challenge->hint1_en}}
										@endif
									@endif
													</h4>
                                                    <h4 class="text-left fadeIn my-5 pt-3 hint-heading"  id="hint1_text-{{$challenge->id}}">
									@if($locale == 'de')
										@if($challenge->hint1_text)
											{{$challenge->hint1_text}}
										@elseif($challenge->hint1_text_en)
											{{$challenge->hint1_text_en}}
										@elseif($challenge->hint1_text_fr)
											{{$challenge->hint1_text_fr}}
										@endif
									@elseif($locale == 'en')
										@if($challenge->hint1_text_en)
											{{$challenge->hint1_text_en}}
										@elseif($challenge->hint1_text_fr)
											{{$challenge->hint1_text_fr}}
										@elseif($challenge->hint1_text)
											{{$challenge->hint1_text}}
										@endif
									@elseif($locale == 'fr')
										@if($challenge->hint1_text_fr)
											{{$challenge->hint1_text_fr}}
										@elseif($challenge->hint1_text_en)
											{{$challenge->hint1_text_en}}
										@elseif($challenge->hint1_text)
											{{$challenge->hint1_text}}
										@endif
									@else
										@if($challenge->hint1_text_fr)
											{{$challenge->hint1_text_fr}}
										@elseif($challenge->hint1_text_en)
											{{$challenge->hint1_text_en}}
										@elseif($challenge->hint1_text)
											{{$challenge->hint1_text}}
										@endif
									@endif
													</h4>
                                                    <div class="row">
                                                        <div class="col">
                                                            <button type="button" class="btn btn-secondary text-left prev-button"  data-toggle="modal" data-target="#exampleModalPreview2" style="display:block !important;" id="exampleModalPreview2" onclick="nextHint()" data-dismiss="modal">{{__('common.text21')}}</button>
                                                            <button type="button" class="btn btn-secondary text-left next-button exampleModalPreview212" data-dismiss="modal" onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}">
															{{__('common.text22')}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade right" id="exampleModalPreview1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
                                    <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
                                        <div class="modal-content-full-width modal-content ">
                                            <div class=" modal-header-full-width  modal-header text-center">
                                                <p class="hint-number" style="display:block !important;" id="hint-number-{{$loop->iteration}}">2</p>
                                                <button type="button" class="close " onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}" data-dismiss="modal" aria-label="Close">
                                                    <i class="fas fa-times close-icon"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <h4 class="text-left fadeIn my-5 pt-3 hint-heading"  id="hint2-{{$challenge->id}}">
									@if($locale == 'de')
										@if($challenge->hint2)
											{{$challenge->hint2}}
										@elseif($challenge->hint2_en)
											{{$challenge->hint2_en}}
										@elseif($challenge->hint2_fr)
											{{$challenge->hint2_fr}}
										@endif
									@elseif($locale == 'en')
										@if($challenge->hint2_en)
											{{$challenge->hint2_en}}
										@elseif($challenge->hint2)
											{{$challenge->hint2}}
										@elseif($challenge->hint2_fr)
											{{$challenge->hint2_fr}}
										@endif
									@elseif($locale == 'fr')
										@if($challenge->hint2_fr)
											{{$challenge->hint2_fr}}
										@elseif($challenge->hint2)
											{{$challenge->hint2}}
										@elseif($challenge->hint2_en)
											{{$challenge->hint2_en}}
										@endif
									@else
										@if($challenge->hint2_en)
											{{$challenge->hint2_en}}
										@elseif($challenge->hint2)
											{{$challenge->hint2}}
										@elseif($challenge->hint2_fr)
											{{$challenge->hint2_fr}}
										@endif
									@endif
													</h4>
                                                    <p class="text-left fadeIn my-5 pt-3 hint-para"  id="hint2_text-{{$challenge->id}}">
									@if($locale == 'de')
										@if($challenge->hint2_text)
											{{$challenge->hint2_text}}
										@elseif($challenge->hint2_text_en)
											{{$challenge->hint2_text_en}}
										@elseif($challenge->hint2_text_fr)
											{{$challenge->hint2_text_fr}}
										@endif
									@elseif($locale == 'en')
										@if($challenge->hint2_text_en)
											{{$challenge->hint2_text_en}}
										@elseif($challenge->hint2_text)
											{{$challenge->hint2_text}}
										@elseif($challenge->hint2_text_fr)
											{{$challenge->hint2_text_fr}}
										@endif
									@elseif($locale == 'fr')
										@if($challenge->hint2_text_fr)
											{{$challenge->hint2_text_fr}}
										@elseif($challenge->hint2_text)
											{{$challenge->hint2_text}}
										@elseif($challenge->hint2_text_en)
											{{$challenge->hint2_text_en}}
										@endif
									@else
										@if($challenge->hint2_text_fr)
											{{$challenge->hint2_text_fr}}
										@elseif($challenge->hint2_text)
											{{$challenge->hint2_text}}
										@elseif($challenge->hint2_text_en)
											{{$challenge->hint2_text_en}}
										@endif
									@endif

													</p>
                                                    <div class="row">
                                                        <div class="col">
                                                            <button type="button" class="btn btn-secondary text-left prev-button"  data-toggle="modal" data-target="#exampleModalPreview2" style="display:block !important;" id="exampleModalPreview2" onclick="nextHint()" data-dismiss="modal">{{__('common.text21')}}</button>
                                                            <button type="button" class="btn btn-secondary text-left prev-button"  data-toggle="modal" data-target="#exampleModalPreview2"data-dismiss="modal" onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}">{{__('common.text22')}}</button>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade right" id="exampleModalPreview1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint3)}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
                                    <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
                                        <div class="modal-content-full-width modal-content ">
                                            <div class=" modal-header-full-width  modal-header text-center">
                                               <p class="hint-number" style="display:block !important;" id="hint-number-{{$challenge->hint3}}">3</p>
                                                <button type="button" onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}" class="close " data-dismiss="modal" aria-label="Close">
                                                    <i class="fas fa-times close-icon"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <h4 class="text-left fadeIn my-5 pt-3 hint-heading"  id="hint3-{{$challenge->id}}">
									@if($locale == 'de')
										@if($challenge->hint3)
											{{$challenge->hint3}}
										@elseif($challenge->hint3_en)
											{{$challenge->hint3_en}}
										@elseif($challenge->hint3_fr)
											{{$challenge->hint3_fr}}
										@endif
									@elseif($locale == 'en')
										@if($challenge->hint3_en)
											{{$challenge->hint3_en}}
										@elseif($challenge->hint3)
											{{$challenge->hint3}}
										@elseif($challenge->hint3_fr)
											{{$challenge->hint3_fr}}
										@endif
									@elseif($locale == 'fr')
										@if($challenge->hint3_fr)
											{{$challenge->hint3_fr}}
										@elseif($challenge->hint3)
											{{$challenge->hint3}}
										@elseif($challenge->hint3_en)
											{{$challenge->hint3_en}}
										@endif
									@else
										@if($challenge->hint3_fr)
											{{$challenge->hint3_fr}}
										@elseif($challenge->hint3)
											{{$challenge->hint3}}
										@elseif($challenge->hint3_en)
											{{$challenge->hint3_en}}
										@endif
									@endif
													</h4>
                                                    <p class="text-left fadeIn my-5 pt-3 hint-para"  id="hint3_text-{{$challenge->id}}">
									@if($locale == 'de')
										@if($challenge->hint3_text)
											{{$challenge->hint3_text}}
										@elseif($challenge->hint3_text_en)
											{{$challenge->hint3_text_en}}
										@elseif($challenge->hint3_text_fr)
											{{$challenge->hint3_text_fr}}
										@endif
									@elseif($locale == 'en')
										@if($challenge->hint3_text_en)
											{{$challenge->hint3_text_en}}
										@elseif($challenge->hint3_text)
											{{$challenge->hint3_text}}
										@elseif($challenge->hint3_text_fr)
											{{$challenge->hint3_text_fr}}
										@endif
									@elseif($locale == 'fr')
										@if($challenge->hint3_text_fr)
											{{$challenge->hint3_text_fr}}
										@elseif($challenge->hint3_text)
											{{$challenge->hint3_text}}
										@elseif($challenge->hint3_text_en)
											{{$challenge->hint3_text_en}}
										@endif
									@else
										@if($challenge->hint3_text_fr)
											{{$challenge->hint3_text_fr}}
										@elseif($challenge->hint3_text)
											{{$challenge->hint3_text}}
										@elseif($challenge->hint3_text_en)
											{{$challenge->hint3_text_en}}
										@endif
									@endif
													</p>
                                                    <p class="text-left fadeIn my-5 pt-3 hint-para" style="display:block !important;"  id="final-{{$challenge->id}}"> {{$challenge->final_code}}</p>
                                                    <div class="row">
                                                        <div class="col">
                                                            <button onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}" type="button" class="btn btn-secondary text-left next-button exampleModalPreview212" data-dismiss="modal">{{__('common.text23')}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            	@if($challenge->hints_en && $challenge->hint1_en)
	                            	<input type="hidden" value="{{$challenge->id}}" id="challangeId-{{$loop->iteration}}" />
		                            <input type="hidden" value="{{str_replace(' ','',$challenge->hint1_en)}}" id="hint1-{{$loop->iteration}}" />
		                            <input type="hidden" value="{{str_replace(' ','',$challenge->hint2_en)}}" id="hint2-{{$loop->iteration}}" />
		                            <input type="hidden" value="{{str_replace(' ','',$challenge->hint3_en)}}" id="hint3-{{$loop->iteration}}" />
		                            <div class="cha-No-{{$challenge->id}}">
		                                <div class="modal fade right" id="exampleModalPreview1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint1_en)}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
		                                    <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
		                                        <div class="modal-content-full-width modal-content ">
		                                            <div class=" modal-header-full-width  modal-header text-center">
		                                                <p class="hint-number" style="display:block !important;" id="hint-number-{{$loop->iteration}}">{{$loop->iteration}}</p>
		                                                <button type="button" class="close " onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}" data-dismiss="modal" aria-label="Close">
		                                                    <i class="fas fa-times close-icon"></i>
		                                                </button>
		                                            </div>
		                                            <div class="modal-body">
		                                                <div class="container">
		                                                    <h4 class="text-left fadeIn my-5 pt-3 hint-heading" id="hint1-{{$challenge->id}}">
											@if($locale == 'de')
												@if($challenge->hint1)
													{{$challenge->hint1}}
												@elseif($challenge->hint1_en)
													{{$challenge->hint1_en}}
												@elseif($challenge->hint1_fr)
													{{$challenge->hint1_fr}}
												@endif
											@elseif($locale == 'en')
												@if($challenge->hint1_en)
													{{$challenge->hint1_en}}
												@elseif($challenge->hint1)
													{{$challenge->hint1}}
												@elseif($challenge->hint1_fr)
													{{$challenge->hint1_fr}}
												@endif
											@elseif($locale == 'fr')
												@if($challenge->hint1_fr)
													{{$challenge->hint1_fr}}
												@elseif($challenge->hint1)
													{{$challenge->hint1}}
												@elseif($challenge->hint1_en)
													{{$challenge->hint1_en}}
												@endif
											@else
												@if($challenge->hint1_fr)
													{{$challenge->hint1_fr}}
												@elseif($challenge->hint1)
													{{$challenge->hint1}}
												@elseif($challenge->hint1_en)
													{{$challenge->hint1_en}}
												@endif
											@endif
															</h4>
		                                                    <h4 class="text-left fadeIn my-5 pt-3 hint-heading"  id="hint1_text-{{$challenge->id}}">
											@if($locale == 'de')
												@if($challenge->hint1_text)
													{{$challenge->hint1_text}}
												@elseif($challenge->hint1_text_en)
													{{$challenge->hint1_text_en}}
												@elseif($challenge->hint1_text_fr)
													{{$challenge->hint1_text_fr}}
												@endif
											@elseif($locale == 'en')
												@if($challenge->hint1_text_en)
													{{$challenge->hint1_text_en}}
												@elseif($challenge->hint1_text_fr)
													{{$challenge->hint1_text_fr}}
												@elseif($challenge->hint1_text)
													{{$challenge->hint1_text}}
												@endif
											@elseif($locale == 'fr')
												@if($challenge->hint1_text_fr)
													{{$challenge->hint1_text_fr}}
												@elseif($challenge->hint1_text_en)
													{{$challenge->hint1_text_en}}
												@elseif($challenge->hint1_text)
													{{$challenge->hint1_text}}
												@endif
											@else
												@if($challenge->hint1_text_fr)
													{{$challenge->hint1_text_fr}}
												@elseif($challenge->hint1_text_en)
													{{$challenge->hint1_text_en}}
												@elseif($challenge->hint1_text)
													{{$challenge->hint1_text}}
												@endif
											@endif
															</h4>
		                                                    <div class="row">
		                                                        <div class="col">
		                                                            <button type="button" class="btn btn-secondary text-left prev-button"  data-toggle="modal" data-target="#exampleModalPreview2" style="display:block !important;" id="exampleModalPreview2" onclick="nextHint()" data-dismiss="modal">{{__('common.text21')}}</button>
		                                                            <button type="button" class="btn btn-secondary text-left next-button exampleModalPreview212" data-dismiss="modal" onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}">
																	{{__('common.text22')}}</button>
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                            </div>

		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="modal fade right" id="exampleModalPreview1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2_en)}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
		                                    <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
		                                        <div class="modal-content-full-width modal-content ">
		                                            <div class=" modal-header-full-width  modal-header text-center">
		                                                <p class="hint-number" style="display:block !important;" id="hint-number-{{$loop->iteration}}">2</p>
		                                                <button type="button" class="close " onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}" data-dismiss="modal" aria-label="Close">
		                                                    <i class="fas fa-times close-icon"></i>
		                                                </button>
		                                            </div>
		                                            <div class="modal-body">
		                                                <div class="container">
		                                                    <h4 class="text-left fadeIn my-5 pt-3 hint-heading"  id="hint2-{{$challenge->id}}">
											@if($locale == 'de')
												@if($challenge->hint2)
													{{$challenge->hint2}}
												@elseif($challenge->hint2_en)
													{{$challenge->hint2_en}}
												@elseif($challenge->hint2_fr)
													{{$challenge->hint2_fr}}
												@endif
											@elseif($locale == 'en')
												@if($challenge->hint2_en)
													{{$challenge->hint2_en}}
												@elseif($challenge->hint2)
													{{$challenge->hint2}}
												@elseif($challenge->hint2_fr)
													{{$challenge->hint2_fr}}
												@endif
											@elseif($locale == 'fr')
												@if($challenge->hint2_fr)
													{{$challenge->hint2_fr}}
												@elseif($challenge->hint2)
													{{$challenge->hint2}}
												@elseif($challenge->hint2_en)
													{{$challenge->hint2_en}}
												@endif
											@else
												@if($challenge->hint2_en)
													{{$challenge->hint2_en}}
												@elseif($challenge->hint2)
													{{$challenge->hint2}}
												@elseif($challenge->hint2_fr)
													{{$challenge->hint2_fr}}
												@endif
											@endif
															</h4>
		                                                    <p class="text-left fadeIn my-5 pt-3 hint-para"  id="hint2_text-{{$challenge->id}}">
											@if($locale == 'de')
												@if($challenge->hint2_text)
													{{$challenge->hint2_text}}
												@elseif($challenge->hint2_text_en)
													{{$challenge->hint2_text_en}}
												@elseif($challenge->hint2_text_fr)
													{{$challenge->hint2_text_fr}}
												@endif
											@elseif($locale == 'en')
												@if($challenge->hint2_text_en)
													{{$challenge->hint2_text_en}}
												@elseif($challenge->hint2_text)
													{{$challenge->hint2_text}}
												@elseif($challenge->hint2_text_fr)
													{{$challenge->hint2_text_fr}}
												@endif
											@elseif($locale == 'fr')
												@if($challenge->hint2_text_fr)
													{{$challenge->hint2_text_fr}}
												@elseif($challenge->hint2_text)
													{{$challenge->hint2_text}}
												@elseif($challenge->hint2_text_en)
													{{$challenge->hint2_text_en}}
												@endif
											@else
												@if($challenge->hint2_text_fr)
													{{$challenge->hint2_text_fr}}
												@elseif($challenge->hint2_text)
													{{$challenge->hint2_text}}
												@elseif($challenge->hint2_text_en)
													{{$challenge->hint2_text_en}}
												@endif
											@endif

															</p>
		                                                    <div class="row">
		                                                        <div class="col">
		                                                            <button type="button" class="btn btn-secondary text-left prev-button"  data-toggle="modal" data-target="#exampleModalPreview2" style="display:block !important;" id="exampleModalPreview2" onclick="nextHint()" data-dismiss="modal">{{__('common.text21')}}</button>
		                                                            <button type="button" class="btn btn-secondary text-left prev-button"  data-toggle="modal" data-target="#exampleModalPreview2"data-dismiss="modal" onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}">{{__('common.text22')}}</button>


		                                                        </div>
		                                                    </div>
		                                                </div>
		                                            </div>

		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="modal fade right" id="exampleModalPreview1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint3_en)}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
		                                    <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
		                                        <div class="modal-content-full-width modal-content ">
		                                            <div class=" modal-header-full-width  modal-header text-center">
		                                               <p class="hint-number" style="display:block !important;" id="hint-number-{{$challenge->hint3}}">3</p>
		                                                <button type="button" onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}" class="close " data-dismiss="modal" aria-label="Close">
		                                                    <i class="fas fa-times close-icon"></i>
		                                                </button>
		                                            </div>
		                                            <div class="modal-body">
		                                                <div class="container">
		                                                    <h4 class="text-left fadeIn my-5 pt-3 hint-heading"  id="hint3-{{$challenge->id}}">
											@if($locale == 'de')
												@if($challenge->hint3)
													{{$challenge->hint3}}
												@elseif($challenge->hint3_en)
													{{$challenge->hint3_en}}
												@elseif($challenge->hint3_fr)
													{{$challenge->hint3_fr}}
												@endif
											@elseif($locale == 'en')
												@if($challenge->hint3_en)
													{{$challenge->hint3_en}}
												@elseif($challenge->hint3)
													{{$challenge->hint3}}
												@elseif($challenge->hint3_fr)
													{{$challenge->hint3_fr}}
												@endif
											@elseif($locale == 'fr')
												@if($challenge->hint3_fr)
													{{$challenge->hint3_fr}}
												@elseif($challenge->hint3)
													{{$challenge->hint3}}
												@elseif($challenge->hint3_en)
													{{$challenge->hint3_en}}
												@endif
											@else
												@if($challenge->hint3_fr)
													{{$challenge->hint3_fr}}
												@elseif($challenge->hint3)
													{{$challenge->hint3}}
												@elseif($challenge->hint3_en)
													{{$challenge->hint3_en}}
												@endif
											@endif
															</h4>
		                                                    <p class="text-left fadeIn my-5 pt-3 hint-para"  id="hint3_text-{{$challenge->id}}">
											@if($locale == 'de')
												@if($challenge->hint3_text)
													{{$challenge->hint3_text}}
												@elseif($challenge->hint3_text_en)
													{{$challenge->hint3_text_en}}
												@elseif($challenge->hint3_text_fr)
													{{$challenge->hint3_text_fr}}
												@endif
											@elseif($locale == 'en')
												@if($challenge->hint3_text_en)
													{{$challenge->hint3_text_en}}
												@elseif($challenge->hint3_text)
													{{$challenge->hint3_text}}
												@elseif($challenge->hint3_text_fr)
													{{$challenge->hint3_text_fr}}
												@endif
											@elseif($locale == 'fr')
												@if($challenge->hint3_text_fr)
													{{$challenge->hint3_text_fr}}
												@elseif($challenge->hint3_text)
													{{$challenge->hint3_text}}
												@elseif($challenge->hint3_text_en)
													{{$challenge->hint3_text_en}}
												@endif
											@else
												@if($challenge->hint3_text_fr)
													{{$challenge->hint3_text_fr}}
												@elseif($challenge->hint3_text)
													{{$challenge->hint3_text}}
												@elseif($challenge->hint3_text_en)
													{{$challenge->hint3_text_en}}
												@endif
											@endif
															</p>
		                                                    <p class="text-left fadeIn my-5 pt-3 hint-para" style="display:block !important;"  id="final-{{$challenge->id}}"> {{$challenge->final_code}}</p>
		                                                    <div class="row">
		                                                        <div class="col">
		                                                            <button onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}" type="button" class="btn btn-secondary text-left next-button exampleModalPreview212" data-dismiss="modal">{{__('common.text23')}}</button>
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                            </div>

		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            @else
		                            	<input type="hidden" value="{{$challenge->id}}" id="challangeId-{{$loop->iteration}}" />
			                            <input type="hidden" value="{{str_replace(' ','',$challenge->hint1_fr)}}" id="hint1-{{$loop->iteration}}" />
			                            <input type="hidden" value="{{str_replace(' ','',$challenge->hint2_fr)}}" id="hint2-{{$loop->iteration}}" />
			                            <input type="hidden" value="{{str_replace(' ','',$challenge->hint3_fr)}}" id="hint3-{{$loop->iteration}}" />
			                            <div class="cha-No-{{$challenge->id}}">
			                                <div class="modal fade right" id="exampleModalPreview1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint1_fr)}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
			                                    <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
			                                        <div class="modal-content-full-width modal-content ">
			                                            <div class=" modal-header-full-width  modal-header text-center">
			                                                <p class="hint-number" style="display:block !important;" id="hint-number-{{$loop->iteration}}">{{$loop->iteration}}</p>
			                                                <button type="button" class="close " onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}" data-dismiss="modal" aria-label="Close">
			                                                    <i class="fas fa-times close-icon"></i>
			                                                </button>
			                                            </div>
			                                            <div class="modal-body">
			                                                <div class="container">
			                                                    <h4 class="text-left fadeIn my-5 pt-3 hint-heading" id="hint1-{{$challenge->id}}">
												@if($locale == 'de')
													@if($challenge->hint1)
														{{$challenge->hint1}}
													@elseif($challenge->hint1_en)
														{{$challenge->hint1_en}}
													@elseif($challenge->hint1_fr)
														{{$challenge->hint1_fr}}
													@endif
												@elseif($locale == 'en')
													@if($challenge->hint1_en)
														{{$challenge->hint1_en}}
													@elseif($challenge->hint1)
														{{$challenge->hint1}}
													@elseif($challenge->hint1_fr)
														{{$challenge->hint1_fr}}
													@endif
												@elseif($locale == 'fr')
													@if($challenge->hint1_fr)
														{{$challenge->hint1_fr}}
													@elseif($challenge->hint1)
														{{$challenge->hint1}}
													@elseif($challenge->hint1_en)
														{{$challenge->hint1_en}}
													@endif
												@else
													@if($challenge->hint1_fr)
														{{$challenge->hint1_fr}}
													@elseif($challenge->hint1)
														{{$challenge->hint1}}
													@elseif($challenge->hint1_en)
														{{$challenge->hint1_en}}
													@endif
												@endif
																</h4>
			                                                    <h4 class="text-left fadeIn my-5 pt-3 hint-heading"  id="hint1_text-{{$challenge->id}}">
												@if($locale == 'de')
													@if($challenge->hint1_text)
														{{$challenge->hint1_text}}
													@elseif($challenge->hint1_text_en)
														{{$challenge->hint1_text_en}}
													@elseif($challenge->hint1_text_fr)
														{{$challenge->hint1_text_fr}}
													@endif
												@elseif($locale == 'en')
													@if($challenge->hint1_text_en)
														{{$challenge->hint1_text_en}}
													@elseif($challenge->hint1_text_fr)
														{{$challenge->hint1_text_fr}}
													@elseif($challenge->hint1_text)
														{{$challenge->hint1_text}}
													@endif
												@elseif($locale == 'fr')
													@if($challenge->hint1_text_fr)
														{{$challenge->hint1_text_fr}}
													@elseif($challenge->hint1_text_en)
														{{$challenge->hint1_text_en}}
													@elseif($challenge->hint1_text)
														{{$challenge->hint1_text}}
													@endif
												@else
													@if($challenge->hint1_text_fr)
														{{$challenge->hint1_text_fr}}
													@elseif($challenge->hint1_text_en)
														{{$challenge->hint1_text_en}}
													@elseif($challenge->hint1_text)
														{{$challenge->hint1_text}}
													@endif
												@endif
																</h4>
			                                                    <div class="row">
			                                                        <div class="col">
			                                                            <button type="button" class="btn btn-secondary text-left prev-button"  data-toggle="modal" data-target="#exampleModalPreview2" style="display:block !important;" id="exampleModalPreview2" onclick="nextHint()" data-dismiss="modal">{{__('common.text21')}}</button>
			                                                            <button type="button" class="btn btn-secondary text-left next-button exampleModalPreview212" data-dismiss="modal" onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}">
																		{{__('common.text22')}}</button>
			                                                        </div>
			                                                    </div>
			                                                </div>
			                                            </div>

			                                        </div>
			                                    </div>
			                                </div>
			                                <div class="modal fade right" id="exampleModalPreview1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2_fr)}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
			                                    <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
			                                        <div class="modal-content-full-width modal-content ">
			                                            <div class=" modal-header-full-width  modal-header text-center">
			                                                <p class="hint-number" style="display:block !important;" id="hint-number-{{$loop->iteration}}">2</p>
			                                                <button type="button" class="close " onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}" data-dismiss="modal" aria-label="Close">
			                                                    <i class="fas fa-times close-icon"></i>
			                                                </button>
			                                            </div>
			                                            <div class="modal-body">
			                                                <div class="container">
			                                                    <h4 class="text-left fadeIn my-5 pt-3 hint-heading"  id="hint2-{{$challenge->id}}">
												@if($locale == 'de')
													@if($challenge->hint2)
														{{$challenge->hint2}}
													@elseif($challenge->hint2_en)
														{{$challenge->hint2_en}}
													@elseif($challenge->hint2_fr)
														{{$challenge->hint2_fr}}
													@endif
												@elseif($locale == 'en')
													@if($challenge->hint2_en)
														{{$challenge->hint2_en}}
													@elseif($challenge->hint2)
														{{$challenge->hint2}}
													@elseif($challenge->hint2_fr)
														{{$challenge->hint2_fr}}
													@endif
												@elseif($locale == 'fr')
													@if($challenge->hint2_fr)
														{{$challenge->hint2_fr}}
													@elseif($challenge->hint2)
														{{$challenge->hint2}}
													@elseif($challenge->hint2_en)
														{{$challenge->hint2_en}}
													@endif
												@else
													@if($challenge->hint2_en)
														{{$challenge->hint2_en}}
													@elseif($challenge->hint2)
														{{$challenge->hint2}}
													@elseif($challenge->hint2_fr)
														{{$challenge->hint2_fr}}
													@endif
												@endif
																</h4>
			                                                    <p class="text-left fadeIn my-5 pt-3 hint-para"  id="hint2_text-{{$challenge->id}}">
												@if($locale == 'de')
													@if($challenge->hint2_text)
														{{$challenge->hint2_text}}
													@elseif($challenge->hint2_text_en)
														{{$challenge->hint2_text_en}}
													@elseif($challenge->hint2_text_fr)
														{{$challenge->hint2_text_fr}}
													@endif
												@elseif($locale == 'en')
													@if($challenge->hint2_text_en)
														{{$challenge->hint2_text_en}}
													@elseif($challenge->hint2_text)
														{{$challenge->hint2_text}}
													@elseif($challenge->hint2_text_fr)
														{{$challenge->hint2_text_fr}}
													@endif
												@elseif($locale == 'fr')
													@if($challenge->hint2_text_fr)
														{{$challenge->hint2_text_fr}}
													@elseif($challenge->hint2_text)
														{{$challenge->hint2_text}}
													@elseif($challenge->hint2_text_en)
														{{$challenge->hint2_text_en}}
													@endif
												@else
													@if($challenge->hint2_text_fr)
														{{$challenge->hint2_text_fr}}
													@elseif($challenge->hint2_text)
														{{$challenge->hint2_text}}
													@elseif($challenge->hint2_text_en)
														{{$challenge->hint2_text_en}}
													@endif
												@endif

																</p>
			                                                    <div class="row">
			                                                        <div class="col">
			                                                            <button type="button" class="btn btn-secondary text-left prev-button"  data-toggle="modal" data-target="#exampleModalPreview2" style="display:block !important;" id="exampleModalPreview2" onclick="nextHint()" data-dismiss="modal">{{__('common.text21')}}</button>
			                                                            <button type="button" class="btn btn-secondary text-left prev-button"  data-toggle="modal" data-target="#exampleModalPreview2"data-dismiss="modal" onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}">{{__('common.text22')}}</button>


			                                                        </div>
			                                                    </div>
			                                                </div>
			                                            </div>

			                                        </div>
			                                    </div>
			                                </div>
			                                <div class="modal fade right" id="exampleModalPreview1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint3_fr)}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
			                                    <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
			                                        <div class="modal-content-full-width modal-content ">
			                                            <div class=" modal-header-full-width  modal-header text-center">
			                                               <p class="hint-number" style="display:block !important;" id="hint-number-{{$challenge->hint3}}">3</p>
			                                                <button type="button" onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example1-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}" class="close " data-dismiss="modal" aria-label="Close">
			                                                    <i class="fas fa-times close-icon"></i>
			                                                </button>
			                                            </div>
			                                            <div class="modal-body">
			                                                <div class="container">
			                                                    <h4 class="text-left fadeIn my-5 pt-3 hint-heading"  id="hint3-{{$challenge->id}}">
												@if($locale == 'de')
													@if($challenge->hint3)
														{{$challenge->hint3}}
													@elseif($challenge->hint3_en)
														{{$challenge->hint3_en}}
													@elseif($challenge->hint3_fr)
														{{$challenge->hint3_fr}}
													@endif
												@elseif($locale == 'en')
													@if($challenge->hint3_en)
														{{$challenge->hint3_en}}
													@elseif($challenge->hint3)
														{{$challenge->hint3}}
													@elseif($challenge->hint3_fr)
														{{$challenge->hint3_fr}}
													@endif
												@elseif($locale == 'fr')
													@if($challenge->hint3_fr)
														{{$challenge->hint3_fr}}
													@elseif($challenge->hint3)
														{{$challenge->hint3}}
													@elseif($challenge->hint3_en)
														{{$challenge->hint3_en}}
													@endif
												@else
													@if($challenge->hint3_fr)
														{{$challenge->hint3_fr}}
													@elseif($challenge->hint3)
														{{$challenge->hint3}}
													@elseif($challenge->hint3_en)
														{{$challenge->hint3_en}}
													@endif
												@endif
																</h4>
			                                                    <p class="text-left fadeIn my-5 pt-3 hint-para"  id="hint3_text-{{$challenge->id}}">
												@if($locale == 'de')
													@if($challenge->hint3_text)
														{{$challenge->hint3_text}}
													@elseif($challenge->hint3_text_en)
														{{$challenge->hint3_text_en}}
													@elseif($challenge->hint3_text_fr)
														{{$challenge->hint3_text_fr}}
													@endif
												@elseif($locale == 'en')
													@if($challenge->hint3_text_en)
														{{$challenge->hint3_text_en}}
													@elseif($challenge->hint3_text)
														{{$challenge->hint3_text}}
													@elseif($challenge->hint3_text_fr)
														{{$challenge->hint3_text_fr}}
													@endif
												@elseif($locale == 'fr')
													@if($challenge->hint3_text_fr)
														{{$challenge->hint3_text_fr}}
													@elseif($challenge->hint3_text)
														{{$challenge->hint3_text}}
													@elseif($challenge->hint3_text_en)
														{{$challenge->hint3_text_en}}
													@endif
												@else
													@if($challenge->hint3_text_fr)
														{{$challenge->hint3_text_fr}}
													@elseif($challenge->hint3_text)
														{{$challenge->hint3_text}}
													@elseif($challenge->hint3_text_en)
														{{$challenge->hint3_text_en}}
													@endif
												@endif
																</p>
			                                                    <p class="text-left fadeIn my-5 pt-3 hint-para" style="display:block !important;"  id="final-{{$challenge->id}}"> {{$challenge->final_code}}</p>
			                                                    <div class="row">
			                                                        <div class="col">
			                                                            <button onclick="closeModal('{{$challenge->id}}','{{str_replace(' ','',$challenge->hint2)}}')" id="close-example-{{$challenge->id}}-{{str_replace(' ','',$challenge->hint2)}}" type="button" class="btn btn-secondary text-left next-button exampleModalPreview212" data-dismiss="modal">{{__('common.text23')}}</button>
			                                                        </div>
			                                                    </div>
			                                                </div>
			                                            </div>

			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
		                            @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

        </div>

    </section>
<input type="hidden" name="" id="totalChallenges" value="{{count($adventure->challenges)}}">
        <input type="hidden" name="" id="currentChallenge" value="1" >
        <input type="hidden" name="" id="totalHints" value="3" >
        <input type="hidden" name="" id="currentHint" value="1" >

    </div>

@endsection
@push('js')
  <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .show {
             display: none !important;
        }
        .modal-backdrop {
            position: fixed;
            top: 0;
            display: none;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            background-color: #000;
        }
    </style>
    <script src="{{asset('public/js/jquery.jqZoom.js')}}"></script>

    <script>
        $(function(){
            $(".classImage").jqZoom({
                selectorWidth: 30,
                selectorHeight: 30,
                viewerWidth: 400,
                viewerHeight: 300
            });

        })
    </script>
<script>
        function closeModal(id,hint){
            console.log('id,hint');
            console.log(id,hint);
            $('#totalHints').val('');
            $('#totalHints').val(3);
            $('#currentHint').val('');
            $('#currentHint').val(1);
            $('#close-example-'+id+'-'+hint).modal('hide');
			$('#close-example1-'+id+'-'+hint).modal('hide');
        }
    $("#submitChallenge").on("click", function () {
    var value1 = $('#value1').val();
    var value2 = $('#value2').val();
    var value3 = $('#value3').val();
    var finalInput = value1+value2+value3;
    var total = $('#totalChallenges').val();
    var current = $('#currentChallenge').val();
    var finalCode = $('#challengeCode-'+current).val();
    var newTab = Number(current) + 1;

    if(window.atob(finalInput) == finalCode){
         $('#totalHints').val('');
                $('#totalHints').val(3);
                $('#currentHint').val('');
                $('#currentHint').val(1);

        if(current < total){
            $('#challenge-'+current).hide();
            $('#challenge-'+newTab).show();
            $('#currentChallenge').val(newTab);

        }else{
            //alert('{{__('common.text18')}}');
            let totalTime = $('#seconds-spent').val();
            let event_id = '{{$adventure->event_id}}';
			let adventure_id = '{{$adventure->id}}';
            let form = new FormData();
			form.append('_token','{{ csrf_token() }}');
            form.append('time',totalTime);
            form.append('event_id',event_id);
			form.append('adventure_id',adventure_id);
			form.append('group_id','{{$group_id}}');
            $.ajax({
                url:'{{route('saveData')}}',
                method:'POST',
				processData: false,
    			contentType: false,
    			cache: false,
                data:form,

                success: function(response){
                    window.location = "{{asset('congrats-page/'.$adventure->event_id.'/'.$group_id)}}";

                }, error: function(error){
                    console.log('error');
                    console.log(error);
                }
            });

        }

    }else{

        $(".customBox img, .div1, .div2, .div3").effect( "shake", {times:1}, 350 );
    }

    $('#value1').val('');
    $('#value2').val('');
    $('#value3').val('');
});
    function addHint(){
            var curruntChallange = parseInt($('#currentChallenge').val());
            var challangeId = parseInt($('#challangeId-'+curruntChallange).val());
            var challangeHint1 = $('#hint1-'+curruntChallange).val();
           	var group_id = '{{$group_id}}';
           	if(group_id){
           		counthint();

           	}
            $('#hint-number-'+curruntChallange).text(1);
            $('#hint1-'+challangeId).show();
            $('#hint2_text-'+challangeId).show();
            var currentHint = $('#currentHint').val();
            var newTabHint = Number(currentHint) + 1;
            $('#currentHint').val(newTabHint);
            $('#exampleModalPreview1-'+challangeId+'-'+challangeHint1).modal('show');

        }
        function nextHint(){
            var totalHints = $('#totalHints').val();
            var currentHint = $('#currentHint').val();
            var curruntChallange = parseInt($('#currentChallenge').val());
            var newTab = Number(curruntChallange) + 1;
            var newTabHint = Number(currentHint) + 1;
            var challangeId = parseInt($('#challangeId-'+curruntChallange).val());
            var challangeHint1 = $('#hint1-'+curruntChallange).val();
            var challangeHint2 = $('#hint2-'+curruntChallange).val();
            var challangeHint3 = $('#hint3-'+curruntChallange).val();
            $.ajax({
               url:"{{url('get/challanges/'.$code)}}",
               method:'GET',
               success: function (response) {
                   console.log('response');
                   var group_id = '{{$group_id}}';
		           	if(group_id){
		           		counthint();

		           	}
                   response.data.map(function (data) {
                       if(challangeId == data.id) {
                           if(currentHint <= totalHints) {
                               $('#currentHint').val(newTabHint);
                               console.log('currentHint');
                               console.log(currentHint);
                               if(currentHint == 2) {
                                   console.log('challangeHint2');
                                   console.log(currentHint);
                                   console.log(curruntChallange);
                                   $('#hint-number-'+newTab).text(2);
                                   $('#exampleModalPreview1-'+challangeId+'-'+challangeHint1).modal('hide');
                                   $('#exampleModalPreview1-'+challangeId+'-'+challangeHint2).modal('show');
                               }
                               if(currentHint == 3) {
                                   console.log('currentHint 3');
                                   console.log(currentHint);
                                   console.log(curruntChallange);
                                   $('#hint-number-'+newTab).text(3);
                                   $('#exampleModalPreview1-'+challangeId+'-'+challangeHint2).modal('hide');
                                   $('#exampleModalPreview1-'+challangeId+'-'+challangeHint3).modal('show');
                               }
                           }
                       }
                   });
               },
               error: function (error) {
                   console.log('error');
                   console.log(error);
               }
            });
        }



    $("#add1").on("click", function () {
    console.log('onclick value.. value 1');
    var $button = $(this);
    var oldValue = $('#value1').val();
    console.log('oldValue 11111111');
    console.log(oldValue);
    if (oldValue == '') {
		oldValue = 0;
        var newVal = parseFloat(oldValue) + 1;
    } else {
        // Don't allow decrementing below zero
        console.log('oldValue greater then zero');
        if(oldValue < 9) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            var newVal = 9;
        }
    }
    $('#value1').val(newVal);
});$("#add2").on("click", function () {
    console.log('onclick value..');
    var $button = $(this);
    var oldValue = $('#value2').val();
    console.log('oldValue');
    console.log(oldValue);
    if (oldValue == '') {
		oldValue = 0;
        var newVal = parseFloat(oldValue) + 1;
    } else {
        // Don't allow decrementing below zero
        console.log('oldValue greater then zero');
        if(oldValue < 9) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            var newVal = 9;
        }
    }
    $('#value2').val(newVal);
});

$("#add3").on("click", function () {
    console.log('onclick value..');
    var $button = $(this);
	var oldValue = $('#value3').val();
	console.log('oldValue1');
	console.log(oldValue);
    if (oldValue == '') {
		oldValue = 0;
		var newVal = parseFloat(oldValue) + 1;
	} else {
        console.log('check value one greater then zero');
		if(oldValue < 9) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            var newVal = 9;
        }
	}
    $('#value3').val(newVal);}); $("#sub1").on("click", function () {
    console.log('onclick value..');
    var $button = $(this);
    var oldValue = $('#value1').val();
    console.log('oldValue');
    console.log(oldValue);
    if(oldValue != '0') {
        // Don't allow decrementing below zero
        console.log('oldValue greater then zero');
		if(oldValue == 0) {
			$('#value1').val();
		} else {
			var newVal = parseFloat(oldValue) - 1;
    		$('#value1').val(newVal);
		}
	} else {
		$('#value1').val();
	}
});
	$("#sub2").on("click", function () {
    console.log('onclick value..');
    var $button = $(this);
    var oldValue = $('#value2').val();
    console.log('oldValue');
    console.log(oldValue);
    if(oldValue != '0') {
    	console.log('oldValue greater then zero');
		if(oldValue == 0) {
			$('#value2').val();
		} else {
			var newVal = parseFloat(oldValue) - 1;
    		$('#value2').val(newVal);
		}
	} else {
		$('#value2').val();
	}

	});

    $("#sub3").on("click", function () {

        console.log('onclick value..');
        var $button = $(this);
        var oldValue = $('#value3').val();
        console.log('oldValue');
        console.log(oldValue);
        if(oldValue != '0') {
             console.log('oldValue greater then zero');
			if(oldValue == 0) {
				$('#value3').val();
			} else {
				var newVal = parseFloat(oldValue) - 1;
            	$('#value3').val(newVal);
			}
        } else {
			$('#value2').val();
		}
        console.log('onclick value..');
        var $button = $(this);
        var oldValue = $('#value3').val();
        console.log('oldValue');
        console.log(oldValue);

    });

    $("#sub3").on("click", function () {console.log('onclick value..');

        var $button = $(this);
        var oldValue = $('#value3').val();
        console.log('oldValue');
        console.log(oldValue);
});
    function startTimer(queueName, interval, el, next) {
    var timer = "{{$adventure->countdown_duration}}" * 60;
    $(el).data(queueName, setInterval(function() {
        timer--;
        var H = Math.floor((timer % (60 * 60 * 24)) / (60 * 60));
        var HH = (H < 9 ? "0" : "") + H;
        var M = Math.floor((timer % (60 * 60)) / 60);
        var MM = (M < 9 ? "0" : "") + M;
        var S = Math.floor(timer % 60);
        var SS = (S < 9 ? "0" : "") + S;
		var timer_counter = HH + ":" + MM + ":" + SS;
        $(el).text(HH + ":" + MM + ":" + SS);
        if (timer === 0) {
            $(el).text("Updating");
            clearInterval($(el).data(queueName));
            next();
        }
    }, 1000));
}

function scheduleTimer(elem) {
    return $.when.apply($,
        $.map(elem ? elem : $(".timer"), function(el, index) {
            var timer_interval = $(el).data("interval");
            var timer_name = $(el).data("timer-name");
            return $(el).queue(timer_name, function(next) {
                startTimer(timer_name, timer_interval, el, next)
            }).dequeue(timer_name).promise(timer_name)
                .then(function(el) {
                    var timer_name = el.data("timer-name")
                    return el.delay(2000, timer_name)
                        .queue(timer_name, function(next) {
                            scheduleTimer(el)
                        }).dequeue(timer_name).promise(timer_name)
                })
        }))

}
	console.log('timer_counter');
	console.log($('.timer').text());
scheduleTimer();
function counthint(){
	let form = new FormData();
	form.append('_token','{{ csrf_token() }}');
    form.append('group_id','{{$group_id}}');
    $.ajax({
        url:'{{route('countHint')}}',
        method:'POST',
		processData: false,
		contentType: false,
		cache: false,
        data:form,

        success: function(response){
            console.log('response');
            console.log(response);
        }, error: function(error){
            console.log('error');
            console.log(error);
        }
    });
}





(function(){"use strict";

var secondsSpentElement = document.getElementById("seconds-spent");


requestAnimationFrame(function updateTimeSpent(){
var timeNow = performance.now();

secondsSpentElement.value = round(timeNow/1000);


requestAnimationFrame(updateTimeSpent);
});
var performance = window.performance, round = Math.round;
})();
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

<script type="text/javascript">


	$(document).ready(function(){
		document.addEventListener('contextmenu', event => event.preventDefault());
		$('.hiddeninputs').each(function() {
			var value = $(this).val();
			$(this).val(window.atob(value));
		})
	});
</script>
@endpush
