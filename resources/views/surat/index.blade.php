@extends('layouts.app')
@section('title', 'Surat')
@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
@endsection
@section('breadcrumb')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Surat</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Surat</li>
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
      <h3 class="card-title">Surat</h3>
    </div>
    <div class="card-body">
      {{-- <button type="button" class="btn btn-icon icon-left btn-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="far fa-edit"></i> Tambah</button>
      <br><br>
      <div class="modal fade" id="tambah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Surat</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" class="needs-validation" method="POST" action="{{ route('surat.store') }}" novalidate>
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Jenis Surat</label>
                    <input type="text" class="form-control" name="jenis" required placeholder="Jenis Surat">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div> --}}
      <div class="modal fade" id="edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Surat</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" class="needs-validation" method="POST" action="{{ route('surat.update') }}" novalidate>
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id">
                <div class="card-body">
                  <div class="form-group">
                    <label>Jenis Surat</label>
                    <input type="text" class="form-control" name="jenis" required id="jenis">
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
          <th>Jenis Surat</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
          <th>#</th>
          <th>Jenis Surat</th>
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
<script>
$(function() {
    $('#tabel').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('surat.data') !!}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'jenis', name: 'jenis' },
            { data: 'aksi', name: 'aksi', className: 'text-center' }
        ]
    });
});
</script>
<script>
$('#edit').on('show.bs.modal', function(event){
    var row = $(event.relatedTarget);
    var id = row.data('id');
    var jenis = row.data('jenis');
    $('#id').val(id);
    $('#jenis').val(jenis);
});
</script>
{{-- <script>
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
        $.post( "{{ url('surat/destroy')}}/"+id, { "_token": "{{ csrf_token() }}" })
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
</script> --}}
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
@if(Session::get('update'))
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