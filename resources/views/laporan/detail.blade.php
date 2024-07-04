<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        cetak pdf
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>


<body>
    <div class="container">
        <center>
            <h1>
                {{ auth()->user()->perusahaan->nama }}
            </h1>
            <h2>Data Pinjaman</h2>
        </center>
        <br />
        <dl class="row">
            <dt class="col-sm-3">Nama :</dt>
            <dd class="col-sm-9">
                <select class="form-control"name="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $pinjaman->user_id ? 'selected' : '' }}>
                            {{ $user->name }}</option>
                    @endforeach
                </select>
            </dd>

            <dt class="col-sm-3">tanggal pinjaman :</dt>
            <dd class="col-sm-9">
                <input type="text" class="form-control"
                    value="{{ date('d-m-Y', strtotime($pinjaman->tanggal_pinjaman)) }}">
            </dd>

            {{-- <dt class="col-sm-3">tgl pengembalian :</dt>
            <dd class="col-sm-9">
                <input type="text" name="tanggal_pengembalian" class="form-control"
                    value="{{ $pinjaman->tanggal_pengembalian ? date('d-m-Y', strtotime($pinjaman->tanggal_pengembalian)) : '' }}">
            </dd> --}}

            <dt class="col-sm-3">keterangan :</dt>
            <dd class="col-sm-9">
                <input type="text" name="keterangan" class="form-control" value="{{ $pinjaman->keterangan }}">
            </dd>

            <dt class="col-sm-3">status :</dt>
            <dd class="col-sm-9">
                <input type="text" name="status" class="form-control" value="{{ $pinjaman->status }}">
            </dd>
        </dl>
        <br>
        <h2>
            <center>
                detail pinjaman
            </center>
        </h2>
        <br>
        <table class='table table-table-striped'>
            <thead class="table-secondary">
                <tr>
                    <th>nomer</th>
                    <th>nama barang</th>
                    <th>jumlah</th>
                </tr>
            </thead>
            <tbody class="text-xs">
                @php $i=1 @endphp
                @foreach ($pinjaman->detail_pinjamans as $index => $detail_pinjaman)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>
                            <select class="form-group" name="detail_pinjamans[{{ $index }}][item_id]">
                                @foreach ($items as $item)
                                    <option
                                        value="{{ $item->id }}"{{ $item->id == $detail_pinjaman->item_id ? 'selected' : '' }}>
                                        {{ $item->nama_item }}| Rp: {{ $item->harga }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="form-group" type="text"
                                name="detail_pinjamans[{{ $index }}][jumlah]"
                                value="{{ $detail_pinjaman->jumlah }}" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <div class="form-group">
                <label for="exampleFormControlInput1">total harga</label>
                <input type="text" name="keterangan" class="form-control" id="exampleFormControlInput1" disabled
                    placeholder="" required="" value="{{ number_format($pinjaman->subtotal) }}">
            </div>
        </table>
    </div>
    <p><em>note :</em>
        bawa bukti ini untuk di serahkan ke pimpinan perusahaan dengan catatan
        STATUS "DI
        SETUJUI"
    </p>
    <footer class="footer pt-3  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        aplikasi inventaris <i class="fa fa-heart"></i> by
                        <a href="#" class="font-weight-bold" target="_blank">deden uus
                            aprianto</a>
                        teknik informatika UMC
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
