<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	// protected $redirectTo = RouteServiceProvider::HOME;
	protected $redirectTo;

	public function redirectTo()
	{
		switch(Auth::user()->role){
			case 'desa':
				$this->redirectTo = '/desa';
				return $this->redirectTo;
				break;

			case 'lembaga':
			$this->redirectTo = '/lembaga';
			return $this->redirectTo;
				break;

			case 'panitia':
					$this->redirectTo = '/panitia';
				return $this->redirectTo;
				break;

			case 'pendamping':
				$this->redirectTo = '/pendamping';
				return $this->redirectTo;
				break;

			case 'mahasiswa':
					$this->redirectTo = '/mahasiswa';
				return $this->redirectTo;
				break;

			default:
				$this->redirectTo = '/login';
				return $this->redirectTo;
		}
		 
		// return $next($request);
	}

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// $this->middleware('guest')->except('logout');
	}
}
