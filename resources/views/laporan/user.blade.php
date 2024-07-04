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
    <title>laporan user pengguna</title>
</head>

<body>

    <div class="container">
        <center>
            <br>
            <h1>PT GAWIH JAYA CIREBON</h1>
            <h2>Laporan user pengguna</h2>
        </center>
        <br />
        <table class="table table-bordered" style="table-layout: fixed">
            <thead>
                <tr class="font-9">
                    <th>No</th>
                    <th>Name</th>
                    <th style="width:20%;">Email</th>
                    <th>Jenis kelamin</th>
                    <th style="width:15%;">No Tlp</th>
                    <th>alamat</th>
                    <th>perusahaan</th>
                    <th>role</th>
                </tr>
            </thead>
            <tbody class="text-xs">
                @php $i=1 @endphp
                @foreach ($user_model as $user_model)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $user_model->name }}</td>
                        <td style="width:20%;">{{ $user_model->email }}</td>
                        <td>{{ $user_model->jenis_kelamin }}</td>
                        <td style="width:15%;">{{ $user_model->no_tlp }}</td>
                        <td>{{ $user_model->alamat }}</td>
                        <td>{{ $user_model->perusahaan_id ? @$user_model->perusahaan->nama : '' }}
                        </td>
                        <td>{{ $user_model->role }}</td>
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
