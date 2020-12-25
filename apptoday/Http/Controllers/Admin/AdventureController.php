<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Template;
use App\TemplateEdition;
use App\Adventure;
use App\Challenge;
use App\AdventureChallenges;
use App\FinalTemplate;
use App\AdventureGroup;
class AdventureController extends Controller
{
    //
    public function deleteAdventure($id , Request $request){
        $adventure = Adventure::where('id',$id)->delete();
    	$request->session()->flash('status', 'success');
		$request->session()->flash('message', 'Adventure Deleted Successfully.');
        return back();
    }
    
	public function duplicateAdventure($id , Request $request) {
        $adventure = Adventure::where('id','=',$id)->first();
        $a = $b = '';
        for($i = 0; $i < 3; $i++){
            $a .= chr(mt_rand(65, 90));
            $b .= mt_rand(0, 9);
        }
        $event_id = $a . $b;
        Adventure::create([
            "event_id" 			=> $event_id,
			"name"              => $adventure->name,
            "template_id" 		=> $adventure->template_id,
            "edition_id" 			=> $adventure->edition_id,
            "no_of_challenges" 			=> $adventure->no_of_challenges,
            "count_down" 	=>$adventure->count_down,
            "countdown_duration" => $adventure->countdown_duration,
            "challenge_notes" 		=> $adventure->challenge_notes,
            "attendees" 			=> $adventure->attendees,
            "no_of_groups" 			=> $adventure->no_of_groups,
            "users_per_group" 	=>$adventure->users_per_group,
            "direct_sale" 		=> $adventure->direct_sale,
            "final_template_id" => $adventure->final_template_id
        ]);
        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Adventure is Duplicated.');
        return redirect()->back();
    }
	
    public function index(){
    	$adventures = Adventure::with('template', 'edition')->Has('template')->Has('edition')->get();
    	return view('admin.adventure.index', compact('adventures'));
    }
    public function create(){
		$a = $b = '';
		for($i = 0; $i < 3; $i++){
			$a .= chr(mt_rand(65, 90)); 
			$b .= mt_rand(0, 9);
		}
		$event_id = $a . $b;
    	$templates = Template::all();
    	$templateEditions = TemplateEdition::all();
    	$challenges = Challenge::all();
		$finalTemp = FinalTemplate::all();
    	 return view('admin.adventure.create', compact('templates', 'templateEditions', 'event_id', 'challenges','finalTemp'));
    }
    public function store(Request $request){
    	$adevnture = Adventure::create([
    		"event_id" 			=> $request->event_id,
			"name" 			=> $request->name,
			"start_time"   =>$request->date.' '.$request->hours.":".$request->minutes,
 			  "template_id" 		=> $request->template_id,
			  "edition_id" 			=> $request->edition_id,
			  "no_of_challenges" 			=> $request->challanges,
			  "count_down" 	=>$request->event_countdown,
			  "countdown_duration" => $request->challenge_countdown,
			  "challenge_notes" 		=> $request->event_notes,
			  "attendees" 			=> $request->attendees,
			  "no_of_groups" 			=> $request->groups_no,
			  "users_per_group" 	=>$request->users_per_group,
			  "direct_sale" 		=> $request->direct_sale,
			  'final_template_id' => $request->final_template_id
		]);

		if($adevnture){
			foreach ($request->eventChallenges as $challenge) {
			 AdventureChallenges::create([
					'challenge_id' =>$challenge,
					'adventure_id' =>$adevnture->id, 
				]);
			}
			if($request->attendees == 0){
				
				foreach ($request->groupNames as $name) {
				 AdventureGroup::create([
						'name' => $name,
						'adventure_id' =>$adevnture->id,
					]);
				}
				/*for ($i=1; $i <=$request->groups_no ; $i++) { 
					AdventureGroup::create([
						'name' => $i,
						'adventure_id' =>$adevnture->id,
					]);
				}*/
			}
				$request->session()->flash('status', 'success');
				$request->session()->flash('message', 'Adventure is created.');
				return redirect()->back();
			}else {
				$request->session()->flash('status', 'error');
				$request->session()->flash('message', 'Failed to create new Adventure, please check your information.');
				return Redirect::back()->withInput($request->all);
			}

    }
	
	
    public function editAdventure($id) {
    	$adventures = Adventure::where('id','=',$id)->first();
		$cha = AdventureChallenges::where('adventure_id','=',$id)->get()->toArray();
		$arr = [];
    	foreach ($cha as $chal) {
            $arr[] = $chal['challenge_id'];
        }
    	$a = $b = '';
		for($i = 0; $i < 3; $i++){
			$a .= chr(mt_rand(65, 90)); 
			$b .= mt_rand(0, 9);
		}
		$event_id = $a . $b;
    	$templates = Template::all();
    	$templateEditions = TemplateEdition::all();
    	$challenges = Challenge::all();
		$finalTemp = FinalTemplate::all();
		$match = [];
    	foreach ($challenges as $c) {
    	    if(in_array($c->id,$arr)) {
    	        array_push($match,$c);
            }
    	}
    	return view('admin.adventure.edit', compact('adventures','templates', 'templateEditions', 'challenges' , 'finalTemp','arr','match'));
    }
    
    public function updateAdventure($id,Request $request){
    	Adventure::where('id','=',$id)->update([
    		   "event_id" 			=> $request->event_id,
			"name" 			=> $request->name,
			"start_time"   =>$request->hours.":".$request->minutes,
			  "template_id" 		=> $request->template_id,
			  "start_time"   =>$request->hours.":".$request->minutes,
			  "edition_id" 			=> $request->temp_edition_id,
			  "no_of_challenges" 			=> $request->challanges,
			  "count_down" 	=> $request->event_countdown,
			  "countdown_duration" => $request->challenge_countdown,
			  "challenge_notes" 		=> $request->event_notes,
			  "attendees" 			=> $request->attendees,
			  "no_of_groups" 			=> $request->groups_no,
			  "users_per_group" 	=>$request->users_per_group,
			  "direct_sale" 		=> $request->direct_sale,
			  'final_template_id' => $request->final_template_id

		]);
	    AdventureChallenges::where('adventure_id','=',$id)->delete();
		foreach ($request->eventChallenges as $challenge) {
		    AdventureChallenges::create([
				'challenge_id' =>$challenge,
				'adventure_id' =>$id, 
			]);
		}
		AdventureGroup::where('adventure_id','=',$id)->delete();
		if($request->attendees == 0){
			for ($i=1; $i <=$request->groups_no ; $i++) { 
				AdventureGroup::create([
					'name' => $i,
					'adventure_id' =>$id,
				]);
			}
		}
		$request->session()->flash('status', 'success');
		$request->session()->flash('message', 'Adventure is Updated.');
		return redirect('/admin/adventures');
    }
}
