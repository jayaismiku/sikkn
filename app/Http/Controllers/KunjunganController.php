<?php

namespace App\Http\Controllers;

use Auth;
use App\Kunjungan;
use App\Pendamping;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class KunjunganController extends Controller
{
    public function __construct()
    {
        
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->user_id);
        $userid = Auth::user()->user_id;
        $kunjungan = Kunjungan::join('pendamping', 'kunjungan.dpl_id', '=', 'pendamping.pendamping_id')
                     ->leftjoin('dosen', 'pendamping.dosen_id', '=', 'dosen.dosen_id')
                     ->leftjoin('users', 'dosen.user_id', '=', 'users.user_id')
                     ->where('users.user_id', $userid)->get();
        // dd($kunjungan);

        return view('kunjungan.index', compact('kunjungan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userid = Auth::id();
        $dplid = User::leftjoin('dosen', 'users.user_id', '=', 'dosen.user_id')
                 ->leftjoin('pendamping', 'dosen.dosen_id', '=', 'pendamping.dosen_id')
                 ->where('users.user_id', $userid)->pluck('pendamping.pendamping_id')->first();
        // dd($dplid);

        return view('kunjungan.create', compact('dplid'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'jenis_kunjungan' => 'required',
            'tanggal_kunjungan' => 'required',
            'unggah_sppd' => 'required|mimes:pdf|max:10240',
            'bukti_kunjungan' => 'required|image|mimes:jpg,png|max:5120',
        ]);

        $path_storage = 'kunjungan/' . $request->get('dpl_id'). '/';
        if ($request->file('unggah_sppd')) {
            $filesppd = $request->file('unggah_sppd');
            $fileName = date('YmdHis').'.'.$filesppd->getClientOriginalExtension();
            $pathsppd = $path_storage . $fileName;
            Storage::disk('public')->put($pathsppd, file_get_contents($filesppd));
        }
        if ($request->file('bukti_kunjungan')) {
            $filebukti = $request->file('bukti_kunjungan');
            $fileName = date('YmdHis').'.'.$filebukti->getClientOriginalExtension();
            $pathbukti = $path_storage . $fileName;
            Storage::disk('public')->put($pathbukti, file_get_contents($filebukti));
        }

        $kunjungan = new Kunjungan([
            'dpl_id' => $request->get('dpl_id'),
            'jenis_kunjungan' => $request->get('jenis_kunjungan'),
            'tanggal_kunjungan' => $request->get('tanggal_kunjungan'),
            'unggah_sppd' => $pathsppd,
            'bukti_kunjungan' => $pathbukti,
        ]);
        $kunjungan->save();

        return redirect('/kunjungan')->with('success', 'Tambah Kunjungan berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function show(Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kunjungan = Kunjungan::find($id);
        // dd($kunjungan);
        
        return view('kunjungan.edit', compact('kunjungan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'jenis_kunjungan' => 'required',
            'tanggal_kunjungan' => 'required',
            'unggah_sppd' => 'required|mimes:pdf|max:10240',
            'bukti_kunjungan' => 'required|image|mimes:jpg,png|max:5120',
        ]);

        $path_storage = 'kunjungan/' . $request->get('dpl_id'). '/';
        if ($request->file('unggah_sppd')) {
            $filesppd = $request->file('unggah_sppd');
            $fileName = date('YmdHis').'.'.$filesppd->getClientOriginalExtension();
            $pathsppd = $path_storage . $fileName;
            Storage::disk('public')->put($pathsppd, file_get_contents($filesppd));
        }
        if ($request->file('bukti_kunjungan')) {
            $filebukti = $request->file('bukti_kunjungan');
            $fileName = date('YmdHis').'.'.$filebukti->getClientOriginalExtension();
            $pathbukti = $path_storage . $fileName;
            Storage::disk('public')->put($pathbukti, file_get_contents($filebukti));
        }

        $ubahkunjungan = Kunjungan::find($id);
        $ubahkunjungan->jenis_kunjungan =  $request->get('jenis_kunjungan');
        $ubahkunjungan->tanggal_kunjungan = $request->get('tanggal_kunjungan');
        $ubahkunjungan->dpl_id = $request->get('dpl_id');
        $ubahkunjungan->unggah_sppd = $pathsppd;
        $ubahkunjungan->bukti_kunjungan = $pathbukti;
        $ubahkunjungan->updated_at = date('Y-m-d H:i:s');
        $ubahkunjungan->save();

        return redirect('/kunjungan')->with('success', 'Kunjungan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($kunjungan);exit();
        $kunjungan = Kunjungan::find($id);
        $kunjungan->delete();
        
        return redirect('/kunjungan')->with('success', 'Kunjungan berhasil dihapus!');
    }
}
