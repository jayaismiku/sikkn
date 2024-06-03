@extends('layouts.daftar')

@section('title', 'Pendaftaran')

@section('content')
<div class="col-xl-5 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
  <div class="card card-plain">
    <div class="card-header">
      <h4 class="font-weight-bolder">{{ __('Perhatian !!!') }}</h4>
      <p class="mb-0">{{ __('This Page is Underconstruction') }}</p>
    </div>
    <div class="card-body bg-white">
      <p><img class="img" src="{{ asset('icons/work-in-progress.png') }}" alt="Image Underconstruction"></p>
      <p><a class="btn btn-lg btn-secondary" href="{{ route('login') }}">Kembali Login</a></p>
    </div>
  </div>
</div>

@endsection