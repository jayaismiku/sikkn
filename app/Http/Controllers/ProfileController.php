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
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
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
		$mahasiswaID = Auth::id();
		$mahasiswa = User::join('mahasiswa', 'users.user_id', '=', 'mahasiswa.user_id')
					// ->leftjoin('pengelompokan', 'mahasiswa.nim', '=', 'pengelompokan.nim')
					// ->leftjoin('kelompok', 'pengelompokan.kelompok_id', '=', 'kelompok.kelompok_id')
					// ->leftjoin('desa', 'kelompok.desa_id', '=', 'desa.desa_id')
					->where('users.user_id', '=', $mahasiswaID)->first();
		// dd($mahasiswa);

		return view('mahasiswa.profil', compact('mahasiswa'));
	}

	public function ubahkatasandi()
	{
		$userid = Auth::id();

		return view('ubahkatasandi', compact('userid'));
	}

	public function updatekatasandi(Request $request, $userid)
	{
		// dd($request);
		// Validasi input
		$request->validate([
			'current_password' => 'required',
			'new_password' => 'required|min:8|confirmed',
		]);

		$user = Auth::user();

		// Verifikasi kata sandi saat ini
		if (!Hash::check($request->current_password, $user->password)) {
			throw ValidationException::withMessages([
				'current_password' => 'The current password is incorrect.',
			]);
		}

		// Update kata sandi
		$user->password = Hash::make($request->new_password);
		$user->save();

		// return back()->with('status', 'Password berhasil diubah!');	
		return redirect('/profile')->with('success', 'Kata Sandi berhasil diubah!');
	}
}
