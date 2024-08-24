@extends('layouts.index')

@section('title', 'Ubah Kunjungan')

@section('pathway')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
		<li class="breadcrumb-item text-sm">
			<a class="opacity-3 text-dark" href="{{ route('home') }}">
				<span class="material-icons">cottage</span>
			</a>
		</li>
		<li class="breadcrumb-item text-sm">
			<a class="opacity-5 text-dark" href="{{ route('kunjungan.index') }}">{{ __('Kunjungan') }}</a>
		</li>
		<li class="breadcrumb-item text-sm text-dark active" aria-current="page">
			<span>{{ __('Ubah Kunjungan') }}</span>
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
					<h6 class="text-white text-capitalize ps-3">Ubah Data Kunjungan</h6>
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
				<form id="editKunjungan" method="post" action="{{ route('kunjungan.update', $kunjungan->kunjungan_id) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label class="form-label" for="jenis_kunjungan">{{ __('Jenis Kunjungan:') }}</label>
						<select class="form-control form-control-sm p-2 form-select form-select-sm" aria-label=".form-select-sm select-jenis" id="jenis_kunjungan" name="jenis_kunjungan" required>
							<option value="Survey" {{ ($kunjungan->jenis_kunjungan=='Survey')?'selected':'' }}>{{ __('Survey') }}</option>
							<option value="Pembukaan" {{ ($kunjungan->jenis_kunjungan=='Pembukaan')?'selected':'' }}>{{ __('Pembukaan') }}</option>
							<option value="On-Proses" {{ ($kunjungan->jenis_kunjungan=='On-Proses')?'selected':'' }}>{{ __('On-Proses') }}</option>
							<option value="Penutupan" {{ ($kunjungan->jenis_kunjungan=='Penutupan')?'selected':'' }}>{{ __('Penutupan') }}</option>
						</select>
					</div>
					<div class="form-group">
						<label class="form-label" for="tanggal_kunjungan">{{ __('tanggal_kunjungan:') }}</label>
						<input type="datetime-local" class="form-control px-2" id="tanggal_kunjungan" name="tanggal_kunjungan" value="{{ $kunjungan->tanggal_kunjungan }}" required/>
					</div>
					<div class="form-group">
						<label class="form-label" for="unggah_sppd">{{ __('Unggah SPPD') }}</label>
						<input type="file" class="form-control px-2" accept="application/pdf" id="unggah_sppd" name="unggah_sppd" value="{{ $kunjungan->unggah_sppd }}" required/>
					</div>
					<div class="form-group">
						<label class="form-label" for="bukti_kunjungan">{{ __('Bukti Kunjungan') }}</label>
						<input type="file" class="form-control px-2" accept="image/*" id="bukti_kunjungan" name="bukti_kunjungan" value="{{ $kunjungan->bukti_kunjungan }}" required/>
					</div>
					<div class="form-group mt-4">
						<input type="hidden" name="kunjungan_id" value="{{ $kunjungan->kunjungan_id }}" />
						<input type="hidden" name="dpl_id" value="{{ $kunjungan->dpl_id }}" />
						<button type="submit" class="btn btn-success xs">
							<span class="material-icons">save</span>
						</button>
						<a class="btn btn-info xs" href="{{ route('kunjungan.index') }}">
							<span class="material-icons">undo</span>
						</a>
					</div>         
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

