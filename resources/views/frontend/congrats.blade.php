@extends('layouts.default')

<script src="https://kit.fontawesome.com/a076d05399.js"></script>

@push('css')

<link rel="stylesheet" href="{{asset('public/assets/screen4.css')}}">

<link href="{{asset('public/assets/mdb.css')}}" rel="stylesheet">

<style>

    .main-section-para {

        font-family: 'Segoe UI REGULAR';

        font-size: 20px;

        font-weight: bolder;

        font-size: 51px;

        color: #1C4251;

        position: relative;

        top: -60px;

    }

    p{

        position: relative;

        top: 0px;

        font-family: system-ui;

        color: #1C4251;

        font-size: 30px;

    }

    .loop-section {

        margin-left: 14rem;
        min-height:80vh;
        max-height:110vh;
        margin-right: 14rem;

        
        background: rgba(255, 255, 255, 0.5) !important;

    }

    .customFinal{

        color: red;

        font-size: 40px;

        position: relative;

        

        font-weight:bold;

    }

    #myVideo {

          position: fixed;

          right: 0;

          bottom: 0;

          min-width: 100%; 

          min-height: 100%;

        overflow:hidden;

        }

        #myBtn:focus{

            outline:none !important;

        }

    #body_screen4{

        z-index:9999;

    }

    .btnCustomChoose{

            color: #fff;

            background-color: #E74218;

            border: 0px;

            font-size: 14px;

            padding: 10px 22px;

            border-radius: 4px;

            font-weight: bold;

            width:300px;

        }

</style>

@endpush

@php

    $img = isset($final_template) ? $final_template->image : asset('public/assets/images/screen4-bg.jpg');

@endphp

@section('content')

    <div id="body_screen4" @if($save_data->adventure->final_template->type != 2) style="background:url('{{$img}}')" @endif>

@if($save_data->adventure->final_template->type == 2)

        <video autoplay id="myVideo">

            <source src="{{asset($save_data->adventure->final_template->video)}}" type="video/mp4">

            Your browser does not support HTML5 video.

        </video>

@else

    <audio autoplay id="myautoload" style="display:none;">

    <source src="{{$save_data->adventure->final_template->audio}}" type="audio/mpeg">

    Your browser does not support the audio element.

    </audio>

@endif

    {{--top section--}}

        <section class="top-section">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-6">

                        <div class="float-left">

                            <!-- <p class="head-top-left">ESCAPE THE VIRUS</p>

                            <p class="head-top-left-2">EDITION 1</p> -->

                        </div>

                    </div>

                </div>

            </div>

        </section> 

        {{-- end-top-section --}}



        {{-- start-main-section --}}

        <section class="loop-section">

            <div class="container">

                <div class="row text-center" style="position:relative;top:35px;justify-content:center;">

                    <p class="customParagragh" style="font-weight:bold;top: 0px !important;">

                            <!-- {!! $save_data->adventure->final_template->final_template_text !!} -->

                            {{__('common.text19')}}

                        </p>

                </div>

                <div class="row text-center h-50">

                    <div class="col-sm-12 my-auto">

                      <p class="customParagragh" style="font-size:23px !important;top: 10px;">

