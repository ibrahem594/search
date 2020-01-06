<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table='videos';
    public function tags(){
        return $this->belongsToMany('App\Tag','link_tags');
    }
    public function cat(){
        return $this->belongsTo('App\Cat','cat_id');
    }
}
