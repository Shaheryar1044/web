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
            border-radius: 5px;
            opacity: 1;
            padding: 13px 30px;
            border: 0px;
        }
        .customFomInputStyle{
            border-top: 0px;
            border-right: 0px;
            text-align: center;
            font-size: 16px;
            border-left: 0px;
            border-bottom: 2px solid #efefef;
            background: transparent;
            width: 30px;
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
    </style>
@endpush
@section('content')
<div class="container styleContainer">
    <div class="row customRowArea">
        <img class="customImageQuestionMark" src="{{asset('images/1stpage-questionmark.png')}}" />
        <img class="customImage" src="{{asset('images/logo_clue-masters.png')}}" />
        <span class="customPara">
             {{ __('common.text') }}
        </span>
        <span class="customPara">
            {{ __('common.text1') }}
        </span>
        <div class="customInputForms">
            <input type="text" name="code1" autofocus="on" id="code1" onkeyup="goToNext(event)" class="customFomInputStyle" maxlength="1"  autocomplete="off" />
            <input type="text" name="code2" id="code2" onkeyup="goToNext(event)" class="customFomInputStyle" maxlength="1"  autocomplete="off" />
            <input type="text" name="code3" id="code3" onkeyup="goToNext(event)" class="customFomInputStyle" maxlength="1"  autocomplete="off" />
            <input type="text" name="code4" id="code4" onkeyup="goToNext(event)" class="customFomInputStyle" maxlength="1"  autocomplete="off" />
            <input type="text" name="code5" id="code5" onkeyup="goToNext(event)" class="customFomInputStyle" maxlength="1"  autocomplete="off" />
            <input type="text" name="code6" id="code6" onkeyup="goToNext(event)" class="customFomInputStyle" maxlength="1"  autocomplete="off" />
        </div>
        <button class="customButton" onclick="start_mission()">
            <span id="textArea">{{__('common.text3')}}</span>
            <i class="fa fa-refresh fa-spin" id="loader" style="display: none;"></i>
        </button>
		<span class="custompara2">
             {{ __('common.text16') }} <a href="https://cluemasters.de/spiele/escape-spiele/" target="_blank">Online Shop</a>.
        </span>
        <img class="customImageQuestionMark2" src="{{asset('images/1stpage-questionmark.png')}}" />
        <img class="customLocalImage" src="{{asset('images/1stpage-locks.png')}}" />
    </div>
</div>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script>
        $(document).ready(function (){
            console.log('load page');
            setTimeout(function () {
                console.log('load page complete');
                $('#code1').focus();
            },500);
        })
        function valueExists(code){
            if(code) {
                console.log('check code exists');
                console.log(code);
                return true;
            } else {
                return false;
            }
        }
        function goToNext(e){
            let code1 =$('#code1').val();
            let code2 =$('#code2').val();
            let code3 =$('#code3').val();
            let code4 =$('#code4').val();
            let code5 =$('#code5').val();
            let code6 =$('#code6').val();
            if(valueExists(code1)) {
                $('#code2').focus();
                if(e.keyCode == 8) {
                    $('#code1').focus();
                }
            }
            if(valueExists(code2)) {
                $('#code3').focus();
                if(e.keyCode == 8) {
                    $('#code2').focus();
                }
            }
            if(valueExists(code3)) {
                $('#code4').focus();
                if(e.keyCode == 8) {
                    $('#code3').focus();
                }
            }
            if(valueExists(code4)) {
                $('#code5').focus();
                if(e.keyCode == 8) {
                    $('#code4').focus();
                }
            }
            if(valueExists(code5)) {
                $('#code6').focus();
                if(e.keyCode == 8) {
                    $('#code5').focus();
                }
            }
            if(valueExists(code6)) {
                console.log('code1,code2,code3,code4,code5,code6');
                console.log(code1,code2,code3,code4,code5,code6);
                start_mission(code1,code2,code3,code4,code5,code6);
            }
        }
        function start_mission(code1,code2,code3,code4,code5,code6){
            console.log('mission_start success');
            $('#textArea').hide();
            $('#loader').show();
            let code = code1+code2+code3+code4+code5+code6;
            $.ajax({
                url:'{{url("/check-event-id")}}/'+code,
                method:'GET',

                success: function (response) {
                    
                    if(response.status == true) {
                        // swal("Success", "You clicked the button!", "success");
                        setTimeout(() => {
                           if(response.data.attendees == 1){
                                window.location.href='{{url("/start-now/")}}/'+code;
                            }else{
                                window.location.href='{{url("/choose-person/")}}/'+code;
                            }
                        },1000);
                    } else if(response.message){
                        swal("Sorry...!", response.message, "error");
                        setTimeout(() => {
                            window.location.reload();
                        },1000);
                    }else {
                          swal("{{__('common.text4')}}...!", "{{__('common.text5')}}!", "error");
                        setTimeout(() => {
                            window.location.reload();
                        },1000);
                    }
                    $('#loader').hide();
                    $('#textArea').show();
                },
                error: function (error) {
                    console.log('error');
                    console.log(error);
                }
            });
        }
		@if(session()->has('error_message_final'))
			swal("Error...!", "{{session()->get('error_message_final')}}!", "error");
		@endif
    </script>
@endpush
