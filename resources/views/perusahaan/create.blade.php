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
    <form action="/perusahaan" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">nama perusahaan</label>
            <input type="text" name="nama" class="form-control" id="exampleFormControlInput1"
                placeholder="Masukan nama perusahaan" required="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">email perusahaan</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                placeholder="perusahaan@gmail.com" required="">
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
        <div class="form-group">
            <button type="submit" class="btn bg-gradient-info"><i class="fas fa-save pe-2"></i>simpan</button>
        </div>
    </form>
@endsection
