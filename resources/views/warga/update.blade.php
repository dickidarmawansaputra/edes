@extends('layouts.app')
@section('title')
	Data Warga
@endsection
@section('content')
	<div class="main-content-inner">
	    
	    <!-- overview area start -->
	    <div class="row">
	    	<div class="col-12 mt-5">
	            <div class="card">
	            	<div class="card-header">
	            		<h5 class="modal-title">Edit Data Warga</h5>
	            	</div>
	                <div class="card-body">
	                    <form action="{{ route('warga-update') }}" method="post">
                            		@method('put')
                            		@csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                               	<div class="form-group">
		                            <label for="example-text-input" class="col-form-label">NIK</label>
		                            <input class="form-control" type="text" value="{{ $data->nik }}" id="nik" name="nik">
		                        </div>
		                        <div class="form-group">
		                            <label for="example-text-input" class="col-form-label">No KK</label>
		                            <input class="form-control" type="text" value="{{ $data->no_kk }}" id="no_kk" name="no_kk">
		                        </div>
		                        <div class="form-group">
		                            <label for="example-text-input" class="col-form-label">Nama Lengkap</label>
		                            <input class="form-control" type="text" value="{{ $data->nama }}" id="nama" name="nama">
		                        </div>
		                        <div class="form-group">
		                            <label for="example-text-input" class="col-form-label">Tempat Lahir</label>
		                            <input class="form-control" type="text" value="{{ $data->tempat_lahir }}" id="tempat_lahir" name="tempat_lahir">
		                        </div>
		                        <div class="form-group">
		                            <label for="example-text-input" class="col-form-label">Tanggal Lahir</label>
		                            <input class="form-control" type="text" value="{{ $data->tgl_lahir }}" id="tgl_lahir" name="tgl_lahir">
		                        </div>
		                        <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Nomor Telpon</label>
                                    <input class="form-control" type="text" value="{{ $data->no_hp }}" id="no_hp" name="no_hp">
                                </div>
		                        <div class="form-group">
		                            <label for="example-text-input" class="col-form-label">Alamat</label>
		                            <textarea class="form-control" id="alamat" cols="30" rows="10" name="alamat">{{ $data->alamat }}</textarea>
		                        </div>
                                <div class="form-group">
                                    <label class="col-form-label">Pekerjaan</label>
                                    <select id="pekerjaan" class="form-control" name="pekerjaan">
                                        <option>-- Pilih Pekerjaan --</option>
                                        <option <?php if ($data->pekerjaan == "PNS") { echo "selected"; } ?> value="PNS">PNS</option>
                                        <option <?php if ($data->pekerjaan == "Wirausaha") { echo "selected"; } ?> value="Wirausaha">Wirasuasta</option>
                                        <option <?php if ($data->pekerjaan == "Lainnya") { echo "selected"; } ?> value="Lainnya">Lainnya ...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Agama</label>
                                    <select id="agama" class="form-control" name="agama">
                                        <option>-- Pilih Agama --</option>
                                        <option <?php if ($data->agama == "Islam") { echo "selected"; } ?> value="Islam">Islam</option>
                                        <option <?php if ($data->agama == "Kristen") { echo "selected"; } ?> value="Kristen">Kristen</option>
                                        <option <?php if ($data->agama == "Katolik") { echo "selected"; } ?> value="katolik">Katolik</option>
                                        <option <?php if ($data->agama == "Budha") { echo "selected"; } ?> value="Budha">Budha</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Status Pernikahan</label>
                                    <select id="status_pernikahan" name="status_pernikahan" class="form-control">
                                        <option>-- Pilih Status --</option>
                                        <option <?php if ($data->status_pernikahan == "Menikah") { echo "selected"; } ?> value="Menikah">Menikah</option>
                                        <option <?php if ($data->status_pernikahan == "Belum Menikah") { echo "selected"; } ?> value="Belum Menikah">Belum Menikah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Warga Negara</label>
                                    <select id="warga_negara" name="warga_negara" class="form-control">
                                        <option>-- Pilih Status --</option>
                                        <option <?php if ($data->warga_negara == "WNI") { echo "selected"; } ?> value="WNI">WNI</option>
                                        <option <?php if ($data->warga_negara == "WNA") { echo "selected"; } ?> value="WNA">WNA</option>
                                    </select>
                                </div>
                                <b class="text-muted mb-3 d-block">Jenis Kelamin</b>
                                <div class="custom-control custom-radio">
                                    <input type="radio" <?php if ($data->j_kel == "laki-laki") { echo "checked";} ?> id="j_kel" name="j_kel" value="laki-laki" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">Laki-laki</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" <?php if ($data->j_kel == "perampuan") { echo "checked";} ?> id="j_kel" name="j_kel" value="perampuan" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            </form>
	                </div>
	            </div>
            </div>    
	    </div>
	</div>

	<<!-- div class="col-lg-6 mt-5">
        <div class="card">
            <div class="card-body">
                <div id="edit" class="modal fade bd-example-modal-lg">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Data Warga</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                            	
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div> -->
@endsection
