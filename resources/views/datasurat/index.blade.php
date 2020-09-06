@extends('layouts.app')
@section('title', 'Data Surat')
@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte//plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('breadcrumb')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Surat</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Data Formulir Surat</li>
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
      <h3 class="card-title">Data Pemohon Surat</h3>
    </div>
    <div class="card-body">
      <button type="button" class="btn btn-icon icon-left btn-primary btn-sm" data-toggle="modal" data-target="#tambah"><i class="far fa-edit"></i> Tambah</button>
      <br><br>
      <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Surat</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" class="needs-validation" method="POST" action="{{ route('datasurat.store') }}" novalidate>
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>NIK</label>
                        <select name="penduduk_id" class="form-control select2bs4" id="nik" required style="width: 100%;">
                          <option selected disabled>Pilih</option>
                          <?php foreach ($penduduk as $key => $value): ?>
                          <option value="{{ $value->id }}">{{ $value->nik }}</option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" disabled placeholder="Nama">
                      </div>
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" disabled placeholder="Tempat Lahir">
                      </div>
                      <div class="form-group">
                        <label>No. HP</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" disabled placeholder="No. HP">
                      </div>
                      <div class="form-group">
                        <label>Agama</label>
                        <select name="agama" id="agama" class="form-control" disabled>
                          <option selected disabled>Pilih</option>
                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                          <option value="Konghucu">Konghucu</option>
                        </select>
                      </div>
                       <div class="form-group">
                        <label>Jenis Surat</label>
                        <select name="jenis_surat_id" class="form-control" required>
                          <option selected disabled>Pilih</option>
                          <?php foreach ($jenis_surat as $key => $value): ?>
                          <option value="{{ $value->id }}">{{ $value->jenis }}</option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>No Surat</label>
                        <input type="text" class="form-control" name="nomor_surat" required placeholder="No Surat">
                      </div>
                      <div class="form-group">
                        <label>Warga Negara</label>
                        <select name="warga_negara" class="form-control" disabled>
                          <option>Pilih</option>
                          <option>WNI</option>
                          <option>WNA</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" disabled>
                          <option selected disabled>Pilih</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>No. KK</label>
                        <input type="number" class="form-control" id="no_kk" name="no_kk" disabled placeholder="No. KK">
                      </div>
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" disabled>
                      </div>
                      <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" disabled placeholder="Pekerjaan">
                      </div>
                      <div class="form-group">
                        <label>Status Nikah</label>
                        <select name="status_nikah" id="status_nikah" class="form-control" disabled>
                          <option selected disabled>Pilih</option>
                          <option value="Belum Kawin">Belum Kawin</option>
                          <option value="Sudah Kawin">Sudah Kawin</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Penanggung Jawab</label>
                        <select name="penanggung_jawab_id" class="form-control" required>
                          <option selected disabled>Pilih</option>
                          <?php foreach ($pj as $key => $value): ?>
                          <option value="{{ $value->id }}">{{ $value->nama }}</option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Nomor KPS</label>
                        <input type="text" class="form-control" id="nomor_kps" name="nomor_kps" disabled placeholder="Nomor KPS">
                      </div>

                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" disabled></textarea>
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
              <h4 class="modal-title">Edit Data Surat</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="id" id="id">

            </div>
            
          </div>
        </div>
      </div>

      <div class="modal fade" id="edit_new">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Surat</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form role="form" class="needs-validation" method="POST" action="{{ route('datasurat.update') }}" novalidate>
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id">
               <div class="card-body">
                   <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                        <label>NIK</label>
                        <select name="penduduk_id" class="form-control select2bs4" id="nik" required style="width: 100%;">
                          <option selected disabled>Pilih</option>
                          <?php foreach ($penduduk as $key => $value): ?>
                          <option value="{{ $value->id }}">{{ $value->nik }}</option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="nama_edit" name="nama" disabled placeholder="Nama">
                      </div>
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir-edit" name="tempat_lahir" disabled placeholder="Tempat Lahir">
                      </div>
                      <div class="form-group">
                        <label>No. HP</label>
                        <input type="number" class="form-control" id="no_hp_edit" name="no_hp" disabled placeholder="No. HP">
                      </div>
                      <div class="form-group">
                        <label>Agama</label>
                        <select name="agama" id="agama_edit" class="form-control" disabled>
                          <option selected disabled>Pilih</option>
                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                          <option value="Konghucu">Konghucu</option>
                        </select>
                      </div>
                       <div class="form-group">
                        <label>Jenis Surat</label>
                        <select name="jenis_surat_id" id="jenis_surat_edit" class="form-control" required>
                          <option selected disabled>Pilih</option>
                          <?php foreach ($jenis_surat as $key => $value): ?>
                          <option value="{{ $value->id }}">{{ $value->jenis }}</option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>No Surat</label>
                        <input type="text" class="form-control" id="no_surat_id" name="nomor_surat" required placeholder="No Surat">
                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin_edit" class="form-control" disabled>
                          <option selected disabled>Pilih</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>No. KK</label>
                        <input type="number" class="form-control" id="no_kk_edit" name="no_kk" disabled placeholder="No. KK">
                      </div>
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir_edit" name="tgl_lahir" disabled>
                      </div>
                      <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan_edit" name="pekerjaan" disabled placeholder="Pekerjaan">
                      </div>
                      <div class="form-group">
                        <label>Status Nikah</label>
                        <select name="status_nikah" id="status_nikah_edit" class="form-control" disabled>
                          <option selected disabled>Pilih</option>
                          <option value="Belum Kawin">Belum Kawin</option>
                          <option value="Sudah Kawin">Sudah Kawin</option>
                        </select>
                      </div>
                       <div class="form-group">
                          <label>Penanggung Jawab</label>
                          <select name="penanggung_jawab_id" id="pj_edit" class="form-control" required>
                            <option selected disabled>Pilih</option>
                            <?php foreach ($pj as $key => $value): ?>
                            <option value="{{ $value->id }}">{{ $value->nama }}</option>
                            <?php endforeach ?>
                          </select>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" id="alamat_edit" class="form-control" disabled></textarea>
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
          <th>Nomor Surat</th>
          <th>NIK</th>
          <th>Jenis Surat</th>
          <th>Penanggung Jawab</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
          <th>#</th>
          <th>Nomor Surat</th>
          <th>NIK</th>
          <th>Jenis Surat</th>
          <th>Penanggung Jawab</th>
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
<script src="{{ asset('adminlte//plugins/select2/js/select2.full.min.js') }}"></script>
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
        ajax: '{!! route('datasurat.data') !!}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'nomor_surat', name: 'nomor_surat' },
            { data: 'nik', name: 'nik' },
            { data: 'jenis_surat', name: 'jenis_surat' },
            { data: 'nama_penjabat', name: 'nama_penjabat' },
            { data: 'aksi', name: 'aksi', className: 'text-center' }
        ]
    });
});
</script>
<script>
$('#edit_new').on('show.bs.modal', function(event){
    var row = $(event.relatedTarget);
    var id = row.data('id');
    // var nip = row.data('nip');
    // var nama = row.data('nama');
    // var jabatan = row.data('jabatan');
    $('#id').val(id);
    // $('#nip').val(nip);
    // $('#nama').val(nama);
    // $('#jabatan').val(jabatan);
});
</script>
<script>
$('#edit').on('show.bs.modal', function(event){
    var row = $(event.relatedTarget);
    // var id = row.data('id');
    // var nik_edit = row.data('nik_edit');
    // var nama_edit = row.data('nama_edit');
    // var no_kk_edit = row.data('no_kk_edit');
    // var tgl_lahir_edit = row.data('tgl_lahir_edit');
    // var pekerjaan_edit = row.data('pekerjaan_edit');
    // var status_nikah_edit = row.data('status_nikah_edit');
    // var pj_edit = row.data('pj_edit');
    // var no_hp_edit = row.data('no_hp_edit');
    // var tempat_lahir_edit = row.data('tempat_lahir_edit');
    // var alamat_edit = row.data('alamat_edit');
    // var jenis_kelamin_edit = row.data('jenis_kelamin_edit');
    $('#id').val(data.id);
    // $('#nik_edit').val(data.nik_edit);
    // $('#nama_edit').val(data.nama_edit);
    // $('#no_kk_edit').val(data.no_kk_edit);
    // $('#tgl_lahir_edit').val(data.tgl_lahir_edit);
    // $('#pekerjaan_edit').val(data.pekerjaan_edit);
    // $('#status_nikah_edit').val(data.status_nikah_edit).trigger('change');
    // $('#pj_edit').val(data.pj_edit).trigger('change');
    // $('#no_hp_edit').val(data.no_hp_edit);
    // $('#tempat_lahir_edit').val(data.tempat_lahir_edit);
    // $('#alamat_edit').val(data.alamat_edit);
    // $('#jenis_kelamin_edit').val(data.jenis_kelamin_edit).trigger('change');
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
        $.post( "{{ url('datasurat/destroy')}}/"+id, { "_token": "{{ csrf_token() }}" })
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
<script>
  $('.select2').select2()

  //Initialize Select2 Elements
  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })
  $(document).on('change', '#nik', function() {
        var id = $('#nik option:selected').val();
        $.ajax({
            url : "{{ route('datasurat') }}/detail/"+id,
            type : "GET",
            datatype : "JSON",
            success : function(data,id){
                // console.log(data,id)
              $('#nama').val(data.nama)
              $('#no_kk').val(data.no_kk)
              $('#tgl_lahir').val(data.tgl_lahir)
              $('#pekerjaan').val(data.pekerjaan)
              $('#status_nikah').val(data.status_nikah).trigger('change')
              $('#agama').val(data.agama).trigger('change')
              $('#no_hp').val(data.no_hp)
              $('#tempat_lahir').val(data.tempat_lahir)
              $('#alamat').val(data.alamat)
              $('#jenis_kelamin').val(data.jenis_kelamin).trigger('change')
            }
        });
  });
</script>


@endsection