@extends('layouts.app')
@section('css')
	<!-- Start datatable css -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

 -->    <!-- style css -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('content')
	@section('title')
		Master Data Warga
	@endsection
	<!-- page title area end -->
	<div class="main-content-inner">
	    
	    <!-- overview area start -->
	    <div class="row">
	    	<div class="col-12 mt-5">
	            <div class="card">
	                <div class="card-body">
	                    <h4 class="header-title">Data Warga</h4>
	                    <button type="button" class="btn btn-primary mb-3" role="button" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Data</button>
	                    <div class="data-tables">
	                        <table id="dataTable" class="text-center">
	                            <thead class="bg-light text-capitalize">
	                                <tr>
	                                    <th>No.</th>
	                                    <th>NIK</th>
	                                    <th>Nama</th>
	                                    <th>Pekerjaan</th>
	                                    <th>Aksi</th>
	                                </tr>
	                            </thead>
	                        </table>
	                    </div>
	                </div>
	            </div>
            </div>    
	    </div>
	</div>
<!-- modal -->
	<div class="col-lg-6 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="modal fade bd-example-modal-lg">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Data Warga</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                            	<form action="{{ route('warga-store') }}" method="post">
                            		@csrf
                               	<div class="form-group">
		                            <label for="example-text-input" class="col-form-label">NIK</label>
		                            <input class="form-control" type="text" value="nik" id="example-text-input" name="nik">
		                        </div>
		                        <div class="form-group">
		                            <label for="example-text-input" class="col-form-label">No KK</label>
		                            <input class="form-control" type="text" value="Nomor Kartu Keluarga" id="example-text-input" name="no_kk">
		                        </div>
		                        <div class="form-group">
		                            <label for="example-text-input" class="col-form-label">Nama Lengkap</label>
		                            <input class="form-control" type="text" value="nama sesuai KTP" id="example-text-input" name="nama">
		                        </div>
		                        <div class="form-group">
		                            <label for="example-text-input" class="col-form-label">Tempat Lahir</label>
		                            <input class="form-control" type="text" value="Tempat Lahir" id="example-text-input" name="tempat_lahir">
		                        </div>
		                        <div class="form-group">
		                            <label for="example-text-input" class="col-form-label">Tanggal Lahir</label>
		                            <input class="form-control" type="text" value="Tempat Lahir" id="example-text-input" name="tgl_lahir">
		                        </div>
		                        <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Nomor Telpon</label>
                                    <input class="form-control" type="text" value="Nomor telpon aktif" id="example-date-input" name="no_hp">
                                </div>
		                        <div class="form-group">
		                            <label for="example-text-input" class="col-form-label">Alamat</label>
		                            <textarea class="form-control" id="" cols="30" rows="10" name="alamat"></textarea>
		                        </div>
                                <div class="form-group">
                                    <label class="col-form-label">Pekerjaan</label>
                                    <select class="form-control" name="pekerjaan">
                                        <option>-- Pilih Pekerjaan --</option>
                                        <option value="PNS">PNS</option>
                                        <option value="Wirausaha">Wirasuasta</option>
                                        <option>Lainnya ...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Agama</label>
                                    <select class="form-control" name="agama">
                                        <option>-- Pilih Agama --</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="katolik">Katolik</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Status Pernikahan</label>
                                    <select name="status_pernikahan" class="form-control">
                                        <option>-- Pilih Status --</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Warga Negara</label>
                                    <select name="warga_negara" class="form-control">
                                        <option>-- Pilih Status --</option>
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                    </select>
                                </div>
                                <b class="text-muted mb-3 d-block">Jenis Kelamin</b>
                                <div class="custom-control custom-radio">
                                    <input type="radio" checked id="customRadio1" name="j_kel" value="laki-laki" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">Laki-laki</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="j_kel" value="perampuan" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- endmodal -->

@section('js')
	<!-- Start datatable js -->
		<script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- App scripts -->

    <script>
		$(function() {
		    $('#dataTable').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '{!! route('data-warga') !!}',
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
	    var no_kk = row.data('no_kk');
	    var alamat = row.data('alamat');
	    var tempat_lahir = row.data('tempat_lahir');
	    var tgl_lahir = row.data('tgl_lahir');
	    var status_pernikahan = row.data('status_pernikahan');
	    var j_kel = row.data('j_kel');
	    var agama = row.data('agama');
	    var pekerjaan = row.data('pekerjaan');
	    var warga_negara = row.data('warga_negara');
	    var no_hp = row.data('no_hp');
	    $('#id').val(id);
	    $('#nik').val(nik);
	    $('#no_kk').val(no_kk);
	    $('#alamat').val(alamat);
	    $('#tempat_lahir').val(tempat_lahir);
	    $('#tgl_lahir').val(tgl_lahir);
	    $('#status_pernikahan').val(status_pernikahan);
	    $('#j_kel').val(j_kel);
	    $('#agama').val(agama);
	    $('#pekerjaan').val(pekerjaan);
	    $('#warga_negara').val(warga_negara);
	    $('#no_hp').val(no_hp);
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
				$.post( "{{url('warga/hapus')}}/"+id, { "_token": "{{ csrf_token() }}" })
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
@endsection
@endsection