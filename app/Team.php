<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Team extends Authenticatable
{
    //
    protected $table='teams';
    protected $primaryKey='id';
    protected $guarded=['id'];
    public $timestamps=true;

    public function players(){
        return $this->belongsToMany('App\Player');
    }
    public function staff(){
       return $this->belongsToMany('App\Staff');
    }


}
