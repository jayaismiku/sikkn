@extends('layouts.index')

@section('title', 'Edit Dosen')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="{{ route('dosen.index') }}">Dosen</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>Edit Dosen</span>
    </li>
  </ol>
</nav>
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">{{ __('Ubah Data Dosen') }}</h6>
        </div>
      </div>
      <div class="card-body px-0 pb-2 mx-3 ">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        <br />
        @endif
        <form id="editDosen" method="post" action="{{ route('dosen.update', $dosen->dosen_id) }}">
          @csrf
          @method('PUT')
          <div class=" input-group-outline my-3">
            <label class="form-label" for="nidn">{{ __('NIDN:') }}</label>
            <input type="text" class="form-control px-2 py-2" name="nidn" value="{{ $dosen->nidn }}" required/>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="nip">{{ __('NIP:') }}</label>
            <input type="text" class="form-control px-2 py-2" name="nip" value="{{ $dosen->nip }}" required/>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="nama_lengkap">{{ __('Nama Lengkap (tanpa gelar):') }}</label>
            <input type="text" class="form-control px-2 py-2" name="nama_lengkap" value="{{ $dosen->nama_lengkap }}" required/>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="gelar_depan">{{ __('Gelar Depan') }}</label>
            <input type="text" class="form-control px-2 py-2" name="gelar_depan" value="{{ $dosen->gelar_depan }}"/>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="gelar_belakang">{{ __('Gelar Belakang') }}</label>
            <input type="text" class="form-control px-2 py-2" name="gelar_belakang" value="{{ $dosen->gelar_belakang }}"/>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="pangkat">{{ __('Pangkat') }}</label>
            <select class="form-control form-select px-2" aria-label=".form-select-sm select-pangkat" name="pangkat">
              <option value="Penata Muda" {{ $dosen->pangkat=='Penata Muda'?'selected':'' }}>{{ __('Penata Muda') }}</option>
              <option value="Penata Muda Tk.I" {{ $dosen->pangkat=='Penata Muda Tk.I'?'selected':'' }}>{{ __('Penata Muda Tk.I') }}</option>
              <option value="Penata" {{ $dosen->pangkat=='Penata'?'selected':'' }}>{{ __('Penata') }}</option>
              <option value="Penata Tk.I" {{ $dosen->pangkat=='Penata Tk.I'?'selected':'' }}>{{ __('Penata Tk.I') }}</option>
              <option value="Pembina" {{ $dosen->pangkat=='Pembina'?'selected':'' }}>{{ __('Pembina') }}</option>
              <option value="Pembina Tk.I" {{ $dosen->pangkat=='Pembina Tk.I'?'selected':'' }}>{{ __('Pembina Tk.I') }}</option>
              <option value="Pembina Utama Muda" {{ $dosen->pangkat=='Pembina Utama Muda'?'selected':'' }}>{{ __('Pembina Utama Muda') }}</option>
              <option value="Pembina Utama Madya" {{ $dosen->pangkat=='Pembina Utama Madya'?'selected':'' }}>{{ __('Pembina Utama Madya') }}</option>
              <option value="Pembina Utama" {{ $dosen->pangkat=='Pembina Utama'?'selected':'' }}>{{ __('Pembina Utama') }}</option>
            </select>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="golongan">{{ __('Golongan') }}</label>
            <select class="form-control form-select px-2" aria-label=".form-select-sm select-golongan" name="golongan" required>
              <option value="Gol. III/a" {{ $dosen->golongan=='Gol. III/a'?'selected':'' }}>{{ __('Gol. III/a') }}</option>
              <option value="Gol. III/b" {{ $dosen->golongan=='Gol. III/b'?'selected':'' }}>{{ __('Gol. III/b') }}</option>
              <option value="Gol. III/c" {{ $dosen->golongan=='Gol. III/c'?'selected':'' }}>{{ __('Gol. III/c') }}</option>
              <option value="Gol. III/d" {{ $dosen->golongan=='Gol. III/d'?'selected':'' }}>{{ __('Gol. III/d') }}</option>
              <option value="Gol. IV/a" {{ $dosen->golongan=='Gol. IV/a'?'selected':'' }}>{{ __('Gol. IV/a') }}</option>
              <option value="Gol. IV/b" {{ $dosen->golongan=='Gol. IV/b'?'selected':'' }}>{{ __('Gol. IV/b') }}</option>
              <option value="Gol. IV/c" {{ $dosen->golongan=='Gol. IV/c'?'selected':'' }}>{{ __('Gol. IV/c') }}</option>
              <option value="Gol. IV/d" {{ $dosen->golongan=='Gol. IV/d'?'selected':'' }}>{{ __('Gol. IV/d') }}</option>
              <option value="Gol. IV/e" {{ $dosen->golongan=='Gol. IV/e'?'selected':'' }}>{{ __('Gol. IV/e') }}</option>
            </select>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="fakultas">{{ __('Fakultas') }}</label>
            <select class="form-control form-select px-2" aria-label=".form-select-sm select-fakultas" name="fakultas" required>
              <option value="FST" {{ $dosen->fakultas=='FST'?'selected':'' }}>{{ __('Fakultas Sains dan Teknologi') }}</option>
              <option value="FSH" {{ $dosen->fakultas=='FSH'?'selected':'' }}>{{ __('Fakultas Sosial Humaniora') }}</option>
              <option value="FEB" {{ $dosen->fakultas=='FEB'?'selected':'' }}>{{ __('Fakultas Ekonomi dan Bisnis') }}</option>
              <option value="FAI" {{ $dosen->fakultas=='FAI'?'selected':'' }}>{{ __('Fakultas Agama Islam') }}</option>
            </select>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="prodi">{{ __('Program Studi') }}</label>
            <select class="form-control form-select px-2" aria-label=".form-select-sm select-prodi" name="prodi" required>
              <option value="TE" {{ $dosen->prodi=='TE'?'selected':'' }}>{{ __('Teknik Elektro') }}</option>
              <option value="IF" {{ $dosen->prodi=='IF'?'selected':'' }}>{{ __('Teknik Informatika') }}</option>
              <option value="TI" {{ $dosen->prodi=='TI'?'selected':'' }}>{{ __('Teknik Industri') }}</option>
              <option value="TP" {{ $dosen->prodi=='TP'?'selected':'' }}>{{ __('Teknologi Pangan') }}</option>
              <option value="BIO" {{ $dosen->prodi=='BIO'?'selected':'' }}>{{ __('Bioteknologi') }}</option>
              <option value="FA" {{ $dosen->prodi=='FA'?'selected':'' }}>{{ __('Farmasi') }}</option>
              <option value="AGRI" {{ $dosen->prodi=='AGRI'?'selected':'' }}>{{ __('Agribisnis') }}</option>
              <option value="ILKOM" {{ $dosen->prodi=='ILKOM'?'selected':'' }}>{{ __('Ilmu Komunikasi') }}</option>
              <option value="PSI" {{ $dosen->prodi=='PSI'?'selected':'' }}>{{ __('Psikologi') }}</option>
              <option value="KTF" {{ $dosen->prodi=='KTF'?'selected':'' }}>{{ __('Kriya Tekstil dan Fashion') }}</option>
              <option value="AP" {{ $dosen->prodi=='AP'?'selected':'' }}>{{ __('Administrasi Publik') }}</option>
              <option value="AK" {{ $dosen->prodi=='AK'?'selected':'' }}>{{ __('Akuntansi') }}</option>
              <option value="MAN" {{ $dosen->prodi=='MAN'?'selected':'' }}>{{ __('Manajemen') }}</option>
              <option value="PAI" {{ $dosen->prodi=='PAI'?'selected':'' }}>{{ __('Pendidikan Agama Islam') }}</option>
              <option value="PIAUD" {{ $dosen->prodi=='PIAUD'?'selected':'' }}>{{ __('Pendidikan Islam Anak Usia Dini') }}</option>
              <option value="HKI" {{ $dosen->prodi=='HKI'?'selected':'' }}>{{ __('Hukum Keluarga Islam') }}</option>
              <option value="KPI" {{ $dosen->prodi=='KPI'?'selected':'' }}>{{ __('Komunikasi Penyiaran Islam') }}</option>
              <option value="EKSYAR" {{ $dosen->prodi=='EKSYAR'?'selected':'' }}>{{ __('Ekonomi Syariah') }}</option>
            </select>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="telp">{{ __('Telp (WA)') }}</label>
            <input type="text" class="form-control px-2 py-2" name="telp" value="{{ $dosen->telp }}" required/>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="alamat">{{ __('Alamat') }}</label>
            <input type="text" class="form-control px-2 py-2" name="alamat" value="{{ $dosen->alamat }}" required/>
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control px-2 py-2" name="dosen_id" value="{{ $dosen->dosen_id }}" />
            <button type="submit" class="btn btn-success xs">
              <span class="material-icons">save</span>
            </button>
            <a class="btn btn-info xs" href="{{ route('dosen') }}">
              <span class="material-icons">undo</span>
            </a>
          </div>         
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

