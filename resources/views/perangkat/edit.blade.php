@extends('layouts.index')

@section('title', 'Ubah Perangkat Desa')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="{{ route('perangkat.index') }}">{{ __('Perangkat') }}</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>{{ __('Ubah Perangkat Desa') }}</span>
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
          <h6 class="text-white text-capitalize ps-3">{{ __('Ubah Perangkat Desa') }}</h6>
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
        <form id="" method="post" action="{{ route('perangkat.update', $perangkat->perangkat_id) }}">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label class="form-label" for="nama_lengkap">{{ __('Nama Lengkap:') }}</label>
            <input type="text" class="form-control px-2" name="nama_lengkap" value="{{ $perangkat->nama_lengkap }}" required/>
          </div>
          <div class="form-group">
              <label class="form-label" for="jabatan">{{ __('Jabatan:') }}</label>
              <select class="form-control form-select px-2" aria-label=".form-select-sm example" id="jabatan" name="jabatan" required>
                <option value="{{ __('Kepala Desa') }}" {{ ($perangkat->jabatan=='Kepala Desa')?'selected':'' }}>{{ __('Kepala Desa') }}</option>
                <option value="{{ __('Sekretaris Desa') }}" {{ ($perangkat->jabatan=='Sekretaris Desa')?'selected':'' }}>{{ __('Sekretaris Desa') }}</option>
                <option value="{{ __('Pegawai Desa') }}" {{ ($perangkat->jabatan=='Pegawai Desa')?'selected':'' }}>{{ __('Pegawai Desa') }}</option>
                <option value="{{ __('Kepala Dusun') }}" {{ ($perangkat->jabatan=='Kepala Dusun')?'selected':'' }}>{{ __('Kepala Dusun') }}</option>
                <option value="{{ __('Ketua RW') }}" {{ ($perangkat->jabatan=='Ketua RW')?'selected':'' }}>{{ __('Ketua RW') }}</option>
                <option value="{{ __('Ketua RT') }}" {{ ($perangkat->jabatan=='Ketua RT')?'selected':'' }}>{{ __('Ketua RT') }}</option>
              </select>
          </div>
          <div class="form-group">
              <label class="form-label" for="telp">{{ __('Telp:') }}</label>
              <input type="text" class="telp form-control px-2" name="telp" value="{{ $perangkat->telp }}" required/>
          </div>
          <div class="form-group">
              <label class="form-label" for="desa">{{ __('Desa') }}</label>
              <select class="form-control form-select px-2" aria-label=".form-select-sm example" id="desa" name="desa" required>
                @foreach($desa as $ds)
                <option value="{{ $ds->desa_id }} {{ ($perangkat->desa_id==$ds->desa_id)?'selected':'' }}">{{ $ds->nama_desa }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group mt-4">
            <input type="hidden" class="form-control px-2 py-2" name="perangkat_id" value="{{ $perangkat->perangkat_id }}" />
            <button type="submit" class="btn btn-success xs">
              <span class="material-icons">save</span>
            </button>
            <a class="btn btn-info xs" href="{{ route('perangkat.index') }}">
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
    $('.telp').change(function(){
      let telp = '62';
      let angka1 = $(this).val().substring(0,1);
      let angka2 = $(this).val().substring(1);
      if(angka1 == 0){
        telp = telp + angka2;
      }else{
        telp = angka1 + angka2;
      }
      $(this).val(telp);
      console.log(telp);
    });

  });
  </script>
@endsection

