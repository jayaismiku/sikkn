@extends('layouts.index')

@section('title', 'Dashboard Desa')

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
      <span>Desa</span>
    </li>
  </ol>
</nav>
@endsection

@section('content')

<h2 class="fw-light">Dashboard Informasi Desa</h2>
<h5 class="fst-italic">Desa A</h5>
<hr>

<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">DESA</h6>
        </div>
      </div>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
          <table id="example" class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"">Nama Desa</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Peta</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kepala Desa</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor Telepon</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="align-middle text-center text-sm">
                  <h2 class="text-xs font-weight-bold mb-0">Ancolmekar</h2>
                  <a href="https://www.ancolmekar.desa.id/">	www.ancolmekar.desa.id</a> 
                </td>
                <td>
                  <a class="text-wrap text-xs font-weight-bold mb-0">kecamatan ajarsari, kab.bandung, provinsi jawa barat</a>
                </td>
                <td class="align-middle text-center text-sm">
                <a href="https://www.google.com/maps/place/Ancolmekar,+Arjasari,+Bandung+Regency,+West+Java,+Indonesia/@-7.091745,107.66899,13z/data=!4m6!3m5!1s0x2e68bfffe25d03dd:0xa2ee78592df6275!8m2!3d-7.0933761!4d107.6718469!16s%2Fg%2F122ysnpm?hl=en-US&entry=ttu" 
                      class="btn btn-primary  btn-sm btn-lg active" role="button" aria-pressed="true">Peta</a>
                </td>
                <td class="align-middle text-center text-sm">
                  <a class="text-wrap text-xs font-weight-bold mb-0">Kepala Desa A</a>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">081546234556</span>
                </td>
                <td class="align-middle">
                  <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                  </a>
                </td>
              </tr>
              <tr>
                <td class="align-middle text-center text-sm">
                  <h2 class="text-xs font-weight-bold mb-0">Ancolmekar</h2>
                  <a href="https://www.ancolmekar.desa.id/">	www.ancolmekar.desa.id</a> 
                </td>
                <td>
                  <a class="text-wrap text-xs font-weight-bold mb-0">kecamatan ajarsari, kab.bandung, provinsi jawa barat</a>
                </td>
                <td class="align-middle text-center text-sm">
                <a href="https://www.google.com/maps/place/Ancolmekar,+Arjasari,+Bandung+Regency,+West+Java,+Indonesia/@-7.091745,107.66899,13z/data=!4m6!3m5!1s0x2e68bfffe25d03dd:0xa2ee78592df6275!8m2!3d-7.0933761!4d107.6718469!16s%2Fg%2F122ysnpm?hl=en-US&entry=ttu" 
                      class="btn btn-primary  btn-sm btn-lg active" role="button" aria-pressed="true">Peta</a>
                </td>
                <td class="align-middle text-center text-sm">
                  <a class="text-wrap text-xs font-weight-bold mb-0">Kepala Desa A</a>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">081546234556</span>
                </td>
                <td class="align-middle">
                  <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                  </a>
                </td>
              </tr>
              <tr>
                <td class="align-middle text-center text-sm">
                  <h2 class="text-xs font-weight-bold mb-0">Ancolmekar</h2>
                  <a href="https://www.ancolmekar.desa.id/">	www.ancolmekar.desa.id</a> 
                </td>
                <td>
                  <a class="text-wrap text-xs font-weight-bold mb-0">kecamatan ajarsari, kab.bandung, provinsi jawa barat</a>
                </td>
                <td class="align-middle text-center text-sm">
                <a href="https://www.google.com/maps/place/Ancolmekar,+Arjasari,+Bandung+Regency,+West+Java,+Indonesia/@-7.091745,107.66899,13z/data=!4m6!3m5!1s0x2e68bfffe25d03dd:0xa2ee78592df6275!8m2!3d-7.0933761!4d107.6718469!16s%2Fg%2F122ysnpm?hl=en-US&entry=ttu" 
                      class="btn btn-primary  btn-sm btn-lg active" role="button" aria-pressed="true">Peta</a>
                </td>
                <td class="align-middle text-center text-sm">
                  <a class="text-wrap text-xs font-weight-bold mb-0">Kepala Desa A</a>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">081546234556</span>
                </td>
                <td class="align-middle">
                  <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                  </a>
                </td>
              </tr>
              <tr>
                <td class="align-middle text-center text-sm">
                  <h2 class="text-xs font-weight-bold mb-0">Ancolmekar</h2>
                  <a href="https://www.ancolmekar.desa.id/">	www.ancolmekar.desa.id</a> 
                </td>
                <td>
                  <a class="text-wrap text-xs font-weight-bold mb-0">kecamatan ajarsari, kab.bandung, provinsi jawa barat</a>
                </td>
                <td class="align-middle text-center text-sm">
                <a href="https://www.google.com/maps/place/Ancolmekar,+Arjasari,+Bandung+Regency,+West+Java,+Indonesia/@-7.091745,107.66899,13z/data=!4m6!3m5!1s0x2e68bfffe25d03dd:0xa2ee78592df6275!8m2!3d-7.0933761!4d107.6718469!16s%2Fg%2F122ysnpm?hl=en-US&entry=ttu" 
                      class="btn btn-primary  btn-sm btn-lg active" role="button" aria-pressed="true">Peta</a>
                </td>
                <td class="align-middle text-center text-sm">
                  <a class="text-wrap text-xs font-weight-bold mb-0">Kepala Desa A</a>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">081546234556</span>
                </td>
                <td class="align-middle">
                  <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                  </a>
                </td>
              </tr>
              <tr>
                <td class="align-middle text-center text-sm">
                  <h2 class="text-xs font-weight-bold mb-0">Ancolmekar</h2>
                  <a href="https://www.ancolmekar.desa.id/">	www.ancolmekar.desa.id</a> 
                </td>
                <td>
                  <a class="text-wrap text-xs font-weight-bold mb-0">kecamatan ajarsari, kab.bandung, provinsi jawa barat</a>
                </td>
                <td class="align-middle text-center text-sm">
                <a href="https://www.google.com/maps/place/Ancolmekar,+Arjasari,+Bandung+Regency,+West+Java,+Indonesia/@-7.091745,107.66899,13z/data=!4m6!3m5!1s0x2e68bfffe25d03dd:0xa2ee78592df6275!8m2!3d-7.0933761!4d107.6718469!16s%2Fg%2F122ysnpm?hl=en-US&entry=ttu" 
                      class="btn btn-primary  btn-sm btn-lg active" role="button" aria-pressed="true">Peta</a>
                </td>
                <td class="align-middle text-center text-sm">
                  <a class="text-wrap text-xs font-weight-bold mb-0">Kepala Desa A</a>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">081546234556</span>
                </td>
                <td class="align-middle">
                  <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                  </a>
                </td>
              </tr>
              <tr>
                <td class="align-middle text-center text-sm">
                  <h2 class="text-xs font-weight-bold mb-0">Ancolmekar</h2>
                  <a href="https://www.ancolmekar.desa.id/">	www.ancolmekar.desa.id</a> 
                </td>
                <td>
                  <a class="text-wrap text-xs font-weight-bold mb-0">kecamatan ajarsari, kab.bandung, provinsi jawa barat</a>
                </td>
                <td class="align-middle text-center text-sm">
                      <a href="https://www.google.com/maps/place/Ancolmekar,+Arjasari,+Bandung+Regency,+West+Java,+Indonesia/@-7.091745,107.66899,13z/data=!4m6!3m5!1s0x2e68bfffe25d03dd:0xa2ee78592df6275!8m2!3d-7.0933761!4d107.6718469!16s%2Fg%2F122ysnpm?hl=en-US&entry=ttu" 
                      class="btn btn-primary  btn-sm btn-lg active" role="button" aria-pressed="true">Peta</a>
                </td>
                <td class="align-middle text-center text-sm">
                  <a class="text-wrap text-xs font-weight-bold mb-0">Kepala Desa A</a>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">081546234556</span>
                </td>
                <td class="align-middle">
                  <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
        { "orderable": false, "targets": 4 }
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
  });
  </script>

@endsection

