@extends('layouts.index')

@section('title', 'Dashboard Admin')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="{{ route('fakultas') }}">Fakultas</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>Tambah Fakultas</span>
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
          <h6 class="text-white text-capitalize ps-3">Tambah Fakultas</h6>
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
        <form method="post" action="{{ route('storeFakultas') }}">
          @csrf
          <div class="form-group">
            <label class="form-label" for="kode_fakultas">{{ __('Kode Fakultas:') }}</label>
            <input type="text" class="form-control" name="kode_fakultas"/>
          </div>
          <div class="form-group">
              <label class="form-label" for="nama_fakultas">{{ __('Nama Fakultas:') }}</label>
              <input type="text" class="form-control" name="nama_fakultas"/>
          </div>
          <div class="form-group">
              <label class="form-label" for="dekan">{{ __('Dekan:') }}</label>
              <input type="text" class="form-control" name="dekan"/>
          </div>
          <div class="form-group">
              <label class="form-label" for="wadek">{{ __('Wakil Dekan') }}</label>
              <input type="text" class="form-control" name="wadek"/>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success-outline">{{ __('Simpan') }}</button>
            <a href="{{ route('fakultas') }}"><span class="btn btn-info-outline">{{ __('Kembali') }}</span></a>
          </div>         
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

