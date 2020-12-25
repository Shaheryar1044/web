<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FinalTemplate;

class Adventure extends Model
{
    protected $fillable = [
         "event_id" ,"name", "template_id","edition_id" ,"no_of_challenges","count_down","countdown_duration", "challenge_notes", "attendees","no_of_groups" ,"users_per_group","direct_sale","final_template_id", "start_time"
  ];
  public function template(){
    	return $this->belongsTo(Template::class);	
    }
    public function edition(){
    	return $this->belongsTo(TemplateEdition::class);	
    }
	public function challenges(){
    	return $this->belongsToMany(Challenge::class, 'adventure_challenges');	
    }
	public function groups(){
    return $this->hasMany(AdventureGroup::class);
  }
	public function final_template(){
    	return $this->hasOne(FinalTemplate::class, 'id','final_template_id');	
    }
}
