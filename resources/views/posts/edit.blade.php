@extends('layouts.index')

@section('title', 'Edit Berita')

@section('pathway')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-3 text-dark" href="{{ route('home') }}">
        <span class="material-icons">cottage</span>
      </a>
    </li>
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-dark" href="{{ route('post.index') }}">Berita</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
      <span>Ubah Berita</span>
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
          <h6 class="text-white text-capitalize ps-3">{{ __('Ubah Berita') }}</h6>
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
        <form id="editPost" method="post" action="{{ route('post.update', $post->post_id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label class="form-label" for="judul">{{ __('Judul Berita:') }}</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $post->judul }}" required/>
          </div>
          <div class="form-group">
              <label class="form-label" for="slug">{{ __('Slug Berita:') }}</label>
              <input type="text" class="form-control" id="slug" name="slug" value="{{ $post->slug }}" readonly/>
          </div>
          <div class="form-group">
              <label class="form-label" for="deskripsi">{{ __('Deskripsi:') }}</label>
              <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3">
                {{ $post->deskripsi }}
              </textarea>
          </div>
          <div class="form-group">
              <label class="form-label" for="penulis">{{ __('File Lampiran') }}</label>
              <input type="file" class="form-control" accept="application/pdf" id="lampiran" name="lampiran"/>
          </div>
          <div class="form-group">
              <label class="form-label" for="penulis">{{ __('Penulis') }}</label>
              <input type="text" class="form-control" value="{{ $penulis->nama_lengkap }}" disabled/>
              <input type="hidden" class="form-control" name="penulis" value="{{ $penulis->panitia_id }}"/>
          </div>
          <div class="form-group mt-4">
            <input type="hidden" class="form-control px-2 py-2" name="post_id" value="{{ $post->post_id }}" />
            <button type="submit" class="btn btn-success xs">
              <span class="material-icons">save</span>
            </button>
            <a class="btn btn-info xs" href="{{ route('post.index') }}">
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
  $('#deskripsi').summernote();
  $('#judul').change(function (e) { 
    // e.preventDefault();
    let slug = $(this).val().toLowerCase().replace(/[^a-zA-Z0-9]+/g, '-');
    $('#slug').val(slug);
    console.log(slug)
  });
});
</script>

@endsection

