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
	    margin: auto;
            padding: 0px;
 	    text-align: center;
 	    display: block;
 	    justify-content: center;
 	    flex-direction: column;
 	    max-width: fit-content;
        }
        .customPara {
            display: block;
            text-align: center;
            letter-spacing: 0px;
            color: #FFFFFF;
            opacity: 1;
            font-size: 25px;
            font-weight: 600;
        }
        .customPara2 {
            display: inline-block;
            text-align: center;
            letter-spacing: 0px;
            color: #FFFFFF;
            opacity: 1;
            font-size: 16px;
            font-weight: 500;
        }
        .customImage{
            width: 260px;
            margin: 0 auto;
            padding-bottom: 30px;
        }
        .customBorderBox {
            padding: 12px 20px;
            min-width: 600px;
            width:fit-content;
            margin: 15px auto;
            padding-bottom: 0px;
        }
        .btnCustomChoose{
            color: #fff;
            background-color: #E74218;
            border: 0px;
            font-size: 14px;
            padding: 10px 18px;
            border-radius: 4px;
            font-weight: bold;

        }
        .btnCustomChoose:focus{
            outline: none;
        }
        .teams{
            color: #fff;
            font-weight: bold;
            font-size: 20px;
            padding-left: 10px;
        }
        .members{
            font-weight: normal;
            color: #fff;
            font-size: 14px;
        }
        .customRowAlign{
            align-items: center;
            margin-bottom: 15px;
        }
        .customImageQuestionMark{
            position: absolute;
	    display: block;
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
        @media (max-width: 767px) {
             h1.congrats-text {
    		font-size: inherit;
    		padding-top: 12px;
	 }
            .customRowArea {
                padding: 0px;
 	    	text-align: center;
 	    	display: block;
 	    	justify-content: center;
 	    	flex-direction: column;
 	    	max-width: fit-content;
            }
            .customBorderBox {
                /*border: 2px solid #E74218;*/
                padding: 12px 20px;
                width: 100%;
                margin: 0 auto;
                padding-bottom: 0px;
		min-width: fit-content;
            }
        }
        hr {
            display: block;
            height: 1px;
            border: 0;
            border-top: 2px solid #E74218;
            margin: 1em 0;
            padding: 0;
        }
    </style>
@endpush
@section('content')

    <div class="container styleContainer">
       <section class="top-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                       <!--<div class="float-left">-->
                       <!--     <p class="head-top-left">{{$adventure->template->name}}</p>-->
                       <!--     <p class="head-top-left-2">{{$adventure->edition->name}}</p>-->
                       <!--</div>-->
                    </div>
                    <div class="col-6">

                    </div>
                </div>
            </div>
        </section>
        <div class="row customRowArea">
            <img class="customImageQuestionMark" src="{{asset('images/1stpage-questionmark.png')}}" />
            <img class="customImage" src="{{asset('images/logo_clue-masters.png')}}" />

            <span class="customPara">
                Score
        </span>

            <div class="customBorderBox">


                    @php
                        $count = 0;
                        $winner = 0;
                        $my = 0;
                    @endphp
                    @foreach($adventure->groups as $group)

                        <div class="row customRowAlign" style="flex-wrap: break-word;">

                            <div class="col-md-6 ">

                                @if($winner == 0 && $group->timer > 0)
                                    @if($group->id == $myGroup->id)
                                        @php
                                            $my++
                                        @endphp
                                    @endif
                                    <span class="teams pull-left" style="color:#54cf54;"> {{$group->name}}</span>
                                    @php
                                        $winner++
                                    @endphp
                                @else
                                <span class="teams pull-left">{{$group->name}}</span>
                                @endif
                            </div>

                            <div class="col-md-6" style="text-align: right;">
                                <button class="btnCustomChoose" style="margin-right: 6px;">{{$group->hintscount}} {{__('common.text28')}}</button>
                                <button class="btnCustomChoose">{{gmdate("H:i:s",$group->timer)}}</button>

                            </div>
                        </div>
                        <hr>
                    @endforeach

            </div>
            <div style="width: fit-content; margin: auto; border: 1px solid #E74218;background: #e742186e;padding: 14px;min-width: 258px;">
                @php
                        $count = 0;
                        $winner = 0;
                    @endphp

                        <h4 style="color:#fff;">{{__('common.text27')}}:</h4>
                        <h6 style="color:#fff;">{{$group->name}}</h6>
                        @foreach($myGroup->users as $user)
                           <p style="color:#E74218;">{{$user->name}}</p>
                        @endforeach

            </div>
            @if($my > 0)
            <h1 style="color:#54cf54;" class="congrats-text">{{__('common.text25')}}</h1>
            @else
            <h1 style="color:#54cf54;" class="congrats-text">{{__('common.text26')}}</h1>
            @endif
            <img class="customImageQuestionMark2" src="{{asset('images/1stpage-questionmark.png')}}" />
        </div>
    </div>
@endsection
