<?php

namespace App\Http\Controllers;

use Auth;
use App\Validasi;
use App\Pendamping;
use App\Laporan;
use App\Kelompok;
use Illuminate\Http\Request;

class ValidasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Validasi  $validasi
     * @return \Illuminate\Http\Response
     */
    public function show(Validasi $validasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Validasi  $validasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Validasi $validasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Validasi  $validasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Validasi $validasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Validasi  $validasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Validasi $validasi)
    {
        //
    }

    public function logbook(Validasi $validasi)
    {
        //
    }
    
    public function laporan(Validasi $validasi)
    {
        $userid = Auth::id();
        $dpl = Pendamping::join('dosen', 'pendamping.dosen_id', '=', 'dosen.dosen_id')
                ->leftjoin('users', 'dosen.user_id', '=', 'users.user_id')
                ->where('users.user_id', $userid)->pluck('pendamping.pendamping_id')->first();
        $laporan = Laporan::join('kelompok', 'laporan.kelompok_id', '=', 'kelompok.kelompok_id')
                    ->where('kelompok.pendamping_id', $dpl)->get();
        // dd($laporan);

        return view('validasi.laporan', compact('dpl', 'laporan'));
    }
}
