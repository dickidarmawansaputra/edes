@extends('layouts.app')
@section('title', 'Data Penduduk')
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
        <h1>Data Penduduk</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Data Penduduk</li>
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
      <h3 class="card-title">Penduduk</h3>
    </div>
    <div class="card-body">
      <button type="button" class="btn btn-icon icon-left btn-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="far fa-edit"></i> Tambah</button>
      <br><br>
      <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Penduduk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" class="needs-validation" method="POST" action="{{ route('penduduk.store') }}" novalidate>
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required placeholder="Nama">
                      </div>
                      <div class="form-group">
                        <label>NIK</label>
                        <input type="number" class="form-control" name="nik" required placeholder="NIK">
                      </div>
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" required placeholder="Tempat Lahir">
                      </div>
                      <div class="form-group">
                        <label>No. HP</label>
                        <input type="number" class="form-control" name="no_hp" required placeholder="No. HP">
                      </div>
                      <div class="form-group">
                        <label>Agama</label>
                        <select name="agama" class="form-control" required>
                          <option selected disabled>Pilih</option>
                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                          <option value="Konghucu">Konghucu</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                          <option selected disabled>Pilih</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>No. KK</label>
                        <input type="number" class="form-control" name="no_kk" required placeholder="No. KK">
                      </div>
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" required>
                      </div>
                      <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" required placeholder="Pekerjaan">
                      </div>
                      <div class="form-group">
                        <label>Status Nikah</label>
                        <select name="status_nikah" class="form-control" required>
                          <option selected disabled>Pilih</option>
                          <option value="Belum Kawin">Belum Kawin</option>
                          <option value="Sudah Kawin">Sudah Kawin</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" placeholder="Alamat" required></textarea>
                      </div>
                    </div>
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
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Penduduk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" class="needs-validation" method="POST" action="{{ route('penduduk.update') }}" novalidate>
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required id="nama">
                      </div>
                      <div class="form-group">
                        <label>NIK</label>
                        <input type="number" class="form-control" name="nik" required id="nik">
                      </div>
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" required id="tempat_lahir">
                      </div>
                      <div class="form-group">
                        <label>No. HP</label>
                        <input type="number" class="form-control" name="no_hp" required id="no_hp">
                      </div>
                      <div class="form-group">
                        <label>Agama</label>
                        <select name="agama" class="form-control" id="agama" required>
                          <option selected disabled>Pilih</option>
                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                          <option value="Konghucu">Konghucu</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                          <option selected disabled>Pilih</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>No. KK</label>
                        <input type="number" class="form-control" name="no_kk" required id="no_kk">
                      </div>
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
                      </div>
                      <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" required id="pekerjaan">
                      </div>
                      <div class="form-group">
                        <label>Status Nikah</label>
                        <select name="status_nikah" class="form-control" id="status_nikah" required>
                          <option selected disabled>Pilih</option>
                          <option value="Belum Kawin">Belum Kawin</option>
                          <option value="Sudah Kawin">Sudah Kawin</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" required></textarea>
                      </div>
                    </div>
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
          <th>NIK</th>
          <th>No. KK</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>NIK</th>
          <th>No. KK</th>
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
        responsive: true,
        autoWidth: true,
        ajax: '{!! route('penduduk.data') !!}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'nama', name: 'nama' },
            { data: 'nik', name: 'nik' },
            { data: 'no_kk', name: 'no_kk' },
            { data: 'aksi', name: 'aksi', className: 'text-center' }
        ]
    });
});
</script>
<script>
$('#edit').on('show.bs.modal', function(event){
    var row = $(event.relatedTarget);
    var id = row.data('id');
    var nama = row.data('nama');
    var nik = row.data('nik');
    var no_kk = row.data('no_kk');
    var alamat = row.data('alamat');
    var tempat_lahir = row.data('tempat_lahir');
    var tgl_lahir = row.data('tgl_lahir');
    var agama = row.data('agama');
    var jenis_kelamin = row.data('jenis_kelamin');
    var status_nikah = row.data('status_nikah');
    var pekerjaan = row.data('pekerjaan');
    var no_hp = row.data('no_hp');
    $('#id').val(id);
    $('#nama').val(nama);
    $('#nik').val(nik);
    $('#no_kk').val(no_kk);
    $('#alamat').val(alamat);
    $('#tempat_lahir').val(tempat_lahir);
    $('#tgl_lahir').val(tgl_lahir);
    $('#agama').val(agama).change();
    $('#jenis_kelamin').val(jenis_kelamin).change();
    $('#status_nikah').val(status_nikah);
    $('#pekerjaan').val(pekerjaan);
    $('#no_hp').val(no_hp);
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
        $.post( "{{ url('penduduk/destroy')}}/"+id, { "_token": "{{ csrf_token() }}" })
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
@endsection