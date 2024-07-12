<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\User;
use Illuminate\Support\Facades\DB;


class CustomLogin
{
	private $defaultStatus = 0;

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$email = $request->email;
		$status = DB::table('users')->where('email', $email)->value('status');
		// dd($status);
		$request->attributes->add(['status' => $status]);
		// dd($request);
		// if($status == $this->defaultStatus)
		// {
		// 	return redirect('/login');
		// }
		
		return $next($request);
	}
}
