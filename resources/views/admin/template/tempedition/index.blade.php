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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Escape template Editions<a href="{{route('createTemplateEdition')}}" style="float: right;">Create new  template edition</a></div>

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
                                    <th> Name</th>
                                    <th> Regarding Template</th>
                                    <th> Template image</th>
                                    <th> Actions</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                           
                                @foreach($editionTemps as $temp)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{isset($temp->name) ? $temp->name : '--'}}</td>
                                        
                                        <td>{{$temp->regardingTemplate->name}}</td>
                                        <td> <img src="{{asset($temp->image)}}" width="100" height="100" style="margin-left: 0px;"></td>
                                           <td>
                                               <a href="{{ route('editTemplateEdition',[$temp->id]) }}" class="btn btn-sm btn-success edit-button">Edit</a>
                                                &nbsp;
                                               <a href="{{ route('deleteTemplateEdition',[$temp->id]) }}" class="btn btn-sm btn-danger update-button">Delete</a></td>
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
