@extends('layouts.index')

@section('title', 'datamahasiswa')

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
      <span>Mahasiswa</span>
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
                <h6 class="text-white text-capitalize ps-3">MAHASISWA</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table id="example" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Mahasiswa</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIM Mahasiswa</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fakultas/Prodi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Daftar</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{ asset('material/img/team-2.jpg')}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">John Michael</h6>
                            <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">2415642250</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">Fakultas Sains dan Teknologi</p>
                        <p class="text-xs text-secondary mb-0">Teknik Informatika</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <div class="form-switch" >
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="">
                      </div>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                      </td>
                      <td class="align-middle">
                        <a href="{{ route('editdosen') }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{ asset('material/img/team-3.jpg')}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Alexa Liras</h6>
                            <p class="text-xs text-secondary mb-0">alexa@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">2415642251</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">Fakultas Sosial dan Humaniora</p>
                        <p class="text-xs text-secondary mb-0">Kriya Tekstil & Fashion</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <div class="form-switch" >
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="">
                      </div>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">11/01/19</span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{ asset('material/img/team-4.jpg')}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user3">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Laurent Perrier</h6>
                            <p class="text-xs text-secondary mb-0">laurent@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">2415642252</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">Fakultas Sosial dan Humaniora</p>
                        <p class="text-xs text-secondary mb-0">Ilmu Komunikasi</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <div class="form-switch" >
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="">
                      </div>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">19/09/17</span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{ asset('material/img/team-3.jpg')}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user4">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Michael Levi</h6>
                            <p class="text-xs text-secondary mb-0">michael@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">2415642253</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">Fakultas Sains dan Teknologi</p>
                        <p class="text-xs text-secondary mb-0">Teknik Elektro</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <div class="form-switch" >
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="">
                      </div>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">24/12/08</span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{ asset('material/img/team-2.jpg')}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user5">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Richard Gran</h6>
                            <p class="text-xs text-secondary mb-0">richard@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">2415642254</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">Fakultas Ekonomi Dan Bisnis</p>
                        <p class="text-xs text-secondary mb-0">Akutansi</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <div class="form-switch" >
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="">
                      </div>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">04/10/21</span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{ asset('material/img/team-4.jpg')}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user6">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Miriam Eric</h6>
                            <p class="text-xs text-secondary mb-0">miriam@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">2415642255</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">Fakultas Agama Islam</p>
                        <p class="text-xs text-secondary mb-0">Pendidikan Agama Islam</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <div class="form-switch" >
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="">
                      </div>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">14/09/20</span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
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


