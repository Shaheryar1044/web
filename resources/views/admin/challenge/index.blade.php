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
                <div class="card-header">Escape Challenges <a href="{{route('createChallenge')}}" style="float: right;">Create new challenge</a></div>

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
                                    <th>Challenge Name</th>
                                    <th>Type of challenge</th>
                                    <th>Hints</th>
                                    <th> Type of lock</th>
                                    <th>Final Code</th>
									<th>Image</th>
                                    <th>Action</th>    
                                </tr>
                                
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach($challenges as $challenge)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$challenge->challenge_name}}</td>
                                        <td>{{strtoupper($challenge->challenge_type)}}</td>
                                        <td>{{$challenge->hints==1?'Yes':'NO'}}</td>
                                        @php
                                            if($challenge->lock_type == 'tnumber'){
                                                $type = "Turn Number";
                                            }elseif($challenge->lock_type == 'number'){
                                                $type = "Enter Number";
                                            }else{
                                                $type = "Number Field";
                                            }
                                        @endphp
                                        <td>{{$type}}</td>
                                        <td> {{$challenge->final_code}}</td>
										<td>@php
												$file = \App\ChallengeFile::where('challenge_id' ,'=', $challenge->id)->first();
											@endphp
											<img style="width:60px;margin:0px !important" src="{{asset($file['file_path'])}}" /></td>
                                        <td>
                                            <a href="{{route('challengeEdit',[$challenge->id])}}" class="btn btn-sm btn-success edit-button">Edit</a>
                                            <a href="{{route('challengeDelete',[$challenge->id])}}" class="btn btn-sm btn-danger update-button">Delete</a>
											<a href="{{route('duplicateChallange',[$challenge->id])}}" class="btn btn-sm btn-primary">Duplicate</a>
                                        </td>    
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
