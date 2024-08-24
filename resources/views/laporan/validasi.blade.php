@extends('layouts.index')

@section('title', 'Laporan Kelompok')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>{{ __('Laporan Kelompok') }}</span>
    </li>
  </ol>
</nav>
@endsection

@section('content')
@if(session()->get('success'))
<div id="alert-success" class="alert alert-success alert-dismissible text-white mx-3 fade show" role="alert">
  <span class="alert-icon align-middle">
    <span class="material-icons text-md">thumb_up_off_alt</span>
  </span>
  <span class="alert-text"><strong>Success!</strong> {{ session()->get('success') }}</span>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3 container">
          <div class="row">
            <div class="col-sm-8">
              <h6 class="text-white text-capitalize ps-3">{{ __('Laporan Saya') }}</h6>
            </div>
            <div class="col-sm-4 text-end">
              {{-- <a class="text-white pe-3" href="{{ route('logbook.create') }}">
                <i class="fa-solid fa-file-circle-plus"></i>
              </a> --}}
            </div>
          </div>
        </div>
      </div>
      <div class="card-body px-0 pb-2 mx-3">
        <div class="table-responsive p-0">
          <table class="table align-items-center justify-content-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Nama kelompok') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Judul Laporan') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Tipe') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('File Laporan') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Validasi DPL') }}</th>
                <!-- <th class="text-center"><i class="fa-solid fa-file-pen"></i></th> -->
              </tr>
            </thead>
            <tbody>
              @foreach($laporan as $lap)
              <tr>
                <td class="text-xs">{{ $lap->nama_kelompok }}</td>
                <td class="text-xs nama">{{ $lap->judul_laporan }}</td>
                <td class="text-xs deskripsi">{!! $lap->tipe_laporan !!}</td>
                <td class="text-xs">
                  <a target="_blank" class="display-6" href="{{ Storage::url($lap->unggah_file) }}"><i class="fa-solid fa-file-pdf"></i></a>
                </td>
                <td class="text-xs">
                  <a class="nav-link text-danger display-6" href="{{ route('laporan.tervalidasi', $lap->laporan_id) }}" onclick="event.preventDefault(); document.getElementById('validasi-form-{{ $lap->laporan_id }}').submit();">
                    {!! ($lap->validasi == 0)?'<i class="fa-solid fa-triangle-exclamation text-warning"></i>':'<i class="fa-solid fa-clipboard-check text-success"></i>' !!}
                    <form id="validasi-form-{{ $lap->laporan_id }}" action="{{ route('laporan.tervalidasi', $lap->laporan_id) }}" method="POST" class="d-none">
                      @csrf
                      @method('PUT')
                    </form>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
.deskripsi p{
  font-family: Roboto;
  font-size: 0.75rem !important;
  font-weight: 100;
}
</style>

@endsection

