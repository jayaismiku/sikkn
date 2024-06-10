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

	public function panitia()
	{

	}

	public function pemonev()
	{
		
	}

	public function dpl()
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
