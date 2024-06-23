@extends('layouts.index')

@section('title', 'Edit Prodi')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="{{ route('desa.index') }}">{{ __('Desa') }}</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>{{ __('Ubah Desa') }}</span>
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
          <h6 class="text-white text-capitalize ps-3">Ubah Data Desa</h6>
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
        <form id="editDesa" method="post" action="{{ route('desa.update', $desa->desa_id) }}">
          @csrf
          @method('PUT')
          <div class=" input-group-outline my-3">
              <label class="form-label" for="nama_desa">{{ __('Nama Desa:') }}</label>
              <input type="text" class="form-control px-2 py-2" name="nama_desa" value="{{ $desa->nama_desa }}" required/>
          </div>
          <div class=" input-group-outline my-3">
              <label class="form-label" for="alamat">{{ __('Alamat:') }}</label>
              <input type="text" class="form-control px-2 py-2" name="alamat" value="{{ $desa->alamat }}" required/>
          </div>
          <div class=" input-group-outline my-3">
              <label class="form-label" for="longitude">{{ __('Longitude') }}</label>
              <input type="text" class="form-control px-2 py-2" name="longitude" value="{{ $desa->longitude }}" required/>
          </div>
          <div class=" input-group-outline my-3">
              <label class="form-label" for="latitude">{{ __('Latitude') }}</label>
              <input type="text" class="form-control px-2 py-2" name="latitude" value="{{ $desa->latitude }}" required/>
          </div>
          <div class="form-group mt-4">
            <input type="hidden" class="form-control px-2 py-2" name="desa_id" value="{{ $desa->desa_id }}" />
            <button type="submit" class="btn btn-success xs">
              <span class="material-icons">save</span>
            </button>
            <a class="btn btn-info xs" href="{{ route('desa.index') }}">
              <span class="material-icons">undo</span>
            </a>
          </div>         
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

