@extends('layouts.app')
@section('title', 'Profil Pengguna')
@section('css')
<link rel="stylesheet" href="{{ asset('dropify/dist/css/dropify.min.css') }}">
@endsection
@section('breadcrumb')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profil Pengguna</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Profil Pengguna</li>
        </ol>
      </div>
    </div>
  </div>
</section>
@endsection
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{ Storage::url(Auth::user()->photo) }}"
                   alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Data Pengguna</a></li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <form role="form" class="needs-validation" method="POST" action="{{ route('pengguna.update') }}" novalidate>
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="name" required value="{{ $data->name }}">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" required value="{{ $data->email }}">
                    </div>
                    <div class="form-group">
                      <label>Password (*Diisi jika ingin ganti password)</label>
                      <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label>Foto</label>
                      <input type="file" class="dropify" name="foto" data-default-file="{{ Storage::url(Auth::user()->photo) }}">
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
@if(Session::get('store'))
<script>
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
      icon: 'success',
      title: 'Data berhasil ditambahkan.'
    });
  });
</script>
@elseif(Session::get('update'))
<script>
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
      icon: 'success',
      title: 'Data berhasil diedit.'
    });
  });
</script>
@endif
@endsection