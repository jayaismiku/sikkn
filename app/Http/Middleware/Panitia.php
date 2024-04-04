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
            return redirect()->route('admin');
        }

        if (Auth::user()->role == 'lembaga') {
            return redirect()->route('lembaga');
        }

        if (Auth::user()->role == 'panitia') {
            return redirect()->route('panitia');
        }

        if (Auth::user()->role == 'pendamping') {
            return redirect()->route('pendamping');
        }

        if (Auth::user()->role == 'mahasiswa') {
            return redirect()->route('mahasiswa');
        }

        if (Auth::user()->role == 'desa') {
            return redirect()->route('desa');
        }
    }
}
