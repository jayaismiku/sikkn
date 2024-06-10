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
		$userid = Auth::user()->user_id;
		$nim = 	DB::table('mahasiswa')
				->join('users', 'mahasiswa.user_id', '=', 'users.user_id')
				->where('users.user_id', $userid)
				->get('mahasiswa.nim')->first();
		$request->session()->put('nim', $nim);
		dd($request->session()->get('nim'));
		return $next($request);
	}
}
