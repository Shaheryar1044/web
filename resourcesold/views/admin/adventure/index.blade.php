@extends('admin.layouts.app')
@section('title')
Adventure's List
@endsection
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
                <div class="card-header">Escape Adventuers <a href="{{route('createAdventure')}}" style="float: right;">Create new adventure</a></div>

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
                                    <th>Event Id</th>
									<th>Name</th>
                                    <th>Escape Template</th>
                                    <th>Escape Edition</th>
                                    <th> Number of Challenges</th>
                                    <th>Count Down</th>  
                                    <th>Show Notes</th>
                                    <th>Attendees</th>  
                                    <th>Direct Sale</th>  
                                    <th>Actions</th>
                                </tr>
                                
                            </thead>
                               <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach($adventures as $adventure)
                                  
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$adventure->event_id}}</td>
										<td>{{$adventure->name}}</td>
                                        <td>{{$adventure->template->name}}</td>
                                        <td>{{$adventure->edition->name}}</td>
                                        <td>{{$adventure->no_of_challenges}}</td>
                                        <td>{{$adventure->count_down==1?'Yes': 'NO'}}</td>
                                        <td>{{$adventure->challenge_notes==1?'Yes': 'NO'}}</td>  
                                        <td>{{$adventure->attendees==1?'Users': 'Groups'}}</td>   
                                         <td>{{$adventure->direct_sale==1?'Yes': 'NO'}}</td>
                                         <td><a href='{{route('editAdventure',[$adventure->id])}}' class="btn btn-success btn-sm edit-button">Edit</a>&nbsp;<a href='{{route('deleteAdventure',[$adventure->id])}}' class="btn btn-danger btn-sm update-button">Delete</a>&nbsp;<a href='{{route('duplicateAdventure',[$adventure->id])}}' class="btn btn-primary btn-sm duplicate-button">Duplicate</a></td>
                                    </tr>
                                    @php
                                        $count++;
                                    @endphp
                                    
                                    <!-- Modal -->
                                    <div id="myModal" class="modal fade" role="dialog">
                                      <div class="modal-dialog">
                                    
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                          </div>
                                          <div class="modal-body">
                                            <p>Some text in the modal.</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                    
                                      </div>
                                    </div>
                                    
                                    
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
