@extends('layouts.daftar')

@section('title', 'Pendaftaran')

@section('content')
<div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
  <div class="card card-plain">
    @if(session()->get('success'))
    <div id="alertSuccess" class="alert alert-success alert-dismissible text-white fade show mx-3" role="alert">
      <span class="alert-icon align-middle">
        <span class="material-icons text-md">thumb_up_off_alt</span>
      </span>
      <span class="alert-text"><strong>Success!</strong> {{ session()->get('success') }}</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <div class="card-header text-center">
      <h4 class="font-weight-bolder">{{ __('Terima kasih sudah mendaftar') }}</h4>
      <p class="mb-0">{{ __(' Mohon ditunggu, kami akan memverifikasi akun anda.') }}</p>
    </div>
    <div class="card-body">
      <p><img class="img" src="{{ asset('icons/thank-you.png') }}" alt="Image Underconstruction"></p>
      <p><a class="btn btn-lg btn-secondary" href="{{ route('login') }}">Kembali Login</a></p>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#alertSuccess').delay(1000).fadeOut();
  });
</script>
@endsection