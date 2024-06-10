@extends('layouts.daftar')

@section('title', 'Pendaftaran')

@section('content')
<div class="col-xl-5 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
  <div class="card card-plain">
    <div class="card-header">
      <h4 class="font-weight-bolder">{{ __('Daftar sebagai Mahasiswa') }}</h4>
      <p class="mb-0">{{ __('Silahkan diisi formulir dibawah ini!!') }}</p>
    </div>
    <div class="card-body bg-white">
      <form method="POST" action="{{ route('daftar.mahasiswa.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active text-secondary" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="user" aria-selected="true">Akses User</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link text-secondary" id="profil-tab" data-bs-toggle="tab" data-bs-target="#profil" type="button" role="tab" aria-controls="profil" aria-selected="false">Profil</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link text-secondary" id="akademik-tab" data-bs-toggle="tab" data-bs-target="#akademik" type="button" role="tab" aria-controls="akademik" aria-selected="false">Akademik</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link text-secondary" id="unggah-tab" data-bs-toggle="tab" data-bs-target="#unggah" type="button" role="tab" aria-controls="unggah" aria-selected="false">Unggah</button>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active mt-2" id="user" role="tabpanel" aria-labelledby="user-tab" tabindex="0">
            <div class="form-group row my-1">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" required>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row my-1">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" required>
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row my-1">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password') }}</label>
              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" required>
              </div>
            </div>
          </div>
          <div class="tab-pane mt-2" id="profil" role="tabpanel" aria-labelledby="profil-tab" tabindex="0">
            <div class="form-group row my-1">
              <label for="nim" class="col-md-4 col-form-label text-md-right">{{ __('NIM') }}</label>
              <div class="col-md-6">
                <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" autocomplete="nim" required>
                @error('nim')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row my-1">
              <label for="namalengkap" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>
              <div class="col-md-6">
                <input type="text" class="form-control @error('namalengkap') is-invalid @enderror" id="namalengkap" name="namalengkap" autocomplete="namalengkap" required>
                @error('namalengkap')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row my-1">
              <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
              <div class="col-md-6">
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" autocomplete="alamat">
                @error('alamat')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row my-1">
              <label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('No Whatsapp (aktif)') }}</label>
              <div class="col-md-6">
                <input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp" autocomplete="telp" required>
                @error('telp')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="tab-pane mt-2" id="akademik" role="tabpanel" aria-labelledby="akademik-tab" tabindex="0">
            <div class="form-group row my-1">
              <label for="fakultas" class="col-md-4 col-form-label text-md-right">{{ __('Fakultas') }}</label>
              <div class="col-md-6">
                <select class="form-select form-control @error('fakultas') is-invalid @enderror" id="fakultas" name="fakultas" aria-label="select fakultas" required>
                  <option selected>- Pilih Fakultas -</option>
                  @foreach($fakultas as $fk)
                  <option value="{{ $fk->kode_fakultas }}">{{ $fk->nama_fakultas }}</option>
                  @endforeach
                </select>
                @error('fakultas')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row my-1">
              <label for="prodi" class="col-md-4 col-form-label text-md-right">{{ __('Program Studi') }}</label>
              <div class="col-md-6">
                <select class="form-select form-control @error('prodi') is-invalid @enderror" id="prodi" name="prodi" aria-label="select prodi" required>
                  <option selected>- Pilih Program Studi -</option>
                  @foreach($prodi as $pr)
                  <option value="{{ $pr->kode_prodi }}">{{ $pr->nama_prodi }}</option>
                  @endforeach
                </select>
                @error('prodi')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row my-1">
              <label for="semester" class="col-md-4 col-form-label text-md-right">{{ __('semester') }}</label>
              <div class="col-md-6">
                <select class="form-select form-control @error('semester') is-invalid @enderror" id="semester" name="semester" aria-label="select semester" required>
                  <option selected>- Pilih Semester -</option>
                  <option value="4">4</option>
                  <option value="6">6</option>
                  <option value="8">8</option>
                </select>
                @error('semester')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="tab-pane mt-2" id="unggah" role="tabpanel" aria-labelledby="unggah-tab" tabindex="0">
            <div class="form-group row my-1">
              <label for="unggahkrs" class="col-md-4 col-form-label text-md-right">{{ __('Unggah KRS') }}</label>
              <div class="col-md-6">
                <input type="file" class="form-control @error('unggahkrs') is-invalid @enderror" id="unggahkrs" name="unggahkrs" autocomplete="unggahkrs" required>
                @error('unggahkrs')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row my-1">
              <label for="unggahukt" class="col-md-4 col-form-label text-md-right">{{ __('Unggah UKT') }}</label>
              <div class="col-md-6">
                <input type="file" class="form-control @error('unggahukt') is-invalid @enderror" id="unggahukt" name="unggahukt" autocomplete="unggahukt" required>
                @error('unggahukt')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row my-1">
              <label for="unggahbiaya" class="col-md-4 col-form-label text-md-right">{{ __('Unggah Biaya KKN') }}</label>
              <div class="col-md-6">
                <input type="file" class="form-control @error('unggahbiaya') is-invalid @enderror" id="unggahbiaya" name="unggahbiaya" autocomplete="unggahbiaya" >
                @error('unggahbiaya')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row my-1">
              <label for="unggahsuratsakit" class="col-md-4 col-form-label text-md-right">{{ __('Unggah Surat Sakit Berat (dari Dokter)') }}</label>
              <div class="col-md-6">
                <input type="file" class="form-control @error('unggahsuratsakit') is-invalid @enderror" id="unggahsuratsakit" name="unggahsuratsakit" autocomplete="unggahsuratsakit">
                @error('unggahsuratsakit')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row my-1">
              <label for="alergi" class="col-md-4 col-form-label text-md-right">{{ __('Alergi') }}</label>
              <div class="col-md-6">
                <input type="text" class="form-control @error('alergi') is-invalid @enderror" id="alergi" name="alergi" autocomplete="alergi">
                @error('alergi')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
          </div>
        </div>
        
        <div class="form-group row mb-0 mt-4">
          <div class="col-md-6 d-flex justify-content-center links">
            <input type="hidden" name="role" value="mahasiswa">
            <input type="hidden" name="username" id="username" value="" />
            <button type="submit" class="btn btn-info">
              <span class="material-icons">inventory</span> 
              {{ __('Daftar KKN') }}
            </button>
          </div>
          <div class="col-md-6 justify-content-center links fs-6">
            <span>{{ __('Sudah punya akun?') }}</span><br/>
            <a href="{{ route('login') }}" class="ml-2 text-info"><span>{{ __('Masuk') }}</span></a>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript">
  function generateRandomString(length) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const charactersLength = characters.length;
    for (let i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
  }

  $(document).ready(function(){
    $('#namalengkap').change(function(event) {
      let nama = $(this).val();
      nama_depan = nama.split(' ')[0].toLowerCase();
      username = nama_depan + '-' + generateRandomString(5);
      console.log(username);
      $('#username').val(username);
    });
  });
</script>
@endsection