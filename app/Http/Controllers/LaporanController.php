<?php

namespace App\Http\Controllers;

use App\Models\DataSurat;
use Illuminate\Http\Request;
use DataTables;
use PDF;

class LaporanController extends Controller
{
    public function ketMiskin()
    {
    	return view('laporan.miskin');
    }

    public function dataMiskin()
    {
    	$data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
    			->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
    			->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
    			->where('data_surat.jenis_surat_id', 1)
    			->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat');
    	return Datatables::of($data)
    	    ->addColumn('aksi', function($data) {
    	        return '
    	        <a href="'.route('miskin.pdf', $data->id).'" target="_blank" class="btn btn-icon btn-danger btn-xs"><i class="fas fa-file-pdf"></i></a>';
    	    })
    	    ->addIndexColumn()
    	    ->rawColumns(['aksi'])
    	    ->make(true);
    }

    public function pdfMiskin($id)
    {
    	$data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
    			->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
    			->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
    			->where('data_surat.id', $id)
    			->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat')
    			->first();
    	$pdf = PDF::loadView('surat.miskin', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream('Surat Keterangan Miskin.pdf');
    }

    public function ketBelumMenikah()
    {
        return view('laporan.belumnikah');
    }

    public function dataBelumMenikah()
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.jenis_surat_id', 13)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat');
        return Datatables::of($data)
            ->addColumn('aksi', function($data) {
                return '
                <a href="'.route('miskin.pdf', $data->id).'" target="_blank" class="btn btn-icon btn-danger btn-xs"><i class="fas fa-file-pdf"></i></a>';
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function pdfBelumMenikah($id)
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $id)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat')
                ->first();
        $pdf = PDF::loadView('surat.miskin', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream('Surat Keterangan Belum Pernah Menikah.pdf');
    }

    public function ketKematian()
    {
        return view('laporan.kematian');
    }

    public function dataKematian()
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.jenis_surat_id', 9)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat');
        return Datatables::of($data)
            ->addColumn('aksi', function($data) {
                return '
                <a href="'.route('miskin.pdf', $data->id).'" target="_blank" class="btn btn-icon btn-danger btn-xs"><i class="fas fa-file-pdf"></i></a>';
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function pdfKematian($id)
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $id)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat')
                ->first();
        $pdf = PDF::loadView('surat.miskin', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream('Surat Keterangan Kematian.pdf');
    }

    public function ketKelahiran()
    {
        return view('laporan.kelahiran');
    }

    public function dataKelahiran()
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.jenis_surat_id', 8)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat');
        return Datatables::of($data)
            ->addColumn('aksi', function($data) {
                return '
                <a href="'.route('miskin.pdf', $data->id).'" target="_blank" class="btn btn-icon btn-danger btn-xs"><i class="fas fa-file-pdf"></i></a>';
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function pdfKelahiran($id)
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $id)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat')
                ->first();
        $pdf = PDF::loadView('surat.miskin', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream('Surat Keterangan Kelahiran.pdf');
    }

    public function ketDomisili()
    {
        return view('laporan.domisili');
    }

    public function dataDomisili()
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.jenis_surat_id', 2)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat');
        return Datatables::of($data)
            ->addColumn('aksi', function($data) {
                return '
                <a href="'.route('miskin.pdf', $data->id).'" target="_blank" class="btn btn-icon btn-danger btn-xs"><i class="fas fa-file-pdf"></i></a>';
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function pdfDomisili($id)
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $id)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat')
                ->first();
        $pdf = PDF::loadView('surat.miskin', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream('Surat Keterangan Domisili.pdf');
    }

    public function ketUsaha()
    {
        return view('laporan.usaha');
    }

    public function dataUsaha()
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.jenis_surat_id', 5)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat');
        return Datatables::of($data)
            ->addColumn('aksi', function($data) {
                return '
                <a href="'.route('miskin.pdf', $data->id).'" target="_blank" class="btn btn-icon btn-danger btn-xs"><i class="fas fa-file-pdf"></i></a>';
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function pdfUsaha($id)
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $id)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat')
                ->first();
        $pdf = PDF::loadView('surat.miskin', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream('Surat Keterangan Usaha.pdf');
    }

    public function ketUntukNikah()
    {
        return view('laporan.untuknikah');
    }

    public function dataUntukNikah()
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.jenis_surat_id', 5)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat');
        return Datatables::of($data)
            ->addColumn('aksi', function($data) {
                return '
                <a href="'.route('miskin.pdf', $data->id).'" target="_blank" class="btn btn-icon btn-danger btn-xs"><i class="fas fa-file-pdf"></i></a>';
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function pdfUntukNikah($id)
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $id)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat')
                ->first();
        $pdf = PDF::loadView('surat.miskin', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream('Surat Keterangan Untuk Nikah.pdf');
    }

    public function pengantar()
    {
        return view('laporan.pengantar');
    }

    public function dataPengantar()
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.jenis_surat_id', 5)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat');
        return Datatables::of($data)
            ->addColumn('aksi', function($data) {
                return '
                <a href="'.route('miskin.pdf', $data->id).'" target="_blank" class="btn btn-icon btn-danger btn-xs"><i class="fas fa-file-pdf"></i></a>';
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function pdfPengantar($id)
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $id)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat')
                ->first();
        $pdf = PDF::loadView('surat.miskin', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream('Surat Pengantar.pdf');
    }

    public function persetujuan()
    {
        return view('laporan.persetujuan');
    }

    public function dataPersetujuan()
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.jenis_surat_id', 5)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat');
        return Datatables::of($data)
            ->addColumn('aksi', function($data) {
                return '
                <a href="'.route('miskin.pdf', $data->id).'" target="_blank" class="btn btn-icon btn-danger btn-xs"><i class="fas fa-file-pdf"></i></a>';
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function pdfPersetujuan($id)
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $id)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat')
                ->first();
        $pdf = PDF::loadView('surat.miskin', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream('Surat Persetujuan Mempelai.pdf');
    }

    public function izinOrtu()
    {
        return view('laporan.izinortu');
    }

    public function dataIzinOrtu()
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.jenis_surat_id', 5)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat');
        return Datatables::of($data)
            ->addColumn('aksi', function($data) {
                return '
                <a href="'.route('miskin.pdf', $data->id).'" target="_blank" class="btn btn-icon btn-danger btn-xs"><i class="fas fa-file-pdf"></i></a>';
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function pdfIzinOrtu($id)
    {
        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $id)
                ->select('data_surat.id', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat')
                ->first();
        $pdf = PDF::loadView('surat.miskin', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream('Surat Izin Orang Tua.pdf');
    }
}
