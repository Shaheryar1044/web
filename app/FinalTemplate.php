<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalTemplate extends Model
{
    //
    protected $fillable = [
        'name', 'image','video','type', 'audio','score_btn','final_template_text','final_template_text_en','final_template_text_fr'
    ];
}
