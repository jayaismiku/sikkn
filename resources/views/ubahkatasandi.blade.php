@extends('layouts.index')

@section('title', 'Ubah Kata Sandi')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="{{ route('profile') }}">{{ __('Profile') }}</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>Ubah Kata Sandi</span>
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
               <h6 class="text-white text-capitalize ps-3">{{ __('Ubah Kata Sandi') }}</h6>
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
            <form action="{{ route('profile.update.katasandi', $userid) }}" method="POST">
               @csrf
               @method('PUT')
               <div class="form-group">
                  <label for="current_password">Current Password</label>
                  <input type="password" class="form-control" id="current_password" name="current_password" required>
               </div>
               <div class="form-group">
                  <label for="new_password">New Password</label>
                  <input type="password" class="form-control" id="new_password" name="new_password" required>
               </div>
               <div class="form-group">
                  <label for="new_password_confirmation">Confirm New Password</label>
                  <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
               </div>
               <div class="form-group mt-3">
                  <input type="hidden" name="userid" value="{{ $userid }}">
                  <button type="submit" class="btn btn-success xs">
                     <span class="material-icons">save</span>
                  </button>
                  <a class="btn btn-info xs" href="{{ route('profile') }}">
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

});
</script>

@endsection

