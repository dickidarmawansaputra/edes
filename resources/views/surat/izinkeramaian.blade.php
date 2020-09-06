<!DOCTYPE html>
<html>
<head>
	<title>Surat Izin Keramaian</title>
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
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 20%;">Nomor</td>
				<td style="width: 1%;">:</td>
				<td style="width: 79%;">300/{{ $data->nomor_surat }}/2005/{{ date('Y') }}/Kantib</td>
			</tr>
			<tr>
				<td style="width: 20%;">Sifat</td>
				<td style="width: 1%;">:</td>
				<td style="width: 79%;">Biasa</td>
			</tr>
			<tr>
				<td style="width: 20%;">Lampiran</td>
				<td style="width: 1%;">:</td>
				<td style="width: 79%;">-</td>
			</tr>
			<tr>
				<td style="width: 20%;">Lampiran</td>
				<td style="width: 1%;">:</td>
				<td style="width: 79%;">Perihal/{{ ucwords(strtolower($data->jenis_surat)) }}</td>
			</tr>
		</table>
		<br>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 10%;"></td>
				<td style="width: 90%;">Kepada</td>
			</tr>
			<tr>
				<td style="width: 10%;">Yth.</td>
				<td style="width: 90%;">Bapak Ka Pol Sek Terentang</td>
			</tr>
			<tr>
				<td style="width: 10%;"></td>
				<td style="width: 90%;">Di -</td>
			</tr>
			<tr>
				<td style="width: 10%;"></td>
				<td style="width: 90%;"><u style="margin-left: 50px;">TERENTANG</u></td>
			</tr>
		</table>
		<p>Kepala Desa Permata Kecamatan Terentang Kabupaten Kubu Raya dengan ini memberikan pengantar kepada:</p>
		<table cellpadding="0" cellspacing="0" style="margin-left: 40px;">
			<tr>
				<td style="width: 30%;">1. Nama Lengkap</td>
				<td style="width: 1%;">:</td>
				<td style="width: 69%;">{{ strtoupper($data->nama) }}</td>
			</tr>
			<tr>
				<td style="width: 30%;">2. Jenis Kelamin</td>
				<td style="width: 1%;">:</td>
				<td style="width: 69%;">{{ $data->jenis_kelamin }}</td>
			</tr>
			<tr>
				<td style="width: 30%;">3. Tempat Tanggal Lahir</td>
				<td style="width: 1%;">:</td>
				<td style="width: 69%;">{{ ucfirst($data->tempat_lahir) }}, {{ Carbon\Carbon::parse($data->tgl_lahir)->format('d-m-Y') }}</td>
			</tr>
			<tr>
				<td style="width: 30%;">4. Kewarganegaraan</td>
				<td style="width: 1%;">:</td>
				<td style="width: 69%;">{{ $data->warga_negara }}</td>
			</tr>
			<tr>
				<td style="width: 30%;">5. Status Perkawinan</td>
				<td style="width: 1%;">:</td>
				<td style="width: 69%;">{{ $data->status_nikah }}</td>
			</tr>
			<tr>
				<td style="width: 30%;">6. Pekerjaan</td>
				<td style="width: 1%;">:</td>
				<td style="width: 69%;">{{ $data->pekerjaan }}</td>
			</tr>
			<tr>
				<td style="width: 30%;">7. Agama</td>
				<td style="width: 1%;">:</td>
				<td style="width: 69%;">{{ strtoupper($data->agama) }}</td>
			</tr>
			<tr>
				<td style="width: 30%;">8. NIK</td>
				<td style="width: 1%;">:</td>
				<td style="width: 69%;">{{ $data->nik }}</td>
			</tr>
			<tr>
				<td style="width: 30%;">9. No KK</td>
				<td style="width: 1%;">:</td>
				<td style="width: 69%;">{{ $data->no_kk }}</td>
			</tr>
			<tr>
				<td style="width: 30%;">10. Alamat Tempat Tinggal</td>
				<td style="width: 1%;">:</td>
				<td style="width: 69%;">{{ ucfirst($data->alamat) }}</td>
			</tr>
			<tr>
				<td style="width: 30%;">12. Maksud Tujuan</td>
				<td style="width: 1%;">:</td>
				<td style="width: 69%;"></td>
			</tr>
		</table>
		<ol type="a" style="margin-left: 45px;">
			<li>Bahwa nama tersebut diatas adalah benar-benar warga penduduk Desa Permata, dan sepanjang pengetahuan kami yang bersangkutan berkelakukan baik.</li>
			<li>{{ $data->keterangan }}</li>
		</ol>
		<p>Demikian surat keterangan itu kamu buat, selanjutnya untuk mendapatkan surat dan bantuan pengamanan yang dimaksud, sebelum dan sesudahnya diucapkan banya terima kasih.</p>
		<table cellspacing="0" cellpadding="0">
			<tr>
				<td style="width: 25%;"></td>
				<td style="width: 25%;"></td>
				<td style="width: 45%;">
					<p style="margin-left: 50px;">
						Dikeluarkan di&nbsp;: Permata <br>
						<u>Pada tanggal&nbsp;&nbsp;&nbsp;&nbsp;: {{ Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</u>
					</p>
					<p style="margin-top: -15px;">An,- &nbsp;&nbsp;&nbsp;&nbsp;Kepala Desa Permata</p>
					<p style="margin-left: 50px; margin-top: -15px;">Sekertaris Desa</p>
				</td>
				<td style="width: 5%;"></td>
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