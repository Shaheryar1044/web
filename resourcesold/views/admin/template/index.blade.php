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
		.table td, .table th {
			padding: .75rem;
			vertical-align: top;
			border-top: 1px solid #dee2e6;
			text-align: center;
		}
    </style>
@endpush
@section('content')
<div class="container customContainer">
    <div class="row customRow">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Escape templates <a href="{{route('createTemplate')}}" style="float: right;">Create new main template</a></div>

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
                                    <th>Part of Series</th>
                                    <th>Series</th>
                                    <th> Template image/video</th>
                                    <th>Template sound</th>    
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
                                        <td>{{strtoupper($temp->part_of_series)}}</td>
                                        <td>{{$temp->series_no}}</td>
                                        <td>
											@if($temp->type == 2)
												<video width="200" height="100" controls>
												  <source src="{{asset($temp->video)}}" type="video/mp4">
												  Your browser does not support the video tag.
												</video>
											@else
												<img src="{{asset($temp->image)}}" width="100" height="100" style="margin-left: 0px;">
											@endif
										
										</td>
                                        <td>
											@if($temp->audio)
												<audio controls>
												  <source src="{{asset($temp->audio)}}" type="audio/mp3">
												</audio>
											@else
												No Audio
											@endif
										</td>
                                        <td><a href="{{ route('editTemplate',[$temp->id]) }}" class="btn btn-sm btn-success edit-button">Edit</a>
                                            /
                                        <a href="{{ route('deleteTemplate',[$temp->id]) }}" class="btn btn-sm btn-danger update-button">Delete</a></td>
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
