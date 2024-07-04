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
    <form action="/pinjaman" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1">nama</label>
            <select class="form-control" name="user_id">
                {{-- @foreach ($users as $user)
                    @if ($user->id == auth()->user()->id)
                        <option value="{{ $user->id }}" {{ $user->id == auth()->user()->id ? 'selected' : 'disabled' }}>
                            {{ $user->name }}</option>
                    @endif
                @endforeach --}}
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">tanggal</label>
            <input type="date" name="tanggal_pinjaman" class="form-control" id="exampleFormControlInput1"
                placeholder="masukan tanggal_pinjaman" required="">
        </div>
        {{-- <div class="form-group">
            <label for="exampleFormControlInput1">tanggal pengembalian</label>
            <input type="date" name="tanggal_pengembalian" class="form-control" id="exampleFormControlInput1"
                placeholder="masukan tanggal_pengembalian" required="">
        </div> --}}
        {{-- <div class="form-group">
            <label for="exampleFormControlTextarea1">keterangan</label>
            <textarea class="form-control" name="keterangan" id="exampleFormControlTextarea1" rows="3" required=""
                placeholder="masukan keterangan"></textarea>
        </div> --}}
        <h5>detail pesanan</h5>
        <div class="form-group">
            <button type="button" onclick="tambahFormDetailPinjaman()" class="btn bg-gradient-info btn-sm"><i
                    class="fas fa-plus pe-2"></i>tambah detail</button>
        </div>
        <div class="row d-none" id="form-detail-pinjaman">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">nama barang</label>
                    <select class="form-control form-select" data-placeholder="Pilih barang" onchange="itemdipilih(this)">
                        <option></option>
                        @foreach ($items as $item)
                            <option data-sisa="{{ $item->sisa }}" value="{{ $item->id }}">{{ $item->nama_item }} |
                                harga: {{ $item->harga }} |
                                sisa: {{ $item->sisa }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">jumlah</label>
                    <input type="number" placeholder="" min="1" class="form-control" id="jumlah" />
                </div>
            </div>
            <div class="form-group">
                <button type="button" onclick="hapusFormDetailPinjaman(this)" class="btn bg-gradient-danger btn-sm"><i
                        class="fas fa-trash pe-2"></i>hapus</button>
            </div>
        </div>
        <div id="detail-pinjamans">
        </div>
        <div class="form-group">
            <button type="submit" class="btn bg-gradient-info"><i class="fas fa-save pe-2"></i>simpan</button>
        </div>
    </form>

    @push('scripts')
        <script>
            flatpickr('.datepicker', {
                dateFormat: "Y-m-d",
            }); // flatpickr
            function itemdipilih(element) {
                var sisa = $($(element).find(":selected")[0]).data('sisa');
                $(element).parent().parent().parent().find('#jumlah').attr('max', sisa);
            }

            var index = 0;

            function tambahFormDetailPinjaman() {
                var form_detail_pinjaman = $('#form-detail-pinjaman').clone();
                form_detail_pinjaman.removeClass("d-none");

                form_detail_pinjaman.find('#jumlah').attr('name', 'detail_pinjamans[' + index + '][jumlah]').attr('required',
                    '');

                form_detail_pinjaman.find('.form-select').select2({
                    theme: "bootstrap-5",
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
                        'w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                });
                form_detail_pinjaman.find('.form-select').attr('name', 'detail_pinjamans[' + index + '][item_id]').attr(
                    'required',
                    '');
                $('#detail-pinjamans').append(form_detail_pinjaman);

                index++;
            }

            tambahFormDetailPinjaman();

            function hapusFormDetailPinjaman(element) {
                if ($('[id=form-detail-pinjaman]').length == 2) {
                    alert('detail pinjaman tidak dapat di hapus');
                } else {
                    $(element).parent().parent().remove();
                }
            }
        </script>
    @endpush
@endsection
