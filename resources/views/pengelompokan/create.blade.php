@extends('layouts.index')

@section('title', 'Generate Kelompok')

@section('pathway')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
		<li class="breadcrumb-item text-sm">
			<a class="opacity-3 text-dark" href="{{ route('home') }}">
				<span class="material-icons">cottage</span>
			</a>
		</li>
		<li class="breadcrumb-item text-sm">
			<a class="opacity-5 text-dark" href="{{ route('kelompok.index') }}">{{ __('Pengelompokan') }}</a>
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
				<form id="" method="post" action="{{ route('pengelompokan.storeapi') }}">
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
						<a id="submit" class="btn btn-success xs">
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
							<th scope="col">Nama Lengkap</th>
							<th scope="col">NIM</th>
							<th scope="col">Prodi</th>
							<th scope="col">Jenis KKN</th>
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
	const url = "{{ route('getMahasiswa') }}";
	console.log(url);
	const csrfToken = $("input[name='_token']").val();
	console.log(csrfToken);
	let students;
	let student;
	let namakelompok;
	let groupedStudents;
	 const finalGroups = [];
	// let numGroups = 6;
	let dividedGroups;
	let jmlkel = 5;

	function groupByJenisKKN(data) {
		  const groups = {};

		  data.forEach(student => {
				const jenis_kkn = student.jenis_kkn;

				if (!groups[jenis_kkn]) {
					 groups[jenis_kkn] = [];
				}

				groups[jenis_kkn].push(student);
		  });

		  return groups;
	 }

	 function divideIntoGroups(students, numGroups) {
		  const groups = Array.from({ length: numGroups }, () => []);
		  let groupIndex = 0;

		  students.forEach(student => {
				groups[groupIndex].push(student);
				groupIndex = (groupIndex + 1) % numGroups;
		  });

		  return groups;
	 }

	$('#jumlah_orang').change(function () {
		let jmlOrg = $(this).val();
		let jmlMhs = $('#jmlmhs').val();
		jmlkel = Math.round(jmlMhs / jmlOrg);
		console.log(jmlkel);
		$('#jmlkel').append('<strong>' + jmlkel + ' kelompok</strong>')
	});

	$('#preview').on('click', function() {
		$.getJSON(url, function(data) {
			// const students = data;
			const groupedByJenisKKN = groupByJenisKKN(data);

			  for (const jenis_kkn in groupedByJenisKKN) {
					if(jenis_kkn == "Reguler"){
						namakelompok = "Reg";
					}else if (jenis_kkn == "Non Reguler") {
						namakelompok = "Nonreg";
					}else{
						namakelompok = "Tematik";
					}

					const numGroups = jmlkel; // Jumlah kelompok yang ingin dibagi
					const dividedGroups = divideIntoGroups(groupedByJenisKKN[jenis_kkn], numGroups);

					dividedGroups.forEach((group, index) => {
						 group.forEach(student => {
							  finalGroups.push({
									nama_kelompok: `${namakelompok}-${index + 1}`,
									nama_mahasiswa: student.nama_mhs,
									nim: student.nim,
									prodi: student.prodi,
									jenis_kkn: student.jenis_kkn,
									jenis_kelamin: student.jenis_kelamin
							  });
						 });
					});
			  }

			  // Clear existing table rows
			  $('#studentTable tbody').empty();

			  // Append new rows to the table
			  finalGroups.forEach(group => {
					$('#studentTable tbody').append(`
						 <tr>
							  <td>${group.nama_kelompok}</td>
							  <td>${group.nama_mahasiswa}</td>
							  <td>${group.nim}</td>
							  <td>${group.prodi}</td>
							  <td>${group.jenis_kkn}</td>
						 </tr>
					`);
			  });
		});
	 });

	$('#submit').on('click', function() {
		// console.log(finalGroups);
		$.ajax({
			url: "{{ route('pengelompokan.storeapi') }}",
			method: 'POST',
			data: {
				_token: '{{ csrf_token() }}',
					 data: finalGroups
			},
			success: function(response) {
				// alert(response.message);
				window.location.replace("{{ route('pengelompokan.index') }}")
			},
			error: function(xhr) {
					 console.error(xhr.responseText);
				}
		});
	});

});
</script>

@endsection

