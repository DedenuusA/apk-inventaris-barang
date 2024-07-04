<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        td,
        th {
            border: 1px solid;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
    <title>laporan peminjaman</title>
</head>

<body>

    <div class="container">
        <center>
            <br>
            <h1>PT GAWIH JAYA CIREBON</h1>
            <h2>Laporan output produksi barang</h2>
        </center>
        <br />
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>nomer</th>
                    <th>nama</th>
                    <th>perusahaan</th>
                    <th>nama barang</th>
                    <th>jumlah</th>
                    <th>status</th>
                    <th>tanggal</th>
                </tr>
            </thead>
            <tbody class="text-xs">
                @php $i=1 @endphp
                @foreach ($detail_pinjamans as $detail_pinjaman)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $detail_pinjaman->pinjaman->user->name }}</td>
                        <td>{{ $detail_pinjaman->pinjaman->user->perusahaan->nama }}</td>
                        <td>{{ $detail_pinjaman->item->nama_item }}</td>
                        <td>{{ $detail_pinjaman->jumlah }}</td>
                        <td>{{ $detail_pinjaman->pinjaman->status }}</td>
                        <td> {{ date('d-m-Y', strtotime($detail_pinjaman->pinjaman->tanggal_pinjaman)) }}</td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </tbody>
        </table>
    </div>
    <br>
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

</html>
