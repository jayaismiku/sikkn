@extends('layouts.index')

@section('title', 'Tambah Logbook')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="{{ route('logbook.index') }}">{{ __('Logbook') }}</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>{{ __('Tambah Logbook') }}</span>
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
          <h6 class="text-white text-capitalize ps-3">Tambah Logbook</h6>
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
        <form id="tambah-logbook" method="post" action="{{ route('logbook.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="form-label" for="nama_kegiatan">{{ __('Nama Kegiatan:') }}</label>
            <input type="text" class="form-control px-2" id="nama_kegiatan" name="nama_kegiatan"/>
          </div>
          <div class="form-group">
              <label class="form-label" for="tanggal_kegiatan">{{ __('Tanggal Kegiatan:') }}</label>
              <input type="datetime-local" class="form-control px-2" id="tanggal_kegiatan" name="tanggal_kegiatan"/>
          </div>
          <div class="form-group">
              <label class="form-label" for="deskripsi_kegiatan">{{ __('Deskripsi Kegiatan:') }}</label>
              <textarea id="deskripsi-kegiatan" class="form-control px-2" name="deskripsi_kegiatan" rows="4"></textarea>
          </div>
          <div class="form-group">
              <label class="form-label" for="foto_kegiatan">{{ __('Foto Kegiatan') }}</label>
              <input type="file" class="form-control px-2" accept="image/*" name="foto_kegiatan"/>
          </div>
          <div class="form-group mt-4">
            <input type="hidden" name="nim" value="{{ $nim }}">
            <input type="hidden" id="slug_kegiatan" name="slug_kegiatan" value="">
            <button type="submit" class="btn btn-success xs">
              <span class="material-icons">save</span>
            </button>
            <a class="btn btn-info xs" href="{{ route('logbook.index') }}">
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
  $('#deskripsi-kegiatan').summernote();
  $('#nama_kegiatan').change(function (e) { 
    let slug = $(this).val().toLowerCase().replace(/[^a-zA-Z0-9]+/g, '-');
    $('#slug_kegiatan').val(slug);
    console.log(slug)
  });
});
</script>

@endsection

