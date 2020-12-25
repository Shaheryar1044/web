@extends('admin.layouts.app')
@push('styles')
    <style>
        .edit-button {
            border: 1px solid #E74218;
            background: white;
            color: #E74218;
            padding: 4px 29px;
        }
        
        .edit-button:hover {
            border: 1px solid #E74218;
            background: #E74218;
            color: white;
        }
        
        .update-button {
            border: 1px solid #E74218;
            background: #E74218;
            color: white;
            padding: 4px 27px;
        }
        
        .update-button:hover {
            border: 1px solid #E74218;
            background: white;
            color: #E74218;
        }
    </style>
@endpush
@section('content')
<div class="container customContainer">
    <div class="row customRow">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Final Templates <a href="{{route('finalEditions')}}" style="float: right;">Create new final template</a></div>

                <div class="card-body">
                   @if (session('status'))
                         <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                         </div>
                    @endif
                    <div class="table-responsive"> 
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Template Name</th>
                                    <th>Template Text</th>
									<th style="text-align:center;">Image/Video</th>
                                    <th>Actions</th>    
                                </tr>
                                
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach($templates as $temp)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$temp->name}}</td>
                                        <td width="40%">{!! strtoupper($temp->final_template_text)!!}</td>
                                        <td style="text-align:center;"> 
											@if($temp->type == 2)
											<video width="200" height="100" controls>
											  <source src="{{asset($temp->video)}}" type="video/mp4">
											</video>
											@else
											<img src="{{asset($temp->image)}}" width="100" height="100" style="margin-left: 0px;">
											@endif
										</td>
                                        <td><a href="{{ route('editfinalTemplate',[$temp->id]) }}" class="btn btn-sm btn-success edit-button">Edit</a>
                                            /
                                        <a href="{{ route('deletefinalTemplate',[$temp->id]) }}" class="btn btn-sm btn-danger update-button">Delete</a></td>
                                    </tr>
                                    @php
                                        $count++;
                                    @endphp
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
