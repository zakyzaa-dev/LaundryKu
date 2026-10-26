<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User $userLogin */
        $userLogin = Auth::user();
        if ($userLogin){
            if ($userLogin->is_admin()){
                return $next($request);
            }
        }

        return redirect()->route('pages.home');
    }
}
