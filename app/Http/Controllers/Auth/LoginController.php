<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\User;
// use Illuminate\Support\Facades\Auth;

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

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Request $request)
	{
		$this->middleware(['guest', 'customLogin'])->except('logout');
		// dd($request);
	}

	public function redirectTo()
	{
		switch(Auth::user()->role){
			case 'panitia':
				$this->redirectTo = '/profil/panitia';
				return $this->redirectTo;
				break;

			case 'pemonev':
				$this->redirectTo = '/profil/pemonev';
				return $this->redirectTo;
				break;

			case 'dpl':
				$this->redirectTo = '/profil/dpl';
				return $this->redirectTo;
				break;

			case 'mahasiswa':
				$this->redirectTo = '/profil/mahasiswa';
				return $this->redirectTo;
				break;

			default:
				$this->redirectTo = RouteServiceProvider::HOME;
				return $this->redirectTo;
		}
	}

	public function customLogin(Request $request)
	{
		$status = Auth::user()->status;
		dd($status);
		$request->validate([
			'email' => 'required',
			'password' => 'required',
		]);

		$credentials = $request->only('email', 'password', 'status');

		if (Auth::attempt($credentials)) {
			// return redirect()->intended('dashboard')->withSuccess('Signed in');
			return redirect($this->redirectTo());
		}

		return redirect("login")->withSuccess('Login details are not valid');
	}
	
}
