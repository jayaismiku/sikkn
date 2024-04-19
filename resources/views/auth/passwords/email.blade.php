@extends('layouts.auth')

@section('title', 'Auth Reset')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Reset Password') }}</div>

				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
					@endif

					<form method="POST" action="{{ route('password.email') }}">
						@csrf

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('Send Password Reset Link') }}
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
	<form method="POST" action="{{ route('password.email') }}">
		@csrf
		<div class="input-group mb-3">
			<div class="input-group-append">
				<span class="input-group-text"><i class="fas fa-at"></i></span>
			</div>
			<input type="email" id="email" name="email" class="form-control input_user @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="username" required autocomplete="email" autofocus>
			@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="d-flex justify-content-center mt-3 login_container">
			<button type="submit" name="button" class="btn login_btn">{{ __('Send Password Reset Link') }}</button>
		</div>
	</form>
</div>
<div class="mt-4">
	<div class="d-flex justify-content-center links">
		{{ __('Belum punya akun?') }} <a href="{{ route('register') }}" class="ml-2">{{ __('Buat Akun') }}</a>
	</div>
	<div class="d-flex justify-content-center links">
		{{ __('Sudah punya akun?') }} <a href="{{ route('login') }}" class="ml-2">{{ __('Masuk') }}</a>
	</div>
</div>
@endsection
