<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isTeacherOrAdmin
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

            $user = User::find($request->session()->get('id'))->first();

            if($user->rol == 'admin'){
                return $next($request);
                //dd("Es admin");
            }else if ($user->rol == 'staff'){
                return back();
                //dd("Es staff");
            }else if ($user->rol == 'expositor'){
                return back();
                //dd("Es expositor");
            }else if($user->rol == 'teacher'){
                return $next($request);
                //dd("Es maestro");
            }
        
        }else{
            return redirect()->route('/');
        }
    }
}
