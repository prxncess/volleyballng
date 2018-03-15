<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Team extends Authenticatable
{
    //
    use Notifiable;
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
    public function routeNotificationForMail()
    {
        return $this->contact;
    }
    public function event(){
        return $this->belongsToMany('App\Event');
    }

}
