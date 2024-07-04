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
    <form action="/item" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1">kategori</label>
            <select class="form-control" id="exampleFormControlSelect1" name="kategori_id">
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">nama barang</label>
            <input type="text" name="nama_item" class="form-control" id="exampleFormControlInput1"
                placeholder="masukan nama_item" required="">
        </div>
        <div class="form-group">
            {{-- <label for="exampleFormControlInput1">Satuan</label> --}}
            <input type="text" name="deskripsi" class="form-control" id="exampleFormControlInput1" value="bks" hidden
                placeholder="masukan deskripsi" required="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">stok</label>
            <input type="number" name="stok" class="form-control" id="exampleFormControlInput1"
                placeholder="masukan stok" required="">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" placeholder="masukan harga" required="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn bg-gradient-info"><i class="fas fa-save pe-2"></i>simpan</button>
        </div>
    </form>
@endsection
