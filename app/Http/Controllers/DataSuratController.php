<?php

namespace App\Http\Controllers;

use App\Models\DataSurat;
use App\Models\DataTambahan;
use App\Models\PenanggungJawab;
use App\Models\Penduduk;
use App\Models\Surat;
use DataTables;
use Illuminate\Http\Request;
use PDF;

class DataSuratController extends Controller
{
    public function index()
    {
        $penduduk = Penduduk::all();
        $pj = PenanggungJawab::all();
        $jenis_surat = Surat::all();

    	return view('datasurat.index', compact('penduduk', 'pj', 'jenis_surat'));
    }

    public function data()
    {

        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->select('data_surat.id', 'data_surat.nomor_surat', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat', 'jenis_surat_id', 'Keterangan', 'warga_negara')
                ->get();
    	return Datatables::of($data)
    	    ->addColumn('aksi', function($data) {
    	        return '
                
                <a href="'.route('datasurat.export',$data->id).'" class="btn btn-icon btn-danger btn-xs" data-id="'.$data->id.'"><i class="fas fa-file-pdf"></i></a>

                <button href="#" class="btn btn-icon btn-danger btn-xs delete" data-id="'.$data->id.'"><i class="fas fa-trash"></i></button>
    	        ';
    	    })
    	    ->addIndexColumn()
    	    ->rawColumns(['aksi'])
    	    ->make(true);
    }

    public function dataDetail($id)
    {
        $data = Penduduk::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
    	$datas = $request->all();

        if ($request->jenis_surat_id == 1) {
            $data_surat = new DataSurat;
            $data_surat->jenis_surat_id = $request->jenis_surat_id;
            $data_surat->penduduk_id = $request->penduduk_id;
            $data_surat->penanggung_jawab_id = $request->penanggung_jawab_id;
            $data_surat->nomor_surat = $request->nomor_surat;
            $data_surat->keterangan = $request->keterangan;
            $data_surat->save();

            $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $data_surat->id)
                ->select('data_surat.id', 'data_surat.nomor_surat', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penduduk.warga_negara', 'penduduk.nomor_kps', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat')
                ->first();
            $pdf = PDF::loadView('surat.miskin', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Keterangan Miskin.pdf');
            session()->flash('store');
            return redirect()->back();
        } elseif ($request->jenis_surat_id == 3) {
            $data_surat = new DataSurat;
            $data_surat->jenis_surat_id = $request->jenis_surat_id;
            $data_surat->penduduk_id = $request->penduduk_id;
            $data_surat->penanggung_jawab_id = $request->penanggung_jawab_id;
            $data_surat->nomor_surat = $request->nomor_surat;
            $data_surat->keterangan = $request->keterangan;
            $data_surat->save();

            $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $data_surat->id)
                ->select('data_surat.id', 'data_surat.nomor_surat', 'data_surat.keterangan', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penduduk.warga_negara', 'penduduk.nomor_kps', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat')
                ->first();
            $pdf = PDF::loadView('surat.izinkeramaian', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Keterangan Izin Keramaian.pdf');
            session()->flash('store');
            return redirect()->back();
        } elseif ($request->jenis_surat_id == 6) {
            $data_surat = new DataSurat;
            $data_surat->jenis_surat_id = $request->jenis_surat_id;
            $data_surat->penduduk_id = $request->penduduk_id;
            $data_surat->penanggung_jawab_id = $request->penanggung_jawab_id;
            $data_surat->nomor_surat = $request->nomor_surat;
            $data_surat->keterangan = $request->keterangan;
            $data_surat->save();

            $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $data_surat->id)
                ->select('data_surat.id', 'data_surat.nomor_surat', 'data_surat.keterangan', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.pekerjaan', 'penduduk.warga_negara', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat')
                ->first();
            $pdf = PDF::loadView('surat.domisili', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Keterangan Domisili.pdf');
            session()->flash('store');
            return redirect()->back();
            
        } elseif ($request->jenis_surat_id == 7) {
            $data_surat = new DataSurat;
            $data_surat->jenis_surat_id = $request->jenis_surat_id;
            $data_surat->penduduk_id = $request->penduduk_id;
            $data_surat->penanggung_jawab_id = $request->penanggung_jawab_id;
            $data_surat->nomor_surat = $request->nomor_surat;
            $data_surat->keterangan = $request->keterangan;
            $data_surat->save();

            $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $data_surat->id)
                ->select('data_surat.id', 'data_surat.nomor_surat', 'data_surat.keterangan', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penduduk.warga_negara', 'penduduk.nomor_kps', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat')
                ->first();
            $pdf = PDF::loadView('surat.usaha', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Keterangan Usaha.pdf');
            session()->flash('store');
            return redirect()->back();
        } elseif ($request->jenis_surat_id == 12) {
            $data_surat = new DataSurat;
            $data_surat->jenis_surat_id = $request->jenis_surat_id;
            $data_surat->penduduk_id = $request->penduduk_id;
            $data_surat->penanggung_jawab_id = $request->penanggung_jawab_id;
            $data_surat->nomor_surat = $request->nomor_surat;
            $data_surat->keterangan = $request->keterangan;
            $data_surat->save();

            $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $data_surat->id)
                ->select('data_surat.id', 'data_surat.nomor_surat', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.pekerjaan', 'penduduk.warga_negara', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat')
                ->first();
            $pdf = PDF::loadView('surat.skck', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Keterangan Catatan Kepolisian.pdf');

            session()->flash('store');
    	    return redirect()->back();
        }
        
    }

    public function storeKelahiran(Request $request)
    {
        $datas = $request->all();

        $data_surat = new DataSurat;
        $data_surat->jenis_surat_id = $request->jenis_surat_id;
        $data_surat->pelapor_id = $request->pelapor_id;
        $data_surat->saksi_satu_id = $request->saksi_satu_id;
        $data_surat->saksi_dua_id = $request->saksi_dua_id;
        $data_surat->ayah_id = $request->ayah_id;
        $data_surat->ibu_id = $request->ibu_id;
        $data_surat->save();

        $data_tambahan = new DataTambahan;
        $data_tambahan->nama_anak = $request->nama_anak;
        $data_tambahan->jenis_kelamin = $request->jenis_kelamin;
        $data_tambahan->tempat_dilahirkan = $request->tempat_dilahirkan;
        $data_tambahan->tempat_lahir = $request->tempat_lahir;
        $data_tambahan->hari_tgl_lahir = $request->hari_tgl_lahir;
        $data_tambahan->pukul = $request->pukul;
        // $data_tambahan->kebangsaan = $request->kebangsaan;
        $data_tambahan->jenis_kelahiran = $request->jenis_kelahiran;
        $data_tambahan->kelahiran_ke = $request->kelahiran_ke;
        $data_tambahan->penolong_kelahiran = $request->penolong_kelahiran;
        $data_tambahan->berat_bayi = $request->berat_bayi;
        $data_tambahan->panjang_bayi = $request->panjang_bayi;
        $data_tambahan->anak_ke = $request->anak_ke;
        $data_tambahan->save();

        $data_surat_upd = DataSurat::find($data_surat->id);

        $data_surat_upd->tambahan_id = $data_tambahan->id;
        $data_surat_upd->save();

        $data = DataSurat::leftJoin('data_tambahan as anak', 'data_surat.tambahan_id', 'anak.id')
                ->leftJoin('penduduk as ibu', 'data_surat.ibu_id', 'ibu.id')
                ->leftJoin('penduduk as ayah', 'data_surat.ayah_id', 'ayah.id')
                ->leftJoin('penduduk as pelapor', 'data_surat.pelapor_id', 'pelapor.id')
                ->leftJoin('penduduk as saksi_satu', 'data_surat.saksi_satu_id', 'saksi_satu.id')
                ->leftJoin('penduduk as saksi_dua', 'data_surat.saksi_dua_id', 'saksi_dua.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('data_tambahan', 'data_surat.tambahan_id', 'data_tambahan.id')
                ->where('data_surat.id', $data_surat->id)
                ->select('data_surat.id', 'data_surat.nomor_surat', 'data_surat.keterangan', 'data_surat.created_at', 'anak.nama_anak', 'anak.jenis_kelamin as jenis_kelamin_anak', 'anak.tempat_dilahirkan', 'anak.tempat_lahir as tempat_lahir_anak', 'anak.hari_tgl_lahir', 'anak.pukul', 'anak.jenis_kelahiran', 'anak.kelahiran_ke', 'anak.penolong_kelahiran', 'anak.berat_bayi', 'anak.panjang_bayi', 'anak.anak_ke', 'ayah.warga_negara as warga_negara_ayah', 'ayah.nik as nik_ayah', 'ayah.nama as nama_ayah', 'ayah.tgl_lahir as tgl_lahir_ayah', 'ayah.pekerjaan as pekerjaan_ayah', 'ayah.alamat as alamat_ayah', 'ibu.warga_negara as warga_negara_ibu', 'ibu.nik as nik_ibu', 'ibu.nama as nama_ibu', 'ibu.tgl_lahir as tgl_lahir_ibu', 'ibu.pekerjaan as pekerjaan_ibu', 'ibu.alamat as alamat_ibu', 'pelapor.warga_negara as warga_negara_pelapor', 'pelapor.nik as nik_pelapor', 'pelapor.nama as nama_pelapor', 'pelapor.tgl_lahir as tgl_lahir_pelapor', 'pelapor.pekerjaan as pekerjaan_pelapor', 'pelapor.alamat as alamat_pelapor', 'saksi_satu.warga_negara as warga_negara_satu', 'saksi_satu.nik as nik_saksi_satu', 'saksi_satu.nama as nama_saksi_satu', 'saksi_satu.tgl_lahir as tgl_lahir_saksi_satu', 'saksi_satu.pekerjaan as pekerjaan_saksi_satu', 'saksi_satu.alamat as alamat_saksi_satu', 'saksi_dua.warga_negara as warga_negara_dua', 'saksi_dua.nik as nik_saksi_dua', 'saksi_dua.nama as nama_saksi_dua', 'saksi_dua.tgl_lahir as tgl_lahir_saksi_dua', 'saksi_dua.pekerjaan as pekerjaan_saksi_dua', 'saksi_dua.alamat as alamat_saksi_dua', 'surat.jenis as jenis_surat', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'data_tambahan.anak_ke', 'data_tambahan.tgl_kematian', 'data_tambahan.jam_kematian', 'data_tambahan.sebab_kematian', 'data_tambahan.tempat_kematian', 'data_tambahan.menerangkan', 'ibu.kebangsaan as kebangsaan_ibu', 'ayah.kebangsaan as kebangsaan_ayah')
                ->first();
       $pdf = PDF::loadView('surat.kelahiran', compact('data'))->setPaper(array(0,0,609.4488,935.433), 'portrait')->setWarnings(false);
        return $pdf->stream('Surat Keterangan Kelahiran.pdf');

        session()->flash('store');
        return redirect()->back();
    }

    public function storeKematian(Request $request)
    {
        $datas = $request->all();

        $data_surat = new DataSurat;
        $data_surat->jenis_surat_id = $request->jenis_surat_id;
        $data_surat->pelapor_id = $request->pelapor_id;
        $data_surat->jenazah_id = $request->jenazah_id;
        $data_surat->saksi_satu_id = $request->saksi_satu_id;
        $data_surat->saksi_dua_id = $request->saksi_dua_id;
        $data_surat->ayah_id = $request->ayah_id;
        $data_surat->ibu_id = $request->ibu_id;
        $data_surat->save();

        $data_tambahan = new DataTambahan;
        $data_tambahan->tgl_kematian = $request->tgl_kematian;
        $data_tambahan->sebab_kematian = $request->sebab_kematian;
        $data_tambahan->menerangkan = $request->menerangkan;
        $data_tambahan->tempat_kematian = $request->tempat_kematian;
        $data_tambahan->pukul = $request->pukul;
        $data_tambahan->tgl_kematian = $request->tgl_kematian;
        $data_tambahan->anak_ke = $request->anak_ke;
        $data_tambahan->save();

        $data_surat_upd = DataSurat::find($data_surat->id);

        $data_surat_upd->tambahan_id = $data_tambahan->id;
        $data_surat_upd->save();


        $data = DataSurat::leftJoin('penduduk as jenazah', 'data_surat.jenazah_id', 'jenazah.id')
                ->leftJoin('penduduk as ayah', 'data_surat.ayah_id', 'ayah.id')
                ->leftJoin('penduduk as ibu', 'data_surat.ibu_id', 'ibu.id')
                ->leftJoin('penduduk as pelapor', 'data_surat.pelapor_id', 'pelapor.id')
                ->leftJoin('penduduk as saksi_satu', 'data_surat.saksi_satu_id', 'saksi_satu.id')
                ->leftJoin('penduduk as saksi_dua', 'data_surat.saksi_dua_id', 'saksi_dua.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('data_tambahan', 'data_surat.tambahan_id', 'data_tambahan.id')
                ->where('data_surat.id', $data_surat->id)
                ->select('data_surat.id', 'data_surat.nomor_surat', 'data_surat.keterangan', 'data_surat.created_at', 'jenazah.nik as nik_jenazah', 'jenazah.nama as nama_jenazah', 'jenazah.alamat as alamat_jenazah', 'jenazah.tempat_lahir as tempat_lahir_jenazah', 'jenazah.tgl_lahir as tgl_lahir_jenazah', 'jenazah.agama as agama_jenazah', 'jenazah.jenis_kelamin as jenis_kelamin_jenazah', 'jenazah.pekerjaan as pekerjaan_jenazah', 'ayah.nik as nik_ayah', 'ayah.nama as nama_ayah', 'ayah.tgl_lahir as tgl_lahir_ayah', 'ayah.pekerjaan as pekerjaan_ayah', 'ayah.alamat as alamat_ayah', 'ibu.nik as nik_ibu', 'ibu.nama as nama_ibu', 'ibu.tgl_lahir as tgl_lahir_ibu', 'ibu.pekerjaan as pekerjaan_ibu', 'ibu.alamat as alamat_ibu', 'pelapor.nik as nik_pelapor', 'pelapor.nama as nama_pelapor', 'pelapor.tgl_lahir as tgl_lahir_pelapor', 'pelapor.pekerjaan as pekerjaan_pelapor', 'pelapor.alamat as alamat_pelapor', 'saksi_satu.nik as nik_saksi_satu', 'saksi_satu.nama as nama_saksi_satu', 'saksi_satu.tgl_lahir as tgl_lahir_saksi_satu', 'saksi_satu.pekerjaan as pekerjaan_saksi_satu', 'saksi_satu.alamat as alamat_saksi_satu', 'saksi_dua.nik as nik_saksi_dua', 'saksi_dua.nama as nama_saksi_dua', 'saksi_dua.tgl_lahir as tgl_lahir_saksi_dua', 'saksi_dua.pekerjaan as pekerjaan_saksi_dua', 'saksi_dua.alamat as alamat_saksi_dua', 'surat.jenis as jenis_surat', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'data_tambahan.anak_ke', 'data_tambahan.tgl_kematian', 'data_tambahan.jam_kematian', 'data_tambahan.sebab_kematian', 'data_tambahan.tempat_kematian', 'data_tambahan.menerangkan')
                ->first();
        $pdf = PDF::loadView('surat.kematian', compact('data'))->setPaper(array(0,0,609.4488,935.433), 'portrait')->setWarnings(false);
        return $pdf->stream('Surat Keterangan Kematian.pdf');


        toast('Data tersimpan!','success');
        return redirect()->back();
    }

    public function storeBlmnikah(Request $request)
    {
        $datas = $request->all();

        $data_surat = new DataSurat;
        $data_surat->jenis_surat_id = $request->jenis_surat_id;
        $data_surat->penduduk_id = $request->penduduk_id;
        $data_surat->nomor_surat = $request->nomor_surat;
        $data_surat->penanggung_jawab_id = $request->penanggung_jawab_id;
        $data_surat->keterangan = $request->keterangan;
        $data_surat->save();

        $data_tambahan = new DataTambahan;
        
        $data_tambahan->suami_istri_terdahulu = $request->suami_istri_terdahulu;
        $data_tambahan->save();

        $data_surat_upd = DataSurat::find($data_surat->id);

        $data_surat_upd->tambahan_id = $data_tambahan->id;
        $data_surat_upd->save();

        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $data_surat->id)
                ->select('data_surat.id', 'data_surat.nomor_surat', 'data_surat.keterangan', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penduduk.warga_negara', 'penduduk.nomor_kps', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat')
                ->first();
        $pdf = PDF::loadView('surat.belumnikah', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream('Surat Keterangan Belum Pernah Menikah.pdf');

        session()->flash('store');
        return redirect()->back();
    }

    public function storeIzinortu(Request $request)
    {
        $datas = $request->all();

        $data_surat = new DataSurat;
        $data_surat->jenis_surat_id = $request->jenis_surat_id;
        // $data_surat->penduduk_id = $request->penduduk_id;
        $data_surat->ayah_id = $request->ayah_id;
        $data_surat->ibu_id = $request->ibu_id;
        $data_surat->suami_id = $request->suami_id;
        $data_surat->istri_id = $request->istri_id;
        $data_surat->save();

        $data = DataSurat::leftJoin('penduduk as ayah', 'data_surat.ayah_id', 'ayah.id')
                ->leftJoin('penduduk as ibu', 'data_surat.ibu_id', 'ibu.id')
                ->leftJoin('penduduk as ortu_ayah', 'data_surat.penduduk_id', 'ortu_ayah.id')
                ->leftJoin('penduduk as ortu_ibu', 'data_surat.saksi_satu_id', 'ortu_ibu.id')
                ->leftJoin('penduduk as istri', 'data_surat.istri_id', 'istri.id')
                ->leftJoin('penduduk as suami', 'data_surat.suami_id', 'suami.id')
                ->leftJoin('penduduk as ayah_suami', 'data_surat.saksi_dua_id', 'ayah_suami.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $data_surat->id)
                ->select('data_surat.id', 'data_surat.nomor_surat', 'data_surat.created_at', 'ayah.nama as nama_ayah', 'ayah.nik as nik_ayah', 'ayah.no_kk as no_kk_ayah', 'ayah.alamat as alamat_ayah', 'ayah.tempat_lahir as tempat_lahir_ayah', 'ayah.tgl_lahir as tgl_lahir_ayah', 'ayah.agama as agama_ayah', 'ayah.pekerjaan as pekerjaan_ayah', 'ayah.warga_negara as warga_negara_ayah', 'ibu.nama as nama_ibu', 'ibu.nik as nik_ibu', 'ibu.no_kk as no_kk_ibu', 'ibu.alamat as alamat_ibu', 'ibu.tempat_lahir as tempat_lahir_ibu', 'ibu.tgl_lahir as tgl_lahir_ibu', 'ibu.agama as agama_ibu', 'ibu.pekerjaan as pekerjaan_ibu', 'ibu.warga_negara as warga_negara_ibu', 'istri.nama as nama_istri', 'istri.nik as nik_istri', 'istri.no_kk as no_kk_istri', 'istri.alamat as alamat_istri', 'istri.tempat_lahir as tempat_lahir_istri', 'istri.tgl_lahir as tgl_lahir_istri', 'istri.agama as agama_istri', 'istri.pekerjaan as pekerjaan_istri', 'istri.warga_negara as warga_negara_istri', 'suami.nama as nama_suami', 'suami.nik as nik_suami', 'suami.no_kk as no_kk_suami', 'suami.alamat as alamat_suami', 'suami.tempat_lahir as tempat_lahir_suami', 'suami.tgl_lahir as tgl_lahir_suami', 'suami.agama as agama_suami', 'suami.pekerjaan as pekerjaan_suami', 'suami.warga_negara as warga_negara_suami', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat', 'ortu_ayah.nama as nama_ortu_ayah', 'ortu_ibu.nama as nama_ortu_ibu', 'ayah_suami.nama as nama_ayah_suami')
                ->first();
        $pdf = PDF::loadView('surat.izinortu', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream('Surat Izin Orang Tua.pdf');


        session()->flash('store');
        return redirect()->back();
    }

    public function storePersetujuan(Request $request)
    {
        $datas = $request->all();

        $data_surat = new DataSurat;
        $data_surat->jenis_surat_id = $request->jenis_surat_id;
        $data_surat->ayah_id = $request->ayah_id;
        $data_surat->suami_id = $request->suami_id;
        $data_surat->istri_id = $request->istri_id;
        $data_surat->save();

        $data = DataSurat::leftJoin('penduduk as suami', 'data_surat.suami_id', 'suami.id')
                ->leftJoin('penduduk as istri', 'data_surat.istri_id', 'istri.id')
                ->leftJoin('penduduk as ayah_suami', 'data_surat.penduduk_id', 'ayah_suami.id')
                ->leftJoin('penduduk as ayah_istri', 'data_surat.ayah_id', 'ayah_istri.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $data_surat->id)
                ->select('data_surat.id', 'data_surat.nomor_surat', 'data_surat.keterangan', 'data_surat.created_at', 'suami.nik as nik_suami', 'suami.nama as nama_suami', 'suami.alamat as alamat_suami', 'suami.tempat_lahir as tempat_lahir_suami', 'suami.tgl_lahir as tgl_lahir_suami', 'suami.agama as agama_suami', 'suami.pekerjaan as pekerjaan_suami', 'suami.warga_negara as warga_negara_suami', 'istri.nik as nik_istri', 'istri.nama as nama_istri', 'istri.alamat as alamat_istri', 'istri.tempat_lahir as tempat_lahir_istri', 'istri.tgl_lahir as tgl_lahir_istri', 'istri.agama as agama_istri', 'istri.pekerjaan as pekerjaan_istri', 'istri.warga_negara as warga_negara_istri', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat', 'ayah_suami.nama as nama_ayah_suami', 'ayah_istri.nama as nama_ayah_istri')
                ->first();
        $pdf = PDF::loadView('surat.persetujuan', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream('Surat Persetujuan Mempelai.pdf');


        session()->flash('store');
        return redirect()->back();
    }

    public function storeNikah(Request $request)
    {
        $datas = $request->all();

        $data_surat = new DataSurat;
        $data_surat->jenis_surat_id = $request->jenis_surat_id;
        $data_surat->penanggung_jawab_id = $request->penanggung_jawab_id;
        $data_surat->nomor_surat = $request->nomor_surat;
        $data_surat->penduduk_id = $request->penduduk_id;
        $data_surat->ayah_id = $request->ayah_id;
        $data_surat->ibu_id = $request->ibu_id;
        $data_surat->save();

        $data_tambahan = new DataTambahan;

        $data_tambahan->suami_istri_terdahulu = $request->suami_istri_terdahulu;
        $data_tambahan->save();

        $data_surat_upd = DataSurat::find($data_surat->id);

        $data_surat_upd->tambahan_id = $data_tambahan->id;
        $data_surat_upd->save();

        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penduduk as ayah', 'data_surat.ayah_id', 'ayah.id')
                ->leftJoin('penduduk as ibu', 'data_surat.ibu_id', 'ibu.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $data_surat->id)
                ->select('data_surat.id', 'data_surat.nomor_surat', 'data_surat.keterangan', 'data_surat.created_at', 'penduduk.nik', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.warga_negara', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat', 'ayah.nik as nik_ayah', 'ayah.nama as nama_ayah', 'ayah.alamat as alamat_ayah', 'ayah.tempat_lahir as tempat_lahir_ayah', 'ayah.tgl_lahir as tgl_lahir_ayah', 'ayah.agama as agama_ayah', 'ayah.jenis_kelamin as jenis_kelamin_ayah', 'ayah.pekerjaan as pekerjaan_ayah', 'ayah.warga_negara as warga_negara_ayah', 'ibu.nik as nik_ibu', 'ibu.nama as nama_ibu', 'ibu.alamat as alamat_ibu', 'ibu.tempat_lahir as tempat_lahir_ibu', 'ibu.tgl_lahir as tgl_lahir_ibu', 'ibu.agama as agama_ibu', 'ibu.jenis_kelamin as jenis_kelamin_ibu', 'ibu.pekerjaan as pekerjaan_ibu', 'ibu.warga_negara as warga_negara_ibu')
                ->first();
        $pdf = PDF::loadView('surat.untuknikah', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream('Surat Keterangan Untuk Nikah.pdf');

        toast('Data tersimpan!','success');
        return redirect()->back();
    }

    public function storePengantar(Request $request)
    {
        $datas = $request->all();

        $data_surat = new DataSurat;
        $data_surat->jenis_surat_id = $request->jenis_surat_id;
        $data_surat->penanggung_jawab_id = $request->penanggung_jawab_id;
        $data_surat->penduduk_id = $request->penduduk_id;
        $data_surat->nomor_surat = $request->nomor_surat;
        $data_surat->nomor_rt = $request->nomor_rt;
        $data_surat->nomor_rw = $request->nomor_rw;
        $data_surat->kelengkapan_photo = $request->kelengkapan_photo;
        $data_surat->kelengkapan_kk = $request->kelengkapan_kk;
        $data_surat->kelengkapan_akte = $request->kelengkapan_akte;
        $data_surat->kelengkapan_surat_nikah = $request->kelengkapan_surat_nikah;
        $data_surat->kelengkapan_lain = $request->kelengkapan_lain;
        $data_surat->save();

        $data = DataSurat::leftJoin('penduduk', 'data_surat.penduduk_id', 'penduduk.id')
                ->leftJoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', 'penanggung_jawab.id')
                ->leftJoin('surat', 'data_surat.jenis_surat_id', 'surat.id')
                ->where('data_surat.id', $data_surat->id)
                ->select('data_surat.id', 'data_surat.nomor_surat', 'data_surat.keterangan', 'data_surat.created_at', 'penduduk.nik', 'penduduk.no_kk', 'penduduk.nama', 'penduduk.alamat', 'penduduk.tempat_lahir', 'penduduk.tgl_lahir', 'penduduk.agama', 'penduduk.jenis_kelamin', 'penduduk.status_nikah', 'penduduk.pekerjaan', 'penduduk.no_hp', 'penduduk.warga_negara', 'penduduk.nomor_kps', 'penanggung_jawab.nip', 'penanggung_jawab.nama as nama_penjabat', 'penanggung_jawab.jabatan', 'surat.jenis as jenis_surat', 'data_surat.nomor_rt', 'data_surat.nomor_rw', 'data_surat.kelengkapan_photo', 'data_surat.kelengkapan_akte', 'data_surat.kelengkapan_kk', 'data_surat.kelengkapan_surat_nikah', 'data_surat.kelengkapan_lain')
                ->first();
            $pdf = PDF::loadView('surat.pengantar', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Pengantar.pdf');

        // toast('Data tersimpan!','success');
        return redirect()->back();
    }

    public function update(Request $request)
    {
    	$data = $request->all();
    	DataSurat::find($request->id)->update($data);
    	toast('Data tersimpan!','success');
    	return redirect()->back();
    }

    public function destroy($id)
    {
    	DataSurat::find($id)->delete();
    	return redirect()->back();
    }

}
