@extends('layouts.index')

@section('title', 'Edit Prodi')

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
			<span>{{ __('Ubah Desa') }}</span>
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
					<h6 class="text-white text-capitalize ps-3">Ubah Data Desa</h6>
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
				<form id="frmEditDesa" method="post" action="{{ route('desa.update', $desa->desa_id) }}">
					@csrf
					@method('PUT')
					<div class=" input-group-outline my-3">
							<label class="form-label" for="nama_desa">{{ __('Nama Desa:') }}</label>
							<input type="text" class="form-control px-2 py-2" name="nama_desa" value="{{ $desa->nama_desa }}" required/>
					</div>
					<div class=" input-group-outline my-3">
							<label class="form-label" for="alamat">{{ __('Alamat:') }}</label>
							<input type="text" class="form-control px-2 py-2" name="alamat" value="{{ $desa->alamat }}" required/>
					</div>
					<div class="form-group">
						<label class="form-label" for="provinsi">{{ __('Provinsi:') }}</label>
						<select class="form-control form-select px-2" id="provinsi" name="provinsi" required>
							<option value="{{ $desa->provinsi_id }}">{{ $desa->nama_provinsi }}</option>
						</select>
					</div>
					<div class="form-group">
						<label class="form-label" for="kota">{{ __('Kota/Kabupaten:') }}</label>
						<select class="form-control form-select px-2" id="kota" name="kota" required>
							<option  value="{{ $desa->kota_id }}">{{ $desa->nama_kota }}</option>
						</select>
					</div>
					<div class="form-group">
							<label class="form-label" for="kecamatan">{{ __('Kecamatan:') }}</label>
							<select class="form-control form-select px-2" id="kecamatan" name="kecamatan" required>
								<option  value="{{ $desa->kecamatan_id }}">{{ $desa->nama_kecamatan }}</option>
							</select>
					</div>
					<div class="form-group">
							<label class="form-label" for="kelurahan">{{ __('Kelurahan:') }}</label>
							<select class="form-control form-select px-2" id="kelurahan" name="kelurahan" required>
								<option  value="{{ $desa->kelurahan_id }}">{{ $desa->nama_kelurahan }}</option>
							</select>
					</div>
					<div class=" input-group-outline my-3">
							<label class="form-label" for="longitude">{{ __('Longitude') }}</label>
							<input type="text" id="long" class="form-control px-2 py-2" name="longitude" value="{{ $desa->longitude }}" required/>
					</div>
					<div class=" input-group-outline my-3">
							<label class="form-label" for="latitude">{{ __('Latitude') }}</label>
							<input type="text" id="lat" class="form-control px-2 py-2" name="latitude" value="{{ $desa->latitude }}" required/>
					</div>
					<div class="form-group mt-4">
						<input type="hidden" class="form-control px-2 py-2" name="desa_id" value="{{ $desa->desa_id }}" />
						<a class="btn btn-warning xs" onclick="getLocation()">
							<span class="material-icons">pin_drop</span>
						</a>
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
<script>
var long = document.getElementById("long");
var lat = document.getElementById("lat");

function getLocation() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition);
		console.log(navigator.geolocation.getCurrentPosition(showPosition));
	} else { 
		alert("Geolocation is not supported by this browser.");
	}
}

function showPosition(position) {
	document.getElementById("long").value = position.coords.longitude;
	document.getElementById("lat").value = position.coords.latitude;
}

$(document).ready(function() {
	// Load data provinsi saat halaman dimuat
	$.ajax({
		url: '/get-provinsi',
		type: 'GET',
		success: function(data) {
			$('#provinsi').html(data);
		}
	});
	
	// Load data kota/kabupaten saat provinsi dipilih
	$('#provinsi').change(function() {
		var provinsiId = $(this).val();
		console.log(provinsiId);
		if (provinsiId) {
			$.ajax({
				url: '/get-kota/' + provinsiId,
				type: 'GET',
				success: function(data) {
					$('#kota').html(data);
					$('#kecamatan').html('<option value="">Pilih Kecamatan</option>'); // Reset kecamatan
					$('#kelurahan').html('<option value="">Pilih Kelurahan</option>'); // Reset kelurahan
				}
			});
		} else {
			$('#kota').html('<option value="">Pilih Kota/Kabupaten</option>');
			$('#kecamatan').html('<option value="">Pilih Kecamatan</option>');
			$('#kelurahan').html('<option value="">Pilih Kelurahan</option>');
		}
	});
	
	// Load data kecamatan saat kota/kabupaten dipilih
	$('#kota').change(function() {
		var kotaId = $(this).val();
		if (kotaId) {
			$.ajax({
				url: '/get-kecamatan/' + kotaId,
				type: 'GET',
				success: function(data) {
					$('#kecamatan').html(data);
					$('#kelurahan').html('<option value="">Pilih Kelurahan</option>'); // Reset kelurahan
				}
			});
		} else {
			$('#kecamatan').html('<option value="">Pilih Kecamatan</option>');
			$('#kelurahan').html('<option value="">Pilih Kelurahan</option>');
		}
	});
	
	// Load data kelurahan saat kecamatan dipilih
	$('#kecamatan').change(function() {
		var kecamatanId = $(this).val();
		if (kecamatanId) {
			$.ajax({
				url: '/get-kelurahan/' + kecamatanId,
				type: 'GET',
				success: function(data) {
					$('#kelurahan').html(data);
				}
			});
		} else {
			$('#kelurahan').html('<option value="">Pilih Kelurahan</option>');
		}
	});

	$('#kelurahan').change(function() {
		var provinsi = $('#provinsi').find(':selected').text();
		var kota = $('#kota').find(':selected').text();
		var kecamatan = $('#kecamatan').find(':selected').text();
		var kelurahan = $(this).find(':selected').text();
		if (kelurahan) {
			// Call OpenStreetMap Nominatim API
			getCoordinatesFromOSM(provinsi, kota, kecamatan, kelurahan);
		}
	});

	function getCoordinatesFromOSM(provinsi, kota, kecamatan, kelurahan) {
		var apiUrl = 'https://nominatim.openstreetmap.org/search?format=json&city=' + kelurahan + '&county=' + kecamatan + '&state=' + kota + '&country=indonesia&limit=1';
		
		$.getJSON(apiUrl, function(response) {
			if (response.length > 0) {
				var location = response[0];
				$('#latitude').val(location.lat);
				$('#longitude').val(location.lon);
			} else {
				alert('Geocoding failed: no results found.');
				$('#latitude').val('');
				$('#longitude').val('');
			}
		}).fail(function() {
			alert('Error contacting OpenStreetMap Nominatim API.');
			$('#latitude').val('');
			$('#longitude').val('');
		});
	}
});

</script>
@endsection

