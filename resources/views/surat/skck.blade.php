<!DOCTYPE html>
<html>
<head>
	<title>Surat Keterangan Catatan Kepolisian</title>
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
				<img src="{{ public_path() .'/terentang.png' }}" width="100">
			</td>
			<td>
				<h2 style="margin-left: -250px; text-align: center;">PEMERINTAH KABUPATEN KUBU RAYA<br>KECAMATAN TERENTANG</h2>
				<h1 style="margin-left: -250px; margin-top: -10px; text-align: center;">DESA PERMATA</h1>
			</td>
		</tr>
	</table>
	<div class="format">
		<p style="text-align: center; font-weight: bold; margin-top: -10px;">
			{{ ucfirst(Helper::pengaturan('alamat')->value) }}
		</p>
		<hr style="margin-top: -10px; border: 1px solid black;">
		<h3 style="text-align: center;"><u>{{ strtoupper($data->jenis_surat) }}</u></h3>
		<p style="text-align: center; margin-top: -10px;">Nomor: 400/{{ $data->nomor_surat }}/2005/Kantib/{{ date('Y') }}</p>
		<p>Yang bertanda tangan dibawah ini Kepala Desa Permata Kecamatan Terentang Kabupaten Kubu Raya dengan ini menerangkan kepada:</p>
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
				<td style="width: 60%;">{{ ucwords($data->tempat_lahir) }}, {{ Carbon\Carbon::parse($data->tgl_lahir)->translatedFormat('d F Y') }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">4. Agama</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;">{{ strtoupper($data->agama) }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">5. Kewarganegaraan</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;">{{ $data->warga_negara }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">6. Pekerjaan</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;">{{ ucfirst($data->pekerjaan) }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">7. Alamat</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;">{{ ucfirst($data->alamat) }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">8. Nomor NIK</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%;">{{ $data->nik }}</td>
			</tr>
			<tr>
				<td style="width: 39%;">9. Keperluan</td>
				<td style="width: 1%;">:</td>
				<td style="width: 60%; font-weight: bold;">Membuat SKCK (Surat Keterangan Catatan Kepolisian)</td>
			</tr>
		</table>
		<p><u>Keterangan lain-lain:</u></p>
		<ol type="a" style="text-align: justify;">
		  <li>Yang bersangkutan diatas adalah benar warga di wilayah Desa Permata, Kecamatan Terentang, Kabupaten Kubu Raya.</li>
		  <li>Bahwa yang bersangkutan diatas sampai saat ini selalu menunjukan berkelakuan baik.</li>
		  <li>Diberikan keterngan ini guna untuk mengajukan permohonan pembuatan <b>Surat Keterangan Catatan Kepolisian</b></li>
		</ol>
		<p>Demikian surat ini dibuat dan dipergunakan seperlunya, atas perhatiannya diucapkan terima kasih.</p>
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