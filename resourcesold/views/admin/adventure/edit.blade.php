@extends('admin.layouts.app')
@section('title')
Edit Adventure
@endsection
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<div class="container customContainer">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">update an escape adventure</div>

                <div class="card-body">
                   @if (session('status'))
                         <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                         </div>
                    @endif
                    <form method="post" action="{{route('updateAdventure',[$adventures->id])}}" >
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Event ID</label>
                                </div>
                                <div class="col-sm-8">
                                      {{$adventures->event_id}}
                                      <input type="hidden" name="event_id" value="{{$adventures->event_id}}">
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" placeholder="Enter Adventure Name" value="{{$adventures->name}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            @php
                                $string = explode(":",$adventures->start_time);
				$string2 = explode(" ",$string[0]);
                            @endphp
			<div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Start Date</label>
                                    </div>
                                    <div class="col-sm-8">
                                          <input type="date"  placeholder="23" name="date" value="{{$adventures->start_time?$string2[0]:''}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Start Time</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="timediv">
                                          <input type="number" min="0" max="23" placeholder="23" name="hours" value="{{$adventures->start_time?$string2[1]:''}}" class="form-control timeinput"><span class="form-control" style="border: none;">:</span>
                                          <input type="number" min="0" max="59" placeholder="00" class="form-control timeinput"  value="{{$adventures->start_time?$string[1]:''}}"  name="minutes"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Escape Template</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="template_id" id="challengetype" required="" >
                                            <option value="">Choose one</option>
                                            @foreach($templates as $temp)
                                                <option value="{{$temp->id}}" {{$adventures->template_id == $temp->id? 'selected': ''}}>{{$temp->name}}</option>
                                            @endforeach    
                                            

                                        </select>

                                        @if($errors->has('template_id'))
                                            <p style="color:red;">{{ $errors->first('template_id') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                       
                        <div class="form-group" >
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Template Edition</label>
                                </div>
                                <div class="col-sm-8">
                                   <select class="form-control" name="temp_edition_id" required="" >
                                            <option value="">Choose one</option>
                                            @foreach($templateEditions as $edition)
                                                <option value="{{$edition->id}}" {{$adventures->edition_id==$edition->id? 'selected': ''}}>{{$edition->name}}</option>
                                            @endforeach    
                                            

                                        </select>

                                        @if($errors->has('edition_id'))
                                            <p style="color:red;">{{ $errors->first('edition_id') }}</p>
                                        @endif
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group" >
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Final Template</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="final_template_id" required="">
                                            <option value="">Choose one</option>
                                            @foreach($finalTemp as $edition)
                                                <option value="{{$edition->id}}" {{$adventures->final_template_id==$edition->id? 'selected': ''}}>{{$edition->name}}</option>
                                            @endforeach


                                        </select>

                                        @if($errors->has('edition_id'))
                                            <p style="color:red;">{{ $errors->first('edition_id') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
						
						<!-- <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Previous Challanges</label>
                                    </div>
									
									<div class="col-md-8">
                                    @foreach($match as $m)
                                        <div class="col-sm-3">
											<p>{{$m->challenge_name}}</p>
                                        </div>
                                    @endforeach
									</div>
                                </div>
						</div> -->
                         <div class="form-group">    
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Number of challange</label>
                                </div>
                                
                                 <div class="col-sm-8">
                                     <!--{{$adventures->no_of_challenges}}-->
                                    <input type="number" class="form-control" onkeyup="renderRows()" value="{{$adventures->no_of_challenges}}" placeholder="enter number (3 -15)" min="3" max="15" required="" name="challanges" id="eventChallenges">
                                     @if($errors->has('challanges'))
                                            <p style="color:red;">{{ $errors->first('challanges') }}</p>
                                        @endif
                                 </div>
                            </div>
                        </div>
                        <!--<div class="form-group">-->
                        <!--    <div class="row">-->
                        <!--        <div class="col-sm-4">-->
                        <!--            <label>Select challanges</label>-->
                        <!--        </div>-->
                        <!--        <div class="col-sm-8">-->
                        <!--            <select class="form-control" name="eventChallenges[]" required="">-->
                        <!--                <option value="">Select Challenges</option>-->
                        <!--                @foreach($challenges as $chall)-->
                        <!--                    <option value="{{$chall->id}}">{{$chall->challenge_name}}</option>-->
                        <!--                @endforeach-->
                        <!--            </select>-->
                        <!--            @if($errors->has('challanges'))-->
                        <!--                <p style="color:red;">{{ $errors->first('challanges') }}</p>-->
                        <!--            @endif-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!-- <input type="hidden" value="" name="eventChallenges[]" id="eventChallanges" /> -->
                        <div class="form-group" id="renderRows">

                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Countdown for event? </label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="radio" @if($adventures->count_down == 1) checked @endif name="event_countdown" onclick="showCountDown($(this).val())"  id= 'first' value="1" {{ old('event_countdown') == '1' ? 'checked' : '' }}> <label for ="first">Yes</label>
                                
                                    <input type="radio" @if($adventures->count_down == 0) checked @endif onclick="showCountDown($(this).val())" name="event_countdown" id='second' value="0" {{ old('event_countdown') == '0' ? 'checked' : '' }}>
                                    <label for="second">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="countDownTime">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Countdown time</label>
                                </div>
                                 
                                <div class="col-sm-8">
                                    <select class="form-control" name="challenge_countdown" id="challenge_countdown"  >
                                            <option value="">Choose one</option>
												<option value="15" {{$adventures->countdown_duration =='15'? 'selected': ''}}>15 minutes</option>
                                                <option value="30" {{$adventures->countdown_duration =='30'? 'selected': ''}}>30 minutes</option>
                                                <option value="60" {{$adventures->countdown_duration =='60'? 'selected': ''}}>60 minutes</option>
                                                <option value="90" {{$adventures->countdown_duration =='90'? 'selected': ''}}>90 minutes</option>
                                             
                                            

                                        </select>

                                        @if($errors->has('challenge_countdown'))
                                            <p style="color:red;">{{ $errors->first('challenge_countdown') }}</p>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                
                                    <label>Show notes for challenge</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="radio" @if($adventures->challenge_notes == 1) checked @endif name="event_notes"  id= 'yes' value="1" {{ old('event_notes') == '1' ? 'checked' : '' }}> <label for ="yes">Yes</label>

                                    <input type="radio" @if($adventures->challenge_notes == 0) checked @endif name="event_notes" id='no' value="0" {{ old('event_notes') == '0' ? 'checked' : '' }}>
                                    <label for="no">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Attendees</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="radio" onclick="isGroups($(this).val())" @if($adventures->attendees == 1) checked @endif name="attendees"  id= 'users' value="1" {{ old('attendees') == '1' ? 'checked' : '' }}> <label for ="users">Users</label>

                                    <input type="radio" onclick="isGroups($(this).val())" @if($adventures->attendees == 0) checked @endif  name="attendees" id='group' value="0" {{ old('attendees') == '0' ? 'checked' : '' }}>
                                    <label for="group">Group</label>
                                </div>
                            </div>
                        </div>
                        <div id="groupsInfo" style="display: none;">
                            <div class="form-group" >
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Number of groups</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="number"name="groups_no" placeholder="Enter Number (min 2)"  min='2' id="groups_no" value="{{$adventures->no_of_groups}}"  class="form-control"> 

                                        @if($errors->has('groups_no'))
                                            <p style="color:red;">{{ $errors->first('groups_no') }}</p>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Maximum Number of users per group</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="number"name="users_per_group" placeholder="Enter Number (min 2)"  min='2' id="users_per_group" value="{{$adventures->users_per_group}}"  class="form-control"> 

                                        @if($errors->has('users_per_group'))
                                            <p style="color:red;">{{ $errors->first('users_per_group') }}</p>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Direct sale via website</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="radio" @if($adventures->direct_sale == 1) checked @endif name="direct_sale"  id= 'directslayes' value="1" {{ old('direct_sale') == '1' ? 'checked' : '' }}> <label for ="directslayes">Yes</label>

                                    <input type="radio" @if($adventures->direct_sale == 0) checked @endif name="direct_sale" id='directsaleno' value="0" {{ old('direct_sale') == '0' ? 'checked' : '' }}>
                                    <label for="directsaleno">No</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <input type="submit" name="submit" value="Update & back" class="customBtnClass btn btn-default">
						<input type="submit" name="submit" value="Update" class="customBtnClass btn btn-default">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
$(document).ready(function(){
   renderRows(); 
});
   var gArray = [];
        function renderRows(){
            $('#eventChallanges').val('');
            $('#eventChallanges').val();
            $('#renderRows').append('');
            $('#renderRows').html('');
            console.log('render rows');
            let numberofChallanges = $('#eventChallenges').val();
            console.log('numberofChallanges');
            console.log(numberofChallanges);
            for (var i = 1; i <= numberofChallanges; i++) {
                var numbers = i;
                var sign = '';
                if(numbers == 1) {
                    sign = 'st'
                }
                if(numbers == 2) {
                    sign = 'nd'
                }
                if(numbers == 3) {
                    sign = 'rd'
                }
                if(numbers > 3) {
                    sign = 'th'
                }
                var rowHtml =
                    '<br><div class="row">' +
                    '<div class="col-sm-4">' +
                    '<label>'+ i + sign +' Challange</label>' +
                    '</div>' +
                    '<div class="col-sm-8">' +
                    '<select class="form-control" name="eventChallenges[]" id="event-'+ i +'" onchange="selectChallange('+ i +')" required="">' +
                    '<option value="">Select Challenges</option>' +
                    @foreach($challenges as $chall)
                        '<option value="{{$chall->id}}">{{$chall->challenge_name}}</option>' +
                    @endforeach
                        '</select>' +
                    '</div>' +
                    '</div><br>';
                    $('#renderRows').append(rowHtml);
            }
        }

         function selectChallange(val){
            let event = $('#event-'+val).val();
            var duplication = false;
            let obj = {id:val,data:event};
            if(gArray.length > 0) {
                const index = gArray.findIndex((e) => e.id === obj.id);
                if (index === -1) {
                    duplication = false;
                } else {
                    duplication = true;
                    gArray[index] = obj;
                }
            }
            if(!duplication) {
                gArray.push(obj);
            }
            var arr = [];
            gArray.map((d) => {
                console.log(d);
                arr.push(d.data);
            });
            console.log('final array data');
            console.log(arr);
            $('#eventChallanges').val(arr);
        }
        
   function showCountDown(t){
    if(t==1){
         $("#countDownTime").show();
         $('#challenge_countdown').attr('required', true);
    }else{
        $("#countDownTime").hide();
        $('#challenge_countdown').removeAttr('required').val('');
    }
   }
   function isGroups(t){
    
    if(t==1){
        $("#users_per_group, #groups_no").removeAttr('required').val('');
        $('#groupsInfo').hide();
    }else{
       $("#users_per_group, #groups_no").attr('required', true);
        $('#groupsInfo').show();
    }
   }
   document.querySelectorAll('input[type=number]')
          .forEach(e => e.oninput = () => {
            // Always 2 digits
            if (e.value.length >= 2) e.value = e.value.slice(0, 2);
            // 0 on the left (doesn't work on FF)
            if (e.value.length === 1) e.value = '0' + e.value;
            // Avoiding letters on FF
            if (!e.value) e.value = '00';
          });
   $('#eventChallenges').select2();
</script>
@endsection
