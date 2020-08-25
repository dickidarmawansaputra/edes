@extends('layouts.app')
@section('css')
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection
@section('content')
	@section('title')
		Master Data Warga
	@endsection
	
	<div class="card">
      <div class="card-header">
        <!-- <h3 class="card-title">Master Data Penduduk</h3> -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
	      Tambah Data
	    </button>
      </div>
              <!-- /.card-header -->
      <div class="card-body">
        <table id="dataTable" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Pekerjaan</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
          <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Pekerjaan</th>
            <th>Aksi</th>
          </tr>
          </tfoot>
        </table>
      </div>
              <!-- /.card-body -->
    </div>

    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Penduduk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('penduduk-store') }}" method="post">
              @csrf
              	 <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" name="nik" value="">
                  </div>
                  <div class="form-group">
                    <label for="no_kk">No KK</label>
                    <input type="text" class="form-control" name="no_kk" placeholder="Nomor Kartu Keluarga">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                  </div>
                  <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                  </div>
                  <div class="form-group">
                  	<label for="tgl_lahir">Tanggal Lahir</label>
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="tgl_lahir" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                  </div>
 				  <div class="form-group">
                    <label for="alamat">Alamat</label><br>
                    <textarea name="alamat" name="alamat" cols="50" rows="10"></textarea>
                  </div>
                  <div class="form-group">
                  	<label for="jenis_kelamin">Jenis Kelamin</label>
                  	<div class="form-check">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki">
                      <label class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perampuan">
                      <label class="form-check-label">Perempuan</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <input type="text" class="form-control" name="no_hp" placeholder="Nomor HP">
                  </div>
                  <div class="form-group">
                  	<label>Pekerjaan</label>
                    <select name="pekerjaan" class="form-control">
                      <option>-- Pilih --</option>
                      <option value="PNS">PNS</option>
                      <option value="Wirausaha">Wirausaha</option>
                      <option value="Petani">Petani</option>
                      <option value="Nelayan">Nelayan</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                  <div class="form-group">
                  	<label>Agama</label>
                    <select name="agama" class="form-control">
                      <option>-- Pilih --</option>
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Budha">Budha</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div> 
                  <div class="form-group">
                  	<label>Status Pernikahan</label>
                    <select name="status_nikah" class="form-control">
                      <option>-- Pilih --</option>
                      <option value="Menikah">Menikah</option>
                      <option value="Belum Menikah">Belum Menikah</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>                 
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="edit">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Penduduk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('penduduk-update') }}" method="post">
              @csrf
              @method('PUT')
              	 <input type="hidden" name="id" id="id" value="">
              	 <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" value="">
                  </div>
                  <div class="form-group">
                    <label for="no_kk">No KK</label>
                    <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Nomor Kartu Keluarga">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                  </div>
                  <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                  </div>
                  <div class="form-group">
                  	<label for="tgl_lahir">Tanggal Lahir</label>
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                  </div>
 				          <div class="form-group">
                    <label for="alamat">Alamat</label><br>
                    <textarea name="alamat" id="alamat" name="alamat" cols="50" rows="10"></textarea>
                  </div>
                  <div class="form-group">
                  	<label for="jenis_kelamin">Jenis Kelamin</label>
                  	<div class="form-check">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki">
                      <label class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perampuan">
                      <label class="form-check-label">Perempuan</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP">
                  </div>
                  <div class="form-group">
                  	<label>Pekerjaan</label>
                    <select name="pekerjaan" class="form-control">
                      <option>-- Pilih --</option>
                      <option value="PNS">PNS</option>
                      <option value="Wirausaha">Wirausaha</option>
                      <option value="Petani">Petani</option>
                      <option value="Nelayan">Nelayan</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                  <div class="form-group">
                  	<label>Agama</label>
                    <select name="agama" class="form-control">
                      <option>-- Pilih --</option>
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Budha">Budha</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div> 
                  <div class="form-group">
                  	<label>Status Pernikahan</label>
                    <select name="status_nikah" class="form-control">
                      <option>-- Pilih --</option>
                      <option value="Menikah">Menikah</option>
                      <option value="Belum Menikah">Belum Menikah</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>                 
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

       <div class="modal fade" id="view">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Penduduk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                 <input type="hidden" name="id" id="id" value="">
                 <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik-view" name="nik" placeholder="NIK" value="" disabled="">
                  </div>
                  <div class="form-group">
                    <label for="no_kk">No KK</label>
                    <input type="text" class="form-control" id="no_kk-view" name="no_kk" placeholder="Nomor Kartu Keluarga" disabled="">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama-view" name="nama" placeholder="Nama" disabled="">
                  </div>
                  <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir-view" name="tempat_lahir" placeholder="Tempat Lahir" disabled="">
                  </div>
                  <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" id="tgl_lahir-view" name="tgl_lahir" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask disabled="">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label><br>
                    <textarea name="alamat" id="alamat-view" name="alamat" cols="50" rows="10"></textarea disabled="">
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki">
                      <label class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perampuan">
                      <label class="form-check-label">Perempuan</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <input type="text" class="form-control" id="no_hp-view" name="no_hp" placeholder="Nomor HP" disabled="">
                  </div>
                  <div class="form-group">
                    <label>Pekerjaan</label>
                    <select name="pekerjaan" class="form-control">
                      <option>-- Pilih --</option>
                      <option value="PNS">PNS</option>
                      <option value="Wirausaha">Wirausaha</option>
                      <option value="Petani">Petani</option>
                      <option value="Nelayan">Nelayan</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Agama</label>
                    <select name="agama" class="form-control">
                      <option>-- Pilih --</option>
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Budha">Budha</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div> 
                  <div class="form-group">
                    <label>Status Pernikahan</label>
                    <select name="status_nikah" class="form-control">
                      <option>-- Pilih --</option>
                      <option value="Menikah">Menikah</option>
                      <option value="Belum Menikah">Belum Menikah</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>                 
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
            </div>
          </div>
        </div>
      </div>

