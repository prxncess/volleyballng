<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //
    protected $table='players';
    protected $guarded=['id'];
    protected $primaryKey='id';
    public $timestamps= true;

    public function team(){
        return $this->belongsToMany('App\team','player_team','team_id');
    }
}
