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
			<a class="opacity-5 text-dark" href="{{ route('kelompok.index') }}">{{ __('Kelompok') }}</a>
		</li>
		<li class="breadcrumb-item text-sm text-dark active" aria-current="page">
			<span>{{ __('Tambah Kelompok') }}</span>
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
					<h6 class="text-white text-capitalize ps-3">{{ __('Tambah Kelompok') }}</h6>
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
				<form id="" method="post" action="{{ route('kelompok.store') }}">
					@csrf
					<div class=" input-group-outline my-2">
						<label class="form-label" for="nama_kelompok">{{ __('Nama Kelompok:') }}</label>
						<input type="text" class="form-control px-2 py-2" id="nama_kelompok" name="nama_kelompok" required/>
					</div>
					<div class=" input-group-outline my-2">
						<label class="form-label" for="jenis_kkn">{{ __('Jenis KKN') }}</label>
						<select class="form-control form-control-sm p-2 form-select form-select-sm" aria-label=".form-select-sm select-pemonev" id="jenis_kkn" name="jenis_kkn" required>
							<option value="" selected>-Pilih Jenis KKN-</option>
							<option value="Reguler">Reguler</option>
							<option value="Non-Reguler">Non-Reguler</option>
							<option value="Tematik">Tematik</option>
						</select>
					</div>
					<div class=" input-group-outline my-2">
						<label class="form-label" for="pemonev">{{ __('Pemonev:') }}</label>
						<select class="form-control form-control-sm p-2 form-select form-select-sm" aria-label=".form-select-sm select-pemonev" id="pemonev" name="pemonev" required>
							<option value="" selected>-Pilih Pemonev-</option>
							@foreach($pemonev as $pm)
							<option value="{{ $pm->pemonev_id }}">{{ ucfirst(strtolower($pm->nama_pemonev)) }}</option>
							@endforeach
						</select>
					</div>
					<div class=" input-group-outline my-2">
						<label class="form-label" for="pendamping">{{ __('Pendamping') }}</label>
						<select class="form-control form-control-sm p-2 form-select form-select-sm" aria-label=".form-select-sm select-pemonev" id="pendamping" name="pendamping" required>
							<option value="" selected>-Pilih Pendamping-</option>
							@foreach($pendamping as $dpl)
							<option value="{{ $dpl->pendamping_id }}">{{ ucfirst(strtolower($dpl->nama_dosen)) }}</option>
							@endforeach
						</select>
					</div>
					<div class=" input-group-outline my-2">
						<label class="form-label" for="desa">{{ __('Desa') }}</label>
						<select class="form-control form-control-sm p-2 form-select form-select-sm" aria-label=".form-select-sm select-desa" id="desa" name="desa" required>
							<option value="" selected>-Pilih Desa-</option>
							@foreach($desa as $ds)
							<option value="{{ $ds->desa_id }}">{{ $ds->nama_desa }}</option>
							@endforeach
						</select>
					</div>
					<div class=" input-group-outline my-2">
						<label class="form-label" for="mahasiswa">{{ __('Mahasiswa') }}</label>
						<select class="form-control form-control-sm p-2 form-select form-select-sm" aria-label=".form-select-sm select-mahasiswa" id="mahasiswa" name="mahasiswa" required>
							<option value="" selected>-Pilih Mahasiswa-</option>
							@foreach($mahasiswa as $mhs)
							<option value="{{ $mhs->mahasiswa }}">{{ $mhs->nama_mhs }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group mt-2">
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

<script type="text/javascript">
$(document).ready(function() {
	const url = "{{ url('/getmahasiswa') }}";
	const students;
	const groupedStudents;
	const numGroups = 6;
	const dividedGroups;
	// console.log(url);
	let jmlkel = 5;

	$('#jumlah_orang').change(function () {
		let jmlOrg = $(this).val();
		let jmlMhs = $('#jmlmhs').val();
		jmlkel = Math.round(jmlMhs / jmlOrg);
		console.log(jmlkel);
		$('#jmlkel').append('<strong>' + jmlkel + ' kelompok</strong>')
	});

	$('#preview').click(function () {
		$.getJSON(url, function(data) {
			students = data;

			// Fungsi untuk mengelompokkan data mahasiswa
			function groupStudents(students) {
				const grouped = {};

				students.forEach(
					student => {
						const prodi = student.prodi;
						const gender = student.jenis_kelamin;

						if (!grouped[prodi]) {
							grouped[prodi] = {};
						}

						if (!grouped[prodi][gender]) {
							grouped[prodi][gender] = [];
						}

						grouped[prodi][gender].push(student);
				});

				return grouped;
			}

			// Mengelompokkan mahasiswa
			groupedStudents = groupStudents(students);

			// Fungsi untuk membagi data menjadi 6 kelompok
			function divideIntoGroups(groupedStudents, numGroups) {
				const groups = Array.from({ length: numGroups }, () => []);
				let groupIndex = 0;

				for (const prodi in groupedStudents) {
					for (const gender in groupedStudents[prodi]) {
						groupedStudents[prodi][gender].forEach(student => {
							groups[groupIndex].push(student);
							groupIndex = (groupIndex + 1) % numGroups;
						});
					}
				}

				return groups;
			}

			// Membagi data menjadi 6 kelompok
			dividedGroups = divideIntoGroups(groupedStudents, numGroups);

			// Fungsi untuk menampilkan hasil pengelompokan
			function displayGroups(groups) {
				const tableBody = $('#studentTable tbody');
				tableBody.empty();

				groups.forEach((group, index) => {
					group.forEach(student => {
						const row = `<tr>
														<td>Kelompok ${index + 1}</td>
														<td>${student.nim}</td>
														<td>${student.nama_lengkap}</td>
													</tr>`;
						tableBody.append(row);
					});
				});
			}

			// Menampilkan hasil pengelompokan di tabel
			displayGroups(dividedGroups);

		}).fail(function() {
			console.error("Error fetching data from API");
		});
	});

	$('#submit').on('click', function() {
		const formattedData = dividedGroups.map((group, index) => {
			return group.map(student => ({
				kelompok: index + 1,
				nim: student.nim
			}));
		}).flat();

		$.ajax({
			type: 'POST',
			url: 'save_to_mysql.php',
			data: JSON.stringify(formattedData),
			contentType: 'application/json',
			success: function(response) {
				alert('Data berhasil disimpan ke MySQL');
			},
			error: function(error) {
				console.error('Error:', error);
			}
		});
	});

});
</script>

@endsection