@section('js')
	<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- adminlte App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- adminlte for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
<!-- page script -->
 <script>
	$(function() {
	    $('#dataTable').DataTable({
	        processing: true,
	        serverSide: true,
	        responsive: true,
	        ajax: '{!! route('penduduk-data') !!}',
	        columns: [
	            {data: 'DT_RowIndex', orderable: false, searchable: false},
	            { data: 'nik', name: 'nik' },
	            { data: 'nama', name: 'nama' },
	            { data: 'pekerjaan', name: 'pekerjaan' },
	            { data: 'aksi', name: 'aksi', className: 'text-center' }
	        ]
	    });
	});
</script>

<script>
	$('#edit').on('show.bs.modal', function(event){
	    var row = $(event.relatedTarget);
	    var id = row.data('id');
	    var nik = row.data('nik');
	    var nama = row.data('nama');
	    var no_kk = row.data('no_kk');
	    var alamat = row.data('alamat');
	    var tempat_lahir = row.data('tempat_lahir');
	    var tgl_lahir = row.data('tgl_lahir');
	    var status_nikah= row.data('status_nikah');
	    var jenis_kelamin = row.data('jenis_kelamin');
	    var agama = row.data('agama');
	    var pekerjaan = row.data('pekerjaan');
	    var no_hp = row.data('no_hp');
	    $('#id').val(id);
	    $('#nik').val(nik);
	    $('#nama').val(nama);
	    $('#no_kk').val(no_kk);
	    $('#alamat').val(alamat);
	    $('#tempat_lahir').val(tempat_lahir);
	    $('#tgl_lahir').val(tgl_lahir);
	    $('#status_nikah').val(status_nikah);
	    $('#jenis_kelamin').val(jenis_kelamin);
	    $('#agama').val(agama);
	    $('#pekerjaan').val(pekerjaan);
	    $('#no_hp').val(no_hp);
	});
</script>

<script>
  $('#view').on('show.bs.modal', function(event){
      var row = $(event.relatedTarget);
      var id = row.data('id');
      var nik = row.data('nik');
      var nama = row.data('nama');
      var no_kk = row.data('no_kk');
      var alamat = row.data('alamat');
      var tempat_lahir = row.data('tempat_lahir');
      var tgl_lahir = row.data('tgl_lahir');
      var status_nikah= row.data('status_nikah');
      var jenis_kelamin = row.data('jenis_kelamin');
      var agama = row.data('agama');
      var pekerjaan = row.data('pekerjaan');
      var no_hp = row.data('no_hp');
      $('#id-view').val(id);
      $('#nik-view').val(nik);
      $('#nama-view').val(nama);
      $('#no_kk-view').val(no_kk);
      $('#alamat-view').val(alamat);
      $('#tempat_lahir-view').val(tempat_lahir);
      $('#tgl_lahir-view').val(tgl_lahir);
      $('#status_nikah-view').val(status_nikah);
      $('#jenis_kelamin-view').val(jenis_kelamin);
      $('#agama-view').val(agama);
      $('#pekerjaan-view').val(pekerjaan);
      $('#no_hp-view').val(no_hp);
  });
</script>

<script>
$(document).on("click", ".hapus", function (e) {
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
        $.post( "{{url('penduduk/hapus')}}/"+id, { "_token": "{{ csrf_token() }}" })
        Swal.fire(
          'Terhapus!',
          'Data berhasil dihapus.',
          'success'
        )
        location.reload()
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
@endsection