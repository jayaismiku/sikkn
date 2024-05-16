@extends('layouts.index')

@section('title', 'Dashboard Admin')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="{{ route('panitia') }}">Panitia</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>Edit Panitia John Michael Kelompok 1</span>
    </li>
  </ol>
</nav>
@endsection

@section('content')

<h2 class="fw-light">Dashboard {{ Auth::user()->role }}</h2>
<h5 class="fst-italic">Welcome {{ Auth::user()->username }} , Love to see you back.</h5>
<hr>

<h5 class="font-weight-normal mt-3">Pilih Mahasiswa</h5>
<select class="form-select" id="multiple-select-clear-field" data-placeholder="Choose anything" multiple>
    <option>Mahasiswa 1</option>
    <option>Mahasiswa 2</option>
    <option>Mahasiswa 3</option>
    <option>Mahasiswa 4</option>
    <option>Mahasiswa 5</option>
    <option>Mahasiswa 6</option>
    <option>Mahasiswa 7</option>
    <option>Mahasiswa 8</option>
    <option>Mahasiswa 9</option>
    <option>Mahasiswa 10</option>
</select>

<h5 class="font-weight-normal mt-3">Pilih Desa</h5>
<div class="mb-3">
    <select class="form-select form-select-lg" id="large-bootstrap-class-single-field" data-placeholder="Choose one thing">
        <option></option>
        <option>Desa 01</option>
        <option>Desa 02</option>
        <option>Desa 03</option>
        <option>Desa 04</option>
        <option>Desa 05</option>
    </select>
</div>

<button class="btn btn-primary" type="button">SIMPAN</button>

<!-- Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<!-- Or for RTL support -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
$( '#multiple-select-clear-field' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
    allowClear: true,
} );

$( '#large-bootstrap-class-single-field' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    dropdownParent: $( '#large-bootstrap-class-single-field' ).parent(),
} );
</script>
    
@endsection

