@extends('layouts.index')

@section('title', 'Program Studi')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>{{ __('Logbook') }}</span>
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
              <h6 class="text-white text-capitalize ps-3">{{ __('Logbook Saya') }}</h6>
            </div>
            <div class="col-sm-4 text-end">
              <a class="text-white pe-3" href="{{ route('logbook.create') }}">
                <i class="fa-solid fa-file-circle-plus"></i>
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
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Tanggal Kegiatan') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Nama Kegiatan') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Deskripsi Kegiatan') }}</th>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Validasi DPL') }}</th>
                <th class="text-center"><i class="fa-solid fa-file-pen"></i></th>
              </tr>
            </thead>
            <tbody>
              @foreach($logbook as $lb)
              <tr>
                <td class="text-xs">{{ date('d M Y', strtotime($lb->tanggal_kegiatan)) }}</td>
                <td class="text-xs nama">{{ $lb->nama_kegiatan }}</td>
                <td class="text-xs deskripsi">{!! $lb->deskripsi_kegiatan !!}</td>
                <td class="text-xs">{!! ($lb->validasi == 0)?'<i class="fa-solid fa-triangle-exclamation text-warning"></i>':'<i class="fa-solid fa-clipboard-check text-success"></i>' !!}</td>
                <td class="text-xs text-center">
                  <!-- <a class="text-warning" href="{{ route('logbook.edit', $lb->logbook_id)}}"><span class="material-icons">edit</span></a> -->
                  <a class="nav-link text-danger" href="{{ route('logbook.destroy', $lb->logbook_id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $lb->logbook_id }}').submit();">
                    <span class="material-icons">delete</span>
                    <form id="delete-form-{{ $lb->logbook_id }}" action="{{ route('logbook.destroy', $lb->logbook_id) }}" method="POST" class="d-none">
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

<style>
.deskripsi p{
  font-family: Roboto;
  font-size: 0.75rem !important;
  font-weight: 100;
}
</style>

@endsection

