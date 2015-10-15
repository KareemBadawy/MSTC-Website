<?php

namespace App\Http\Middleware;

use Closure;

class ShowRequest
{
    /**
     * Determine if the current request URI matches a show method pattern
     *
     * @param String  $mainpath
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     *
     */
    public static function isShow($mainpath, $request)
    {
        if($request->segment(1)==$mainpath
            && is_numeric($request->segment(2))
            && is_null($request->segment(3))){

            return true;
        }

        return false;
    }
}
