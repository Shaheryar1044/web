<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Adventure;

class SaveChallange extends Model
{
    protected $fillable = ['event_id','adventure_id','timer'];
	
	public function adventure(){
		return $this->hasOne(Adventure::class,'id','adventure_id');
	}
}
