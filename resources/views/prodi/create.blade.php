@extends('layouts.index')

@section('title', 'Tambah Prodi')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="{{ route('prodi') }}">Prodi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>Tambah Prodi</span>
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
          <h6 class="text-white text-capitalize ps-3">Tambah Prodi</h6>
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
        <form id="" method="post" action="{{ route('storeProdi') }}">
          @csrf
          <div class="form-group">
            <label class="form-label" for="kode_prodi">{{ __('Kode Prodi:') }}</label>
            <input type="text" class="form-control px-2" name="kode_prodi"/>
          </div>
          <div class="form-group">
              <label class="form-label" for="nama_prodi">{{ __('Nama Prodi:') }}</label>
              <input type="text" class="form-control px-2" name="nama_prodi"/>
          </div>
          <div class="form-group">
              <label class="form-label" for="kaprodi">{{ __('Kaprodi:') }}</label>
              <input type="text" class="form-control px-2" name="kaprodi"/>
          </div>
          <div class="form-group">
              <label class="form-label" for="sekprodi">{{ __('Sekprodi') }}</label>
              <input type="text" class="form-control px-2" name="sekprodi"/>
          </div>
          <div class="form-group">
              <label class="form-label" for="fakultas">{{ __('Fakultas') }}</label>
              <select class="form-control form-select px-2" aria-label=".form-select-sm example" name="fakultas">
                <option selected>Open this select menu</option>
                <option value="FST">Fakultas Sains dan Teknologi</option>
                <option value="FSH">Fakultas Sosial Humaniora</option>
                <option value="FEB">Fakultas Ekonomi dan Bisnis</option>
                <option value="FAI">Fakultas Agama Islam</option>
              </select>
          </div>
          <div class="form-group mt-4">
            <button type="submit" class="btn btn-success xs">
              <span class="material-icons">save</span>
            </button>
            <a class="btn btn-info xs" href="{{ route('prodi') }}">
              <span class="material-icons">undo</span>
            </a>
          </div>         
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

