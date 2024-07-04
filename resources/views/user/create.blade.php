@extends('template.master')
@section('title', 'forms')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-6">
            <div class="col-12">
                <div class="card shadow-lg">
                    <img src="../../assets/img/shapes/pattern-left.png" alt="pattern-lines"
                        class="position-absolute overflow-hidden opacity-4 start-0 top-0 h-100 border-radius-xl">
                    <img src="../../assets/img/shapes/pattern-right.png" alt="pattern-lines"
                        class="position-absolute overflow-hidden opacity-4 end-0 top-0 h-100 border-radius-xl">
                    <div class="card-body px-5 z-index-1 bg-cover">
                        <div class="row">
                            <div class="col-lg-5 col-10 text-center">
                                <img class="w-75 w-lg-100 mt-n7 mt-lg-n8 d-none d-md-block" src="../../assets/img/inve.png"
                                    alt="car image">
                                <div class="d-flex align-items-center">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 my-auto">
                                <h4 class="text-body opacity-9">welcome aplikasi inventaris</h4>
                                <p>aplikasi ini untuk memenuhi tugas akhir skripsi</p>
                                <hr class="horizontal light mt-1 mb-3">
                                <div class="d-flex align-items-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="/user" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                placeholder="Masukan nama" required="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                placeholder="user@email.com" required="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleFormControlInput1"
                placeholder="Masukan password" required="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">jenis kelamin</label>
            <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
                <option value="laki-laki">laki - laki</option>
                <option value="perempuan">perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nomer telepon</label>
            <input type="number" name="no_tlp" max="999999999999" class="form-control" id="exampleFormControlInput1"
                placeholder="Masukan no telepon" required="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Alamat</label>
            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3" required=""
                placeholder="leuwimunding . . ."></textarea>
        </div>
        {{-- @if (auth()->user()->role !== 'admin') --}}
            <div class="form-group">
                <label for="exampleFormControlSelect1">perusahaan</label>
                <select class="form-control" id="exampleFormControlSelect1" name="perusahaan_id">
                    @foreach ($perusahaans as $perusahaan)
                        <option value="{{ $perusahaan->id }}">{{ $perusahaan->nama }}</option>
                    @endforeach
                </select>
            </div>
        {{-- @endif --}}
        <div class="form-group">
            <label for="exampleFormControlSelect1">Role</label>
            <select class="form-control" name="role" id="exampleFormControlSelect1">
                @if (auth()->user()->role !== 'pimpinan')
                    <option value="admin">admin</option>
                @endif
                {{-- @if (auth()->user()->role !== 'admin') --}}
                    <option value="karyawan">karyawan</option>
                    <option value="pimpinan">pimpinan</option>
                {{-- @endif --}}
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn bg-gradient-info"><i class="fas fa-save pe-2"></i>simpan</button>
        </div>
    </form>
@endsection
