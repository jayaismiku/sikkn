@extends('layouts.index')

@section('title', 'Mahasiswa')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="{{ route('mahasiswa.index') }}">{{ __('Mahasiswa') }}</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>{{ __('Profil Mahasiswa') }}</span>
    </li>
  </ol>
</nav>
@endsection

@section('content')
<div class="container-fluid px-2 px-md-4">
  <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1717226263667-7ce6f7f35d9d?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
    <span class="mask bg-gradient-info opacity-5"></span>
  </div>
  <div class="card card-body mx-3 mx-md-4 mt-n6">
    <div class="row gx-4 mb-2">
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="{{ asset('/avatars/boy.png') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
        </div>
      </div>
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1">{{ $mahasiswa->nama_lengkap }}</h5>
          <p class="mb-0 font-weight-normal text-sm">{{ __('NIM: ') }} {{ $mahasiswa->nim }}</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="row">
        <div class="col-12 col-xl-4">
          <div class="card card-plain h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Info Kelompok & Lokus</h6>
            </div>
            <div class="card-body p-3">
              <h6 class="text-uppercase text-body text-xs font-weight-bolder"><i class="fa-solid fa-people-group"></i> {{ __('Kelompok') }}</h6>
              <ul class="list-group">
                <li class="list-group-item border-0 px-0">
                  <div class="form-check form-switch ps-0">
                    <span class="ms-2 text-xs font-weight-bolder">{{ __('Nama Kelompok: ') }} {{ $mahasiswa->nama_kelompok }}</span>
                  </div>
                </li>
              </ul>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4"><i class="fa-solid fa-location-dot"></i> {{ __('Lokus KKN') }}</h6>
              <ul class="list-group">
                <li class="list-group-item border-0 px-0">
                  <div class="form-check form-switch ps-0">
                    <span class="ms-2 text-xs font-weight-bolder">{{ __('Nama Desa: ') }}</span>
                  </div>
                </li>
                <li class="list-group-item border-0 px-0">
                  <div class="form-check form-switch ps-0">
                    <span class="ms-2 text-xs font-weight-bolder">{{ __('Nama Kepala Desa: ') }}</span>
                  </div>
                </li>
                <li class="list-group-item border-0 px-0 pb-0">
                  <div class="form-check form-switch ps-0">
                    <span class="ms-2 text-xs font-weight-bolder">{{ __('Nama Sekretaris Desa: ') }}</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-4">
          <div class="card card-plain h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Info Diri</h6>
                </div>
                <div class="col-md-4 text-end">
                  <a href="{{ route('mahasiswa.edit', $mahasiswa->mahasiswa_id) }}">
                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">{{ __('Username: ') }}</strong> {{ $mahasiswa->username }}</li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">{{ __('Email: ') }}</strong> {{ $mahasiswa->email }}</li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">{{ __('Telp (WA): ') }}</strong> {{ $mahasiswa->telp }}</li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">{{ __('Fakultas: ') }}</strong> {{ $mahasiswa->fakultas }}</li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">{{ __('Program Studi: ') }}</strong> {{ $mahasiswa->prodi }}</li>
                <li class="list-group-item border-0 ps-0 pb-0">
                  <strong class="text-dark text-sm">Sosial Media:</strong> &nbsp;
                  <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                    <i class="fab fa-facebook fa-lg"></i>
                  </a>
                  <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                    <i class="fab fa-twitter fa-lg"></i>
                  </a>
                  <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                    <i class="fab fa-instagram fa-lg"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-4">
          <div class="card card-plain h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Dosen Pembimbing Lapangan</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                  <div class="avatar me-3">
                    <img src="{{ asset('/avatars/man-2.png') }}" alt="Dosen Pembimbing Lapangan" class="border-radius-lg shadow">
                  </div>
                  <div class="d-flex align-items-start flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">Nama DPL</h6>
                    <p class="mb-0 text-xs">Fakultas: </p>
                    <p class="mb-0 text-xs">Program Studi: </p>
                  </div>
                  <a target="_blank" href="http://wa.me/6285659331919" class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-md-auto" href="javascript:;"><i class="fa-solid fa-square-phone"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

