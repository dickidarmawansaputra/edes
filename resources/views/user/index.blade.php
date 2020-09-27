@extends('layouts.app')
@section('title', 'Data Pengguna')
@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('dropify/dist/css/dropify.min.css') }}">
@endsection
@section('breadcrumb')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Pengguna</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Data Pengguna</li>
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
      <h3 class="card-title">Pengguna</h3>
    </div>
    <div class="card-body">
      <button type="button" class="btn btn-icon icon-left btn-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="far fa-edit"></i> Tambah</button>
      <br><br>
      <div class="modal fade" id="tambah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Pengguna</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" class="needs-validation" method="POST" action="{{ route('pengguna.store') }}" novalidate enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="name" required placeholder="Nama">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" required placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="dropify" name="photo">
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
      <div class="modal fade" id="edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Pengguna</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" class="needs-validation" method="POST" action="{{ route('pengguna.update') }}" novalidate enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="name" required id="name">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" required id="email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                  </div>
                  <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="dropify" name="photo" id="photo">
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
      <table id="tabel" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Aksi</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <div class="card-footer"></div>
  </div>
</section>
@endsection
@section('js')
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dropify/dist/js/dropify.min.js') }}"></script>
<script>
  $('.dropify').dropify();
</script>
<script>
$(function() {
    $('#tabel').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('pengguna.data') !!}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'aksi', name: 'aksi', className: 'text-center' }
        ]
    });
});
</script>
<script>
$('#edit').on('show.bs.modal', function(event){
    var row = $(event.relatedTarget);
    var id = row.data('id');
    var name = row.data('name');
    var email = row.data('email');
    var photo = row.data('photo');
    var photo_file = row.data('photo_file');
    $('#id').val(id);
    $('#name').val(name);
    $('#email').val(email);
    $('#photo').text(photo);
    var imagenUrl = photo_file;
    var drEvent = $('#photo').dropify(
    {
      defaultFile: imagenUrl
    });
    drEvent = drEvent.data('dropify');
    drEvent.resetPreview();
    drEvent.clearElement();
    drEvent.settings.defaultFile = imagenUrl;
    drEvent.destroy();
    drEvent.init();
});
</script>
<script>
$(document).on("click", ".delete", function (e) {
    var id = $(this).data("id");
    e.preventDefault();
    Swal.fire({
      title: 'Anda yakin?',
      text: "Data ini akan dihapus!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.value) {
        $.post( "{{ url('pengguna/destroy')}}/"+id, { "_token": "{{ csrf_token() }}" })
        Swal.fire(
          'Terhapus!',
          'Data berhasil dihapus.',
          'success'
        )
        location.reload();
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire(
          'Batal hapus',
          'Data batal dihapus :)',
          'error'
        )
      }
    })
});
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