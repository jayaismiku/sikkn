@extends('layouts.index')

@section('title', 'Edit Fakultas')

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
      <span>Edit Fakultas</span>
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
          <h6 class="text-white text-capitalize ps-3">Ubah Fakultas</h6>
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
        <form id="editFakultas" method="post" action="{{ route('updateFakultas', $fakultas->fakultas_id) }}">
          @csrf
          @method('PUT')
          <div class=" input-group-outline my-3">
            <label class="form-label" for="kode_fakultas">{{ __('Kode Fakultas:') }}</label>
            <input type="text" class="form-control px-2 py-2" name="kode_fakultas" value="{{ $fakultas->kode_fakultas }}" required/>
          </div>
          <div class=" input-group-outline my-3">
              <label class="form-label" for="nama_fakultas">{{ __('Nama Fakultas:') }}</label>
              <input type="text" class="form-control px-2 py-2" name="nama_fakultas" value="{{ $fakultas->nama_fakultas }}" required/>
          </div>
          <div class=" input-group-outline my-3">
              <label class="form-label" for="dekan">{{ __('Dekan:') }}</label>
              <input type="text" class="form-control px-2 py-2" name="dekan" value="{{ $fakultas->dekan }}"/>
          </div>
          <div class=" input-group-outline my-3">
              <label class="form-label" for="wadek">{{ __('Wakil Dekan') }}</label>
              <input type="text" class="form-control px-2 py-2" name="wadek" value="{{ $fakultas->wadek }}"/>
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control px-2 py-2" name="fakultas_id" value="{{ $fakultas->fakultas_id }}" />
            <button type="submit" class="btn btn-success-outline">{{ __('Simpan') }}</button>
            <a href="{{ route('fakultas') }}"><span class="btn btn-info-outline">{{ __('Kembali') }}</span></a>
          </div>         
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

