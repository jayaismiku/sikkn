@extends('layouts.index')

@section('title', 'Validasi Mahasiswa KKN')

@section('pathway')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
		<li class="breadcrumb-item text-sm">
			<a class="opacity-3 text-dark" href="{{ route('home') }}">
				<span class="material-icons">cottage</span>
			</a>
		</li>
		<li class="breadcrumb-item text-sm text-dark active" aria-current="page">
			<span>{{ __('Validasi Mahasiswa KKN') }}</span>
		</li>
	</ol>
</nav>
@endsection

@section('content')

@if(session()->get('success'))
<div id="alert-success" class="alert alert-success alert-dismissible text-white mx-3 fade show" role="alert">
	<span class="alert-icon align-middle">
		<span class="material-icons text-md">thumb_up_off_alt</span>
	</span>
	<span class="alert-text"><strong>Success!</strong> {{ session()->get('success') }}</span>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

<div class="row">
	<div class="col-12">
		<div class="card my-4">
			<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
				<div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3 container">
					<div class="row">
						<div class="col-sm-8">
							<h6 class="text-white text-capitalize ps-3">{{ __('Validasi Mahasiswa KKN') }}</h6>
						</div>
						<div class="col-sm-4 text-end">
							<a class="text-white pe-3" href="{{ route('logbook.create') }}">
								<i class="fa-solid fa-file-circle-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="card-body px-0 pb-2 mx-3">
				<div class="table-responsive p-0">
					<table class="table align-items-center justify-content-center mb-0">
						<thead>
							<tr>
								<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Nama Mahasiswa') }}</th>
								<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Kelompok') }}</th>
								<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Nama Kegiatan') }}</th>
								<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Bukti Kegiatan') }}</th>
								<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('Validasi DPL') }}</th>
							</tr>
						</thead>

						<tbody>
							@foreach($logbook as $log)
							<tr>
								<td class="text-xs">{{ $log->nama_mhs }}</td>
								<td class="text-xs nama">{{ $log->nama_kelompok }}</td>
								<td class="text-xs deskripsi">{!! $log->nama_kegiatan !!}</td>
								<td class="text-xs">
									@if(isset($log->foto_kegiatan))
									<a data-bs-toggle="modal" class="display-6" data-bs-target="#photoModal{{ $log->logbook_id }}"><i class="fa-regular fa-image"></i></a>
									<!-- Modal -->
									<div class="modal fade" id="photoModal{{ $log->logbook_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">{{ __('Bukti Kegiatan') }}</h5>
													<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<img src="{{ Storage::url($log->foto_kegiatan) }}" class="img-fluid w-50" alt="Photo">
													<small>{!! $log->deskripsi_kegiatan !!}</small>
													<small>{{ $log->tanggal_kegiatan }}</small>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
									@endif
								</td>
								<td class="text-xs">
									<input type="hidden" name="logbook_id" value="{{ $log->logbook_id }}">
									<a class="nav-link text-danger display-6" href="#" onclick="event.preventDefault(); document.getElementById('validasi-form-{{ $log->logbook_id }}').submit();">
										{!! ($log->validasi == 0)?'<i class="fa-solid fa-triangle-exclamation text-warning"></i>':'<i class="fa-solid fa-clipboard-check text-success"></i>' !!}
										<form id="validasi-form-{{ $log->logbook_id }}" action="{{ route('logbook.tervalidasi', $log->logbook_id) }}" method="POST" class="d-none">
											@csrf
											@method('PUT')
										</form>
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
.deskripsi p{
	font-family: Roboto;
	font-size: 0.75rem !important;
	font-weight: 100;
}
</style>

@endsection
