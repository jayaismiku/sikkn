@extends('layouts.index')

@section('title', 'Dashboard DPL')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>Dasbor DPL</span>
    </li>
  </ol>
</nav>
@endsection

@section('content')

<h3 class="fw-light">Dashboard {{ Auth::user()->role }}</h3>
<h5 class="fst-italic">Welcome {{ Auth::user()->username }} , Love to see you back.</h5>
<hr>

<div class="row">      
  <div class="col-lg-4 col-md-6">
    <div class="card h-100">
      <div class="card-header pb-0">
        <h6>{{ __('Jadwal KKN') }}</h6>
        <p class="text-sm">
          <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
          <span class="font-weight-bold">100%</span> 
        </p>
      </div>
      <div class="card-body p-3">
        <div class="timeline timeline-one-side">
          <div class="timeline-block mb-3">
            <span class="timeline-step">
              <i class="material-icons text-success text-gradient">notifications</i>
            </span>
            <div class="timeline-content">
              <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
              <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
            </div>
          </div>
          <div class="timeline-block mb-3">
            <span class="timeline-step">
              <i class="material-icons text-danger text-gradient">code</i>
            </span>
            <div class="timeline-content">
              <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
              <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
            </div>
          </div>
          <div class="timeline-block mb-3">
            <span class="timeline-step">
              <i class="material-icons text-info text-gradient">shopping_cart</i>
            </span>
            <div class="timeline-content">
              <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April</h6>
              <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
            </div>
          </div>
          <div class="timeline-block mb-3">
            <span class="timeline-step">
              <i class="material-icons text-warning text-gradient">credit_card</i>
            </span>
            <div class="timeline-content">
              <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order #4395133</h6>
              <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
            </div>
          </div>
          <div class="timeline-block mb-3">
            <span class="timeline-step">
              <i class="material-icons text-primary text-gradient">key</i>
            </span>
            <div class="timeline-content">
              <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for development</h6>
              <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
            </div>
          </div>
          <div class="timeline-block">
            <span class="timeline-step">
              <i class="material-icons text-dark text-gradient">payments</i>
            </span>
            <div class="timeline-content">
              <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
              <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-8 col-md-6">
    <div class="card h-100">
      <div class="card-header pb-0">
        <h6>{{ __('Progress KKN') }}</h6>
        <p class="text-sm">
          <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
          <span class="font-weight-bold">100%</span> 
        </p>
      </div>
      <div class="card-body p-3">
        <div class="timeline timeline-one-side">
          <div class="timeline-block mb-3">
            <span class="timeline-step">
              <i class="material-icons text-success text-gradient">notifications</i>
            </span>
            <div class="timeline-content">
              <h6 class="text-dark text-sm font-weight-bold mb-0">Logbook Kegiatan</h6>
              <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
            </div>
          </div>
          <div class="timeline-block mb-3">
            <span class="timeline-step">
              <i class="material-icons text-danger text-gradient">code</i>
            </span>
            <div class="timeline-content">
              <h6 class="text-dark text-sm font-weight-bold mb-0">Laporan KKN</h6>
              <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      
@endsection

