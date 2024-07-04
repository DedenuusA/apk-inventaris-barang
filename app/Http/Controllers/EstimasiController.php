<?php

namespace App\Http\Controllers;

use App\Charts\DetailPinjamanChart;
use App\Models\Perusahaan;
use App\Models\Pinjaman;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstimasiController extends Controller
{
    public function index(Request $request){
        $perusahaans = Perusahaan::when(Auth::user()->role == 'pimpinan', function($query) {
            $query->where('id', auth()->user()->perusahaan_id);
        })->get();

        if ($request->has('bulan') && $request->has('tahun')) {
            $bulan = $request->bulan;
            $tahun = $request->tahun;
            $perusahaan_id = $request->perusahaan_id;

            // Hitung jumlah dari dari 2 bulan ke belakang
            $bulan_mundur_1 = $bulan - 1;
            $bulan_mundur_2 = $bulan - 2;
            $estimasi = Pinjaman::where(function($query) use($bulan_mundur_1, $bulan_mundur_2) {
                $query->whereMonth('tanggal_pinjaman', $bulan_mundur_1);
                $query->orWhereMonth('tanggal_pinjaman', $bulan_mundur_2);
            })->with(['detail_pinjamans'])->whereYear('tanggal_pinjaman', $tahun)
            ->when($perusahaan_id, function($query) use ($perusahaan_id){
                $query->where('perusahaan_id', $perusahaan_id);
            })
            ->get();

            $start_date = $tahun . '-' . $bulan_mundur_2 . '-' . '01';
            $end_date = $tahun . '-' . $bulan_mundur_1 . '-' . '29';

            $datetime1 = new DateTime($start_date);

            $datetime2 = new DateTime($end_date);

            $difference = $datetime1->diff($datetime2);
            $jml_hari = $difference->days;

            // groupby produk id
            $arr = [];
            $arr2 = [];
            foreach ($estimasi as $pinjaman) {
                foreach ($pinjaman->detail_pinjamans as $detail) {
                    $arr2[$detail->item->nama_item]['jml'] = 0;
                }

                // isi jumlah
                foreach ($pinjaman->detail_pinjamans as $detail) {
                    $arr2[$detail->item->nama_item]['jml'] += $detail->jumlah;
                }
            }

            // dd($arr2);
        }

        $data = [
            'title' => 'Hitung Estimasi',
            'perusahaans' => $perusahaans,
            'estimasi' => $estimasi ?? null,
            'arr2' => $arr2 ?? null,
            'jml_hari' => $jml_hari ?? 1
        ];

        return  view('estimasi.index', $data);
    }
    public function total_kuliah(){
        $totalkuliah = collect([
            1802800,
            1612800,
            1002800,
            452800,
            1382800,
            502800,
            2072800,
            2070000,
            1002800,
            382800,
            452800,
            1002800,
            1002800,
            1002800,
            1000000,
            1700000,
            300000,
            1500000,
            500000,
            200000,
            3375000,
            1500000,
            1800000
        ]);
        $total = $totalkuliah->sum();
        return view('estimasi.total',compact(['total']));
    }
}
