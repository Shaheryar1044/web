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
            display: block;
            justify-content: center;
            flex-direction: column;
        }
        .customPara {
            display: inline-block;
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
	    display: block;
            width: 260px;
            margin: 0 auto;
            padding-bottom: 30px;
        }
        .customBorderBox {
            border: 2px solid #E74218;
            padding: 12px 20px;
            width:fit-content;
            margin: 15px auto;
            padding-bottom: 0px;
            min-width: fit-content%;
        }
        .btnCustomChoose{
            color: #fff;
            background-color: #E74218;
            border: 0px;
            font-size: 14px;
            padding: 10px 22px;
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
        }
        .members{
            font-weight: normal;
            color: #fff;
            font-size: 14px;
        }
        .customRowAlign{
            align-items: center;
            margin-bottom: 15px;
            margin-right: 0px;
        }
        .customImageQuestionMark{
            position: absolute;
            width: 100px;
            display: block;
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
            .customRowArea {
                padding: 0px;
                text-align: center;
                display: block;
                justify-content: center;
                flex-direction: column;
                max-width: 100%;
            }
            .customBorderBox {
                border: 2px solid #E74218;
                padding: 12px 20px;
                width: 100%;
                margin: 0 auto;
                padding-bottom: 0px;
            }
        }
                @import url('https://fonts.googleapis.com/css?family=Montserrat');

.wrapper {
  position: relative;
  height: 12em;
}

.countdown-container {
  font-family: Montserrat, sans-serif;
  -webkit-font-smoothing: antialiased;
  width: 100%;
  height: 100%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  width: 100%;
}

.countdown {
  display: flex;
  transform-style: preserve3d;
  perspective: 500px;
  height: 100px;
  margin: 0 auto;
}
.countdown.remove {
  animation: hide-countdown 1s cubic-bezier(0, 0.9, 0.56, 1.2) forwards;
  overflow: hidden;
}

.number, .separator {
  display: block;
  color: #fff;
  height: 100px;
  font-size: 16px;
  position: relative;
  line-height: 100px;
  text-align: center;
  width: 100%;
}

.separator {
  margin: 0;
  width: 2rem;
}

.new, .old, .current {
  color: #fff;
  position: absolute;
  border-radius: 1rem;
  height: 100px;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
}

.new {
  animation: show-new 0.4s cubic-bezier(0, 0.9, 0.5, 1.2) forwards;
}

.old {
  animation: hide-old 2s cubic-bezier(0, 0.9, 0.56, 1.2) forwards;
}
1
.countdown section {
  position: relative;
}

@keyframes hide-countdown {
  to {
    height: 0;
    overflow: hidden;
  }
}
@keyframes show-new {
  0% {
    opacity: 0;
    transform: translate(-50%, -50%) translateY(-2rem) scale(0.8) rotateX(-20deg);
  }
  100% {
    transform: translate(-50%, -50%);
  }
}
@keyframes hide-old {
  0% {
    transform: translate(-50%, -50%);
  }
  100% {
    opacity: 0;
    transform: translate(-50%, -50%) translateY(-5rem) scale(0.5) rotateX(-75deg);
  }
}
@media (max-width: 767px) {
    .styleContainer{
        margin-top: 58px;
    }
}
.redBox{
    width: fit-content;
    word-wrap: break-word;
    margin: auto;
    border: 1px solid #E74218;
    background: #e742186e;
    padding: 14px;
}
.customRowAlign{
    text-align: center;
}
    </style>
@endpush
@section('content')

    <div class="container styleContainer">
       <section class="top-section">
            <div class="container-fluid">
               <img src="{{asset('public/images/refresh.png')}}" width="50" style="position: absolute;top:80px;cursor:pointer; top:16px; left:161px; height: 50px;" onclick="location.reload()">
            </div>
        </section>
        <div class="customRowArea">
             <div >

                   @if($remaining_time > 0)

                       <article id="js-countdown" class="countdown" style="width: 200px;">
                           <section id="js-days" class="number"></section>
                          <section id="js-separator" class="separator">:</section>
                          <section id="js-hours" class="number"></section>
                          <section id="js-separator" class="separator">:</section>
                          <section id="js-minutes" class="number"></section>
                          <section id="js-separator" class="separator">:</section>
                          <section id="js-seconds" class="number"></section>
                        </article>
                    @else
                    event has started
                    @endif





                    </div>
            <img class="customImageQuestionMark" src="{{asset('images/1stpage-questionmark.png')}}" />
            <img class="customImage" src="{{asset('images/logo_clue-masters.png')}}" />
            @if(count($user->groups))
                <div class="redBox">


                        <h4 style="color:#fff;">{{__('common.text27')}}:</h4>
                        <h6 style="color:#fff;">{{$user->groups[0]->name}}</h6>
                        @foreach($user->groups[0]->users as $u)
                           <p style="color:#E74218;">{{$u->name}}</p>
                        @endforeach

            </div>

            @endif
            @if(session()->has('error_message'))
                <div class="alert alert-danger">
                    {{ session()->get('error_message') }}
                </div>
            @endif
            <span class="customPara">
            {{__('common.text6')}}
        </span>
            <span class="customPara2">
           {{__('common.text7')}}
        </span>
            <div class="customBorderBox">
                @if(isset($adventure) && $adventure->attendees == 1)
                    <div class="row customRowAlign">



                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <span class="teams">{{__('common.text10')}} 1</span>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <span class="members">1 {{__('common.text9')}}</span>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <button class="btnCustomChoose" onclick="chooseOption()">{{__('common.text8')}}</button>
                        </div>
                    </div>
                @elseif(isset($adventure) && $adventure->attendees == 0)
                    @php
                        $count = 0;
                    @endphp
                    @foreach($adventure->groups as $group)

                        <div class="row customRowAlign">

                            <div class="col-md-4">
                                <span class="teams"> {{$group->name}}</span>
                            </div>
                            <div class="col-md-4">
                                <span class="members">{{count($group->users)}}/{{$adventure->users_per_group}} {{__('common.text9')}}</span>
                            </div>

                            <div class="col-md-4">
                                @if(count($group->users) < $adventure->users_per_group && !count($user->groups))
                                <button class="btnCustomChoose" onclick="chooseOption('{{$group->id}}')">{{__('common.text8')}}</button>
                                @else
                                <button class="btnCustomChoose" disabled="" style="background-color: #e74218b8;">{{__('common.text8')}}</button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <img class="customImageQuestionMark2" src="{{asset('images/1stpage-questionmark.png')}}" />
        </div>
    </div>
