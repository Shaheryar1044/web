<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    //

	protected $fillable = [
        'challenge_name',
        'challenge_type',
        'text_above_challenge',
        'text_above_challenge_en',
        'text_above_challenge_fr',
        'hints',
        'hints_en',
        'hints_fr',
        'hint1',
        'hint1_en',
        'hint1_fr',
        'hint2',
        'hint2_en',
        'hint2_fr',
        'hint3',
        'hint3_en',
        'hint3_fr',
        'hint1_text',
        'hint1_text_en',
        'hint1_text_fr',
        'hint2_text',
        'hint2_text_en',
        'hint2_text_fr',
        'hint3_text',
        'hint3_text_en',
        'hint3_text_fr',
        'lock_type',
        'final_code'
    ];
    public function files(){

    	return $this->hasMany(ChallengeFile::class);
    }
}
