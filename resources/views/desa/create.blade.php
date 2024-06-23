@extends('layouts.index')

@section('title', 'Tambah Desa')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="{{ route('desa.index') }}">{{ __('Desa') }}</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>{{ __('Tambah Desa') }}</span>
    </li>
  </ol>
</nav>
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">{{ __('Tambah Desa') }}</h6>
        </div>
      </div>
      <div class="card-body px-0 pb-2 mx-3 ">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        <br />
        @endif
        <form id="" method="post" action="{{ route('desa.store') }}">
          @csrf
          <div class="form-group">
            <label class="form-label" for="nama_desa">{{ __('Nama Desa:') }}</label>
            <input type="text" class="form-control px-2" name="nama_desa"/>
          </div>
          <div class="form-group">
              <label class="form-label" for="alamat">{{ __('Alamat Desa:') }}</label>
              <input type="text" class="form-control px-2" name="alamat"/>
          </div>
          <div class="form-group">
              <label class="form-label" for="provinsi">{{ __('Provinsi:') }}</label>
              <select class="form-control form-select px-2" aria-label=".form-select-sm example" id="provinsi" name="provinsi">
                <option selected>- Pilih Provinsi -</option>
                @foreach($provinsi as $prov)
                <option value="{{ $prov->provinsi_id }}">{{ $prov->nama_provinsi }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label class="form-label" for="kota">{{ __('Kota/Kabupaten:') }}</label>
              <select class="form-control form-select px-2" aria-label=".form-select-sm example" id="kota" name="kota">
                <option selected>- Pilih Kota/Kabupaten -</option>
              </select>
          </div>
          <div class="form-group">
              <label class="form-label" for="kecamatan">{{ __('Kecamatan:') }}</label>
              <select class="form-control form-select px-2" aria-label=".form-select-sm example" id="kecamatan" name="kecamatan">
                <option selected>- Pilih Kecamatan -</option>
              </select>
          </div>
          <div class="form-group">
              <label class="form-label" for="kelurahan">{{ __('Kelurahan:') }}</label>
              <select class="form-control form-select px-2" aria-label=".form-select-sm example" id="kelurahan" name="kelurahan">
                <option selected>- Pilih Kelurahan -</option>
              </select>
          </div>
          <div class="form-group">
              <label class="form-label" for="longitude">{{ __('Longitude') }}</label>
              <input type="text" class="form-control px-2" name="longitude"/>
          </div>
          <div class="form-group">
              <label class="form-label" for="latitude">{{ __('Latitude') }}</label>
              <input type="text" class="form-control px-2" name="latitude"/>
          </div>
          <div class="form-group mt-4">
            <button type="submit" class="btn btn-success xs">
              <span class="material-icons">save</span>
            </button>
            <a class="btn btn-info xs" href="{{ route('desa.index') }}">
              <span class="material-icons">undo</span>
            </a>
          </div>         
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    // sembunyikan form kabupaten, kecamatan dan desa
    $("#kota").hide();
    $("#kecamatan").hide();
    $("#kelurahan").hide();

    // ambil data kabupaten ketika data memilih provinsi
    $('body').on("change","#provinsi",function(){
      var id = $(this).val();
      var data = "id="+id+"&data=kabupaten";
      $.ajax({
        type: 'POST',
        url: "get_daerah.php",
        data: data,
        success: function(hasil) {
          $("#form_kab").html(hasil);
          $("#form_kab").show();
          $("#form_kec").hide();
          $("#form_des").hide();
        }
      });
    });
 
      // ambil data kecamatan/kota ketika data memilih kabupaten
      $('body').on("change","#form_kab",function(){
        var id = $(this).val();
        var data = "id="+id+"&data=kecamatan";
        $.ajax({
          type: 'POST',
          url: "get_daerah.php",
          data: data,
          success: function(hasil) {
            $("#form_kec").html(hasil);
            $("#form_kec").show();
            $("#form_des").hide();
          }
        });
      });
 
      // ambil data desa ketika data memilih kecamatan/kota
      $('body').on("change","#form_kec",function(){
        var id = $(this).val();
        var data = "id="+id+"&data=desa";
        $.ajax({
          type: 'POST',
          url: "get_daerah.php",
          data: data,
          success: function(hasil) {
            $("#form_des").html(hasil);
            $("#form_des").show();
          }
        });
      });
 
 
    });
  </script>
@endsection

