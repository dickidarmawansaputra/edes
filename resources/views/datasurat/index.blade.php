@extends('layouts.app')
@section('title', 'Data Surat')
@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
            <!-- surat kelahiran -->
            <div class="col-md-12">
              <div class="form-group">
                <label>Jenis Surat</label>
                <select name="jenis_surat_id" id="jenis_surat" class="form-control" required>
                  <option selected disabled>Pilih</option>
                  <?php foreach ($jenis_surat as $key => $value): ?>
                  <option value="{{ $value->id }}">{{ $value->jenis }}</option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="surat-kelahiran" style="display: none;">
              <form action="{{ route('datasurat.storeKelahiran') }}" id="surat-kelahiran" method="post">
                @csrf
                <div class="row">
                <!--   <div class="col-md-12">
                     <div class="form-group">
                      <label>Jenis Surat</label>
                      <select name="jenis_surat_id" id="jns_surat-kelahiran" class="form-control" required>
                        <option disabled>Pilih</option>
                        <?php foreach ($jenis_surat as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->jenis }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div> -->
                  <div class="hide">
                    <input type="hidden" name="jenis_surat_id" class="hidden_id">
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Anak</label>
                        <input type="text" class="form-control" id="nama_anak-kelahiran" name="nama_anak" placeholder="Nama Anak">
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select id="jns_kelamin-kelahiran" name="jenis_kelamin" class="form-control">
                            <option disabled>Pilih</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Laki-laki">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Tempat dilahirkan</label>
                        <select name="tempat_dilahirkan" id="tempat_dilahirkan" class="form-control">
                            <option disabled>Pilih</option>
                            <option value="RS/RB">RS/RB</option>
                            <option value="Puskesmas">Puskesmas</option>
                            <option value="Polindes">Polindes</option>
                            <option value="Rumah">Rumah</option>
                            <option value="Lainnnya">Lainnnya</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Tempat Kelahiran</label>
                        <input type="text" class="form-control" id="tempat_kelahiran" name="tempat_lahir" placeholder="Tempat Kelahiran">
                      </div>
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" id="hari_tgl_lahir" name="hari_tgl_lahir">
                      </div>
                      <div class="form-group">
                        <label>Pukul</label>
                        <input type="text" class="form-control" id="pukul-kelahiran" name="pukul">
                      </div>
                      <div class="form-group">
                        <label>Kebangsaan</label>
                        <input type="text" class="form-control" id="" name="kebangsaan">
                      </div>
                      <div class="form-group">
                        <label>NIK Ayah</label>
                        <select name="ayah_id" class="form-control select2bs4" id="nik-ayah-kelahiran" required style="width: 100%;">
                          <option selected disabled>Pilih</option>
                          <?php foreach ($penduduk as $key => $value): ?>
                          <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Pelapor</label>
                        <select name="pelapor_id" class="form-control select2bs4" id="nik-pelapor-kelahiran" required style="width: 100%;">
                          <option disabled>Pilih</option>
                          <?php foreach ($penduduk as $key => $value): ?>
                          <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                          <?php endforeach ?>
                        </select>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Jenis Kelahiran</label>
                        <select name="jenis_kelahiran" id="jenis_kelahiran" class="form-control">
                            <option disabled>Pilih</option>
                            <option value="Tunggal">Tunggal</option>
                            <option value="Kembar">Kembar</option>
                            <option value="Kembar 3">Kembar 3</option>
                            <option value="Lainnnya">Lainnnya</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Kelahiran Ke</label>
                        <input type="text" class="form-control" id="anak_ke" name="anak_ke"placeholder="Kelahiran Ke -">
                      </div>
                      <div class="form-group">
                        <label>Penolong Kelahiran</label>
                        <select name="penolong_kelahiran" id="penolong_kelahiran" class="form-control">
                            <option disabled>Pilih</option>
                            <option value="Dokter">Dokter</option>
                            <option value="Perawat/Bidan">Perawat/Bidan</option>
                            <option value="Dukun">Dukun</option>
                            <option value="Lainnnya">Lainnnya</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Berat</label>
                        <input type="text" class="form-control" id="berat_bayi" name="berat_bayi"placeholder="Berat dalam (Kg)">
                      </div>
                      <div class="form-group">
                        <label>Panjang</label>
                        <input type="text" class="form-control" id="panjang_bayi" name="panjang_bayi" placeholder="Panjang dalam (Cm)">
                      </div>
                      <div class="form-group">
                        <label>NIK Ibu</label>
                        <select name="ibu_id" class="form-control select2bs4" id="nik-ibu-kelahiran" required style="width: 100%;">
                          <option disabled>Pilih</option>
                          <?php foreach ($penduduk as $key => $value): ?>
                          <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->nama }}</option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Saksi</label>
                        <select name="saksi_satu_id" class="form-control select2bs4" id="saksi1-kelahiran" required style="width: 100%;">
                          <option disabled>Pilih</option>
                          <?php foreach ($penduduk as $key => $value): ?>
                          <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Saksi</label>
                        <select name="saksi_dua_id" class="form-control select2bs4" id="saksi2-kelahiran" required style="width: 100%;">
                          <option disabled>Pilih</option>
                          <?php foreach ($penduduk as $key => $value): ?>
                          <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                          <?php endforeach ?>
                        </select>
                      </div>
                  </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
              </form>
            </div>
            <!-- surat kelahiran --> 

            <!-- surat kematian -->
            <div class="surat-kematian" style="display: none;">
              <form action="{{ route('datasurat.storeKematian') }}" method="post">
              @csrf
              <div class="row">
                <!-- <div class="col-md-12">
                   <div class="form-group">
                    <label>Jenis Surat</label>
                    <select name="jenis_surat_id" id="jns_surat-kematian" class="form-control" required>
                      <option disabled>Pilih</option>
                      <?php foreach ($jenis_surat as $key => $value): ?>
                      <option value="{{ $value->id }}">{{ $value->jenis }}</option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div> -->
                <div class="hide">
                    <input type="hidden" name="jenis_surat_id" class="hidden_id">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>NIK Jenazah</label>
                      <select name="jenazah_id" class="form-control select2bs4" id="nik-jenazah" required style="width: 100%;">
                        <option disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Anak Ke -</label>
                      <input type="text" class="form-control" id="" name="anak_ke" placeholder="Nama Anak">
                    </div>
                    <div class="form-group">
                      <label>Pukul</label>
                      <input type="text" class="form-control" id="" name="pukul" placeholder="waktu kematian">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Kematian</label>
                      <input type="date" class="form-control" id="tgl_lahir_bayi" name="tgl_kematian">
                    </div>
                    <div class="form-group">
                      <label>Sebab Kematian</label>
                      <input type="text" class="form-control" id="" name="sebab_kematian"placeholder="Penyebab Kematian">
                    </div>
                    <div class="form-group">
                      <label>Yang Menerangkan</label>
                      <select name="menerangkan" class="form-control select2bs4" id="" required>
                        <option disabled>Pilih</option>
                        <option value="Dokter">Dokter</option>
                        <option value="Tenaga Kesehatan">Tenaga Kesehatan</option>
                        <option value="Kepolisian">Kepolisian</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Tempat Kematian</label>
                      <input type="text" class="form-control" id="" name="tempat_kematian"placeholder="Tempat Kematian">
                    </div>
                    <div class="form-group">
                      <label>Pelapor</label>
                      <select name="pelapor_id" class="form-control select2bs4" id="nik-pelapor" required style="width: 100%;">
                        <option disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>NIK Ayah</label>
                      <select name="ayah_id" class="form-control select2bs4" id="nik-ayah" required style="width: 100%;">
                        <option disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>NIK Ibu</label>
                      <select name="ibu_id" class="form-control select2bs4" id="nik-ibu" required style="width: 100%;">
                        <option disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Saksi Satu</label>
                      <select name="saksi_satu_id" class="form-control select2bs4" id="saksi1" required style="width: 100%;">
                        <option disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Saksi Dua</label>
                      <select name="saksi_dua_id" class="form-control select2bs4" id="saksi2" required style="width: 100%;">
                        <option disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Simpan</button>
              </form>
            </div>
            <!-- surat kematian --> 

            <!-- surat izin orang tua -->
            <div class="surat-izinortu" style="display: none;">
              <form action="{{ route('datasurat.storeIzinortu') }}" method="post">
              @csrf
              <div class="row">
                <!-- <div class="col-md-12">
                   <div class="form-group">
                    <label>Jenis Surat</label>
                    <select name="jenis_surat_id" id="jns_surat-izin" class="form-control" required>
                      <option disabled>Pilih</option>
                      <?php foreach ($jenis_surat as $key => $value): ?>
                      <option value="{{ $value->id }}">{{ $value->jenis }}</option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div> -->
                <div class="hide">
                    <input type="hidden" name="jenis_surat_id" class="hidden_id">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>NIK Ayah</label>
                      <select name="ayah_id" class="form-control select2bs4" id="nik-izinayah" required style="width: 100%;">
                        <option selected disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>NIK Ibu</label>
                      <select name="ibu_id" class="form-control select2bs4" id="nik-izinibu" required style="width: 100%;">
                        <option selected disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>NIK Calon Istri</label>
                      <select name="istri_id" class="form-control select2bs4" id="nik-" required style="width: 100%;">
                        <option selected disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>NIK Calon Suami</label>
                      <select name="suami_id" class="form-control select2bs4" id="nik-" required style="width: 100%;">
                        <option selected disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                </div>
              </div>
               <button type="submit" class="btn btn-primary btn-block">Simpan</button>
              </form>
            </div>
            <!-- surat izin orang tua --> 

            <!-- surat Persetujuan -->
            <div class="surat-persetujuan" style="display: none;">
              <form action="{{ route('datasurat.storePersetujuan') }}" method="post">
              @csrf
              <div class="row">
                <!-- <div class="col-md-12">
                   <div class="form-group">
                    <label>Jenis Surat</label>
                    <select name="jenis_surat_id" id="jns_surat-persetujuan" class="form-control" required>
                      <option selected disabled>Pilih</option>
                      <?php foreach ($jenis_surat as $key => $value): ?>
                      <option value="{{ $value->id }}">{{ $value->jenis }}</option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div> -->
                <div class="hide">
                    <input type="hidden" name="jenis_surat_id" class="hidden_id">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>NIK Calon Suami</label>
                      <select name="suami_id" class="form-control select2bs4" id="nik-cami" required style="width: 100%;">
                        <option selected disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>NIK Ayah</label>
                      <select name="penduduk_id" class="form-control select2bs4" id="nik-cami" required style="width: 100%;">
                        <option selected disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>NIK Calon Istri</label>
                      <select name="istri_id" class="form-control select2bs4" id="nik-castri" required style="width: 100%;">
                        <option selected disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>NIK Ayah</label>
                      <select name="ayah_id" class="form-control select2bs4" id="nik-castri" required style="width: 100%;">
                        <option selected disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                </div>
              </div>
               <button type="submit" class="btn btn-primary btn-block">Simpan</button>
              </form>
            </div>
            <!-- surat persetujuan -->

            <!-- surat untuk menikah -->
            <div class="surat-nikah" style="display: none;">
              <form action="{{ route('datasurat.storeNikah') }}" method="post">
              @csrf
              <div class="row">
                <!-- <div class="col-md-12">
                   <div class="form-group">
                    <label>Jenis Surat</label>
                    <select name="jenis_surat_id" id="jns_surat-nikah" class="form-control" required>
                      <option selected disabled>Pilih</option>
                      <?php foreach ($jenis_surat as $key => $value): ?>
                      <option value="{{ $value->id }}">{{ $value->jenis }}</option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div> -->
                <div class="hide">
                    <input type="hidden" name="jenis_surat_id" class="hidden_id">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>NIK Pemohon</label>
                      <select name="penduduk_id" class="form-control select2bs4" id="nik-cami" required style="width: 100%;">
                        <option selected disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nomor Surat</label>
                      <input type="text" class="form-control" id="" name="nomor_surat"placeholder="nomor Surat">
                    </div>
                    <div class="form-group">
                      <label>Nama Suami / Istri Terdahhulu</label>
                      <input type="text" class="form-control" id="" name="suami_istri_terdahulu"placeholder="Nama Suami / Istri Terdahulu">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>NIK Ayah</label>
                      <select name="ayah_id" class="form-control select2bs4" id="nik-castri" required style="width: 100%;">
                        <option selected disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>NIK Ibu</label>
                      <select name="ibu_id" class="form-control select2bs4" id="nik-castri" required style="width: 100%;">
                        <option selected disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Penanggung Jawab</label>
                      <select name="penanggung_jawab_id" id="penanggung_jawab_id-umum" class="form-control" required>
                        <option selected disabled>Pilih</option>
                        <?php foreach ($pj as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                </div>
              </div>
               <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
            </div>
            <!-- surat untuk menikah -->

            <!-- surat untuk menikah -->
            <div class="surat-pengantar" style="display: none;">
              <form action="{{ route('datasurat.storePengantar') }}" method="post">
              @csrf
              <div class="row">
                <!-- <div class="col-md-12">
                   <div class="form-group">
                    <label>Jenis Surat</label>
                    <select name="jenis_surat_id" id="jns_surat-pengantar" class="form-control" required>
                      <option selected disabled>Pilih</option>
                      <?php foreach ($jenis_surat as $key => $value): ?>
                      <option value="{{ $value->id }}">{{ $value->jenis }}</option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div> -->
                <div class="hide">
                    <input type="hidden" name="jenis_surat_id" class="hidden_id">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>NIK</label>
                      <select name="penduduk_id" class="form-control select2bs4" id="nik-cami" required style="width: 100%;">
                        <option selected disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nomor Surat</label>
                      <input type="text" class="form-control" id="" name="nomor_surat"placeholder="nomor Surat">
                    </div>
                    <div class="form-group">
                      <label>Lampiran Berkas</label>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="kelengkapan_photo" value="1" name="kelengkapan_photo">
                        <label for="kelengkapan_photo" class="custom-control-label">Pas Photo</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="kelengkapan_kk" value="1" name="kelengkapan_kk">
                        <label for="kelengkapan_kk" class="custom-control-label">Kartu Keluarga</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="kelengkapan_akte" value="1" name="kelengkapan_akte">
                        <label for="kelengkapan_akte" class="custom-control-label">Akte Kelahiran</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="kelengkapan_surat_nikah" value="1" name="kelengkapan_surat_nikah">
                        <label for="kelengkapan_surat_nikah" class="custom-control-label">Surat Nikah</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="kelengkapan_lain" value="1" name="kelengkapan_lain">
                        <label for="kelengkapan_lain" class="custom-control-label">Lainnya</label>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Penanggung Jawab</label>
                      <select name="penanggung_jawab_id" id="penanggung_jawab_id-umum" class="form-control" required>
                        <option selected disabled>Pilih</option>
                        <?php foreach ($pj as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nomor Rt</label>
                      <input type="text" class="form-control" id="" name="nomor_rt"placeholder="nomor Rt" width="50">
                    </div>
                    <div class="form-group">
                      <label>Nomor Rw</label>
                      <input type="text" class="form-control" id="" name="nomor_rw"placeholder="nomor RW" width="50">
                    </div>
                    
                </div>
              </div>
               <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
            </div>
            <!-- surat untuk menikah -->

            <!-- surat belum menikah -->
            <div class="surat-belumnikah" style="display: none;">
              <form action="{{ route('datasurat.storeBelumnikah') }}" method="post">
              @csrf
              <div class="row">
                <!-- <div class="col-md-12">
                   <div class="form-group">
                    <label>Jenis Surat</label>
                    <select name="jenis_surat_id" id="jns_surat-blmnikah" class="form-control" required>
                      <option selected disabled>Pilih</option>
                      <?php foreach ($jenis_surat as $key => $value): ?>
                      <option value="{{ $value->id }}">{{ $value->jenis }}</option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div> -->
                <div class="hide">
                    <input type="hidden" name="jenis_surat_id" class="hidden_id">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>NIK</label>
                      <select name="penduduk_id" class="form-control select2bs4" id="nik-cami" required style="width: 100%;">
                        <option selected disabled>Pilih</option>
                        <?php foreach ($penduduk as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nik }} {{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nomor Surat</label>
                      <input type="text" class="form-control" id="" name="nomor_surat"placeholder="nomor Surat">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Penanggung Jawab</label>
                      <select name="penanggung_jawab_id" id="penanggung_jawab_id-umum" class="form-control" required>
                        <option selected disabled>Pilih</option>
                        <?php foreach ($pj as $key => $value): ?>
                        <option value="{{ $value->id }}">{{ $value->nama }}</option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Nama Suami / Istri Terdahulu</label>
                      <input type="text" class="form-control" id="" name="suami_istri_terdahulu"placeholder="jika ada" width="50">
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" id="keterangan-umum" class="form-control" required=""></textarea>
                  </div>
                </div>
              </div>
               <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
            </div>
            <!-- surat belum menikah -->


            <!-- surat umum -->
            <div class="surat-umum">
              <form action="{{ route('datasurat.store') }}" id="surat-umum" method="post">
                @csrf
                <div class="row">
                <div class="hide">
                    <input type="hidden" name="jenis_surat_id" class="hidden_id">
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>NIK</label>
                    <select name="penduduk_id" class="form-control select2bs4" id="nik-umum" required style="width: 100%;">
                      <option selected disabled>Pilih</option>
                      <?php foreach ($penduduk as $key => $value): ?>
                      <option value="{{ $value->id }}">{{ $value->nik }}</option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="nama-umum" name="nama" disabled placeholder="Nama">
                  </div>
                  <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir-umum" name="tempat_lahir" disabled placeholder="Tempat Lahir">
                  </div>
                  <div class="form-group">
                    <label>No. HP</label>
                    <input type="number" class="form-control" id="no_hp-umum" name="no_hp" disabled placeholder="No. HP">
                  </div>
                  <div class="form-group">
                    <label>Agama</label>
                    <select name="agama" id="agama-umum" class="form-control" disabled>
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
                    <label>Warga Negara</label>
                    <select name="warga_negara" id="warga_negara-umum" class="form-control" disabled>
                      <option>Pilih</option>
                      <option>WNI</option>
                      <option>WNA</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Nomor KPS</label>
                    <input type="text" class="form-control" id="nomor_kps-umum" name="nomor_kps" disabled placeholder="Nomor KPS" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin-umum" class="form-control" disabled>
                      <option selected disabled>Pilih</option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>No. KK</label>
                    <input type="number" class="form-control" id="no_kk-umum" name="no_kk" disabled placeholder="No. KK">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir-umum" name="tgl_lahir" disabled>
                  </div>
                  <div class="form-group">
                    <label>Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan-umum" name="pekerjaan" disabled placeholder="Pekerjaan">
                  </div>
                  <div class="form-group">
                    <label>Status Nikah</label>
                    <select name="status_nikah" id="status_nikah-umum" class="form-control" disabled>
                      <option selected disabled>Pilih</option>
                      <option value="Belum Kawin">Belum Kawin</option>
                      <option value="Sudah Kawin">Sudah Kawin</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Penanggung Jawab</label>
                    <select name="penanggung_jawab_id" id="penanggung_jawab_id-umum" class="form-control" required>
                      <option selected disabled>Pilih</option>
                      <?php foreach ($pj as $key => $value): ?>
                      <option value="{{ $value->id }}">{{ $value->nama }}</option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>No Surat</label>
                    <input type="text" class="form-control" id="nomor_surat-umum" name="nomor_surat" required placeholder="No Surat">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" id="alamat-umum" class="form-control" disabled></textarea>
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="Keterangan" id="keterangan-umum" class="form-control" required=""></textarea>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
              </div>  
              </form>
            </div>
            <!-- surat umum -->
    </div>
    <div class="card-footer"></div>
  </div>
</section>
@endsection
@section('js')
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
  $(document).on('change', '#jenis_surat', function() {
    if (this.value == 4) {
      $('.surat-kematian').show();
      $('.hidden_id').val(this.value);
      $('.surat-kelahiran').hide();
      $('.surat-izinortu').hide();
      $('.surat-persetujuan').hide();
      $('.surat-umum').hide();
      $('.surat-nikah').hide();
      $('.surat-pengantar').hide();
      $('.surat-belumnikah').hide();
    } else if(this.value == 5) {
      $('.surat-kelahiran').show();
      $('.hidden_id').val(this.value);
      $('.surat-izinortu').hide();
      $('.surat-kematian').hide();
      $('.surat-persetujuan').hide();
      $('.surat-umum').hide();
      $('.surat-nikah').hide();
      $('.surat-pengantar').hide();
      $('.surat-belumnikah').hide();
    } else if(this.value == 11){
      $('.surat-izinortu').show();
      $('.hidden_id').val(this.value);
      $('.surat-kematian').hide();
      $('.surat-kelahiran').hide();
      $('.surat-persetujuan').hide();
      $('.surat-umum').hide();
      $('.surat-nikah').hide();
      $('.surat-pengantar').hide();
      $('.surat-belumnikah').hide();
    } else if(this.value == 10){
      $('.surat-persetujuan').show();
      $('.hidden_id').val(this.value);
      $('.surat-izinortu').hide();
      $('.surat-kematian').hide();
      $('.surat-kelahiran').hide();
      $('.surat-nikah').hide();
      $('.surat-umum').hide();
      $('.surat-pengantar').hide();
      $('.surat-belumnikah').hide();
    } else if(this.value == 8){
      $('.surat-nikah').show();
      $('.hidden_id').val(this.value);
      $('.surat-persetujuan').hide();
      $('.surat-izinortu').hide();
      $('.surat-kematian').hide();
      $('.surat-kelahiran').hide();
      $('.surat-umum').hide()
      $('.surat-pengantar').hide();
      $('.surat-belumnikah').hide();
    } else if(this.value == 9){
      $('.surat-pengantar').show();
      $('.hidden_id').val(this.value);
      $('.surat-nikah').hide();
      $('.surat-persetujuan').hide();
      $('.surat-izinortu').hide();
      $('.surat-kematian').hide();
      $('.surat-kelahiran').hide();
      $('.surat-umum').hide()
      $('.surat-belumnikah').hide();
    } else if(this.value == 2){
      $('.surat-belumnikah').show();
      $('.hidden_id').val(this.value);
      $('.surat-pengantar').hide();
      $('.surat-nikah').hide();
      $('.surat-persetujuan').hide();
      $('.surat-izinortu').hide();
      $('.surat-kematian').hide();
      $('.surat-kelahiran').hide();
      $('.surat-umum').hide()
    } else {
      $('.surat-umum').show();
      $('.hidden_id').val(this.value);
      $('.surat-persetujuan').hide();
      $('.surat-izinortu').hide();
      $('.surat-kematian').hide();
      $('.surat-kelahiran').hide();
      $('.surat-nikah').hide();
      $('.surat-pengantar').hide();
      $('.surat-belumnikah').hide();
    }
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
  $(document).on('change', '#nik-umum', function() {
        var id = $('#nik-umum option:selected').val();
        $.ajax({
            url : "{{ route('datasurat') }}/detail/"+id,
            type : "GET",
            datatype : "JSON",
            success : function(data,id){
                // console.log(data,id)
              $('#nama-umum').val(data.nama)
              $('#no_kk-umum').val(data.no_kk)
              $('#tgl_lahir-umum').val(data.tgl_lahir)
              $('#pekerjaan-umum').val(data.pekerjaan)
              $('#status_nikah-umum').val(data.status_nikah).trigger('change')
              $('#agama-umum').val(data.agama).trigger('change')
              $('#no_hp-umum').val(data.no_hp)
              $('#tempat_lahir-umum').val(data.tempat_lahir)
              $('#warga_negara-umum').val(data.warga_negara).trigger('change')
              $('#nomor_kps-umum').val(data.nomor_kps).trigger('change')
              $('#alamat-umum').val(data.alamat)
              $('#jenis_kelamin-umum').val(data.jenis_kelamin).trigger('change')
            }
        });
  });
</script>


@endsection