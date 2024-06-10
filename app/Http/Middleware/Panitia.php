<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Panitia
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 'admin') {
            return redirect()->route('home');
        }

        if (Auth::user()->role == 'panitia') {
            return redirect()->route('panitia.index');
        }

        if (Auth::user()->role == 'pemonev') {
            return redirect()->route('pemonev.index');
        }

        if (Auth::user()->role == 'pendamping') {
            return redirect()->route('pendamping.index');
        }

        if (Auth::user()->role == 'mahasiswa') {
            return redirect()->route('mahasiswa.index');
        }

        return $next($request);
    }
}
