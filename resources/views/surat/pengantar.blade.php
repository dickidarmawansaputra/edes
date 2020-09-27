<!DOCTYPE html>
<html>
<head>
	<title>Surat Pengantar</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style>
	.page-break {
	    page-break-after: always;
	}

	table {
		width: 100%;
	}

	.format {
		font-size: 12pt;
		line-height: 1;
	}
	</style>
</head>
<body>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td>
				<img src="{{ public_path() . Storage::url(Helper::pengaturan('logo')->value) }}" width="100">
			</td>
			<td>
				<h2 style="margin-left: -250px; text-align: center;">
					{{ strtoupper(Helper::pengaturan('kabupaten')->value) }}
				</h2>
				<h3 style="margin-left: -250px; margin-top: -10px; text-align: center;">
					RUKUN TETANGGA/RUKUN WARGA<br>
					{{ strtoupper(Helper::pengaturan('desa')->value) }}<br>
					{{ strtoupper(Helper::pengaturan('kecamatan')->value) }} KAB. KUBU RAYA
				</h3>
			</td>
		</tr>
	</table>
	<hr style="border: 1px solid black;">
	<div class="format">
		<h3 style="text-align: center;"><u>{{ strtoupper($data->jenis_surat) }}</u></h3>
		<p style="text-align: center; margin-top: -10px;">No: 148/{{ $data->nomor_surat }}/RT.{{ $data->nomor_rt }}/RW.{{ $data->nomor_rw }}/{{ date('Y') }}</p>
		<p>Diberikan keterangan ini kepada:</p>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 34%;">1. Nama Lengkap</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;"><b>{{ strtoupper($data->nama) }}</b></td>
			</tr>
			<tr>
				<td style="width: 34%;">2. Jenis Kelamin</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">{{ $data->jenis_kelamin }}</td>
			</tr>
			<tr>
				<td style="width: 34%;">3. Tempat Tanggal Lahir</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">{{ $data->tempat_lahir }}, {{ \Carbon\Carbon::parse($data->tgl_lahir)->translatedFormat('d F Y') }}</td>
			</tr>
			<tr>
				<td style="width: 34%;">4. Kewarganegaraan</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">{{ $data->warga_negara }}</td>
			</tr>
			<tr>
				<td style="width: 34%;">5. Agama</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">{{ $data->agama }}</td>
			</tr>
			<tr>
				<td style="width: 34%;">6. Pekerjaan</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">{{ $data->pekerjaan }}</td>
			</tr>
			<tr>
				<td style="width: 34%;">7. Tujuan yang bersangkutan</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">Pemerintah Desa Permata Kec. Terentang Kab. Kubu Raya</td>
			</tr>
			<tr>
				<td style="width: 34%;">8. NIK / No. KK</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">NIK: {{ $data->nik }} No. KK: {{ $data->no_kk }}</td>
			</tr>
			<tr>
				<td style="width: 34%;">9. Alamat</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">{{ ucfirst($data->alamat) }}</td>
			</tr>
			<tr>
				<td style="width: 34%;">10. Kelengkapan lainnya</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;"></td>
			</tr>
			<tr>
				<td style="width: 34%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. Kartu Keluarga</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">
					@if($data->kelengkapan_kk == 1)
					ADA
					@else
					-
					@endif
				</td>
			</tr>
			<tr>
				<td style="width: 34%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Surat Nikah</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">
					@if($data->kelengkapan_surat_nikah == 1)
					ADA
					@else
					-
					@endif
				</td>
			</tr>
			<tr>
				<td style="width: 34%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. Ijazah / Akte Kelahiran</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">
					@if($data->kelengkapan_akte == 1)
					ADA
					@else
					-
					@endif
				</td>
			</tr>
			<tr>
				<td style="width: 34%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d. Identitas Lainnya</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">
					@if($data->kelengkapan_lain == 1)
					ADA
					@else
					-
					@endif
				</td>
			</tr>
			<tr>
				<td style="width: 34%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e. Pas Foto Ukuran 3x4 2 Lb</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">
					@if($data->kelengkapan_photo == 1)
					ADA
					@else
					-
					@endif
				</td>
			</tr>
		</table>
		<p>Demikian surat pengantar ini diberikan kepada yang bersangkutan untuk dipergunakan sebagaimana mestinya.</p><br><br>
		<table cellspacing="0" cellpadding="0">
			<tr>
				<td style="width: 25%;"></td>
				<td style="width: 25%;"></td>
				<td style="width: 35%;">
					<p style="margin-left: 50px;">Permata, {{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</p>
					<p style="margin-top: -15px; margin-left: 50px;">Ketua RT.{{ $data->nomor_rt }} / RW.{{ $data->nomor_rw }}</p>
					<p style="margin-left: 50px; margin-top: -15px; font-size: 12px;">Cap</p>
				</td>
				<td style="width: 15%;"></td>
			</tr>
		</table>
		<br><br><br>
		<table border="0"cellspacing="0" cellpadding="0">
			<tr>
				<td style="width: 25%;"></td>
				<td style="width: 25%;"></td>
				<td style="width: 35%;">
					<p style="text-align: center;"><b>({{ strtoupper($data->nama_penjabat) }})</b></p>
				</td>
				<td style="width: 15%;"></td>
			</tr>
		</table>
	</div>
</body>
</html>