@extends('template.master')
@section('title', 'detail')
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
        <h5 class="mb-0">Detail</h5>
    </div>
    <br>
    <form action="/cetak_pdf/{{ $pinjaman->id }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1">nama</label>
            <select class="form-control" id="exampleFormControlSelect1" name="user_id" disabled>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $pinjaman->user_id ? 'selected' : '' }}>
                        {{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">tanggal</label>
            <input type="text" name="tanggal_pinjaman" class="form-control" id="exampleFormControlInput1" disabled
                placeholder="nama" required="" value="{{ date('d-m-Y', strtotime($pinjaman->tanggal_pinjaman)) }}">
        </div>
        {{-- <div class="form-group">
            <label for="exampleFormControlInput1">tanggal_pengembalian</label>
            <input type="text" name="tanggal_pengembalian" class="form-control" id="exampleFormControlInput1" disabled
                placeholder="" required=""
                value="{{ $pinjaman->tanggal_pengembalian ? date('d-m-Y', strtotime($pinjaman->tanggal_pengembalian)) : '' }}">
        </div> --}}
        <div class="form-group">
            <label for="exampleFormControlInput1">keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="exampleFormControlInput1" disabled
                placeholder="" required="" value="{{ $pinjaman->keterangan }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">status</label>
            <input type="text" name="status" class="form-control" id="exampleFormControlInput1" disabled placeholder=""
                required="" value="{{ $pinjaman->status }}">
        </div>
        <h5>detail pesanan</h5>
        @foreach ($pinjaman->detail_pinjamans as $index => $detail_pinjaman)
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">nama barang</label>
                        <select class="form-control" id="exampleFormControlSelect1"disabled
                            name="detail_pinjamans[{{ $index }}][item_id]">
                            @foreach ($items as $item)
                                <option
                                    value="{{ $item->id }}"{{ $item->id == $detail_pinjaman->item_id ? 'selected' : '' }}>
                                    {{ $item->nama_item }} | Rp: {{ $item->harga }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">jumlah</label>
                        <input type="number" placeholder="" class="form-control" disabled
                            name="detail_pinjamans[{{ $index }}][jumlah]" value="{{ $detail_pinjaman->jumlah }}" />
                    </div>
                </div>
            </div>
        @endforeach
        <div class="form-group">
            <label for="exampleFormControlInput1">total harga</label>
            <input type="text" name="keterangan" class="form-control" id="exampleFormControlInput1" disabled
                placeholder="" required="" value="{{ number_format($pinjaman->subtotal) }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn bg-gradient-info"><i class="fa-solid fa-print pe-2"></i>print</button>
        </div>
    </form>
@endsection
