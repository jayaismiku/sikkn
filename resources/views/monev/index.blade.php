@extends('layouts.index')

@section('title', 'Monitoring & Evaluasi')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>{{ __('Monitoring Evaluasi') }}</span>
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
              <h6 class="text-white text-capitalize ps-3">{{ __('Monitoring dan Evaluasi') }}</h6>
            </div>
            <div class="col-sm-4 text-end">
              <!-- <a class="text-white pe-3" href="{{ route('kelompok.create') }}">
                <i class="fa-solid fa-file-circle-plus"></i>
              </a> -->
            </div>
          </div>
        </div>
      </div>
      <div class="card-body px-0 pb-2 mx-3">
        <div class="table-responsive p-0">
          <table id="tblKelompok" class="table align-items-center justify-content-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Nama Kelompok') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Jenis KKN') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('DPL') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Desa') }}</th>
                <th class="text-center"><i class="fa-solid fa-file-pen"></i></th>
              </tr>
            </thead>
            <tbody>
              @foreach($kelompok as $kel)
              <tr>
                <td class="text-xs">{{ $kel->nama_kelompok }}</td>
                <td class="text-xs nama">{{ $kel->jenis_kkn }}</td>
                <td class="text-xs nama">{{ $kel->nama_dosen }}</td>
                <td class="text-xs nama">{{ $kel->nama_desa }}</td>
                <td class="text-xs text-center">
                  <a class="text-warning" href="{{ route('monev.create', $kel->kelompok_id)}}">
                    <i class="fa-solid fa-users-viewfinder"></i>
                  </a>
                  <!-- <a class="nav-link text-danger" href="{{ route('kelompok.destroy', $kel->kelompok_id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $kel->kelompok_id }}').submit();">
                    <span class="material-icons">delete</span>
                    <form id="delete-form-{{ $kel->kelompok_id }}" action="{{ route('kelompok.destroy', $kel->kelompok_id) }}" method="POST" class="d-none">
                      @csrf
                      @method('DELETE')
                    </form>
                  </a> -->
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

