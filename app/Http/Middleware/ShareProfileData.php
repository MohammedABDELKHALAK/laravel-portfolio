<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ShareProfileData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
// this middleware to share data to public pages of resume with visitor without being auth,
//  it's unreasonable  to be auth to see your porfolio

    public function handle(Request $request, Closure $next): Response
    {
        if (Schema::hasTable('users')) {
            $profile = User::with(['social', 'experiences', 'skills', 'education'])->first();
            View::share('profile', $profile);
        }
        
        return $next($request);
    }
}
