@extends('layouts.daftar')

@section('title', 'Pendaftaran')

@section('content')
<div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
  <div class="card card-plain">
    <div class="card-header text-center">
      <h4 class="font-weight-bolder">{{ __('Mau daftar sebagai?') }}</h4>
      <p class="mb-0">{{ __('Pilih mode pengguna') }}</p>
    </div>
    <div class="card-body">
      <a class="btn btn-lg btn-icon btn-3 btn-info w-100" href="{{ Route('daftar.panitia') }}">
        <span class="btn-inner--icon"><i class="material-icons">supervisor_account</i></span><br>
        <span class="btn-inner--text">{{ __('Panitia KKN') }}</span>
      </a>
      <a class="btn btn-lg btn-icon btn-3 btn-warning w-100" href="{{ Route('daftar.pemonev') }}">
        <span class="btn-inner--icon"><i class="material-icons">person_search</i></span><br>
        <span class="btn-inner--text">{{ __('Pemonev Lapangan') }}</span>
      </a>
      <a class="btn btn-lg btn-icon btn-3 btn-primary w-100" href="{{ Route('daftar.dpl') }}">
        <span class="btn-inner--icon"><i class="material-icons">supervised_user_circle</i></span><br>
        <span class="btn-inner--text">{{ __('Dosen Pendamping Lapangan') }}</span>
      </a>
      <a class="btn btn-lg btn-icon btn-3 btn-secondary w-100" href="{{ Route('daftar.mahasiswa') }}">
        <span class="btn-inner--icon"><i class="material-icons">assignment_ind</i></span><br>
        <span class="btn-inner--text">{{ __('Mahasiswa') }}</span>
      </a>

    </div>
  </div>
</div>
@endsection