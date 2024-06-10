<?php

namespace App\Http\Middleware;

use Closure;

class Menu
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($menu, Closure $next)
	{
		switch (Auth::user()->role) {
			case 'admin':
				$menu = ['master', 'panitia', 'pemonev', 'pendamping', 'mahasiswa']
				return $next($menu);
				break;
			
			case 'panitia':
				$menu = ['panitia']
				return $next($menu);
				break;
			
			case 'pemonev':
				$menu = ['pemonev']
				return $next($menu);
				break;
			
			case 'pendamping':
				$menu = ['pendamping']
				return $next($menu);
				break;
			
			case 'mahasiswa':
				$menu = ['mahasiswa']
				return $next($menu);
				break;
			
			default:
				return $next($request);
				break;
		}

		return $next($request);
	}
}
