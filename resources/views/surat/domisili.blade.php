<!DOCTYPE html>
<html>
<head>
	<title>Surat Keterangan Domisili</title>
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
	<p style="text-align: center; font-weight: bold; margin-top: -10px;">
		{{ ucfirst(Helper::pengaturan('alamat')->value) }}
	</p>
	<hr style="margin-top: -10px; border: 1px solid black;">
	<div class="format">
		<h3 style="text-align: center;"><u>{{ strtoupper($data->jenis_surat) }}</u></h3>
		<p style="text-align: center; margin-top: -10px;">Nomor: 100/{{ $data->nomor_surat }}/2005/{{ date('Y') }}/Pem</p>
		<p>Yang bertanda tangan dibawah ini, Kepala Desa Permata, Kecamatan Terentang, Kabupaten Kubu Raya menerangkan bahwa:</p>
		<table>
			<tr>
				<td style="width: 34%;">1. Nama Lengkap</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;"><b>{{ strtoupper($data->nama) }}</b></td>
			</tr>
			<tr>
				<td style="width: 34%;">2. Jenis Kelamin/NIK</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">{{ $data->jenis_kelamin }}/{{ $data->nik }}</td>
			</tr>
			<tr>
				<td style="width: 34%;">3. Tempat Tanggal Lahir</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">{{ $data->tempat_lahir }}, {{ $data->tgl_lahir }}</td>
			</tr>
			<tr>
				<td style="width: 34%;">4. Warga Negara</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">{{ $data->warga_negara }}</td>
			</tr>
			<tr>
				<td style="width: 34%;">5. Pekerjaan</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">{{ $data->pekerjaan }}</td>
			</tr>
			<tr>
				<td style="width: 34%;">6. Agama</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">{{ $data->agama }}</td>
			</tr>
			<tr>
				<td style="width: 34%;">7. Alamat</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">{{ $data->alamat }}</td>
			</tr>
			<tr>
				<td style="width: 34%;">8. Keperluan</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;">{{ ucfirst($data->keterangan) }}</td>
			</tr>
			<tr>
				<td style="width: 34%;">9 .Keterangan Lain-lain</td>
				<td style="width: 1%;">:</td>
				<td style="width: 65%;"></td>
			</tr>
		</table>
		<ol type="a" style="margin-left: 220px; margin-top: -2px;">
			<li>Bahwa yang nama diatas tersebut diatas adalah benar berdomisili sementara {{ ucwords($data->alamat)}}.</li>
			<li>Yang namanya tersebut diatas berkelakuan baik selama berdomisili di Wilayah Desa Permata Kecamatan Terentang Kabupaten Kubu Raya yang berhubungan dengan pihak yang berwajib/Kepolisian</li>
			<li>Diberikan surat keterangan ini guna pengganti KTP yang sedang diproses.</li>
		</ol>
		<p>Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
		<table border="0"cellspacing="0" cellpadding="0">
			<tr>
				<td style="width: 25%;"></td>
				<td style="width: 25%;"></td>
				<td style="width: 35%;">
					<p style="margin-left: 50px;">Permata, {{ Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</p>
					<p style="margin-top: -15px;">An,- &nbsp;&nbsp;&nbsp;&nbsp;Kepala Desa Permata</p>
					<p style="margin-left: 50px; margin-top: -15px;">Kasi Pemerintahan</p>
				</td>
				<td style="width: 15%;"></td>
			</tr>
		</table>
		<br><br>
		<table border="0"cellspacing="0" cellpadding="0">
			<tr>
				<td style="width: 25%;"></td>
				<td style="width: 25%;"></td>
				<td style="width: 35%;">
					<p style="margin-left: 50px;"><u><b>{{ ucwords($data->nama_penjabat) }}</b></u></p>
				</td>
				<td style="width: 15%;"></td>
			</tr>
		</table>
		
	</div>
</body>
</html>