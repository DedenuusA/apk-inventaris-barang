<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::all();
        return view('/perusahaan.index',compact(['perusahaan']));
    }
    public function create()
    {
        return view('perusahaan.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        Perusahaan::create($data);
        return redirect('/perusahaan')->with(['success' => 'simpan berhasil']);
    }
    public function edit($id)
    {
        $perusahaan = Perusahaan::find($id);
        return view('perusahaan.edit',compact(['perusahaan']));
    }
    public function update(Request $request,$id)
    {
        $perusahaan = Perusahaan::find($id);
        $perusahaan->update($request->all());
        return redirect('/perusahaan')->with(['success' => 'update berhasil']);
    }
    public function destroy($id)
    {
        $perusahaan = Perusahaan::find($id);
        $perusahaan->delete();
        return redirect('/perusahaan')->with(['success' => 'berhasil di hapus']);
    }
   
}
