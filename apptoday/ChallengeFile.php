<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallengeFile extends Model
{
    //
    protected $fillable = [
        'challenge_id', 'file_path'];
}
