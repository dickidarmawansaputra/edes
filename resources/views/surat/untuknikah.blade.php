<!DOCTYPE html>
<html>
<head>
	<title>Surat Keterangan Untuk Nikah</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style>
	.page-break {
	    page-break-after: always;
	}
	table {
		width: 100%;
	}

	* {
		line-height: 1;
	}
	</style>
</head>
<body>
	<table>
		<tr>
			<td>
				<img src="{{ public_path() . Storage::url(Helper::pengaturan('logo')->value) }}" width="100">
			</td>
			<td>
				<h2 style="margin-left: -250px; text-align: center;">
					{{ strtoupper(Helper::pengaturan('kabupaten')->value) }}<br>
					{{ strtoupper(Helper::pengaturan('kecamatan')->value) }}
				</h2>
				<h1 style="margin-left: -250px; margin-top: -10px; text-align: center;">
					{{ strtoupper(Helper::pengaturan('desa')->value) }}
				</h1>
			</td>
		</tr>
	</table>
	<p style="text-align: center; font-weight: bold; margin-top: -10px;">
		{{ ucfirst(Helper::pengaturan('alamat')->value) }}
	</p>
	<hr style="margin-top: -10px; border: 1px solid black;">
	<h3 style="text-align: center;"><u>{{ strtoupper($data->jenis_surat) }}</u></h3>
	<p style="text-align: center; margin-top: -10px;">No: 4742/{{ $data->nomor_surat }}/2005/Kesra/{{ date('Y') }}</p>
	<p>Yang bertanda tangan dibawah ini menjelaskan dengan sesungguhnya bahwa:</p>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td style="width: 40%;">1. Nama Lengkap dan Alias</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;"><b>{{ strtoupper($data->nama) }}</b></td>
		</tr>
		<tr>
			<td style="width: 40%;">2. NIK</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->nik }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">3. Jenis Kelamin</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->jenis_kelamin }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">4. Tempat Tanggal Lahir</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->tempat_lahir }}, {{ Carbon\Carbon::parse($data->tgl_lahir)->translatedFormat('d F Y') }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">5. Warga Negara</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->warga_negara }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">6. Pekerjaan</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->pekerjaan }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">7. Agama</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->agama }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">8. Alamat</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->alamat }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">9. Status Perkawinan</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;"></td>
		</tr>
		@if($data->jenis_kelamin == 'Laki-laki')
		<tr>
			<td style="width: 40%;">&nbsp;&nbsp;&nbsp;&nbsp;a. Laki-laki</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ ucfirst($data->status_nikah) }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">&nbsp;&nbsp;&nbsp;&nbsp;b. Perempuan</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">-</td>
		</tr>
		@else
		<tr>
			<td style="width: 40%;">&nbsp;&nbsp;&nbsp;&nbsp;a. Laki-laki</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">-</td>
		</tr>
		<tr>
			<td style="width: 40%;">&nbsp;&nbsp;&nbsp;&nbsp;b. Perempuan</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ ucfirst($data->status_nikah) }}</td>
		</tr>
		@endif
		<tr>
			<td style="width: 40%;">10. Nama Suami / Istri terdahulu</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">-</td>
		</tr>
		<tr>
			<td style="width: 40%;">Adalah benar anak dari perkawinan seorang pria</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;"></td>
		</tr>
		<tr>
			<td style="width: 40%;">1. Nama Lengkap dan Alias</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%; font-weight: bold;">{{ strtoupper($data->nama_ayah) }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">2. NIK</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->nik_ayah }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">3. Jenis Kelamin</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->jenis_kelamin_ayah }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">4. Tempat Tanggal Lahir</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->tempat_lahir_ayah }}, {{ \Carbon\Carbon::parse($data->tgl_lahir_ayah)->translatedFormat('d F Y') }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">5. Warga Negara</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->warga_negara_ayah }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">6. Pekerjaan</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->pekerjaan_ayah }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">7. Agama</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->agama_ayah }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">8. Alamat</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->alamat_ayah }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">Dengan seorang wanita</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;"></td>
		</tr>
		<tr>
			<td style="width: 40%;">1. Nama Lengkap dan Alias</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%; font-weight: bold;">{{ strtoupper($data->nama_ibu) }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">2. NIK</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->nik_ibu }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">3. Jenis Kelamin</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->jenis_kelamin_ibu }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">4. Tempat Tanggal Lahir</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->tempat_lahir_ibu }}, {{ \Carbon\Carbon::parse($data->tgl_lahir_ibu)->translatedFormat('d F Y') }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">5. Warga Negara</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->warga_negara_ibu }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">6. Pekerjaan</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->pekerjaan_ibu }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">7. Agama</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->agama_ibu }}</td>
		</tr>
		<tr>
			<td style="width: 40%;">8. Alamat</td>
			<td style="width: 2%;">:</td>
			<td style="width: 40%;">{{ $data->alamat_ibu }}</td>
		</tr>
	</table>
	<p>Demikian surat pengantar nikah ini dibuat dengan mengingat sumpah jabatan dan untuk dapat dipergunakan sebagaimana mestinya.</p><br><br>
	<table border="0"cellspacing="0" cellpadding="0">
		<tr>
			<td style="width: 25%;"></td>
			<td style="width: 25%;"></td>
			<td style="width: 35%;">
				<p style="margin-left: 50px;">Permata, {{ Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</p>
				<p style="margin-top: -15px;">An,- &nbsp;&nbsp;&nbsp;&nbsp;Kepala Desa Permata</p>
				<p style="margin-left: 50px; margin-top: -15px;">Sekertaris Desa</p>
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
				<p style="margin-left: 50px;"><u><b>{{ strtoupper($data->nama_penjabat) }}</b></u></p>
				<p style="margin-left: 50px; margin-top: -15px;">Nip: {{ $data->nip }}</p>
			</td>
			<td style="width: 15%;"></td>
		</tr>
	</table>
</body>
</html>