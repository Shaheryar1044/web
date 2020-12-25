@extends('admin.layouts.app')

@section('content')
<div class="container customContainer">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update an escape template edition</div>

                <div class="card-body">
                   @if (session('status'))
                         <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                         </div>
                    @endif
                    <form method="post" action="{{route('updateTemplateEdition',[$edition->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Template Edition Name</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="name" placeholder="for example escape the virus"  value="{{ $edition->name }}" class="form-control"> 

                                    @if($errors->has('name'))
                                        <p style="color:red;">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Regarding Template</label>
                                </div>
                                <div class="col-sm-8">
                                    @foreach($templates as $temp )
                                        <input type="radio" @if($temp->id == $edition->regarding_template_id) checked  @endif  name="regarding_temp" id="temp-{{$temp->id}}" value="{{$temp->id}}" > <label for=temp-{{$temp->id}}>{{$temp->name}}</label>
                                    @endforeach
                                    @if($errors->has('regarding_temp'))
                                        <p style="color:red;">{{ $errors->first('regarding_temp') }}</p>
                                    @endif
                                </div>
                            </div>
                            </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Edit template picture</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="file"name="image"  accept="image/*" class="form-control"> 

                                    @if($errors->has('image'))
                                        <p style="color:red;">{{ $errors->first('image') }}</p>
                                    @endif
									<img src="{{$edition->image}}" style="width:100px;    position: relative;
    left: 130px;" />
                                </div>
                            </div>
						</div>
                        
                        <input type="submit" name="submit" value="save & back" class="customBtnClass btn btn-default">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" name="submit" value="Update Template Edition" class=" customBtnClass btn btn-default">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
