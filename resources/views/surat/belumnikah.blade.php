<!DOCTYPE html>
<html>
<head>
	<title>Surat Keterangan Belum Pernah Menikah</title>
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
					{{ strtoupper(Helper::pengaturan('kabupaten')->value) }}<br>
					{{ strtoupper(Helper::pengaturan('kecamatan')->value) }}
				</h2>
				<h1 style="margin-left: -250px; margin-top: -10px; text-align: center;">
					{{ strtoupper(Helper::pengaturan('desa')->value) }}
				</h1>
			</td>
		</tr>
	</table>
	<div class="format">
		<p style="text-align: center; font-weight: bold; margin-top: -10px;">
			{{ ucfirst(Helper::pengaturan('alamat')->value) }}
		</p>
		<hr style="margin-top: -10px; border: 1px solid black;">
		<h3 style="text-align: center;"><u>{{ strtoupper($data->jenis_surat) }}</u></h3>
		<p style="text-align: center; margin-top: -10px;">Nomor: 400/{{ $data->nomor_surat }}/2005/Pem/{{ date('Y') }}</p>
		<p>Yang bertanda tangan dibawah ini, Kepala Desa Permata, Kecamatan Terentang, Kabupaten Kubu Raya menerangkan bahwa:</p>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 39%;">1. Nama Lengkap</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;">{{ strtoupper($data->nama) }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">2. Jenis Kelamin</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;">{{ $data->jenis_kelamin }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">3. Tempat Tanggal Lahir</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;">{{ ucfirst($data->tempat_lahir) }}, {{ Carbon\Carbon::parse($data->tgl_lahir)->translatedFormat('d F Y') }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">4. Kewarganegaraan</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;">{{ $data->warga_negara }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">5. Status Perkawinan</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;">{{ $data->status_nikah }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">6. Pekerjaan</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;">{{ $data->pekerjaan }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">7. Agama</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;">{{ strtoupper($data->agama) }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">8. NIK</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;">{{ $data->nik }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">9. No KK</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;">{{ $data->no_kk }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">10. No KPS</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;">{{ $data->nomor_kps }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">11. Alamat</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;">{{ ucfirst($data->alamat) }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">12. Keterangan</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;"></td>
			</tr>
			<tr>
				<td style="width: 39%;"></td>
				<td style="width: 1%;" valign="top">-</td>
				<td style="width: 60%;">Bahwa nama tersebut benar penduduk di Desa Permata, Kecamatan Terentang, Kabupaten Kubu Raya.</td>
			</tr>
			<tr>
				<td style="width: 39%;"></td>
				<td style="width: 1%;" valign="top">-</td>
				<td style="width: 60%;">Bahwa yang namanya tersebut berkelakuan baik dan selama berdomisili di wilayah Desa Permata tidak pernah berurusan dengan pihak yang berwajib / Pihak Kepolisian.</td>
			</tr>
			<tr>
				<td style="width: 39%;"></td>
				<td style="width: 1%;" valign="top">-</td>
				<td style="width: 60%;">Yang bersangkutan benar belum pernah menikah.</td>
			</tr>
			<tr>
				<td style="width: 39%;"></td>
				<td style="width: 1%;" valign="top">-</td>
				<td style="width: 60%;">{{ ucfirst($data->keterangan) }}</td>
			</tr>
		</table>
		<p>Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
		<table cellspacing="0" cellpadding="0">
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
		<br><br>
		<table cellspacing="0" cellpadding="0">
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
		
	</div>
</body>
</html>