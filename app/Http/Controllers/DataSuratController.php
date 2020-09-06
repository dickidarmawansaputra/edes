<?php

namespace App\Http\Controllers;

use App\Models\DataSurat;
use App\Models\PenanggungJawab;
use App\Models\Penduduk;
use App\Models\Surat;
use PDF;
use DataTables;
use Illuminate\Http\Request;

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
    	$data = DataSurat::select('nomor_surat', 'nik', 'jenis', 'penanggung_jawab.nama', 'data_surat.id')
                        ->leftjoin('penduduk', 'data_surat.penduduk_id', '=', 'penduduk.id')
                        ->leftjoin('surat', 'data_surat.jenis_surat_id', '=', 'surat.id')
                        ->leftjoin('penanggung_jawab', 'data_surat.penanggung_jawab_id', '=', 'penanggung_jawab.id')
                        ->get();
    	return Datatables::of($data)
    	    ->addColumn('aksi', function($data) {
    	        return '
    	        <button href="#" class="btn btn-icon btn-primary btn-xs" data-toggle="modal" data-target="#edit" data-id="'.$data->id.'" data-jenis="'.$data->jenis.'"><i class="far fa-edit"></i></button>
                <a href="'.route('datasurat.export',$data->id).'" class="btn btn-icon btn-info btn-xs" data-id="'.$data->id.'"><i class="fas fa-file-export"></i></a>
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
    	$data = $request->all();
    	DataSurat::create($data);
    	toast('Data tersimpan!','success');
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

    public function export(Request $request,$id)
    {
        $data = DataSurat::with('penduduk')->find($id);
        return $pj = PenanggungJawab::select('nama', 'jabatan', 'nip')
                             ->where('id', '=', $data->penanggung_jawab_id)
                             ->get();

        if ($data->jenis_surat_id == 1) 
        {
            $pdf = PDF::loadView('surat.miskin', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Keterangan Miskin.pdf');

        } elseif ($data->jenis_surat_id == 2) {

            $pdf = PDF::loadView('surat.nikah', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Keterangan Belum Pernah Menikah.pdf');

        } elseif ($data->jenis_surat_id == 3) {
            
            $pdf = PDF::loadView('surat.kematian', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Izin Keramaian.pdf');

        } elseif ($data->jenis_surat_id == 4) {
            
            $pdf = PDF::loadView('surat.kematian', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Keterangan Kematian.pdf');

        } elseif ($data->jenis_surat_id == 5) {
            
            $pdf = PDF::loadView('surat.kelahiran', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Keterangan Kelahiran.pdf');

        } elseif ($data->jenis_surat_id == 6) {
            
            $pdf = PDF::loadView('surat.domisili', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Surat Keterangan Domisili.pdf');

        } elseif ($data->jenis_surat_id == 7) {
            
            $pdf = PDF::loadView('surat.usaha', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Keterangan Usaha.pdf');

        } elseif ($data->jenis_surat_id == 8) {
            
            $pdf = PDF::loadView('surat.kematian', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Surat Keterangan Untuk Nikah.pdf');

        } elseif ($data->jenis_surat_id == 9) {
            
            $pdf = PDF::loadView('surat.pengantar', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Pengantar.pdf');

        } elseif ($data->jenis_surat_id == 10) {
            
            $pdf = PDF::loadView('surat.persetujuanmempelai', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Persetujuan Mempelai.pdf');

        } elseif ($data->jenis_surat_id == 11) {
            
            $pdf = PDF::loadView('surat.izinortu', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Izin Orang Tua.pdf');

        } elseif ($data->jenis_surat_id == 12) {
            
            $pdf = PDF::loadView('surat.skck', compact('data'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream('Surat Keterangan Catatan Kepolisian.pdf');

        }

    }
}
