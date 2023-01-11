<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class isStaffOrAdmin
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
        if($request->session()->get('id')){

            $id = $request->session()->get('id');

            $user = User::where('id', $id)->first();

            if($user->rol == 'admin'){
                return $next($request);
                //dd("Es admin");
            }else if ($user->rol == 'staff'){
                return $next($request);
                //dd("Es staff");
            }else if ($user->rol == 'expositor'){
                return back();
                //dd("Es expositor");
            }else if($user->rol == 'teacher'){
                return back();
                //dd("Es maestro");
            }
        
        }else{
            return redirect('/');
        }
    }
}