@endsection
@push('js')
    <script>
        function chooseOption(gid=''){
            // swal("Success", "Team Choose Successfully!", "success");
             setTimeout(() => {
               window.location.href='{{url("/joinevent")}}/{{$adventure->event_id}}/'+gid;
            },1000);
        }

    </script>
    <script type="text/javascript">
    $(function() {

  var targetDate  = new Date(Date.parse("{{$adventure->start_time}}"));
  var now   = new Date();

  window.days = daysBetween(now, targetDate);
  var secondsLeft = secondsDifference(now, targetDate);
  window.hours = Math.floor(secondsLeft / 60 / 60);
  secondsLeft = secondsLeft - (window.hours * 60 * 60);
  window.minutes = Math.floor(secondsLeft / 60 );
  secondsLeft = secondsLeft - (window.minutes * 60);
  console.log(secondsLeft);
  window.seconds = Math.floor(secondsLeft);
    startCountdown();
});
var interval;

function daysBetween( date1, date2 ) {
  //Get 1 day in milliseconds
  var one_day=1000*60*60*24;

  // Convert both dates to milliseconds
  var date1_ms = date1.getTime();
  var date2_ms = date2.getTime();

  // Calculate the difference in milliseconds
  var difference_ms = date2_ms - date1_ms;

  // Convert back to days and return
  return Math.round(difference_ms/one_day);
}

function secondsDifference( date1, date2 ) {
  //Get 1 day in milliseconds
  var one_day=1000*60*60*24;

  // Convert both dates to milliseconds
  var date1_ms = date1.getTime();
  var date2_ms = date2.getTime();
  var difference_ms = date2_ms - date1_ms;
  var difference = difference_ms / one_day;
  var offset = difference - Math.floor(difference);
  return offset * (60*60*24);
}



function startCountdown() {
  $('#input-container').hide();
  $('#countdown-container').show();

  displayValue('#js-days', window.days);
  displayValue('#js-hours', window.hours);
  displayValue('#js-minutes', window.minutes);
  displayValue('#js-seconds', window.seconds);

  interval = setInterval(function() {

    if(window.days == 0 && window.hours == 0 && window.minutes == 0 && window.seconds == 0){
        window.location = '{{url("/start-now")}}/{{$adventure->event_id}}/{{count($user->groups)?$user->groups[0]->id:''}}';
    }else{


    if (window.seconds > 0) {

      window.seconds--;
      displayValue('#js-seconds', window.seconds);
    } else {
      // Seconds is zero - check the minutes
      if (window.minutes > 0) {
        window.minutes--;
        window.seconds = 59;
        updateValues('minutes');
      } else {
        // Minutes is zero, check the hours
        if (window.hours > 0)  {
          window.hours--;
          window.minutes = 59;
          window.seconds = 59;
          updateValues('hours');
        } else {
          // Hours is zero
          window.days--;
          window.hours = 23;
          window.minutes = 59;
          window.seconds = 59;
          updateValues('days');
        }
        // $('#js-countdown').addClass('remove');
        // $('#js-next-container').addClass('bigger');
      }
    }}
  }, 1000);
}


function updateValues(context) {
  if (context === 'days') {
    displayValue('#js-days', window.days);
    displayValue('#js-hours', window.hours);
    displayValue('#js-minutes', window.minutes);
    displayValue('#js-seconds', window.seconds);
  } else if (context === 'hours') {
    displayValue('#js-hours', window.hours);
    displayValue('#js-minutes', window.minutes);
    displayValue('#js-seconds', window.seconds);
  } else if (context === 'minutes') {
    displayValue('#js-minutes', window.minutes);
    displayValue('#js-seconds', window.seconds);
  }
}

function displayValue(target, value) {
  var newDigit = $('<span></span>');
  $(newDigit).text(pad(value))
    .addClass('new');
  $(target).prepend(newDigit);
  $(target).find('.current').addClass('old').removeClass('current');
  setTimeout(function() {
    $(target).find('.old').remove();
    $(target).find('.new').addClass('current').removeClass('new');
  }, 900);
}

function pad(number) {
  return ("0" + number).slice(-2);
}
</script>
@endpush
