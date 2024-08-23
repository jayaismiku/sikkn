<?php

namespace App\Http\Controllers;

use App\Kelompok;
use App\Mahasiswa;
use App\Pengelompokan;
use Illuminate\Http\Request;

class PengelompokanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::join('pengelompokan', 'mahasiswa.nim', '=', 'pengelompokan.nim')
                                ->get();
        // dd($kelompok);
        return view('pengelompokan.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::all(['nim', 'jenis_kelamin', 'prodi']);
        // dd($mahasiswa);
        return view('pengelompokan.create', compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_prodi' => 'required',
            'nama_prodi' => 'required',
            'fakultas' => 'required'
        ]);

        $newProdi = new Kelompok([
            'kode_prodi' => $request->get('kode_prodi'),
            'nama_prodi' => $request->get('nama_prodi'),
            'kaprodi' => $request->get('kaprodi'),
            'sekprodi' => $request->get('sekprodi'),
            'fakultas' => $request->get('fakultas'),
        ]);
        $newProdi->save();

        return redirect('/pengelompokan')->with('success', 'Tambah Pengelompokan berhasil!');
    }

    public function storeapi(Request $request)
    {
        // $data = $request->all();
        $data = $request->input('data');
        // dd($data);
        $nama_kelompok = "";
        $kelompok_id = 0;

        if (!empty($data)) {
            Pengelompokan::truncate();
            // Kelompok::delete();

            foreach ($data as $item) {
                // $kelompok = $row['kelompok'];
                // $nim = $row['nim'];
                if ($item['nama_kelompok'] != $nama_kelompok) {
                    $nama_kelompok = $item['nama_kelompok'];

                    $kelompok = new Kelompok([
                        'nama_kelompok' => $nama_kelompok,
                    ]);
                    $kelompok->save();
                    $kelompok_id = $kelompok->kelompok_id;
                }

                Pengelompokan::create([
                    'kelompok_id' => $kelompok_id,
                    'nama_kelompok' => $nama_kelompok,
                    'nim' => $item['nim']
                ]);
            }
        }
        
        return response()->json(['message' => 'Data berhasil disimpan ke MySQL'], 200);
        // return redirect('/pengelompokan')->with('success', 'Tambah Pengelompokan berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
