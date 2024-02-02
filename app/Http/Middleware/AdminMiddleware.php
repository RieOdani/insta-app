<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; //it handles authentication
use APP\Models\User; //representing users table

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     # Important note: the handle() method handeles th incoming request
    # and interact with the currernt HTTP request being handled by our application
    # as well as retrieve the input,cookies,and files that were submittede by the request.

    public function handle(Request $request, Closure $next): Response
    {
        #the Auth::check()---> check the user if it's logged-in
        if (Auth::check() && Auth::user()->role_id == User::ADMIN_ROLE_ID) { //1
            #note: if the role_id ==1, tge\\
             return $next($request);
        }
       return redirect()->route('index');


    }
}
