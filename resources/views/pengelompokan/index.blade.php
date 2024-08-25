@extends('layouts.index')

@section('title', 'Kelompok')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>{{ __('Pengelompokan') }}</span>
    </li>
  </ol>
</nav>
@endsection

@section('content')
@if(session()->get('success'))
<div class="alert alert-success alert-dismissible text-white mx-3 fade show" role="alert">
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
              <h6 class="text-white text-capitalize ps-3">{{ __('Data Pengelompokan') }}</h6>
            </div>
            <div class="col-sm-4 text-end">
              <a class="text-warning pe-4" href="{{ route('pengelompokan.create') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Tooltip on bottom">
                <i class="fa-solid fa-users-line"></i>
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
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Kelompok') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('NIM') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Nama Lengkap') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Fakultas') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Program Studi') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($mahasiswa as $mhs)
              <tr>
                <td class="text-xs">{{ $mhs->nama_kelompok }}</td>
                <td class="text-xs">{{ $mhs->nim }}</td>
                <td class="text-xs">{{ $mhs->nama_mhs }}</td>
                <td class="text-xs">{{ $mhs->fakultas }}</td>
                <td class="text-xs">{{ $mhs->prodi }}</td>
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
    $('.alert').delay(1000).fadeOut().removeClass("show");
  });

  $('#tblMahasiswa').DataTable();
</script>


@endsection

