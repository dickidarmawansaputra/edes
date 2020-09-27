<!DOCTYPE html>
<html>
<head>
	<title>Surat Persetujuan Mempelai</title>
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
	<h3 style="text-align: center;"><u>{{ strtoupper($data->jenis_surat) }}</u></h3>
	<p>Yang bertanda tangan dibawah ini:</p>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td style="width: 2%;">A.</td>
			<td style="width: 47%;">Calon Suami :</td>
			<td style="width: 1%;"></td>
			<td style="width: 50%;"></td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">1. Nama Lengkap dan Alias</td>
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
			<td style="width: 47%;">3. No. NIK</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->nik_suami }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">4. Tempat Tanggal Lahir</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ ucwords($data->tempat_lahir_suami) }}, {{ \Carbon\Carbon::parse($data->tgl_lahir_suami)->translatedFormat('d F Y') }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">5. Kewarganegaraan</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->warga_negara_suami }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">6. Agama</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->agama_suami }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">7. Pekerjaan</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->pekerjaan_suami }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">8. Alamat</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->alamat_suami }}</td>
		</tr>
	</table>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td style="width: 2%;">A.</td>
			<td style="width: 47%;">Calon Istri :</td>
			<td style="width: 1%;"></td>
			<td style="width: 50%;"></td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">1. Nama Lengkap dan Alias</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;"><b>{{ strtoupper($data->nama_istri) }}</b></td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">2. Bin</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;"><b>{{ strtoupper($data->nama_ayah_istri) }}</b></td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">3. No. NIK</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->nik_istri }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">4. Tempat Tanggal Lahir</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ ucwords($data->tempat_lahir_istri) }}, {{ \Carbon\Carbon::parse($data->tgl_lahir_istri)->translatedFormat('d F Y') }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">5. Kewarganegaraan</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->warga_negara_istri }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">6. Agama</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->agama_istri }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">7. Pekerjaan</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->pekerjaan_istri }}</td>
		</tr>
		<tr>
			<td style="width: 2%;"></td>
			<td style="width: 47%;">8. Alamat</td>
			<td style="width: 1%;">:</td>
			<td style="width: 50%;">{{ $data->alamat_istri }}</td>
		</tr>
	</table>
	<p>Menyatakan dengan sesungguhnya bahwa atas dasar suka rela, dengan kesadaran sendiri tanpa ada paksaan dari siapapun juga, setuju untuk melangsungkan perkawinan.</p>
	<p>Demikian surat keterangan ini untuk dipergunakan seperlunya.</p>
	<br><br>
	<table cellspacing="0" cellpadding="0">
		<tr>
			<td style="width: 50%; text-align: center;"></td>
			<td style="width: 50%; text-align: center;">Permata, {{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</td>
		</tr>
		<tr>
			<td style="width: 50%; text-align: center;">Calon Suami</td>
			<td style="width: 50%; text-align: center;">Calon Istri</td>
		</tr>
		<tr>
			<td style="width: 50%; text-align: center;">{{ strtoupper($data->nama_suami) }}</td>
			<td style="width: 50%; text-align: center;">{{ strtoupper($data->nama_istri) }}</td>
		</tr>
	</table>
</body>
</html>