@extends('layouts.index')

@section('title', 'Fakultas')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home) }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>Fakultas</span>
    </li>
  </ol>
</nav>
@endsection

@section('content')
<hr>
<div class="row">
  <div class="card mt-4">
    <div class="card-header p-3">
      <h5 class="mb-0">Halaman Fakultas</h5>
    </div>
  </div>
</div>
@endsection
