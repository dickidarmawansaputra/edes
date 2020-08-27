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
		Master Data Penanggung Jawab
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
            <th>NIP</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
          <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jabatan</th>
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
              <h4 class="modal-title">Tambah Data Penanggung Jawab</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('pj-store') }}" method="post">
              @csrf
              	 <div class="form-group">
                    <label for="NIP">NIP</label>
                    <input type="text" class="form-control" name="nip" value="">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                  </div>
                  <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" placeholder="Nama">
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
              <form action="{{ route('pj-update') }}" method="post">
              @csrf
              @method('PUT')
              	 <input type="hidden" name="id" id="id" value="">
                 <div class="form-group">
                    <label for="NIP">NIP</label>
                    <input type="text" class="form-control" name="nip" id="nip" value="">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
                  </div>
                  <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Nama">
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
	        ajax: '{!! route('pj-data') !!}',
	        columns: [
	            {data: 'DT_RowIndex', orderable: false, searchable: false},
	            { data: 'nip', name: 'nip' },
	            { data: 'nama', name: 'nama' },
	            { data: 'jabatan', name: 'jabatan' },
	            { data: 'aksi', name: 'aksi', className: 'text-center' }
	        ]
	    });
	});
</script>

<script>
	$('#edit').on('show.bs.modal', function(event){
	    var row = $(event.relatedTarget);
	    var id = row.data('id');
	    var nip = row.data('nip');
	    var nama = row.data('nama');
	    var jabatan = row.data('jabatan');
	    $('#id').val(id);
	    $('#nip').val(nip);
	    $('#nama').val(nama);
	    $('#jabatan').val(jabatan);
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