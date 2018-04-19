<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $table='events';
    protected $guarded=['id'];
    protected $primaryKey='id';
    public $timestamps=true;

    public function organizer(){
       return $this->belongsToMany('App\Organizer');
    }
    public function teams(){
        return $this->belongsToMany('App\Team');
    }
    public function hasTeam($team){
        return $this->teams->contains($team);

    }
}
