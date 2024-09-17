<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{
    public function chekGuard($request){

        if($request->type == 'costomer'){
            $guardName= 'costomer';
        }


        else{
            $guardName= 'web';
        }
        return $guardName;
    }

    public function redirect($request){

        if($request->type == 'costomer'){
            return redirect()->intended(RouteServiceProvider::COSTOMER);
        }

        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
