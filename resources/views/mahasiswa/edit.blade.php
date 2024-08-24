@extends('layouts.index')

@section('title', 'Edit Mahasiswa')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>Edit Mahasiswa</span>
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
          <h6 class="text-white text-capitalize ps-3">{{ __('Ubah Data Mahasiswa') }}</h6>
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
        <form id="editMahasiswa" method="post" action="{{ route('mahasiswa.update', $mahasiswa->mahasiswa_id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class=" input-group-outline my-3">
            <label class="form-label" for="nim">{{ __('NIM:') }}</label>
            <input type="text" class="form-control form-control-sm p-2" id="nim" name="nim" value="{{ $mahasiswa->nim }}" required/>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="nama_lengkap">{{ __('Nama Mahasiswa:') }}</label>
            <input type="text" class="form-control form-control-sm p-2" id="nama_mhs" name="nama_mhs" value="{{ $mahasiswa->nama_mhs }}" required/>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="jenis_kelamin">{{ __('Jenis Kelamin:') }}</label>
            <select class="form-control form-control-sm p-2 form-select form-select-sm" aria-label=".form-select-sm select-jenis-kelamin" id="jenis_kelamin" name="jenis_kelamin" required>
              <option value="L" {{ $mahasiswa->jenis_kelamin=='L'?'selected':'' }}>{{ __('Laki-Laki') }}</option>
              <option value="P" {{ $mahasiswa->jenis_kelamin=='P'?'selected':'' }}>{{ __('Perempuan') }}</option>
            </select>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="fakultas">{{ __('Fakultas:') }}</label>
            <select class="form-control form-control-sm p-2 form-select form-select-sm" aria-label=".form-select-sm select-fakultas" name="fakultas" required>
              <option value="FST" {{ $mahasiswa->fakultas=='FST'?'selected':'' }}>{{ __('Fakultas Sains dan Teknologi') }}</option>
              <option value="FSH" {{ $mahasiswa->fakultas=='FSH'?'selected':'' }}>{{ __('Fakultas Sosial Humaniora') }}</option>
              <option value="FEB" {{ $mahasiswa->fakultas=='FEB'?'selected':'' }}>{{ __('Fakultas Ekonomi dan Bisnis') }}</option>
              <option value="FAI" {{ $mahasiswa->fakultas=='FAI'?'selected':'' }}>{{ __('Fakultas Agama Islam') }}</option>
            </select>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="prodi">{{ __('Program Studi:') }}</label>
            <select class="form-control form-control-sm p-2 form-select form-select-sm" aria-label=".form-select-sm select-prodi" name="prodi" required>
              <option value="TE" {{ $mahasiswa->prodi=='TE'?'selected':'' }}>{{ __('Teknik Elektro') }}</option>
              <option value="IF" {{ $mahasiswa->prodi=='IF'?'selected':'' }}>{{ __('Teknik Informatika') }}</option>
              <option value="TI" {{ $mahasiswa->prodi=='TI'?'selected':'' }}>{{ __('Teknik Industri') }}</option>
              <option value="TP" {{ $mahasiswa->prodi=='TP'?'selected':'' }}>{{ __('Teknologi Pangan') }}</option>
              <option value="BIOTEK" {{ $mahasiswa->prodi=='BIOTEK'?'selected':'' }}>{{ __('Bioteknologi') }}</option>
              <option value="FA" {{ $mahasiswa->prodi=='FA'?'selected':'' }}>{{ __('Farmasi') }}</option>
              <option value="AGRI" {{ $mahasiswa->prodi=='AGRI'?'selected':'' }}>{{ __('Agribisnis') }}</option>
              <option value="ILKOM" {{ $mahasiswa->prodi=='ILKOM'?'selected':'' }}>{{ __('Ilmu Komunikasi') }}</option>
              <option value="PSI" {{ $mahasiswa->prodi=='PSI'?'selected':'' }}>{{ __('Psikologi') }}</option>
              <option value="KTF" {{ $mahasiswa->prodi=='KTF'?'selected':'' }}>{{ __('Kriya Tekstil dan Fashion') }}</option>
              <option value="AP" {{ $mahasiswa->prodi=='AP'?'selected':'' }}>{{ __('Administrasi Publik') }}</option>
              <option value="AK" {{ $mahasiswa->prodi=='AK'?'selected':'' }}>{{ __('Akuntansi') }}</option>
              <option value="MAN" {{ $mahasiswa->prodi=='MAN'?'selected':'' }}>{{ __('Manajemen') }}</option>
              <option value="PAI" {{ $mahasiswa->prodi=='PAI'?'selected':'' }}>{{ __('Pendidikan Agama Islam') }}</option>
              <option value="PIAUD" {{ $mahasiswa->prodi=='PIAUD'?'selected':'' }}>{{ __('Pendidikan Islam Anak Usia Dini') }}</option>
              <option value="HKI" {{ $mahasiswa->prodi=='HKI'?'selected':'' }}>{{ __('Hukum Keluarga Islam') }}</option>
              <option value="KPI" {{ $mahasiswa->prodi=='KPI'?'selected':'' }}>{{ __('Komunikasi Penyiaran Islam') }}</option>
              <option value="EKSYAR" {{ $mahasiswa->prodi=='EKSYAR'?'selected':'' }}>{{ __('Ekonomi Syariah') }}</option>
            </select>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="semester">{{ __('Semester:') }}</label>
            <select class="form-control form-control-sm p-2 form-select form-select-sm" aria-label=".form-select-sm select-semester" id="semester" name="semester" required>
              <option value="4" {{ $mahasiswa->semester=='4'?'selected':'' }}>{{ __('Semester 4') }}</option>
              <option value="6" {{ $mahasiswa->semester=='6'?'selected':'' }}>{{ __('Semester 6') }}</option>
              <option value="8" {{ $mahasiswa->semester=='8'?'selected':'' }}>{{ __('Semester 8') }}</option>
            </select>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="telp">{{ __('Telp (WA):') }}</label>
            <input type="text" class="form-control form-control-sm p-2" placeholder="62xxxyyyzzz" id="telp_mhs" name="telp_mhs" value="{{ $mahasiswa->telp_mhs }}" required>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="alamat">{{ __('Alamat:') }}</label>
            <input type="text" class="form-control form-control-sm p-2" name="alamat" value="{{ $mahasiswa->alamat }}"/>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="krs">{{ __('Unggah Bukti KRS:') }}</label>
            <input type="file" class="form-control form-control-sm p-2" accept="image/*" id="krs" name="krs" value="{{ $mahasiswa->krs }}"/>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="bayar">{{ __('Unggah Bukti Bayar KKN:') }}</label>
            <input type="file" class="form-control form-control-sm p-2" accept="image/*" name="bayar" value="{{ $mahasiswa->bayar }}"/>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="ukt">{{ __('Unggah Bukti Bayar UKT:') }}</label>
            <input type="file" class="form-control form-control-sm p-2" accept="image/*" name="ukt" value="{{ $mahasiswa->ukt }}" />
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="suratkesediaan">{{ __('Unggah Surat Kesediaan:') }}</label>
            <input type="file" class="form-control form-control-sm p-2" accept="image/*" name="suratkesediaan" value="{{ $mahasiswa->suratkesediaan }}" />
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="suratijinortu">{{ __('Unggah Surat Ijin Orang Tua/Wali:') }}</label>
            <input type="file" class="form-control form-control-sm p-2" accept="image/*" name="suratijinortu" value="{{ $mahasiswa->suratijinortu }}" />
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="sakit">{{ __('Unggah Surat Sakit (Berat):') }}</label>
            <input type="file" class="form-control form-control-sm p-2" accept="image/*" name="sakit" value="{{ $mahasiswa->sakit }}"/>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="alergi">{{ __('Silahkan dituliskan jika punya alergi:') }}</label>
            <input type="text" class="form-control form-control-sm p-2" accept="image/*" name="alergi" value="{{ $mahasiswa->alergi }}"/>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="nama_ortu">{{ __('Nama Orang Tua/Wali:') }}</label>
            <input type="text" class="form-control form-control-sm p-2" name="nama_ortu" value="{{ $mahasiswa->nama_ortu }}" required/>
          </div>
          <div class=" input-group-outline my-3">
            <label class="form-label" for="telp_ortu">{{ __('Telp (WA) Orang Tua/Wali:') }}</label>
            <input type="text" class="form-control form-control-sm p-2" placeholder="62xxxyyyzzz" id="telp_ortu" name="telp_ortu" value="{{ $mahasiswa->telp_ortu }}" required>
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control px-2 py-2" name="mahasiswa_id" value="{{ $mahasiswa->mahasiswa_id }}" />
            <input type="hidden" class="form-control px-2 py-2" name="user_id" value="{{ $mahasiswa->user_id }}" />
            <button type="submit" class="btn btn-success xs">
              <span class="material-icons">save</span>
            </button>
            <a class="btn btn-info xs" href="{{ route('mahasiswa.index') }}">
              <span class="material-icons">undo</span>
            </a>
            @if(Auth::user()->role == 'dpl')
            <a class="btn btn-warning xs" href="{{ route('mahasiswa.verify', $mahasiswa->user_id) }}" onclick="event.preventDefault(); document.getElementById('verify-account').submit();">
              <span class="material-icons">verified</span>
            </a>
            @endif
          </div>         
        </form>
        @if(Auth::user()->role == 'dpl')
        <form id="verify-account" action="{{ route('mahasiswa.verify', $mahasiswa->user_id) }}" method="POST" class="d-none">
          @csrf
          @method('PUT')
        </form>
        @endif
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    $('#telp_mhs').change(function(){
      let telp = '62';
      let angka1 = $(this).val().substring(0,1);
      let angka2 = $(this).val().substring(1);
      if(angka1 == 0){
        telp = telp + angka2;
      }else{
        telp = angka1 + angka2;
      }
      $(this).val(telp);
      console.log(telp);
    });
    $('#telp_ortu').change(function(){
      let telp = '62';
      let angka1 = $(this).val().substring(0,1);
      let angka2 = $(this).val().substring(1);
      if(angka1 == 0){
        telp = telp + angka2;
      }else{
        telp = angka1 + angka2;
      }
      $(this).val(telp);
      console.log(telp);
    });
  });
</script>

@endsection

