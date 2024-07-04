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
    <form action="/pinjaman/{{ $pinjaman->id }}" method="POST">
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
        {{-- <div class="form-group">
            <label for="exampleFormControlInput1">tanggal</label>
            <input type="text" name="tanggal_pinjaman" class="form-control" id="exampleFormControlInput1" required=""
                value="{{ date('d-m-Y', strtotime($pinjaman->tanggal_pinjaman)) }}">
        </div> --}}
        {{-- <div class="form-group">
            <label for="exampleFormControlInput1">tanggal pengembalian</label>
            <input type="text" name="tanggal_pengembalian" class="form-control" id="exampleFormControlInput1"
                required=""
                value="{{ $pinjaman->tanggal_pengembalian ? date('d-m-Y', strtotime($pinjaman->tanggal_pengembalian)) : '' }}">
        </div> --}}
        <div class="form-group">
            <label for="exampleFormControlInput1">keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="exampleFormControlInput1"
                placeholder="tulis pesan alasan di setujui atau di tolak" required=""
                value="{{ $pinjaman->keterangan }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">status</label>
            <select class="form-control" name="status" id="exampleFormControlSelect1">
                <option value="menunggu_respon" {{ $pinjaman->status == 'menunggu_respon' ? 'selected' : '' }}>menunggu
                    respon</option>
                <option value="di_setujui"{{ $pinjaman->status == 'di_setujui' ? 'selected' : '' }}>di setujui</option>
                <option value="di_tolak" {{ $pinjaman->status == 'di_tolak' ? 'selected' : '' }}>di tolak</option>
                </option>
            </select>
        </div>
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
                        @foreach ($items as $item)
                            <option></option>
                            <option data-sisa="{{ $item->sisa }}" value="{{ $item->id }}">{{ $item->nama_item }} |
                                harga : {{ $item->harga }} |
                                sisa: {{ $item->sisa }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">jumlah</label>
                    <input type="number" min="1" placeholder="" class="form-control" id="jumlah" />
                </div>
            </div>
            <div class="form-group">
                <button type="button" onclick="hapusFormDetailPinjaman(this)" class="btn bg-gradient-danger btn-sm"><i
                        class="fas fa-trash pe-2"></i>hapus</button>
            </div>
        </div>
        <div id="detail-pinjamans">
            @foreach ($pinjaman->detail_pinjamans as $index => $detail_pinjaman)
                <div class="row" id="form-detail-pinjaman">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">nama barang</label>
                            <select class="form-control form-select show" onchange="itemdipilih(this)"
                                name="detail_pinjamans[{{ $index }}][item_id]" required>
                                @foreach ($items as $item)
                                    <option data-sisa="{{ $item->sisa }}"
                                        value="{{ $item->id }}"{{ $item->id == $detail_pinjaman->item_id ? 'selected' : '' }}>
                                        {{ $item->nama_item }} | harga: {{ $item->harga }} | sisa: {{ $item->sisa }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">jumlah</label>
                            <input type="number" min="1"
                                max="{{ $detail_pinjaman->jumlah + $detail_pinjaman->item->sisa }}" placeholder=""
                                class="form-control" name="detail_pinjamans[{{ $index }}][jumlah]"
                                value="{{ $detail_pinjaman->jumlah }}" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" onclick="hapusFormDetailPinjaman(this)"
                            class="btn bg-gradient-danger btn-sm"><i class="fas fa-trash pe-2"></i>hapus</button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="form-group">
            <button type="submit" class="btn bg-gradient-info"><i class="fas fa-save pe-2"></i>simpan</button>
        </div>
    </form>

    @push('scripts')
        <script>
            flatpickr('.datepicker', {
                dateFormat: "d-m-Y",
                defaultDate: "{{ date('d-m-Y', strtotime($pinjaman->tanggal_pinjaman)) }}",
            }); // flatpickr
            function itemdipilih(element) {
                var sisa = $($(element).find(":selected")[0]).data('sisa');
                $(element).parent().parent().parent().find('#jumlah').attr('max', sisa);
            }

            var index = {{ count($pinjaman->detail_pinjamans) }};

            function tambahFormDetailPinjaman() {
                var form_detail_pinjaman = $('#form-detail-pinjaman').clone();
                form_detail_pinjaman.removeClass("d-none");
                form_detail_pinjaman.find('.form-select').attr('name', 'detail_pinjamans[' + index + '][item_id]').attr(
                    'required',
                    '');
                form_detail_pinjaman.find('.form-select').select2({
                    theme: "bootstrap-5",
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
                        'w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                });
                form_detail_pinjaman.find('#jumlah').attr('name', 'detail_pinjamans[' + index + '][jumlah]').attr('required',
                    '');
                $('#detail-pinjamans').append(form_detail_pinjaman);

                index++;
            }

            $('.show').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
                    'w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
            });

            // tambahFormDetailpinjaman();

            function hapusFormDetailPinjaman(element) {
                if ($('[id=form-detail-pinjaman]').length == 1) {
                    alert('detail pinjaman tidak dapat di hapus');
                } else {
                    $(element).parent().parent().remove();
                }
            }
        </script>
    @endpush
@endsection
