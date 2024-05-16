@extends('layouts.index')

@section('title', 'Broadcast Message')

@section('content')

<h2 class="fw-light">Dashboard {{ Auth::user()->role }}</h2>
<h5 class="fst-italic">Welcome {{ Auth::user()->username }} , Love to see you back.</h5>
<hr>



<div class="row">
    <div class="col-6">
        <form >
        <div class="input-group input-group-static mb-4">
            <h6 for="exampleFormControlSelect1" class="ms-0">Pilih Kategori Berita</h6>
            <select class="form-control" id="exampleFormControlSelect1">
            <option>Pemberitahuan</option>
            <option>Penting</option>
            <option>News</option>
            </select>
        </div> 
            <h6  class="ms-0">Masukan kalimat yang akan dibroadcast</h6>
            <textarea class="form-control" rows="5" placeholder="Tulis kalimat disini" spellcheck="false"></textarea>
            </div>
            
        </form>
        <div class="col-6">
        <h6 class="col" >File Upload</h6>
        <form action="/file-upload" class="form-control border dropzone" id="dropzone">
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
        </form>
        <form action="/file-upload" class="form-control border dropzone" id="dropzone">
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
        </form>
        <form action="/file-upload" class="form-control border dropzone" id="dropzone">
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
        </form>
        <form action="/file-upload" class="form-control border dropzone" id="dropzone">
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
        </form>
        <button class="btn btn-primary" type="button">Kirim</button>
    </div>
    </div>
    
</div>




@endsection



