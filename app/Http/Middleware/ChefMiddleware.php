<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use function redirect;

class ChefMiddleware
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
        if (!(Auth::check() && Auth::user()->isChef()))
            return redirect('/')->withErrors('Access denied to CHEF functionality!');
        return $next($request);
    }
}