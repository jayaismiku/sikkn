<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Pendamping;
use App\Mahasiswa;
use App\Fakultas;
use App\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{


	public function __construct()
	{

	}

	public function index()
	{
		switch (Auth::user()->role) {
			case 'panitia':
				return redirect('profil/panitia');
				break;
			
			case 'pemonev':
				return redirect('profil/pemonev');
				break;
			
			case 'pendamping':
				return redirect('profil/dpl');
				break;
			
			case 'mahasiswa':
				return redirect('profil/mahasiswa');
				break;
			
			default:
				return view('home');
				break;
		}
	}

	public function panitia(Request $request)
	{
		$userid = Auth::user()->user_id;
		$panitia = User::join('panitia', 'users.user_id', '=', 'panitia.user_id')
					->where('users.user_id', '=', $userid)->first();
		// dd($panitia);
		return view('panitia.profil', compact('panitia'));
	}

	public function pemonev(Request $request)
	{
		
	}

	public function dpl(Request $request)
	{
		
	}

	public function mahasiswa(Request $request)
	{
		// dd(Auth::user());
		$mahasiswaID = Auth::user()->user_id;
		$mahasiswa = User::join('mahasiswa', 'users.user_id', '=', 'mahasiswa.user_id')
					->where('users.user_id', '=', $mahasiswaID)->first();
		// dd($mahasiswa);

		return view('mahasiswa.profil', compact('mahasiswa'));
	}
}
