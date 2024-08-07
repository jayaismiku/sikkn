@extends('layouts.index')

@section('title', 'Dosen')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>Dosen</span>
    </li>
  </ol>
</nav>
@endsection

@section('content')
@if(session()->get('success'))
<div class="alert alert-success alert-dismissible text-white fade show mx-3" role="alert">
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
              <h6 class="text-white text-capitalize ps-3">{{ __('Data Dosen') }}</h6>
            </div>
            <div class="col-sm-4 text-end">
              <a class="text-warning-outline pe-4" href="{{ route('dosen.index') }}">
                <span class="material-icons">add_circle</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body px-0 pb-2 mx-3">
        <div class="table-responsive p-0">
          <table class="table align-items-center justify-content-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Nama Dosen') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Email') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('fakultas') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('prodi') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Role') }}</th>
                <th class="text-center"><i class="material-icons">draw</i></th>
              </tr>
            </thead>
            <tbody>
              @foreach($dosen as $ds)
              <tr>
                <td class="text-xs">{{ $ds->nama_lengkap }}</td>
                <td class="text-xs">{{ $ds->email }}</td>
                <td class="text-xs">{{ $ds->fakultas }}</td>
                <td class="text-xs">{{ $ds->prodi }}</td>
                <td class="text-xs">{{ $ds->role }}</td>
                <td class="text-xs text-center">
                  <a class="text-warning" href="{{ route('dosen.edit', $ds->dosen_id)}}">
                    <span class="material-icons">edit</span>
                  </a>
                  <a class="nav-link text-danger" href="{{ route('dosen.destroy', $ds->dosen_id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $ds->dosen_id }}').submit();">
                    <span class="material-icons">delete</span>
                    <form id="delete-form-{{ $ds->dosen_id }}" action="{{ route('dosen.destroy', $ds->dosen_id) }}" method="POST" class="d-none">
                      @csrf
                      @method('DELETE')
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
@endsection

