@extends('layouts.index')

@section('title', 'Dashboard Tim Pemonev')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="">Pages</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>Tim Pemonev</span>
    </li>
  </ol>
</nav>
@endsection

@section('content')

<h2 class="fw-light">Dashboard {{ Auth::user()->role }}</h2>
<h5 class="fst-italic">Welcome {{ Auth::user()->username }} , Love to see you back.</h5>
<hr>


<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">TIM PEMONEV</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table id="example" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tim Pemonev</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Dosen</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kelompok</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Member</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Desa</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kepala Desa</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nomor Telepon</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>
                        <div class="d-flex px-2 py-1">
                            <div>
                                <img src="{{ asset('material/img/team-3.jpg')}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-wrap mb-0 text-sm">Alexa Liras</h6>
                                <p class="text-wrap text-xs text-secondary mb-0">alexa@creative-tim.com</p>
                            </div>
                            </div>
                        </td>
                      <td >
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{ asset('material/img/team-2.jpg')}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-wrap mb-0 text-sm">John Michael</h6>
                            <p class="text-wrap text-xs text-secondary mb-0">john@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                            <div class="d-grid gap-2 mx-auto">
                                <a href="{{ route('editpanitia') }}" type="button" class="btn btn-outline-info btn-xs">KELOMPOK 1</a>
                                <a href="{{ route('editpanitia') }}" type="button" class="btn btn-outline-info btn-xs">KELOMPOK 2</a>
                            </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <div class="avatar-group mt-2">
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                            <img src="{{ asset('material/img/team-1.jpg') }}" alt="team1">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                            <img src="{{ asset('material/img/team-2.jpg')}} " alt="team2">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Alexander Smith">
                            <img src="{{ asset('material/img/team-3.jpg')}}" alt="team3">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                            <img src="{{ asset('material/img/team-4.jpg')}}" alt="team4">
                          </a>
                        </div>
                        <p></p>
                        <div class="avatar-group mt-2">
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                            <img src="{{ asset('material/img/team-1.jpg') }}" alt="team1">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                            <img src="{{ asset('material/img/team-2.jpg')}} " alt="team2">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Alexander Smith">
                            <img src="{{ asset('material/img/team-3.jpg')}}" alt="team3">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                            <img src="{{ asset('material/img/team-4.jpg')}}" alt="team4">
                          </a>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <a href="https://www.ancolmekar.desa.id/">	Desa 01</a>   
                        <p></p>
                        <a href="https://www.ancolmekar.desa.id/">	Desa 02</a> 
                      </td>
                      <td class="align-middle text-center text-sm">
                        <a class="text-wrap" href="https://www.ancolmekar.desa.id/">	Kepala Desa 01</a> <p></p>
                        <a class="text-wrap" href="https://www.ancolmekar.desa.id/">	Kepala Desa 02</a> 
                      </td>
                      <td class="align-middle text-center text-sm">
                        <a href="https://www.ancolmekar.desa.id/">	09230482034</a> <p></p>
                        <a href="https://www.ancolmekar.desa.id/">	09230482034</a> 
                      </td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Style CSS -->
<link rel="stylesheet" href="{{asset('material/css/style.css')}}">
    <!-- Demo CSS (No need to include it into your project) -->
    <link rel="stylesheet" href="{{asset('material/css/demo.css')}}">
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Data Table CSS -->
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>


    <!-- jQuery -->
    <script src='https://code.jquery.com/jquery-3.7.1.js'></script>
    <!-- Data Table JS -->
    <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>

   
    <!-- Script JS -->
    <script>
      $(document).ready(function() {
          $('#example').DataTable({
            //disable sorting on last column
            "columnDefs": [
              { "orderable": false, "targets": 5 }
            ],
            language: {
              //customize pagination prev and next buttons: use arrows instead of words
              //customize number of elements to be displayed
              "lengthMenu": 'Display <select class="form-control input-sm">'+
              '<option value="5">5</option>'+
              '<option value="10">10</option>'+
              '<option value="20">20</option>'+
              '<option value="30">30</option>'+
              '<option value="40">40</option>'+
              '<option value="50">50</option>'+
              '<option value="-1">All</option>'+
              '</select> results'
            }
          })  
      } );
    </script>


@endsection

