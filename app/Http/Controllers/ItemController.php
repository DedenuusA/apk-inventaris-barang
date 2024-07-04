<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Kategori;

class ItemController extends Controller
{
    public function index()
    {
        $item = Item::where('perusahaan_id', auth()->user()->perusahaan_id)->get();     
        return view('item.index',compact(['item']));
    }
    public function create()
    {
        $kategoris = Kategori::where('perusahaan_id', auth()->user()->perusahaan_id)->get();
        return view('item.create',compact(['kategoris']));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['perusahaan_id'] = auth()->user()->perusahaan_id;
        $data['sisa']=$request->stok;
        Item::create($data);
        return redirect('/item')->with(['success' => 'simpan berhasil']);
    }
    public function edit($id)
    {

        $kategoris = Kategori::where('perusahaan_id', auth()->user()->perusahaan_id)->get();
        $item = Item::find($id);
        return view('item.edit',compact(['item','kategoris']));
    }
    public function update(Request $request,$id)
    {

        $item = Item::find($id);
        $data = $request->all();
        $item->update($data);

        Item::sinkronsisa();
        return redirect('/item')->with(['success' => 'update berhasil']);
    }
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('/item')->with(['success' => 'berhasil di hapus']);
    }
}
