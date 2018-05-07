<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Organizer extends Authenticatable
{
    //
    use Notifiable;
    protected $table='organizers';
    protected $primaryKey='id';
    protected $guarded=['id'];
    public $timestamps=true;

    public function events(){
       return $this->belongsToMany('App\Event');
    }

}
