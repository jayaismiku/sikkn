@extends('layouts.index')

@section('title', 'Buat Monev')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="{{ route('monev.index') }}">{{ __('Monev') }}</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>{{ __('Buat Monev') }}</span>
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
          <h6 class="text-white text-capitalize ps-3">Buat Laporan Monev</h6>
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
        <form id="tambah-monev" method="post" action="{{ route('monev.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  {{ __('Info Kelompok') }}
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="form-group">
                    <label class="form-label" for="tanggal_monev">{{ __('Tanggal Waktu Monev') }}</label>
                    <input type="datetime-local" class="form-control px-2" id="tanggal_monev" name="tanggal_monev"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="nama_desa">{{ __('Nama Desa:') }}</label>
                    <input type="text" class="form-control px-2" id="nama_desa" name="nama_desa" value="{{ $kelompok->nama_desa }}" readonly/>
                    <input type="hidden" name="desa_id" value="{{ $kelompok->desa_id }}"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="nama_dpl">{{ __('Nama DPL:') }}</label>
                    <input type="text" class="form-control px-2" id="nama_dpl" name="nama_dpl" value="{{ $kelompok->nama_dosen }}" readonly/>
                    <input type="hidden" name="pendamping_id" value="{{ $kelompok->pendamping_id }}"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="nama_kelompok">{{ __('Nama Kelompok:') }}</label>
                    <input type="text" class="form-control px-2" id="nama_kelompok" name="nama_kelompok" value="{{ $kelompok->nama_kelompok }}" readonly/>
                    <input type="hidden" name="kelompok_id" value="{{ $kelompok->kelompok_id }}"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="jenis_kkn">{{ __('Jenis KKN:') }}</label>
                    <input type="text" class="form-control px-2" id="jenis_kkn" name="jenis_kkn" value="{{ $kelompok->jenis_kkn }}" readonly />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="ketua_kelompok">{{ __('Ketua Kelompok:') }}</label>
                    <input type="text" class="form-control px-2" id="ketua_kelompok" name="kelompok['ketua']" value="{{ $ketua }}" readonly />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="jumlah_kelompok">{{ __('Jumlah Anggota Kelompok:') }}</label>
                    <input type="text" class="form-control px-2" id="jumlah_kelompok" name="kelompok['jumlah']" value="{{ count($detailkelompok) }}" readonly />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_hadir">{{ __('Jumlah Anggota Hadir:') }}</label>
                    <input type="number" class="form-control px-2" id="anggota_hadir" name="kelompok['hadir']" />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('Jumlah Anggota Tidak Hadir:') }}</label>
                    <input type="number" class="form-control px-2" id="anggota_absen" name="kelompok['absen']" />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="nama_absen">{{ __('Nama Anggota Tidak Hadir:') }}</label>
                    <div id="nama_absen_container">
                      <input type="text" class="form-control px-2" id="nama_absen" name="kelompok['nama_absen'][]" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  {{ __('Penilaian') }}
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body container">
                  <p class="fs-6 fw-bold">{{ __('Kedisiplinan dan Keseriusan (10%)') }}</p>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('A.1. Seluruh mahasiswa mengikuti kegiatan dan program utama : ') }} <span class="form-label fw-bold" id="ratingValue_a1">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_a1" name="penilaian['A'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('A.2. Seluruh mahasiswa mengikuti kegiatan dan program pembantu : ') }}</label> <span class="form-label fw-bold" id="ratingValue_a2">3</span>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_a2" name="penilaian['A'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('A.3. Seluruh mahasiswa mengikuti kegiatan dan program AIK :') }}</label> <span class="form-label fw-bold" id="ratingValue_a3">3</span>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_a3" name="penilaian['A'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('A.4. Seluruh mahasiswa mengikuti aturan KKN sesuai dengan pedoman :') }}</label> <span class="form-label fw-bold" id="ratingValue_a4">3</span>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_a4" name="penilaian['A'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('A.5. Seluruh program terlaksana sesuai dengan jadwal yang telah ditentukan :') }}</label> <span class="form-label fw-bold" id="ratingValue_a5">3</span>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_a5" name="penilaian['A'][]" value="3"/>
                  </div>
                  <p class="fs-6 fw-bold mt-3">{{ __('Kemampuan Kerjasama (40%)') }}</p>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('B.1. Mahasiswa dapat bekerjasama antar sesama anggota di kelompoknya : ') }} <span class="form-label fw-bold" id="ratingValue_b1">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_b1" name="penilaian['B'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('B.2. Tidak terjadi perbedaan pendapat yang berujung pada pertikaian : ') }} <span class="form-label fw-bold" id="ratingValue_b2">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_b2" name="penilaian['B'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('B.3. Mahasiswa selalu berkoordinasi dengan DPL dalam setiap pelaksanaan program : ') }} <span class="form-label fw-bold" id="ratingValue_b3">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_b3" name="penilaian['B'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('B.4. Mahasiswa selalu berkonsultasi dengan DPL dalam ketika terjadi permasalahan di lokus KKN : ') }} <span class="form-label fw-bold" id="ratingValue_b4">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_b4" name="penilaian['B'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('B.5. Dosen Pembimbing Lapangan selalu menyempatkan waktu untuk membimbing ke lokasi KKN : ') }} <span class="form-label fw-bold" id="ratingValue_b5">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_b5" name="penilaian['B'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('B.6. Dosen Pembimbing Lapangan selalu bermusyawarah untuk membimbing  pelaksanaan program KKN : ') }} <span class="form-label fw-bold" id="ratingValue_b6">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_b6" name="penilaian['B'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('B.7. Dosen Pembimbing Lapangan berkontribusi memberikan solusi ketika terjadi kendala di lokus KKN : ') }} <span class="form-label fw-bold" id="ratingValue_b7">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_b7" name="penilaian['B'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('B.8. Mahasiswa selalu berkoordinasi dengan Pihak RT/RW Setempat : ') }} <span class="form-label fw-bold" id="ratingValue_b8">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_b8" name="penilaian['B'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('B.9. Mahasiswa selalu berkoordinasi dengan Pihak Desa/Kelurahan : ') }} <span class="form-label fw-bold" id="ratingValue_b9">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_b9" name="penilaian['B'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('B.10. Mahasiswa mampu  terlibat menyukseskan program masyarakat setempat : ') }} <span class="form-label fw-bold" id="ratingValue_b10">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_b10" name="penilaian['B'][]" value="3"/>
                  </div>
                  <p class="fs-6 fw-bold mt-3">{{ __('Perencanaan dan Pelaksanaan Program (50%)') }}</p>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('C.1. Mahasiswa mampu menerima arahan dari DPL : ') }} <span class="form-label fw-bold" id="ratingValue_c1">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_c1" name="penilaian['C'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('C.2. Mahasiwa mampu memetakan potensi  dan permasalahan yang ada di lokasi KKN : ') }} <span class="form-label fw-bold" id="ratingValue_c2">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_c2" name="penilaian['C'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('C.3. Mahasiswa dapat menerapkan prior knowledge yang diperoleh di bangku perkuliahan : ') }} <span class="form-label fw-bold" id="ratingValue_c3">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_c3" name="penilaian['C'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('C.4. Mahasiswa dapat menerapkan materi pembekalan yang diperoleh ketika pembekalan KKN : ') }} <span class="form-label fw-bold" id="ratingValue_c4">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_c4" name="penilaian['C'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('C.5. Mahasiswa dapat berkonsultasi kepada DPL jika menemukan hal-hal baru yang tidak diperoleh dari materi pembekalan maupun perkuliahan : ') }} <span class="form-label fw-bold" id="ratingValue_c5">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_c5" name="penilaian['C'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('C.6. Mahasiswa dapat melakukan inovasi berdasarkan potensi masyarakat : ') }} <span class="form-label fw-bold" id="ratingValue_c6">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_c6" name="penilaian['C'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('C.7. Mahasiswa mendapatkan dukungan dalam pelaksanaan program dari Desa/Kelurahan : ') }} <span class="form-label fw-bold" id="ratingValue_c7">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_c7" name="penilaian['C'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('C.8. Mahasiswa mendapatkan dukungan dalam pelaksanaan program dari pejabat RT/RW setempat : ') }} <span class="form-label fw-bold" id="ratingValue_c8">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_c8" name="penilaian['C'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('C.9. Mahasiswa mendapatkan dukungan dalam pelaksanaan program dari masyarakat setempat : ') }} <span class="form-label fw-bold" id="ratingValue_c9">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_c9" name="penilaian['C'][]" value="3"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="anggota_absen">{{ __('C.10. Mahasiswa mampu menyukseskan program masyarakat setempat : ') }} <span class="form-label fw-bold" id="ratingValue_c10">3</span></label>
                    <input type="range" min="1" max="5" step="1" class="form-control px-2" id="penilaian_c10" name="penilaian['C'][]" value="3"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                  {{ __('Total Nilai') }}
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="form-group">
                  <label class="form-label" for="nilai">{{ __('Total Nilai:') }}</label>
                  <div id="nama_absen_container">
                    <input type="text" class="form-control px-2" id="nilai" name="nilai" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="form-group mt-4">
            <input type="hidden" name="kelompok_id" value="{{ $kelompok->kelompok_id }}">
            <input type="hidden" name="nama_kelompok" value="{{ $kelompok->nama_kelompok }}">
            <input type="hidden" name="tanggal_unggah" value="{{ date('Y-m-d H:i:s') }}">
            <button type="submit" class="btn btn-success xs">
              <span class="material-icons">save</span>
            </button>
            <a class="btn btn-info xs" href="{{ route('monev.index') }}">
              <span class="material-icons">undo</span>
            </a>
          </div>         
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function () {
  $('#anggota_absen').on('input', function() {
    var jumlahAnggota = $(this).val();
    var $namaAbsenContainer = $('#nama_absen_container');
    $namaAbsenContainer.empty(); // Mengosongkan kontainer

    for (var i = 0; i < jumlahAnggota; i++) {
      var inputField = '<input type="text" class="form-control px-2 my-2" name="kelompok[\'nama_absen\'][]" placeholder="Nama Anggota Tidak Hadir ' + (i + 1) + '" />';
      $namaAbsenContainer.append(inputField);
    }
  });

  for (let i = 1; i <= 5; i++) {
    $('#penilaian_a'+i).on('input', function() {
      $('#ratingValue_a'+i).text($(this).val());
    });
  }
  
  for (let i = 1; i <= 10; i++) {
    $('#penilaian_b'+i).on('input', function() {
      $('#ratingValue_b'+i).text($(this).val());
    });
  }
  
  for (let i = 1; i <= 10; i++) {
    $('#penilaian_c'+i).on('input', function() {
      $('#ratingValue_c'+i).text($(this).val());
    });
  }
  
});
</script>

@endsection

