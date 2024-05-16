@extends('layouts.index')

@section('title', 'Edit Data Dosen')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="{{ route('datadosen') }}">Data Dosen</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>Edit Dosen</span>
    </li>
  </ol>
</nav>
@endsection

@section('content')

<h5> Aturan KKN </h5>
<h6>1.	Mengikuti secara penuh seluruh rangkaian kegiatan dimaksud mulai dari kegiatan Pembekalan, Pelaksanaan, Monitoring, Evaluasi program.</h6>
<h6>2.	Bimbingan kepada mahasiswa yang menjadi tanggung jawab saya.</h6>
<h6>3.	Memastikan pelaksanaan program dan menghasilkan luaran yang disyaratkan. </h6>
<h6>4.	Kunjungan lapangan sebanyak 3 (tiga) kali dan selebihnya diatur sesuai kebutuhan program. </h6>
<h6>5.	Turut menjaga nama baik UM Bandung</h6>
<hr>

<div class="row">
    <div class="col">
        <div class="input-group input-group-dynamic mb-4">
            <input type="text" class="form-control" placeholder="Nama" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group input-group-dynamic mb-4">
        <input type="text" class="form-control" placeholder="alamat Email" aria-label="alamat Email" aria-describedby="basic-addon2">
        </div>

        <div class="input-group input-group-dynamic mb-4">
        <input type="text" class="form-control" placeholder="NIP/NIDN" aria-label="NIP" aria-describedby="basic-addon2">
        </div>

        <div class="input-group input-group-dynamic mb-4">
        <input type="text" class="form-control" placeholder="Pangkat/Gol" aria-label="Pangkat" aria-describedby="basic-addon2">
        </div>

        <div class="input-group input-group-dynamic mb-4">
        <input type="text" class="form-control" placeholder="Fakultas" aria-label="Fakultas" aria-describedby="basic-addon2">
        </div>

        <div class="input-group input-group-dynamic mb-4">
        <input type="text" class="form-control" placeholder="Prodi" aria-label="Prodi" aria-describedby="basic-addon2">
        </div>


        <div class="input-group input-group-dynamic mb-4">
        <input type="text" class="form-control" placeholder="Nomor Whastapp" aria-label="Nomor Whastapp" aria-describedby="basic-addon2">
        </div>

    </div>
    <div class="col">
        <div class="col">
            <label class="form-label" for="basic-url">File Upload</label>
            <form action="/file-upload" class="form-control border dropzone" id="dropzone">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>
            <form action="/file-upload" class="form-control border dropzone" id="dropzone">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>
            <form action="/file-upload" class="form-control border dropzone" id="dropzone">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>
            <form action="/file-upload" class="form-control border dropzone" id="dropzone">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>
            <form action="/file-upload" class="form-control border dropzone" id="dropzone">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>
        </div>
        <div class="col">
            <label>Dengan ini menyatakan bahwa saya</label>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio1">
                <label class="custom-control-label" for="customRadio1">Bersedia</label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio2">
                <label class="custom-control-label" for="customRadio2">Tidak Bersedia</label>
            </div>
            <label>menjadi Dosen Pembimbing Lapangan (DPL) KKN</label>
        </div>
    </div>
        
</div>

<button type="button" class="btn btn-primary">SIMPAN</button>

@endsection


