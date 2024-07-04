@extends('template.master')
@section('title', 'barang_keluar')
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
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header mb-0">
                    <h5 class="mb-0">Datatable barang keluar</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-search">
                            <thead class="thead-light">
                                <tr>
                                    <th>nama</th>
                                    <th>nama barang</th>
                                    <th>jumlah</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs">
                                @foreach ($detail_pinjamans as $detail_pinjaman)
                                    <tr>
                                        <td>{{ $detail_pinjaman->pinjaman->user->name }}</td>
                                        <td>{{ $detail_pinjaman->item->nama_item }}</td>
                                        <td>{{ $detail_pinjaman->jumlah }}</td>
                                        <td>
                                            <a href="/detail_pinjaman/{{ $detail_pinjaman->id }}/edit"
                                                class="mb-0 btn btn-outline-success btn-xs"><i
                                                    class="fa-solid fa-pencil pe-2"></i>edit</a>
                                            <form action="/detail_pinjaman/{{ $detail_pinjaman->id }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('yakin ingin hapus data!')">
                                                @method('DELETE')
                                                @csrf
                                                <button value="delete" type="submit"
                                                    class="mb-0 btn btn-outline-danger btn-xs"><i
                                                        class="fas fa-trash-alt pe-2"></i>
                                                    delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
                searchable: true,
                fixedHeight: true
            });
        </script>
    @endpush
@endsection
