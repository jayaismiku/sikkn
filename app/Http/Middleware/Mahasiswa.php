<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Support\Facades\DB;

class Mahasiswa
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
		$userid = Auth::id();
		$nim = 	DB::table('mahasiswa')
				->join('users', 'mahasiswa.user_id', '=', 'users.user_id')
				->where('users.user_id', $userid)
				->pluck('mahasiswa.nim')->first();
		// $request->session()->put('nim', $nim);
		// dd($request->session()->get('nim'));
		if ($nim > 0) {
			$request->attributes->add(['nim' => $nim]);
		}
		// dd($request);

		return $next($request);
	}
}
