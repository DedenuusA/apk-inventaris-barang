<?php

namespace App\Http\Controllers;

use App\Models\DetailPinjaman;
use App\Models\Item;
use App\Models\Perusahaan;
use App\Models\Pinjaman;
use App\Models\User;
use App\Models\UserModel;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{
    public function index()
    {
        $user_model = User::
        when(Auth::user()->role == 'pimpinan', function($query) {
            $query->where('perusahaan_id', auth()->user()->perusahaan_id);
        })
        // ->when(Auth::user()->role == 'karyawan', function($query) {
        //     $query->where('user_id', auth()->user()->id);
        // })
        ->get(); 
        return view('user.index',compact(['user_model']));
    }
    public function create()
    {
        $perusahaans = Perusahaan::
        when(Auth::user()->role == 'pimpinan', function($query) {
            $query->where('id', auth()->user()->perusahaan_id);
        })
        // ->when(Auth::user()->role == 'karyawan', function($query) {
        //     $query->where('user_id', auth()->user()->id);
        // })
        ->get(); 
        return  view('user.create',compact(['perusahaans']));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data["password"] = bcrypt($request->password);
        User::create($data);
        return redirect('/user')->with(['success' => 'simpan berhasil']);
    }
    public function destroy($id)
    {
        $user_model = User::find($id);
        $user_model->delete();
        return redirect('/user')->with(['success' => 'berhasil di hapus']);
    }
    public function edit($id)
    {
        $user_model = User::find($id);
        return view('user.edit',compact(['user_model']));
    }
    public function update(Request $request,$id)
    {
        $user_model = User::find($id);
        $user_model->update($request->all());
        return redirect('/user')->with(['success' => 'update berhasil']);
    }
    public function editpassword($id)
    {
        $user_model = User::find($id);
        return view('user.editpassword',compact(['user_model']));
    }
    public function updatepassword(Request $request)
    {
        $this->validate($request, [
            'new_password' => 'required|confirmed|min:4'
        ]);
        $auth = Auth::user();
 
        $user =  User::find($request->id);
        $user->password =  bcrypt($request->new_password);
        $user->save();
        return back()->with('success', "Password Changed Successfully");
    }
    public function total()
    {
        $user_model = User::count();
        $item = Item::count();
        $detail_pinjaman = DetailPinjaman::count();
        $perusahaan = Perusahaan::count();
        $pinjaman = Pinjaman::count();
        Item::sinkronsisa();

        return view('dashboard',compact(['user_model','item','pinjaman','perusahaan']));
    }

}
