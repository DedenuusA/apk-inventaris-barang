<?php

namespace App\Http\Controllers;

use App\Models\DetailPinjaman;
use App\Models\Item;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class PinjamanController extends Controller
{
    public function index()
    {

        $pinjaman = Pinjaman::
        when(Auth::user()->role == 'pimpinan', function($query) {
            $query->where('perusahaan_id', auth()->user()->perusahaan_id);
        })
        ->when(Auth::user()->role == 'karyawan', function($query) {
            $query->where('user_id', auth()->user()->id);
        })
        ->get();
        return view('pinjaman.index',compact(['pinjaman']));
    }
    public function create()
    {
        $users = User::
        when(Auth::user()->role == 'pimpinan', function($query) {
            $query->where('perusahaan_id', auth()->user()->perusahaan_id);
        })
        ->when(Auth::user()->role == 'karyawan', function($query) {
            $query->where('id', auth()->user()->id);
        })
        ->get();
        // $pinjaman = Pinjaman::where('perusahaan_id', auth()->user()->perusahaan_id)->get();
        // $users = User::where('perusahaan_id', auth()->user()->perusahaan_id)->get();
        $items = Item::where('perusahaan_id', auth()->user()->perusahaan_id)->get();
        return view('pinjaman.create',compact(['users','items']));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['tanggal_pinjaman'] = date('Y-m-d', strtotime($request->tanggal_pinjaman));
        $data['tanggal_pengembalian'] = date('Y-m-d', strtotime($request->tanggal_pengembalian));
        $data['status']='menunggu_respon';
        $data['keterangan'] = '';
        $data['perusahaan_id'] = Auth::user()->perusahaan_id;
        $pinjaman = Pinjaman::create($data);
        $subtotal = 0;
        foreach ($request->detail_pinjamans as $detail_pinjaman) {
            $item = Item::find($detail_pinjaman['item_id']);
            $subtotal += $item->harga * $detail_pinjaman['jumlah'];
            $pinjaman->detail_pinjamans()->save(new DetailPinjaman($detail_pinjaman));
        }
        $pinjaman->subtotal = $subtotal;
        $pinjaman->save();
            Item::sinkronsisa();

       return redirect('/pinjaman')->with(['success' => 'simpan berhasil']);
    }
    public function edit($id)
    {
        $users = User::all();
        $items = Item::all();
        $pinjaman = Pinjaman::find($id);
        return view('pinjaman.edit',compact(['pinjaman','users','items']));
    }
    public function update(Request $request,$id)
    {
        $pinjaman = Pinjaman::find($id);
        $subtotal = 0;
        foreach ($request->detail_pinjamans as $detail_pinjaman) {
            $item = Item::find($detail_pinjaman['item_id']);
            $subtotal += $item->harga * $detail_pinjaman['jumlah'];
            $pinjaman->detail_pinjamans()->save(new DetailPinjaman($detail_pinjaman));
        }
        $pinjaman->subtotal = $subtotal;
        $pinjaman->save();
            Item::sinkronsisa();
        $data = $request->all();
        // $data['tanggal_pinjaman'] = date('Y-m-d', strtotime($request->tanggal_pinjaman));
        // $data['tanggal_pengembalian'] = date('Y-m-d', strtotime($request->tanggal_pengembalian));
        $pinjaman->update($data);
        $pinjaman->detail_pinjamans()->delete();


        foreach ($request->detail_pinjamans?:[] as $detail_pinjaman) {
           $pinjaman->detail_pinjamans()->save(new DetailPinjaman($detail_pinjaman));
        }

        Item::sinkronsisa();
        return redirect('/pinjaman')->with(['success' => 'update berhasil']);
    }
    public function destroy($id)
    {
        $pinjaman = Pinjaman::find($id);
        $pinjaman->detail_pinjamans()->delete();
        $pinjaman->delete();

        Item::sinkronsisa();
        return redirect('/pinjaman')->with(['success' => 'berhasil di hapus']);
    }
     public function detail($id)
    {
        $users = User::all();
        $items = Item::all();
        $pinjaman = Pinjaman::find($id);
        return view('pinjaman.detail',compact(['pinjaman','users','items']));
    }
    public function cetak_pdf($id){

        $users = User::all();
        $items = Item::all();
        $pinjaman = pinjaman::find($id);
        $pdf = Pdf::loadView('laporan.detail',compact(['pinjaman','users','items']));
        return $pdf->stream();
    }

}
