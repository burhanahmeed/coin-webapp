<?php

namespace App\Http\Middleware;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $profile = Profile::find(Auth::user()->id);        
        // dd($profile);

        if ($profile == null) {            
            return redirect('/home');
        }        
        return $next($request);     
    }
}
