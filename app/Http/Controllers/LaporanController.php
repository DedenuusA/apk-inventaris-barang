<?php

namespace App\Http\Controllers;

use App\Models\DetailPinjaman;
use App\Models\Item;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\pinjaman;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Dompdf\Adapter\PDFLib;
use PDF;

class LaporanController extends Controller
{
    public function index(){
        return view('laporan.index');
    }
    public function cetak_pdf()
    {
    	$detail_pinjamans = DetailPinjaman::all();
 
    	$pdf = FacadePdf::loadview('laporan.pinjaman',['detail_pinjamans'=>$detail_pinjamans]);
    	return $pdf->stream();
    }
    public function barang_cetak_pdf()
    {
    	$item = Item::all();
 
    	$pdf = FacadePdf::loadview('laporan.barang',['item'=>$item]);
    	return $pdf->stream();
    }
    public function user_cetak_pdf()
    {
    	$user_model = User::all();
 
    	$pdf = FacadePdf::loadview('laporan.user',['user_model'=>$user_model]);
    	return $pdf->stream();
    }
    public function perusahaan_cetak_pdf()
    {
    	$perusahaan = Perusahaan::all();
 
    	$pdf = FacadePdf::loadview('laporan.perusahaan',['perusahaan'=>$perusahaan]);
    	return $pdf->stream();
    }
    public function detail_cetak_pdf($id){

        $pinjaman = pinjaman::where('perusahaan_id', auth()->user()->perusahaan_id)->get($id);
        // $pinjaman = pinjaman::find($id);
        $pdf = FacadePdf::loadView('laporan.detail',['pinjaman'=>$pinjaman]);
        return $pdf->stream();
    }
}
