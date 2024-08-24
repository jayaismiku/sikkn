<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Kelompok;
use App\Mahasiswa;
use App\Pendamping;
use App\Pemonev;
use App\Desa;
use App\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        switch (Auth::user()->role) {
            case 'panitia':
                return redirect('dasbor/panitia');
                break;
            
            case 'pemonev':
                return redirect('dasbor/pemonev');
                break;
            
            case 'pendamping':
                return redirect('dasbor/dpl');
                break;
            
            case 'mahasiswa':
                return redirect('dasbor/mahasiswa');
                break;
            
            default:
                redirect(route('logout'));
                break;
        }
    }

    public function panitia(Request $request)
    {
        $userid = Auth::user()->user_id;
        $panitia = User::join('panitia', 'users.user_id', '=', 'panitia.user_id')
                    ->where('users.user_id', '=', $userid)->first();
        $jmlMahasiswa = Mahasiswa::count();
        $jmlPendamping = Pendamping::count();
        $jmlPemonev = Pemonev::count();
        $jmlKelompok = Kelompok::count();
        $jmlDesa = Desa::count();
        $posts = Post::join('panitia', 'posts.penulis', '=', 'panitia.panitia_id')
                 ->orderBy('posts.created_at', 'desc')->take(3)->get();
        // dd($posts);
        return view('dasbor.panitia', compact('panitia', 'jmlMahasiswa', 'jmlPendamping', 'jmlPemonev', 'jmlKelompok', 'jmlDesa', 'posts'));
    }

    public function pemonev(Request $request)
    {
        // dd(Auth::user());
        $user = Auth::user()->user_id;

        return view('dasbor.pemonev', compact('user'));
    }

    public function dpl(Request $request)
    {
        $user = Auth::user()->user_id;

        return view('dasbor.dpl', compact('user'));
    }

    public function mahasiswa(Request $request)
    {
        // dd(Auth::user());
        $mahasiswaID = Auth::user()->user_id;
        $mahasiswa = User::join('mahasiswa', 'users.user_id', '=', 'mahasiswa.user_id')
                    ->join('pengelompokan', 'mahasiswa.nim', '=', 'pengelompokan.nim')
                    ->where('users.user_id', '=', $mahasiswaID)->first();
        $posts = Post::join('panitia', 'posts.penulis', '=', 'panitia.panitia_id')
                 ->orderBy('posts.created_at', 'desc')->take(3)->get();
        // dd($posts);

        return view('dasbor.mahasiswa', compact('mahasiswa', 'posts'));
    }
}
