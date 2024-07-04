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
    <!-- Card header -->
    <div class="card-header mb-0">
        <h5 class="mb-0">Form edit</h5>
    </div>
    <br>
    <form action="/detail_pinjaman/{{ $detail_pinjaman->id }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1">nama</label>
            <select class="form-control" id="exampleFormControlSelect1" name="pinjaman_id">
                @foreach ($pinjamans as $pinjaman)
                    <option value="{{ $pinjaman->id }}"
                        {{ $pinjaman->id == $detail_pinjaman->pinjaman_id ? 'selected' : '' }}>
                        {{ $pinjaman->user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">nama barang</label>
            <select class="form-control" id="exampleFormControlSelect1" name="item_id">
                @foreach ($items as $item)
                    <option value="{{ $item->id }}"{{ $item->id == $detail_pinjaman->item_id ? 'selected' : '' }}>
                        {{ $item->nama_item }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">jumlah</label>
            <input type="number" name="jumlah" class="form-control" id="exampleFormControlInput1"
                placeholder="masukan deskripsi" required="" value="{{ $detail_pinjaman->jumlah }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn bg-gradient-info"><i class="fas fa-save pe-2"></i>update</button>
        </div>
    </form>
@endsection
