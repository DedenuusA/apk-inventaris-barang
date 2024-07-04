<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::where('perusahaan_id', auth()->user()->perusahaan_id)->get();
        return view('/kategori.index',compact(['kategori']));
    }
    public function create()
    {
        return view('kategori.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['perusahaan_id'] = auth()->user()->perusahaan_id;
        Kategori::create($data);
        return redirect('kategori')->with(['success' => 'simpan berhasil']);
    }
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit',compact(['kategori']));
    }
    public function update(Request $request,$id)
    {
        $kategori = Kategori::find($id);
        $kategori->update($request->all());
        return redirect('/kategori')->with(['success' => 'update berhasil']);
    }
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/kategori')->with(['success' => 'berhasil di hapus']);
    }
}
