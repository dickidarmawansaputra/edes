@extends('layouts.app')
@section('title', 'Surat Keterangan Kelahiran')
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
        <h1>Surat Keterangan Kelahiran</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Surat Keterangan Kelahiran</li>
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
      <h3 class="card-title">Surat Keterangan Kelahiran</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="tabel" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>No. Surat</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>No. KK</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tfoot>
          <tr>
            <th>#</th>
            <th>No. Surat</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>No. KK</th>
            <th>Aksi</th>
          </tr>
          </tfoot>
        </table>
      </div>
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
        responsive: true,
        autoWidth: true,
        ajax: '{!! route('kelahiran.data') !!}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nomor_surat', name: 'nomor_surat' },
            { data: 'nama', name: 'nama' },
            { data: 'nik', name: 'nik' },
            { data: 'no_kk', name: 'no_kk' },
            { data: 'aksi', name: 'aksi', className: 'text-center' }
        ]
    });
});
</script>
@endsection