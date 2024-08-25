@extends('layouts.index')

@section('title', 'Edit Kelompok')

@section('pathway')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
		<li class="breadcrumb-item text-sm">
			<a class="opacity-3 text-dark" href="{{ route('home') }}">
				<span class="material-icons">cottage</span>
			</a>
		</li>
		<li class="breadcrumb-item text-sm">
			<a class="opacity-5 text-dark" href="{{ route('kelompok.index') }}">{{ __('Kelompok') }}</a>
		</li>
		<li class="breadcrumb-item text-sm text-dark active" aria-current="page">
			<span>{{ __('Ubah Kelompok') }}</span>
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
					<h6 class="text-white text-capitalize ps-3">Ubah Data Kelompok</h6>
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
				<form id="editKelompok" method="post" action="{{ route('kelompok.update', $kelompok->kelompok_id) }}">
					@csrf
					@method('PUT')
					<div class=" input-group-outline my-3">
							<label class="form-label" for="nama_kelompok">{{ __('Nama Kelompok:') }}</label>
							<input type="text" class="form-control px-2 py-2" name="nama_kelompok" value="{{ $kelompok->nama_kelompok }}" required readonly />
					</div>
					<div class=" input-group-outline my-3">
						<label class="form-label" for="jenis_kkn">{{ __('Jenis KKN') }}</label>
						<select class="form-control form-control-sm p-2 form-select form-select-sm" aria-label=".form-select-sm select-pemonev" id="jenis_kkn" name="jenis_kkn" required>
							<option value="Reguler" {{ $kelompok->jenis_kkn=='Reguler'?'selected':'' }}>Reguler</option>
							<option value="Non-Reguler" {{ $kelompok->jenis_kkn=='Non-Reguler'?'selected':'' }}>Non-Reguler</option>
							<option value="Tematik" {{ $kelompok->jenis_kkn=='Tematik'?'selected':'' }}>Tematik</option>
						</select>
					</div>
					<div class=" input-group-outline my-3">
						<label class="form-label" for="pemonev">{{ __('Pemonev:') }}</label>
						<select class="form-control form-control-sm p-2 form-select form-select-sm select2" aria-label=".form-select-sm select-pemonev" name="pemonev" required>
							<option value="null">{{ __('-Pilih Pemonev-') }}</option>
							@foreach($pemonev as $pm)
							<option value="{{ $pm->pemonev_id }}" {{ $kelompok->pemonev_id==$pm->pemonev_id?'selected':'' }}>{{ $pm->nama_pemonev }}</option>
							@endforeach
						</select>
					</div>
					<div class=" input-group-outline my-3">
						<label class="form-label" for="pendamping">{{ __('Pendamping') }}</label>
						<select class="form-control form-control-sm p-2 form-select form-select-sm select2" aria-label=".form-select-sm select-pemonev" name="pendamping" required>
							<option value="null">{{ __('-Pilih Pendamping-') }}</option>
							@foreach($pendamping as $dpl)
							<option value="{{ $dpl->pendamping_id }}" {{ $kelompok->pendamping_id==$dpl->pendamping_id?'selected':'' }}>{{ $dpl->nama_dosen }}</option>
							@endforeach
						</select>
					</div>
					<div class=" input-group-outline my-3">
						<label class="form-label" for="desa">{{ __('Desa') }}</label>
						<select class="form-control form-control-sm p-2 form-select form-select-sm select2" aria-label=".form-select-sm select-desa" name="desa" required>
							<option value="null">{{ __('-Pilih Desa-') }}</option>
							@foreach($desa as $ds)
							<option value="{{ $ds->desa_id }}" {{ $ds->desa_id==$kelompok->desa_id?'selected':'' }}>{{ $ds->nama_desa }}</option>
							@endforeach
						</select>
					</div>
					<div class=" input-group-outline my-2">
						<label class="form-label" for="mahasiswa">{{ __('Mahasiswa') }}</label>
						<select class="form-control form-control-sm p-2 form-select form-select-sm select2" aria-label=".form-select-sm select-mahasiswa" id="mahasiswa" name="mahasiswa[]" multiple required>
							@foreach($mahasiswa as $mhs)
							<option value="{{ $mhs->nim }}" {{ (in_array($mhs->nim, explode(',', $kelompok->mahasiswa_id))?"selected":"") }}>{{ $mhs->nama_mhs }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group mt-4">
						<input type="hidden" class="form-control px-2 py-2" name="kelompok_id" value="{{ $kelompok->kelompok_id }}" />
						<input type="hidden" class="form-control px-2 py-2" name="mahasiswa_id" value="{{ $kelompok->mahasiswa_id }}" />
						<button type="submit" class="btn btn-success xs">
							<span class="material-icons">save</span>
						</button>
						<a class="btn btn-info xs" href="{{ route('kelompok.index') }}">
							<span class="material-icons">undo</span>
						</a>
					</div>         
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('.select2').select2({
			placeholder: "- Pilih -",
			allowClear: true
		});
	});
</script>
	
@endsection

