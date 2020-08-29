@extends('layouts.app')
@section('title', 'Pengaturan')
@section('css')
<link rel="stylesheet" href="{{ asset('dropify/dist/css/dropify.min.css') }}">
@endsection
@section('breadcrumb')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pengaturan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Pengaturan</li>
        </ol>
      </div>
    </div>
  </div>
</section>
@endsection
@section('content')
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Pengaturan</h3>
    </div>
    <div class="card-body">
      <form role="form" class="needs-validation" method="POST" action="{{ route('pengaturan.store') }}" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Kabupaten</label>
              <input type="hidden" name="kabupaten_code" value="{{ Helper::pengaturan('kabupaten')->code }}">
              <input type="text" class="form-control" name="kabupaten" value="{{ Helper::pengaturan('kabupaten')->value }}" required>
            </div>
            <div class="form-group">
              <label>Desa</label>
              <input type="hidden" name="desa_code" value="{{ Helper::pengaturan('desa')->code }}">
              <input type="text" class="form-control" name="desa" value="{{ Helper::pengaturan('desa')->value }}" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Kecamatan</label>
              <input type="hidden" name="kecamatan_code" value="{{ Helper::pengaturan('kecamatan')->code }}">
              <input type="text" class="form-control"  name="kecamatan" value="{{ Helper::pengaturan('kecamatan')->value }}" required>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="hidden" name="alamat_code" value="{{ Helper::pengaturan('alamat')->code }}">
              <input type="text" class="form-control" name="alamat" value="{{ Helper::pengaturan('alamat')->value }}" required>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label>Logo</label>
              <input type="hidden" name="logo_code" value="{{ Helper::pengaturan('logo')->code }}">
              <input type="file" class="dropify" name="logo" data-default-file="{{ Storage::url(Helper::pengaturan('logo')->value) }}" value="{{ Storage::url(Helper::pengaturan('logo')->value) }}">
            </div> 
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
      </form>
    </div>
    <div class="card-footer"></div>
  </div>
</section>
@endsection
@section('js')
<script src="{{ asset('dropify/dist/js/dropify.min.js') }}"></script>
<script>
  $('.dropify').dropify();
</script>
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endsection