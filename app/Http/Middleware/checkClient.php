<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User\Client; 
use Illuminate\Http\Request;
use Session; // custome

class checkClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       //echo $request->route()->getName();
            //die();
        if(!Session::has('userId') || Session::has('userId')==null){
            return redirect()->route('clientlogOut');
        }else{
            $user=Client::where('status',1)->where('id',currentUserId())->first();
            if(!$user)
                return redirect()->route('clientlogOut');
            else
                return $next($request);
        }
        return redirect()->route('clientlogOut');
    }
}
