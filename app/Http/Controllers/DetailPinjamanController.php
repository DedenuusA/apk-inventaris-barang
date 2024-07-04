<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPinjaman;
use App\Models\Item;
use App\Models\Pinjaman;

class DetailPinjamanController extends Controller
{
    public function index()
    {
        $detail_pinjamans = DetailPinjaman::with('pinjaman','item')->get();
        return view('detail_pinjaman.index',compact(['detail_pinjamans']));
    }
    public function create()
    {
       
        $pinjamans = Pinjaman::all();
        $items = Item::all();
        return view('/detail_pinjaman.create',compact(['pinjamans','items']));
    }
    public function store(Request $request)
    {
        DetailPinjaman::create($request->all());
        return redirect('/detail_pinjaman')->with(['success' => 'simpan berhasil']);
    }
    public function edit($id)
    {
        $pinjamans = Pinjaman::all();
        $items = Item::all();
        $detail_pinjaman = DetailPinjaman::find($id);
        return view('detail_pinjaman.edit',compact(['detail_pinjaman','pinjamans','items']));
    }
    public function update(Request $request,$id)
    {
        $detail_pinjaman = DetailPinjaman::find($id);
        $detail_pinjaman->update($request->all());
        return redirect('/detail_pinjaman')->with(['success' => 'update berhasil']);
    }
    public function destroy(Request $request,$id)
    {
        $detail_pinjaman  = DetailPinjaman::find($id);
        $detail_pinjaman->delete();
        return redirect('/detail_pinjaman')->with(['success' => 'berhasil di hapus']);
    }

}
