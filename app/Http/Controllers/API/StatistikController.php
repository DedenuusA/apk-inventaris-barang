<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pinjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function get_penjualan_harian(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'bulan' => ['nullable', 'numeric'],
            'tahun' => ['nullable', 'numeric'],
            'jumlah_hari' => ['nullable', 'numeric'],
        ]);

        $sales = [];
        $days = (isset($request->jumlah_hari)) ? $request->jumlah_hari : Carbon::create($request->tahun, $request->bulan, 1)->daysInMonth;
        // return $days;
        for ($i = 1; $i <= $days; $i++) {
            $transaksi_berhasil = Pinjaman::whereDay('tanggal_pinjaman', '=', $i)->whereMonth('tanggal_pinjaman', '=', $request->bulan)->whereYear('tanggal_pinjaman', '=', $request->tahun)->sum('subtotal');
            $sales[] = [
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
                'transaksi_berhasil' => $transaksi_berhasil,
            ];
        }

        return $sales;
    }

    public function get_top_sales_product(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'jumlah_produk' => ['nullable', 'integer'],
        ]);

        $top_sell_product = DB::table('detail_pinjamans')->select(DB::raw('items.id, items.nama_item,  COUNT(*) as total'))
        ->join('items', 'items.id', '=', 'detail_pinjamans.item_id')
        ->groupBy('detail_pinjamans.item_id')
        ->where('detail_pinjamans.pinjaman_id', '!=', NULL)
        ->orderBy('total', 'DESC')
        ->take($request->jumlah_produk)
        ->get();

        return response()->json($top_sell_product);
    }
}
