<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    protected $table='staffs';
    protected $primaryKey='id';
    protected $guarded=['id'];
    public $timestamps=false;

    public function team(){
        $this->belongsTo('App\Team','team_id','id');
    }
}
