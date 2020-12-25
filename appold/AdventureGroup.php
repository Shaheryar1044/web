<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdventureGroup extends Model
{
    //
    protected $fillable = [
        'name', 'adventure_id', 'timer', 'hintscount'];

    public function users(){
    	return $this->belongsToMany(User::class);
    }
    public function adventure(){
    	return $this->belongsTo(Adventure::class);
    }
}
