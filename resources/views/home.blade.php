@extends('layouts.dasbor')

@section('title', 'Dashboard Admin')

@section('content')

<h2 class="fw-light">Dashboard {{ Auth::user()->role }}</h2>
<h5 class="fst-italic">Welcome {{ Auth::user()->username }} , Love to see you back.</h5>
<hr>
@endsection

