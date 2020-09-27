<!DOCTYPE html>
<html>
<head>
	<title>Surat Izin Orang Tua</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style>
	.page-break {
	    page-break-after: always;
	}
	table {
		width: 100%;
	}
	* {
		font-size: 12pt;
		line-height: 1;
	}
	</style>
</head>
<body>
	<h3 style="text-align: center;"><u>SURAT IZIN ORANG TUA</u></h3>
	<p>Yang bertanda tangan dibawah ini menerangkan dengan sesungguhnya bahwa:</p>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td style="width: 2%;">A.</td>
			<td style="width: 47%;">1. Nama Lengkap</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;"><b>{{ strtoupper($data->nama_ayah) }}</b></td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">2. Bin</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;"><b>{{ strtoupper($data->nama_ortu_ayah) }}</b></td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">3. NIK</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->nik_ayah }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">4. No KK</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->no_kk_ayah }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">5. Tempat Tanggal Lahir</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ ucwords($data->tempat_lahir_ayah) }}, {{ \Carbon\Carbon::parse($data->tgl_lahir_ayah)->translatedFormat('d F Y') }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">6. Warganegara</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->warga_negara_ayah }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">7. Agama</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->agama_ayah }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">8. Pekerjaan</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->pekerjaan_ayah }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">9. Alamat</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->alamat_ayah }}</td>
		</tr>
	</table>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td style="width: 2%;">B.</td>
			<td style="width: 47%;">1. Nama Lengkap</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;"><b>{{ strtoupper($data->nama_ibu) }}</b></td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">2. Binti</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;"><b>{{ strtoupper($data->nama_ortu_ibu) }}</b></td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">3. NIK</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->nik_ibu }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">4. No KK</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->no_kk_ibu }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">5. Tempat Tanggal Lahir</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ ucwords($data->tempat_lahir_ibu) }}, {{ \Carbon\Carbon::parse($data->tgl_lahir_ibu)->translatedFormat('d F Y') }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">6. Warganegara</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->warga_negara_ibu }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">7. Agama</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->agama_ibu }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">8. Pekerjaan</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->pekerjaan_ibu }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">9. Alamat</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->alamat_ibu }}</td>
		</tr>
	</table>
	<p>Adalah ayah dan ibu kandung dari</p>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">1. Nama Lengkap</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;"><b>{{ strtoupper($data->nama_istri) }}</b></td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">2. Binti</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;"><b>{{ strtoupper($data->nama_ayah) }}</b></td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">3. NIK</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->nik_istri }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">4. No KK</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->no_kk_istri }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">5. Tempat Tanggal Lahir</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ ucwords($data->tempat_lahir_istri) }}, {{ \Carbon\Carbon::parse($data->tgl_lahir_istri)->translatedFormat('d F Y') }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">6. Warganegara</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->warga_negara_istri }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">7. Agama</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->agama_istri }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">8. Pekerjaan</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->pekerjaan_istri }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">9. Alamat</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->alamat_istri }}</td>
		</tr>
	</table>
	<p>Memberikan izin kepada anak kami untuk melakukan perkawinan dengan:</p>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">1. Nama Lengkap</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;"><b>{{ strtoupper($data->nama_suami) }}</b></td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">2. Bin</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;"><b>{{ strtoupper($data->nama_ayah_suami) }}</b></td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">3. NIK</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->nik_suami }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">4. No KK</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->no_kk_suami }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">5. Tempat Tanggal Lahir</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ ucwords($data->tempat_lahir_suami) }}, {{ \Carbon\Carbon::parse($data->tgl_lahir_suami)->translatedFormat('d F Y') }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">6. Warganegara</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->warga_negara_suami }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">7. Agama</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->agama_suami }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">8. Pekerjaan</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->pekerjaan_suami }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">9. Alamat</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->alamat_suami }}</td>
		</tr>
	</table>
	<p>Demikian surat ini dibuat dengan kesadaran tanpa ada paksaan dari siapapun dan untuk digunakan seperlunya.</p>
	<br><br>
	<table cellspacing="0" cellpadding="0">
		<tr>
			<td style="width: 50%; text-align: center;"></td>
			<td style="width: 50%; text-align: center;">Permata, {{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</td>
		</tr>
		<tr>
			<td style="width: 50%; text-align: center;">Ayah</td>
			<td style="width: 50%; text-align: center;">Ibu</td>
		</tr>
		<tr>
			<td style="width: 50%; text-align: center;">{{ strtoupper($data->nama_ayah) }}</td>
			<td style="width: 50%; text-align: center;">{{ strtoupper($data->nama_ibu) }}</td>
		</tr>
	</table>
</body>
</html>