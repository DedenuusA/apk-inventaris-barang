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
    <title>laporan perusahaan</title>
</head>

<body>

    <div class="container">
        <center>
            <br>
            <h1>PT GAWIH JAYA CIREBON</h1>
            <h2>Laporan data perusahaan</h2>
        </center>
        <br />
        <table class="table table-bordered" style="table-layout: fixed">>
            <thead>
                <tr>
                    <th style="width:8%;">nomer</th>
                    <th>nama perusahaan</th>
                    <th>email</th>
                    <th>no telepon</th>
                    <th>alamat</th>
                </tr>
            </thead>
            <tbody class="text-xs">
                @php $i=1 @endphp
                @foreach ($perusahaan as $perusahaan)
                    <tr>
                        <td style="width:8%;">{{ $i++ }}</td>
                        <td>{{ $perusahaan->nama }}</td>
                        <td>{{ $perusahaan->email }}</td>
                        <td>{{ $perusahaan->no_tlp }}</td>
                        <td>{{ $perusahaan->alamat }}</td>
                    </tr>
                @endforeach
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
