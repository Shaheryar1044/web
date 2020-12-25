@extends('admin.layouts.app')
@section('title')
Create Challange
@endsection
@push('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .customClassBorder{
        }
    </style>
@endpush
@section('content')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
    });
    </script>
<div class="container customContainer">
<div class="row">
    <div class="col-md-8">
        <div class="card">
                <div class="card-header">Create an escape challenge</div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <form method="post" action="{{route('storeChallenge')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div style="padding-bottom: 0px" class="card-body">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Challenge Name</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="challenge_name" placeholder="for example escape the virus"  value="{{ old('challenge_name') }}" required="" class="form-control">

                                @if($errors->has('challenge_name'))
                                    <p style="color:red;">{{ $errors->first('challenge_name') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card-body" style="padding-bottom: 0px">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Type of Challenge</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <select class="form-control" name="type_of_challenge" id="challengetype" required="" onchange="show($(this).val())">
                                    <option value="">Choose one</option>

                                    <option value="picture" {{old('type_of_challenge')=='picture'? 'selected': ''}}>Picture</option>

                                    <option value="sound" {{old('type_of_challenge')=='sound'? 'selected': ''}}>Soundfile</option>

                                    <option value="video" {{old('type_of_challenge')=='video'? 'selected': ''}}>Video</option>

                                </select>

                                @if($errors->has('type_of_challenge'))
                                    <p style="color:red;">{{ $errors->first('type_of_challenge') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 12px;">
                    <div class="card-body" style="padding-bottom: 0px">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-8">
                        <div class="form-group" id="file" style="display: none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="file" multiple=""  id="filetype" name="challenge_files[]"  class="form-control">
                                    @if($errors->has('audio'))
                                        <p style="color:red;">{{ $errors->first('audio') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <input type="hidden" value="" id="language" />
                <div class="row" style="margin-top: 20px;margin-bottom:0px;">
                    <div class="card-body" style="padding-bottom: 12px;">
                    <div class="col-md-4">
                        <label>Languages</label>
                    </div>
                    <div class="customClassBorder col-md-8">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" onclick="changeLanguage('de')" href="#home">DE</a></li>
                            <li><a data-toggle="tab" onclick="changeLanguage('en')" href="#menu1">EN</a></li>
                            <li><a data-toggle="tab" onclick="changeLanguage('fr')" href="#menu2">FR</a></li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div style="padding-top: 0px;" class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="customClassBorder col-sm-8">
                                            <label>Text above challenge</label>
                                            <textarea name="text_above_challenge"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="customClassBorder col-sm-8">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Hints</label>
                                                </div>
                                                <div class="co-md-8">
                                                    <input type="radio" checked name="challenge_hints" onclick="hints($(this).val())"  id= 'first' value="1" {{ old('challenge_hints') == '1' ? 'checked' : '' }}> <label for ="first">Yes</label>

                                                    <input type="radio" onclick="hints($(this).val())" name="challenge_hints" id='second' value="0" {{ old('challenge_hints') == '0' ? 'checked' : '' }}>
                                                    <label for="second">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div  id="hints">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">

                                            </div>
                                            <div class="customClassBorder col-sm-8">
                                                <label>First hint</label>
                                                <input type="text"name="first_hint" placeholder="enter the heading here"   id="first_hint" value="{{old('first_hint')}}" class="form-control">

                                                @if($errors->has('first_hint'))
                                                    <p style="color:red;">{{ $errors->first('first_hint') }}</p>
                                                @endif
                                                <input type="text" placeholder="Enter the text above 1st hint here" required="" id="text_above_first_hint" class="form-control" name="text_above_first_hint">
                                                @if($errors->has('text_above_first_hint'))
                                                    <p style="color:red;">{{ $errors->first('text_above_first_hint') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                            </div>
                                            <div class="customClassBorder col-sm-8">
                                                <label>2nd hint</label>
                                                <input type="text"name="hint2" placeholder="enter the heading here"  value="{{old('hint2')}}" id="hint2" class="form-control">

                                                @if($errors->has('hint2'))
                                                    <p style="color:red;">{{ $errors->first('hint2') }}</p>
                                                @endif
                                                <input type="text" placeholder="Enter the text above 2nd hint here" class="form-control" value="{{old('text_above_2nd_hint')}}" id="text_above_2nd_hint" name="text_above_2nd_hint_1">
                                                @if($errors->has('text_above_2nd_hint'))
                                                    <p style="color:red;">{{ $errors->first('text_above_2nd_hint') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                            </div>
                                            <div class="customClassBorder col-sm-8">
                                                <label>3rd hint & solution</label>
                                                <input type="text"name="hint3" placeholder="enter the heading here"  id="hint3"  class="form-control">

                                                @if($errors->has('hint3'))
                                                    <p style="color:red;">{{ $errors->first('hint3') }}</p>
                                                @endif
                                                <input type="text" placeholder="Enter the text above 3rd hint here"  id="text_above_3rd_hint" class="form-control" name="text_above_3rd_hint">
                                                @if($errors->has('text_above_3rd_hint'))
                                                    <p style="color:red;">{{ $errors->first('text_above_3rd_hint') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div style="padding-top: 0px;" class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-8">
                                        <label>Text above challenge</label>
                                        <textarea name="text_above_challenge_en"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Hints</label>
                                            </div>
                                            <div class="co-md-8">
                                                <input type="radio" checked name="challenge_hints_en" onclick="hints_en($(this).val())"  id= 'first_en' value="1"> <label for ="first">Yes</label>

                                                <input type="radio" onclick="hints_en($(this).val())" name="challenge_hints_en" id='second_en' value="0">
                                                <label for="second">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div  id="hints_en">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">

                                        </div>
                                        <div class="col-sm-8">
                                            <label>First hint</label>
                                            <input type="text"name="first_hint_en" placeholder="enter the heading here"  id="first_hint_en" class="form-control">

                                           
                                            <input type="text" placeholder="Enter the text above 1st hint here"  id="text_above_first_hint_en" class="form-control" name="text_above_first_hint_en">
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-8">
                                            <label>2nd hint</label>
                                            <input type="text"name="hint2_en" placeholder="enter the heading here" class="form-control" id="hint2_en">

                                            <input type="text" placeholder="Enter the text above 2nd hint here" class="form-control" name="text_above_2nd_hint_en" id="text_above_2nd_hint_en">
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-8">
                                            <label>3rd hint & solution</label>
                                            <input type="text"name="hint3_en" placeholder="enter the heading here"  class="form-control" id="hint3_en">
                                            <input type="text" placeholder="Enter the text above 3rd hint here" class="form-control" name="text_above_3rd_hint_en" id="text_above_3rd_hint_en">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div style="padding-top: 0px;" class="card-body">
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-8">
                                        <label>Text above challenge</label>
                                        <textarea name="text_above_challenge_fr"></textarea>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Hints</label>
                                            </div>
                                            <div class="co-md-8">
                                                <input type="radio" checked name="challenge_hints_fr" onclick="hints_fr($(this).val())"  id= 'first_fr' value="1" {{ old('challenge_hints') == '1' ? 'checked' : '' }}> <label for ="first">Yes</label>

                                                <input type="radio" onclick="hints_fr($(this).val())" name="challenge_hints_fr" id='second_fr' value="0" {{ old('challenge_hints') == '0' ? 'checked' : '' }}>
                                                <label for="second">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div  id="hints_fr">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">

                                        </div>
                                        <div class="col-sm-8">
                                            <label>First hint</label>
                                            <input type="text"name="first_hint_fr" placeholder="enter the heading here"   id="first_hint_fr" class="form-control">
                                            <input type="text" placeholder="Enter the text above 1st hint here" id="text_above_first_hint" class="form-control" name="text_above_first_hint_fr">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-8">
                                            <label>2nd hint</label>
                                            <input type="text" name="hint2_fr" placeholder="enter the heading here"  id="hint2_fr" class="form-control">
                                            <input type="text" placeholder="Enter the text above 2nd hint here" class="form-control" id="text_above_2nd_hint_fr" name="text_above_2nd_hint_fr">
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-8">
                                            <label>3rd hint & solution</label>
                                            <input type="text" name="hint3_fr" placeholder="enter the heading here"  id="hint3_fr"  class="form-control">
                                            <input type="text" placeholder="Enter the text above 3rd hint here" id="text_above_3rd_hint" class="form-control" name="text_above_3rd_hint_fr">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card-body" style="padding-bottom: 0px">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Type of Lock</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="radio" name="lock" checked id= 'number' value="number" {{ old('lock') == 'number' ? 'checked' : '' }} onclick="showFinal($(this).val())" > <label for ="number">Enter Numbers</label>

                                <input type="radio"  name="lock" id='tnumber' value="tnumber" {{ old('lock') == 'tnumber' ? 'checked' : '' }} onclick="showFinal($(this).val())">
                                <label for="tnumber">Turn Numbers</label>

                                <input type="radio"  name="lock" id='field' value="field" {{ old('lock') == 'field' ? 'checked' : '' }} onclick="showFinal($(this).val())" >
                                <label for="field">Number Field</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card-body" style="padding-bottom: 0px">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Final code</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text"name="finalCode" placeholder="enter code"  required="" value="{{old('finalCode')}}"  class="form-control">

                                @if($errors->has('finalCode'))
                                    <p style="color:red;">{{ $errors->first('finalCode') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 20px;" class="row">
                    <div class="card-body" style="padding-bottom: 0px">
                    <input type="submit" name="submit" value="Save & Back" class="customBtnClass btn btn-default">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" name="submit" value="Save & New One" class="customBtnClass btn btn-default">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        changeLanguage('de');
		$('#second').prop('checked',true);
		hints(0);
		$('#first_hint_fr, #hint2_fr, #hint3_fr, #text_above_first_hint_fr, #text_above_2nd_hint_fr, #text_above_3rd_hint_fr').removeAttr('required');
		$('#first_hint_en, #hint2_en, #hint3_en, #text_above_first_hint_en, #text_above_2nd_hint_en, #text_above_3rd_hint_en').removeAttr('required');
		$('#first_hint, #hint2, #hint3, #text_above_first_hint, #text_above_2nd_hint, #text_above_3rd_hint').removeAttr('required');
    });
    function changeLanguage(val) {
        if(val=='de') {
            $('#language').val('de');
			$('#first_hint_fr, #hint2_fr, #hint3_fr, #text_above_first_hint_fr, #text_above_2nd_hint_fr, #text_above_3rd_hint_fr').removeAttr('required');
				//hints_fr(0);
				//$('#second_fr').prop('checked',true);
			$('#first_hint_en, #hint2_en, #hint3_en, #text_above_first_hint_en, #text_above_2nd_hint_en, #text_above_3rd_hint_en').removeAttr('required');
				//hints_en(0);
				//$('#second_en').prop('checked',true);
			
        }
        if(val=='en') {
            $('#language').val('en');
		$('#first_hint_fr, #hint2_fr, #hint3_fr, #text_above_first_hint_fr, #text_above_2nd_hint_fr, #text_above_3rd_hint_fr').removeAttr('required');
				//hints_fr(0);
				//$('#second_fr').prop('checked',true);
			$('#first_hint, #hint2, #hint3, #text_above_first_hint, #text_above_2nd_hint, #text_above_3rd_hint').removeAttr('required');
				//hints(0);
				//$('#second').prop('checked',true);
		
        }
        if(val=='fr') {
            $('#language').val('fr');
			$('#first_hint, #hint2, #hint3, #text_above_first_hint, #text_above_2nd_hint, #text_above_3rd_hint').removeAttr('required');
			//hints(0);
			//$('#second').prop('checked',true);
			$('#first_hint_en, #hint2_en, #hint3_en, #text_above_first_hint_en, #text_above_2nd_hint_en, #text_above_3rd_hint_en').removeAttr('required');
			//hints_en(0);
			//$('#second_en').prop('checked',true);
        }
    }
   function show(t){
    if(t=='picture'){
        $("#file").show();
        $("#filetype").attr('accept', 'image/*').attr('required', true);
    }else if(t=='sound'){
       $("#file").show();
        $("#filetype").attr('accept', 'audio/*').attr('required', true);
    }else if(t=='video'){
        $("#file").show();
        $("#filetype").attr('accept', 'video/*').attr('required', true);
    }else{
        $("#file").hide();
         $("#filetype").removeAttr('required');
    }
   }
   function hints(t){
    if(t==1){
         $("#hints").show();
         $('#first_hint, #hint2, #hint3, #text_above_first_hint, #text_above_2nd_hint, #text_above_3rd_hint')
    }else{
        $("#hints").hide();
        $('#first_hint, #hint2, #hint3, #text_above_first_hint, #text_above_2nd_hint, #text_above_3rd_hint').removeAttr('required').val('');
    }
   }
	function hints_en(t){
		 if(t==1){
         $("#hints_en").show();
         $('#first_hint_en, #hint2_en, #hint3_en, #text_above_first_hint_en, #text_above_2nd_hint_en, #text_above_3rd_hint_en');
    }else{
        $("#hints_en").hide();
        $('#first_hint_en, #hint2_en, #hint3_en, #text_above_first_hint_en, #text_above_2nd_hint_en, #text_above_3rd_hint_en').removeAttr('required').val('');
    }
	}
	function hints_fr(t){
		 if(t==1){
         $("#hints_fr").show();
         $('#first_hint_fr, #hint2_fr, #hint3_fr, #text_above_first_hint_fr, #text_above_2nd_hint_fr, #text_above_3rd_hint_fr');
    }else{
        $("#hints_fr").hide();
        $('#first_hint_fr, #hint2_fr, #hint3_fr, #text_above_first_hint_fr, #text_above_2nd_hint_fr, #text_above_3rd_hint_fr').removeAttr('required').val('');
    }
	}
   function showFinal(t){
    if(t){
        $('#finalCode').show();
    }else{
        $('#finalCode').hide();
    }
   }
</script>
@endsection
