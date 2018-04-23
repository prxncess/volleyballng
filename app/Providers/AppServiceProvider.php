<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //validate phone number
        Validator::extend('phone', function ($attribute,$value,$parameters,$validator){
            if(!empty($value)){
                $non_digts=[' ','(',')','-',',','+'];
                $num=str_replace($non_digts,'',$value);
                    if(strlen($num)==11){
                        return true;
                    }
                    //return false;
            }
            return false;
        });
        //date_validation
        Validator::extend('prevdate', function ($attribute,$value,$parameters,$validator){
            //prevent selection of prevent date
            if(!empty($value)){
                $today= strtotime(date('Y-m-d'));
                $v=strtotime(date($value));
                //check if selected date is below current date
                if($today<=$v){
                    return true;
                }
            }
            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
