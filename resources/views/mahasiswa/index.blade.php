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
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>Mahasiswa</span>
    </li>
  </ol>
</nav>
@endsection

@section('content')
@if(session()->get('success'))
<div id="alert-success" class="alert alert-success alert-dismissible text-white fade show mx-3" role="alert">
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
              <h6 class="text-white text-capitalize ps-3">{{ __('Data Mahasiswa') }}</h6>
            </div>
            <div class="col-sm-4 text-end">
              <a class="text-warning-outline pe-4" href="{{ route('mahasiswa.create') }}">
                <span class="material-icons">add_circle</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body px-0 pb-2 mx-3">
        <div class="table-responsive p-0">
          <table id="tblMahasiswa" class="table align-items-center justify-content-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Nama Mahasiswa') }}</th>
                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Email') }}</th>
                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Fakultas') }}</th>
                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Prodi') }}</th>
                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('KRS') }}</th>
                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Bayar') }}</th>
                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('UKT') }}</th>
                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Status') }}</th>
                <th class="text-center"><i class="material-icons">draw</i></th>
              </tr>
            </thead>
            <tbody>
              @foreach($mahasiswa as $mhs)
              <tr>
                <td class="text-xs">{{ $mhs->nama_lengkap }}</td>
                <td class="text-xs">{{ $mhs->email }}</td>
                <td class="text-xs">{{ $mhs->fakultas }}</td>
                <td class="text-xs">{{ $mhs->prodi }}</td>
                <td class="text-xs text-center">{!! ($mhs->validasi_krs==1)?'<span class="material-icons text-success">verified</span>':'<span class="material-icons text-warning">warning</span>' !!}</td>
                <td class="text-xs text-center">{!! ($mhs->validasi_keuangan==1)?'<span class="material-icons text-success">verified</span>':'<span class="material-icons text-warning">warning</span>' !!}</td>
                <td class="text-xs text-center">{!! ($mhs->validasi_ukt==1)?'<span class="material-icons text-success">verified</span>':'<span class="material-icons text-warning">warning</span>' !!}</td>
                <td class="text-xs text-center">{!! ($mhs->status==1)?'<span class="material-icons text-success">verified</span>':'<span class="material-icons text-warning">warning</span>' !!}</td>
                <td class="text-xs text-center">
                  @if(Auth::user()->role == 'mahasiswa')
                  <a class="text-warning" href="{{ route('mahasiswa.edit', $mhs->mahasiswa_id)}}">
                    <span class="material-icons">edit</span>
                  </a>
                  @else
                  <a class="text-warning" href="{{ route('mahasiswa.verify', $mhs->mahasiswa_id)}}">
                    <i class="fa-regular fa-square-check"></i>
                  </a>
                  <a class="nav-link text-danger" href="{{ route('mahasiswa.destroy', $mhs->mahasiswa_id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $mhs->mahasiswa_id }}').submit();">
                    <span class="material-icons">delete</span>
                    <form id="delete-form-{{ $mhs->mahasiswa_id }}" action="{{ route('mahasiswa.destroy', $mhs->mahasiswa_id) }}" method="POST" class="d-none">
                      @csrf
                      @method('DELETE')
                    </form>
                  </a>
                  @endif
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

<script type="text/javascript">
  $(document).ready(function() {
    $('#alert-success').delay(1000).fadeOut();
  });

  $('#tblMahasiswa').DataTable();
</script>

@endsection

