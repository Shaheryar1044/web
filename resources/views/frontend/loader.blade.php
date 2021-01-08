@extends('layouts.default')
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@push('css')
{{--     <link rel="stylesheet" href="../../../public/assets/screen4.css">--}}
     <link rel="stylesheet" href="{{asset('assets/screen4.css')}}">
<link href="{{asset('assets/mdb.css')}}" rel="stylesheet">
<style>
    @media (max-width: 500px){
    .customClassRow {
        left: 18px !important;
        top: 5px !important;
}
}
    @media (max-width: 500px) {
    .customClassRow img {
        width: 30px !important;
        height: 30px !important;
    }
    }
    .customSetting{
        width: 842px;
        padding-left: 0px;
        padding-right: 0px;
        background-color: white;
        margin: 20px;
        height: 365px;
        padding: 1px;
        margin-left: 190px;
        margin-right: 190px;
        position: relative;
        top: -12px;
    }
    .main-section-para {
        font-family: 'Segoe UI REGULAR';
        font-size: 20px;
        font-weight: bolder;
        position: relative;
        top: 15px;
        color: #1C4251;
    }
    .customImage{
        width: 500px;
    }
    .customLoader{
        position: relative;
        top: -91px;
        background-color: white;
        margin-left: -62px;
        height: 120px;
        width: 150px;
    }
    .customSecondImage{
        width: 150px;
    }
	p.customPara1 {
    display: none;
	}
</style>
@endpush
@section('content')
    <div id="body_screen4" style="background:url('{{asset('assets/images/screen4-bg.jpg')}}')">
    {{--top section--}}
        <section class="top-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="float-left">
                            <p class="head-top-left">ESCAPE THE VIRUS</p>
                            <p class="head-top-left-2">EDITION 1</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="float-right">
                            <p class="head-top-right">58:34</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- end-top-section --}}

        {{-- start-main-section --}}
        <section class="loop-section">
            <div class="container">
                <div class="row text-center h-100">
                    <div class="col-sm-12 my-auto">
                        <p class="main-section-para px-5">Oh we have solved the first riddle.Keep up the good work.I believe in you.Everything<br>is a bit choatic and i have to take a break.In the end its always a question of<br> perspective whether you work to much or not.</p>
                    </div>
                    <div class="customSetting">
                        <img src="{{asset('assets/images/helloimage.png')}}" class="customImage" />
                    </div>
                    <div class="customLoader">
                    <img src="{{asset('assets/images/loader.png')}}" class="customSecondImage"/>
                    </div>
                </div>
            </div>
        </section>
        {{-- start-main-section --}}
    <section class="icon text-right hint-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <a href="#" data-toggle="modal" data-target="#exampleModalPreview"><i class="fas fa-question question-icon"></i></a>
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

@endsection
@push('js')
@endpush
