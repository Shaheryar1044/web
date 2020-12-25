<?php

namespace App\Http\Controllers;

use App\Adventure;
use App\Template;
use App\SaveChallange;
use App\AdventureGroup;
use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
class FrontEndController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    public function templateEdition($code, $groupId=''){
        $adventure = Adventure::where('event_id','=',$code)->with(['template', 'edition', 'challenges.files'])->first();
		$locale = \App::getLocale();
		$locale = isset($locale) ? $locale : 'de';
		//dd($locale,$adventure);
		return view('frontend.templateEdition',[
            'adventure' => $adventure,
            'code' => $code,
			'locale' => $locale,
            'group_id' => $groupId,
        ]);
    }
    public function challanges($code){
        $adventure = Adventure::where('event_id','=',$code)->with(['template', 'edition', 'challenges.files'])->first();
        return collect([
           'status' => true,
           'data' => $adventure->challenges
        ]);
    }
    public function choosePerson($code){
        $adventure = Adventure::where('event_id','=',$code)->with('groups.users')->first();
        date_default_timezone_set("Europe/Busingen");
         if(is_null($adventure)) {
			return back()->with('error_message','Event Id Not Exists');
		} else {
            $user = User::where('id', Auth::user()->id)->with(['groups'=>function ($q) use ($adventure){
                        $q->where('adventure_id', $adventure->id);
                        $q->with('users');
            }])->first();
        
        $start = strtotime(date('Y-m-d H:i', strtotime($adventure->start_time)));

        $now = strtotime(date('Y-m-d H:i'));
        
        $remaingTime = ($start - $now);
        //dd($remaingTime);
            //if($remaingTime > 0){
                return view('frontend.person',['adventure' => $adventure, 'remaining_time'=>$remaingTime, 'user'=>$user,
                ]);    
           /* }else{
                return back()->with('error_message',"Sorry You're late adevnture has satarted ");
            }*/
			
		}
    }
    public function startNow($code, $id=''){
        $adventure = Adventure::where('event_id','=',$code)->with('template','edition','groups.users')->first();
        if($id){
            DB::table('adventure_group_user')->where(['adventure_group_id' => $id, 'user_id' =>Auth::user()->id])->update([
                'status' => 1
        ]);    
        }
        
        /*if($adventure->attendees == 0){
            foreach ($adventure->groups as $group) {
                if(!count($group->users) == $adventure->users_per_group){
                    return back()->with('error_message','Teams are not full');
                }
            }
        }*/
		$locale = \App::getLocale();
		$locale = isset($locale) ? $locale : 'de';
		if(is_null($adventure)) {
			return back()->with('error_message','Event Id Not Exists');
		}else {
			return view('frontend.start-now',[
				'adventure' => $adventure,
				'locale' => $locale,
                'groupId' =>$id,
			]);
		}
    }
    public function loaderNow(){
        return view('frontend.loader');
    }
    public function congratsPage($code, $groupId=""){
		 if($groupId){
            $save_data = AdventureGroup::where('id',$groupId)->with('adventure.final_template')->first();
            
         }else{
            $save_data = SaveChallange::where('event_id','=',$code)->with('adventure.final_template')->first();   
         }
         
		//dd($save_data->adventure->final_template,'stop inprogress');
		$locale = \App::getLocale();
		$locale = isset($locale) ? $locale : 'de';
		if(isset($save_data) && !is_null($save_data->adventure->final_template)) {
			return view('frontend.congrats',[
				'final_template' => $save_data->adventure->final_template,
				'save_data' => $save_data,
				'locale' => $locale,
                'group'=>$groupId,
                'code'=>$code,
			]);	
		} else {
			return redirect('/main')->with('error_message_final','Final Template Not Exist');
		}
    }

    public function checkCodeMatch($code){
        $adventure = Adventure::where('event_id','=',$code)->first();
        if(is_null($adventure)) {
            return collect([
                'status' => false,
                'data' => [],
            ]);
        } else {
            date_default_timezone_set("Europe/Busingen");
        
            $start = strtotime($adventure->start_time);
            $now = strtotime(date('H:i'));
            $remaingTime = ($start - $now) / 60;
        
            if($remaingTime > 0){
                return collect([
                    'status' => true,
                    'data' => $adventure,
            ]);    
            }else{
                return collect([
                    'status' => false,
                    'data' => [],
                    'message' => "Sorry! you're late adventure has already started",]);
            }




            
        }
    }
	
	 public function saveData(Request $request){
        if($request->group_id){
            $group = AdventureGroup::where('id', $request->group_id)->first();
            //if(!$group->timer){
                $group->timer = $group->timer + $request->time;
                $group->update();
                DB::table('adventure_group_user')->where(['adventure_group_id' => $request->group_id, 'user_id' =>Auth::user()->id])->update([
                         'status' => 2
                ]);    
            //}
               
        }else{
            $group =  SaveChallange::create([
            'event_id' => $request->event_id,
            'adventure_id' => $request->adventure_id,
            'timer' => $request->time
         ]);    
        }
        return collect([
			'status' => true,
			'data' => $group
		]);
    }
    public function joinEvent($code, $groupId){
        $adventure = Adventure::where('event_id','=',$code)->with('template','edition')->first();
        $group = AdventureGroup::where('id', $groupId)->with('users')->first();
         $user = User::where('id', Auth::user()->id)->with(['groups'=>function ($q) use ($adventure){
            $q->where('adventure_id', $adventure->id);

        }])->first();
        

        if(count($group->users) < $adventure->users_per_group && ! count($user->groups)){
            $users = $group->users()->attach([
                'user_id' => Auth::user()->id,
            ]);
            
            return back()->with('success','You have Successfully Joined the advenutre');
            
        }else{
            dd('already joined');
        }
    }
    public function score($code, $group){

        $adventure = Adventure::where('event_id','=',$code)->with(['groups'=>function($q){
            $q->orderBy('timer');
            $q->with('users');
        }])->first();
       // dd($adventure);
        foreach ($adventure->groups as $g) {
            if($g->users ){
                foreach ($g->users as $u) {
                    if($u->pivot->status == 1){
                        return back()->with('error_message','Please wait untill other teams complete the challenges');
                    }
                }
            }
        }
        $myGroup = AdventureGroup::where('id', $group)->with('users')->first();
       // dd($adventure);
        $locale = \App::getLocale();
        $locale = isset($locale) ? $locale : 'de';
        
            return view('frontend.score',[
                'adventure' => $adventure,
                'locale' => $locale,
                'myGroup'=> $myGroup
            ]); 
        
    }
    public function countHint(Request $request){
        $group = AdventureGroup::where('id', $request->group_id)->first();
        $group->hintscount = $group->hintscount + 1;
        $group->update();
        echo 1;
    }
}
