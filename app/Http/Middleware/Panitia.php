<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Support\Facades\DB;

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
        $userid = Auth::user()->user_id;
        $panitia_id =  DB::table('panitia')
                ->join('users', 'panitia.user_id', '=', 'users.user_id')
                ->where('users.user_id', $userid)
                ->get('panitia.panitia_id')->first();
        // $request->session()->put('nim', $nim);
        // dd($request->session()->get('nim'));
        $request->attributes->add(['id' => $panitia_id]);
        // dd($request);

        return $next($request);
    }
}
