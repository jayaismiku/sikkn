<?php

namespace App\Http\Controllers;

use Auth;
use App\Monev;
use App\Kelompok;
use App\Pengelompokan;
use Illuminate\Http\Request;

class MonevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::user()->user_id;
        $kelompok = Kelompok::join('pemonev', 'kelompok.pemonev_id', '=', 'pemonev.pemonev_id')
                    ->join('users', 'pemonev.user_id', '=', 'users.user_id')
                    ->leftjoin('desa', 'kelompok.desa_id', '=', 'desa.desa_id')
                    ->leftjoin('pendamping', 'kelompok.pendamping_id', '=', 'pendamping.pendamping_id')
                    ->leftjoin('dosen', 'pendamping.dosen_id', '=', 'dosen.dosen_id')
                    ->leftjoin('monev', 'kelompok.kelompok_id', '=', 'monev.kelompok_id')
                    ->where('users.user_id', $userid)->get(['kelompok.kelompok_id', 'kelompok.nama_kelompok', 'kelompok.jenis_kkn', 'dosen.nama_dosen', 'desa.nama_desa', 'monev.nilai']);
        // dd($kelompok);

        return view('monev.index', compact('kelompok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $kelompok = Kelompok::join('pemonev', 'kelompok.pemonev_id', '=', 'pemonev.pemonev_id')
                    ->join('users', 'pemonev.user_id', '=', 'users.user_id')
                    ->leftjoin('desa', 'kelompok.desa_id', '=', 'desa.desa_id')
                    ->leftjoin('pendamping', 'kelompok.pendamping_id', '=', 'pendamping.pendamping_id')
                    ->leftjoin('dosen', 'pendamping.dosen_id', '=', 'dosen.dosen_id')
                    ->where('kelompok.kelompok_id', $id)->first();
        $detailkelompok = Pengelompokan::join('mahasiswa', 'pengelompokan.nim', '=', 'mahasiswa.nim')
                    ->where('kelompok_id', $kelompok->kelompok_id)->get();
        $ketua = Kelompok::leftjoin('pengelompokan', 'kelompok.kelompok_id', '=', 'pengelompokan.kelompok_id')
                    ->leftjoin('mahasiswa', 'pengelompokan.nim', '=', 'mahasiswa.nim')
                    ->where('pengelompokan.ketua_kelompok', 1)->pluck('nama_mhs')->first();
        $detailkelompok = Pengelompokan::join('mahasiswa', 'pengelompokan.nim', '=', 'mahasiswa.nim')
                    ->where('kelompok_id', $kelompok->kelompok_id)->get();
        // dd($ketua);

        return view('monev.create', compact('kelompok', 'detailkelompok', 'ketua'));
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
        // $request->validate([
        //     'judul' => 'required',
        //     'slug' => 'required',
        //     'deskripsi' => 'required',
        //     'penulis' => 'required',
        //     'lampiran' => 'required|mimes:pdf|max:2048',
        // ]);

        $monev = new Monev([
            'pemonev_id' => $request->get('pemonev_id'), 
            'kelompok_id' => $request->get('kelompok_id'), 
            'keadaan_mahasiswa' => serialize($request->get('kelompok')), 
            'penilaian' => serialize($request->get('penilaian')),
            'nilai' => $request->get('nilai'),
            'catatan' => $request->get('catatan'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $monev->save();

        return redirect('/monev')->with('success', 'Buat Monev berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Monev  $monev
     * @return \Illuminate\Http\Response
     */
    public function show(Monev $monev)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Monev  $monev
     * @return \Illuminate\Http\Response
     */
    public function edit(Monev $monev)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Monev  $monev
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monev $monev)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Monev  $monev
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monev $monev)
    {
        //
    }
}
