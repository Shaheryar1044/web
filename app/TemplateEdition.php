<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateEdition extends Model
{
    //
     protected $fillable = [
        'name', 'image', 'regarding_template_id'
    ];
    public function regardingTemplate(){
    	return $this->belongsTo(Template::class, 'regarding_template_id','id');
    }
}
