@extends('layouts.auth')

@section('title', 'Auth Register')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Register') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('register') }}">
						@csrf

						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

								@error('username')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password') }}</label>

							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
							</div>
						</div>

						<div class="form-group row">
							<label for="role-user" class="col-md-4 col-form-label text-md-right">{{ __('Pilih Tipe Anda') }}</label>

							<div class="col-md-6">
								<select class="form-select" name="role" id="role">
									<option value="-" selected>- Pilih Salah Satu-</option>
									<option value="lembaga">LPPM</option>
									<option value="panitia">Panitia</option>
									<option value="pendamping">Dosen Pendamping Lapangan</option>
									<option value="mahasiswa">Mahasiswa</option>
									<option value="desa">Kepala Desa</option>
								</select>
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('Register') }}
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('form-auth')
<div class="d-flex justify-content-center form_container">
	<form method="POST" action="{{ route('register') }}">
		@csrf
		<div class="input-group mb-3">
			<div class="input-group-append">
				<span class="input-group-text"><i class="fas fa-user"></i></span>
			</div>
			<input type="text" id="username" name="name" class="form-control input_user @error('username') is-invalid @enderror" placeholder="username" required autofocus>
			@error('username')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="input-group mb-3">
			<div class="input-group-append">
				<span class="input-group-text"><i class="fas fa-at"></i></span>
			</div>
			<input type="text" id="email" name="email" class="form-control input_user @error('email') is-invalid @enderror" placeholder="email" required autofocus>
			@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="input-group mb-2">
			<div class="input-group-append">
				<span class="input-group-text"><i class="fas fa-key"></i></span>
			</div>
			<input id="password" type="password" name="password" class="form-control input_pass @error('password') is-invalid @enderror" placeholder="password" required autofocus>
			@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="input-group mb-2">
			<div class="input-group-append">
				<span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
			</div>
			<input id="password" type="password" name="password_confirmation" class="form-control input_pass @error('password') is-invalid @enderror" placeholder="konfirmasi password" required  autofocus>
			@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="input-group mb-2">
			<div class="input-group-append">
				<span class="input-group-text"><i class="fas fa-user-check"></i></span>
			</div>
			<select class="form-control @error('role') is-invalid @enderror" name="role" id="role" required  autofocus>
				<option value="-" selected>- Pilih Salah Satu-</option>
				<option value="lembaga">LPPM</option>
				<option value="panitia">Panitia</option>
				<option value="pendamping">Dosen Pendamping Lapangan</option>
				<option value="mahasiswa">Mahasiswa</option>
				<option value="desa">Kepala Desa</option>
			</select>
			@error('role')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="d-flex justify-content-center mt-3 login_container">
			<button type="submit" name="button" class="btn login_btn">{{ __('Registrasi') }}</button>
		</div>
	</form>
</div>
<div class="mt-4">
	<div class="d-flex justify-content-center links">
		{{ __('Sudah punya akun?') }} <a href="{{ route('login') }}" class="ml-2">{{ __('Masuk') }}</a>
	</div>
</div>
@endsection
