<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAndOrganizerAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


         // Retrieve the authenticated user
         $user = session('user');


        // Check if the user is authenticated and has role ID 2
        if ($user && $user->role_id == 2 || $user->role_id == 1) {
            // User has role ID 1, proceed with the request
            return $next($request);
        } else {
            // User does not have role ID 1, unauthorized access
            abort(403, 'Unauthorized');
        }
 
        return redirect('/');
    }
}