;                         @if($locale == 'de')

                            @php

                                $text = $save_data->adventure->final_template->final_template_text;

                                $string = strip_tags($text);

                                echo html_entity_decode($string);

                            @endphp

                          @elseif($locale == 'en')

                            @php

                                $text = $save_data->adventure->final_template->final_template_text_en;

                                $string = strip_tags($text);

                                echo html_entity_decode($string);

                            @endphp

                          @elseif($locale == 'fr')

                           @php

                                $text = $save_data->adventure->final_template->final_template_text_fr;

                                $string = strip_tags($text);

                                echo html_entity_decode($string);

                            @endphp

                          @else

                           @php

                                $text = $save_data->adventure->final_template->final_template_text;

                                $string = strip_tags($text);

                                echo html_entity_decode($string);

                            @endphp

                          @endif

                        </p>
        @if (session('error_message'))

                                <p style="color:red;font-size:16px; font-weight:bold;">
                                    {{__('common.text29')}}

                                </p>

                            @endif
                        <p class="customFinal" style="font-size:25px !important;">Final Time    {{gmdate("H:i:s", $save_data->timer)}}</p>

                        @if($group)

                          

                        <p class="customFinal" style="margin:auto; font-size:25px !important;"><a href="{{url('final-score/'.$code.'/'.$group)}}" style="color:#fff"><img src="{{asset('public/images/score.png')}}" height="130" width="150">  </a> </p>

                        <br><br>

                          

                        @endif

                    </div>

                </div>

            </div>

        </section>

        {{-- start-main-section --}}

    <section class="icon text-right hint-section">

        <div class="container-fluid">

            <div class="row">

                <div class="col">

                    

                    <!-- Modal 1-->

                    <div class="modal fade right" id="exampleModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">

                        <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">

                            <div class="modal-content-full-width modal-content ">

                                <div class=" modal-header-full-width   modal-header text-center">

                                    <p class="hint-number">1</p>

                                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">

                                        <i class="fas fa-times close-icon"></i>

                                    </button>

                                </div>

                                <div class="modal-body">

                                    <div class="container">

                                        <h4 class="text-left fadeIn my-5 pt-3 hint-heading"> Not for money, but for humanity</h4>

                                        <p class="text-left fadeIn my-5 pt-3 hint-para"> Not for money, but for humanity</p>

                                        <div class="row">

                                            <div class="col">

                                                <button type="button" class="btn btn-secondary text-left prev-button"  data-toggle="modal" data-target="#exampleModalPreview2" data-dismiss="modal">Next hint</button>

                                                <button type="button" class="btn btn-secondary text-left next-button" data-dismiss="modal">Try without hint</button>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                            </div>

                        </div>

                    </div>

                    {{-- modal 2--}}

                    <div class="modal fade right" id="exampleModalPreview2" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel2" aria-hidden="true">

                        <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">

                            <div class="modal-content-full-width modal-content ">

                                <div class=" modal-header-full-width modal-header text-center">

                                    <p class="hint-number">2</p>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                        <i class="fas fa-times close-icon"></i>

                                    </button>

                                </div>

                                <div class="modal-body">

                                    <div class="container">

                                        <h4 class="text-left fadeIn my-5 pt-3 hint-heading"> Not for money, but for humanity</h4>

                                        <p class="text-left fadeIn my-5 pt-3 hint-para"> Not for money, but for humanity</p>

                                        <div class="row">

                                            <div class="col">

                                                <button type="button" class="btn btn-secondary text-left prev-button"   data-toggle="modal" data-target="#exampleModalPreview3" data-dismiss="modal">Sollution</button>

                                                <button type="button" class="btn btn-secondary text-left next-button" data-dismiss="modal">Try without hint</button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- modal 3--}}

                    <div class="modal fade right" id="exampleModalPreview3" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel3" aria-hidden="true">

                        <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">

                            <div class="modal-content-full-width modal-content ">

                                <div class=" modal-header-full-width modal-header text-center">

                                    <p class="hint-number-exclamation">!</p>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                        <i class="fas fa-times close-icon"></i>

                                    </button>

                                </div>

                                <div class="modal-body">

                                    <div class="container">

                                        <h4 class="text-left fadeIn my-5 pt-3 hint-heading"> Not for money, but for humanity</h4>

                                        <p class="text-left fadeIn my-5 pt-3 hint-para"> Not for money, but for humanity</p>

                                        <div class="row">

                                            <div class="col">

                                                <button type="button" class="btn btn-secondary text-left next-button" data-dismiss="modal">Edit final code</button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                </div>

            </div>

        </div>

    </section>

    </div>

<!-- h2>Sound Information</h2>

    <div id="length">Duration:</div>

    <div id="source">Source:</div>

    <div id="status" style="color:red;">Status: Loading</div>

    <hr>

    <h2>Control Buttons</h2>

    <button id="play">Play</button>

    <button id="pause">Pause</button>

    <button id="restart">Restart</button>

    <hr>

    <h2>Playing Information</h2>

    <div id="https://www.w3schools.com/tags/horse.mp3currentTime">0</div -->

@endsection

@push('js')

<script type="text/javascript">

    var myadido = document.getElementById("myautoload");

    var myVideo = document.getElementById("myVideo");

    @if($save_data->adventure->final_template->type == 2)

        $( "#body_screen4" ).mouseover(function() {

        myVideo.play();

        });

        $('.loop-section').mouseover(function() {

            myVideo.play();

        });

        window.addEventListener('load', function () {

            myVideo.play();

        });

    @else

        $( "#body_screen4" ).mouseover(function() {

            myadido.play();

            myVideo.play();

        });

        $('.loop-section').mouseover(function() {

            myadido.play();

            myVideo.play();

        });

        window.addEventListener('load', function () {

            myadido.play();

            myVideo.play();

        });

    @endif

</script>

<script>

    

    $(document).ready(function() {

        var audioElement = document.createElement('audio');

    audioElement.setAttribute('src', 'http://www.soundjay.com/misc/sounds/bell-ringing-01.mp3');

    

    audioElement.addEventListener('ended', function() {

        this.play();

    }, false);

    

    audioElement.addEventListener("canplay",function(){

        $("#length").text("Duration:" + audioElement.duration + " seconds");

        $("#source").text("Source:" + audioElement.src);

        $("#status").text("Status: Ready to play").css("color","green");

    });

    

    audioElement.addEventListener("timeupdate",function(){

        $("#currentTime").text("Current second:" + audioElement.currentTime);

    });

    

    $('#play').click(function() {

        audioElement.play();

        $("#status").text("Status: Playing");

    });

    

    $('#pause').click(function() {

        audioElement.pause();

        $("#status").text("Status: Paused");

    });

    

    $('#restart').click(function() {

        audioElement.currentTime = 0;

    });

});

    //window.addEventListener('load', function () {

    //  trigger()

    //});

    function trigger(){

        document.getElementById("play").click();

    }

</script>

@endpush

