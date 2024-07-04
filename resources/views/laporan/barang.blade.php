<!DOCTYPE html>
<html>

<head>
    <title>laporan peminjaman</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <center>
            <br>
            <h4>PT GAWIH JAYA CIREBON</h4>
            <h5>Laporan barang</h5>
        </center>
        <br />
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>nomer</th>
                    <th>nama_kategori</th>
                    <th>nama barang</th>
                    <th>perusahaan</th>
                    <th>stok</th>
                    <th>sisa</th>
                    <th>harga</th>
                </tr>
            </thead>
            <tbody class="text-xs">
                @php $i=1 @endphp
                @foreach ($item as $item)
                    <tr>

                        <td>{{ $i++ }}</td>
                        <td>{{ $item->kategori->nama_kategori }}</td>
                        <td>{{ $item->nama_item }}</td>
                        <td>{{ $item->perusahaan->nama }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->sisa }}</td>
                        <td>{{ $item->harga }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
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
