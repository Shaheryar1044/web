@extends('admin.layouts.app')
@push('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .customClassBorder{
        }
        .customRowMm{
            margin-top: 20px;
            margin-bottom: 20px;
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
    <div class="row customRow">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create an final template</div>

                <div class="card-body">
                   @if (session('status'))
                         <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                         </div>
                    @endif
                    <form method="post" action="{{route('storefinalTemplate')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Final Template Name</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="name" placeholder="for example escape the virus"  value="{{ old('name') }}" class="form-control"> 

                                    @if($errors->has('name'))
                                        <p style="color:red;">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
						<div class="form-group" style="height: 52px;">
							<div class="row">
								 <div class="col-sm-4" style="position:relative;top:10px;">
									 <label>Choose</label>
								 </div>
								<div class="col-sm-8">
									<select class="form-control" name="type" id="opt" onchange="chooseOpt()">
										<option value="1" > Image </option>
										<option value="2" > video </option>
									</select>
								</div>
							</div>
						</div>
                        <div class="form-group" id="imageFile">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Template picture</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="addBox" style="margin: 0px;">
                                        <p id="pp">Preparing files for loading</p>
                                        <p id="pp">or</p>
                                        <label id="label" for="upload-photo">Select file<label>
                                        <input type="file" name="image" id="upload-photo" accept="image/*" class="form-control"> 
                                    </div>
                                    @if($errors->has('image'))
                                        <p style="color:red;">{{ $errors->first('image') }}</p>
                                    @endif
                                </div>
                            </div>
                            </div>
						<div class="form-group" id="videoFile" style="display:none;">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Template Video</label>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <input type="file"  name="video" accept="video/*" class="form-control"> 
                                     @if($errors->has('video'))
                                        <p style="color:red;">{{ $errors->first('video') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="soundFile">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Template sound</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="file"  name="audio" accept="audio/*" class="form-control"> 
                                     @if($errors->has('audio'))
                                        <p style="color:red;">{{ $errors->first('audio') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row customRowMm">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-8">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" onclick="changeLanguage('de')" href="#home">DE</a></li>
                                    <li><a data-toggle="tab" onclick="changeLanguage('en')" href="#menu1">EN</a></li>
                                    <li><a data-toggle="tab" onclick="changeLanguage('fr')" href="#menu2">FR</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Languages</label>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content">
                                    <label>Text On Screen</label>
                                    <div id="home" class="tab-pane fade in active">
                                        <div class="form-group">
                                            <textarea name="final_template_text">{{old('text_above_challenge')}}</textarea>
                                        </div>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <div class="form-group">
                                            <textarea name="final_template_text_en">{{old('text_above_challenge')}}</textarea>
                                        </div>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <div class="form-group">
                                            <textarea name="final_template_text_fr">{{old('text_above_challenge')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
								<br>
								<br>
						<div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Show "Score" Button</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="radio" name="score_btn"   id= 'first' value="1" {{ old('series') == 1 ? 'checked' : '' }}> <label for ="first">Yes</label>
                                    <input type="radio" name="score_btn" checked id='second' value="2" {{ old('series') == 2 ? 'checked' : '' }}>
                                    <label for="second">No</label>
                                </div>
                            </div>
						</div>
                        <br>
                        <br>
                        <input type="submit" name="submit" value="Solve & back" class="customBtnClass btn btn-default">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" name="submit" value="Final Template" class="customBtnClass btn btn-default">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
		function chooseOpt(){
			let val = $('#opt').val();
			if(val == '1') {
				$('#imageFile').show();
				$('#videoFile').hide();
				$('#soundFile').show();
			} else {
				$('#imageFile').hide();
				$('#videoFile').show();
				$('#soundFile').hide();
			}
		}
        function changeLanguage(val) {
            if(val=='de') {
                $('#language').val('de');
            }
            if(val=='en') {
                $('#language').val('en');
            }
            if(val=='fr') {
                $('#language').val('fr');
            }
        }
    </script>
@endsection