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
			<span>{{ __('Generate Kelompok') }}</span>
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
					<h6 class="text-white text-capitalize ps-3">{{ __('Generate Kelompok') }}</h6>
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
					<p class="form-label">Jumlah yang mendaftar per {{ date('d M Y') }} sejumlah {{ count($mahasiswa) }} orang</p>
					<div class="form-group">
						<label class="form-label" for="jumlah_orang">{{ __('Berapa orang dalam satu kelompok yang ingin dibuat?') }}</label>
						<input type="number" class="form-control px-2" id="jumlah_orang" name="jumlah_orang" value="10" />
					</div>
					<br><p id="jmlkel" class="form-label">{{ __('Kemungkinan banyaknya kelompok ada: ') }}</p>
					<div class="form-group mt-4">
						<input type="hidden" id="jmlmhs" name="jmlmhs" value="{{ count($mahasiswa) }}">
						<a id="preview" class="btn btn-warning xs">
							<i class="fa-solid fa-user-check"></i> <span class="fs-5">{{ __('Preview') }}</span>
						</a>
						<a id="submit" class="btn btn-success xs" onclick="formsubmit()">
							<i class="fa-solid fa-people-line"></i> <span class="fs-5">{{ __('Simpan Kelompok') }}</span>
						</a>
						<a id="back" class="btn btn-info xs" onclick="window.history.back()">
							<i class="fa-solid fa-rotate-left"></i> <span class="fs-5">{{ __('Kembali') }}</span>
						</a>
					</div>         
				</form>
				<table id="studentTable" class="table">
	        <thead>
	        	<tr>
	        		<th scope="col">Kelompok</th>
	        		<th scope="col">NIM</th>
	        		<th scope="col">Nama Mahasiswa</th>
	        		<th scope="col">#</th>
	        	</tr>
	        </thead>
	        <tbody>
	            <!-- Data akan dimasukkan di sini oleh JavaScript -->
	        </tbody>
	    	</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	const url = "{{ url('/getmahasiswa') }}";
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
			const students = data;

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
			const groupedStudents = groupStudents(students);

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
			const numGroups = 6;
			const dividedGroups = divideIntoGroups(groupedStudents, numGroups);

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
});
</script>

@endsection

