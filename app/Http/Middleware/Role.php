<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Role
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
        if(AUTH::user()->isverified == 1){

            // dd(AUTH::user()->isverified,AUTH::user()->role);
            if(Auth::user()->role == User::CLIENT){
                return redirect()->route('client.home');
            }
            elseif(Auth::user()->role == User::DOCTOR){
                return redirect()->route('doctor.home');
            }
            elseif(Auth::user()->role == User::SUPERADMIN){
                return redirect()->route('superadmin.home');
            }
        }
        else {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
