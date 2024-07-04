@extends('template.master')
@section('title', 'estimasi')
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
            <form class="card" method="GET" action="">
                <!-- Card header -->
                <div class="card-header mb-0">
                    <h5 class="mb-0">data estimasi</h5>
                    <span>Data estimasi menggunakan perhitungan rata-rata penjualan dari 2 bulan sebelumnya dari target
                        bulan hitung estimasi.</span>
                    <br><br>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">perusahaan</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="perusahaan_id">
                            <option value="">Pilih (Opsional)</option>
                            @foreach ($perusahaans as $perusahaan)
                                <option value="{{ $perusahaan->id }}">{{ $perusahaan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih bulan</label>
                        <select class="form-control" name="bulan" id="exampleFormControlSelect1">
                            <option value="01" {{ \Carbon\Carbon::now()->format('m') == '1' ? 'selected' : '' }}>Januari
                            </option>
                            <option value="02" {{ \Carbon\Carbon::now()->format('m') == '2' ? 'selected' : '' }}>
                                Februari
                            </option>
                            <option value="03" {{ \Carbon\Carbon::now()->format('m') == '3' ? 'selected' : '' }}>Maret
                            </option>
                            <option value="04" {{ \Carbon\Carbon::now()->format('m') == '4' ? 'selected' : '' }}>April
                            </option>
                            <option value="05" {{ \Carbon\Carbon::now()->format('m') == '5' ? 'selected' : '' }}>Mei
                            </option>
                            <option value="06" {{ \Carbon\Carbon::now()->format('m') == '6' ? 'selected' : '' }}>Juni
                            </option>
                            <option value="07" {{ \Carbon\Carbon::now()->format('m') == '7' ? 'selected' : '' }}>Juli
                            </option>
                            <option value="08" {{ \Carbon\Carbon::now()->format('m') == '8' ? 'selected' : '' }}>Agustus
                            </option>
                            <option value="09" {{ \Carbon\Carbon::now()->format('m') == '9' ? 'selected' : '' }}>
                                September
                            </option>
                            <option value="10" {{ \Carbon\Carbon::now()->format('m') == '10' ? 'selected' : '' }}>
                                Oktober
                            </option>
                            <option value="11" {{ \Carbon\Carbon::now()->format('m') == '11' ? 'selected' : '' }}>
                                November
                            </option>
                            <option value="12" {{ \Carbon\Carbon::now()->format('m') == '12' ? 'selected' : '' }}>
                                Desember
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tahun</label>
                        <select class="form-control" name="tahun" id="exampleFormControlSelect1">
                            @php
                                $check_year = \App\Models\Pinjaman::where('created_at', '!=', '0000-00-00')
                                    ->orderBy('created_at', 'ASC')
                                    ->first();
                                if ($check_year) {
                                    $oldest_year = $check_year->created_at;
                                } else {
                                    $oldest_year = date('Y-m-d');
                                }
                                $oldest_year2 = \Carbon\Carbon::parse($oldest_year)->year;
                                // dd($oldest_year2);
                                for ($y = $oldest_year2; $y <= date('Y'); $y++) {
                                    echo '<option value= ' . $y . ' ' . ($y == date('Y') ? 'selected' : '') . '>' . $y . '</option>';
                                }
                            @endphp
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Hitung Estimasi</button>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        @if ($arr2)
                            <table class="table table-flush" id="datatable-search">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Produk</th>
                                        <th>Jml Terjual 2 Bulan Kebelakang</th>
                                        <th>Estimasi Penjualan Per Hari</th>
                                    </tr>
                                </thead>
                                <tbody class="text-xs">
                                    @foreach ($arr2 as $key => $value)
                                        @php
                                            
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $key }}</td>
                                            <td>{{ $value['jml'] }}</td>
                                            <td>
                                                @php
                                                    // hitung rata-rata
                                                    $avg = round($value['jml'] / $jml_hari, 2);
                                                @endphp
                                                {{ $avg }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h5 class="text-center">SIlahkan pilih bulan dan tahun terlebih dahulu</h5>
                        @endif
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
