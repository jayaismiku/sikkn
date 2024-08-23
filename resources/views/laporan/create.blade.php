@extends('layouts.index')

@section('title', 'Tambah Laporan')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="{{ route('laporan.index') }}">{{ __('Laporan') }}</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>{{ __('Tambah Laporan') }}</span>
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
          <h6 class="text-white text-capitalize ps-3">Tambah Laporan</h6>
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
        <form id="tambah-laporan" method="post" action="{{ route('laporan.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="form-label" for="judul_laporan">{{ __('Judul Laporan:') }}</label>
            <input type="text" class="form-control px-2" id="judul_laporan" name="judul_laporan"/>
          </div>
          <div class="form-group">
              <label class="form-label" for="tipe_laporan">{{ __('Tipe Laporan:') }}</label>
              <select class="form-control form-control-sm p-2 form-select form-select-sm" aria-label=".form-select-sm select-fakultas" id="tipe_laporan" name="tipe_laporan" required>
                <option value="">{{ __('-Pilih Tipe Laporan-') }}</option>
                <option value="kemajuan">{{ __('Kemajuan') }}</option>
                <option value="akhir">{{ __('Akhir') }}</option>
                <option value="jurnal">{{ __('Jurnal') }}</option>
              </select>
          </div>
          <div class="form-group">
              <label class="form-label" for="unggah_laporan">{{ __('Unggah Laporan') }}</label>
              <input type="file" class="form-control px-2" accept="application/pdf" id="unggah_laporan" name="unggah_laporan"/>
          </div>
          <div class="form-group mt-4">
            <input type="hidden" name="kelompok_id" value="{{ $kelompok->kelompok_id }}">
            <input type="hidden" name="nama_kelompok" value="{{ $kelompok->nama_kelompok }}">
            <input type="hidden" name="tanggal_unggah" value="{{ date('Y-m-d H:i:s') }}">
            <button type="submit" class="btn btn-success xs">
              <span class="material-icons">save</span>
            </button>
            <a class="btn btn-info xs" href="{{ route('laporan.index') }}">
              <span class="material-icons">undo</span>
            </a>
          </div>         
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function () {

});
</script>

@endsection

