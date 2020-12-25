<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    //
    protected $fillable = [
        'name','name_en','name_fr', 'image', 'audio','series_no','part_of_series', 'template_text' ,'template_text_en' , 'template_text_fr','video','type'
    ];

    public function template_edition(){
        return $this->hasOne(TemplateEdition::class,'regarding_template_id','id');
    }

}
