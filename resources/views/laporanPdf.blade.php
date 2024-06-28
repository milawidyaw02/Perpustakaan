<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .logo img {
            width: 100px; /* Adjust the width as needed */
            margin-right: 20px;
        }

        .header-text h1, .header-text h2, .header-text h3 {
            margin: 5px 0;
        }

	footer {
            position: fixed;
            bottom: -30px;
            left: 0px;
            right: 0px;
            height: 50px;
            text-align: center;
            line-height: 35px;
        }

        .page-number:after {
            content: counter(page);
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="assets/img/LOGOUNTAG.png" alt="Logo">
            </div>
            <div class="header-text">
                <h1>PRODI TEKNIK INFORMATIKA</h1>
                <h2>FAKULTAS TEKNIK</h2>
                <h3>UNIVERSITAS 17 AGUSTUS 1945 SURABAYA</h3>
            </div>
        </header>
        <h3>Laporan Buku Yang Ada</h3>
    <footer>
        <div class="page-number">Halaman </div>
        <div>Tanggal Cetak: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</div>
    </footer>
    <main>
        <h2>Data Buku</h2>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $tambah = 1;
                @endphp
                @foreach ($data as $dt)
                <tr>
                    <td>{{ $tambah++ }}</td>
                    <td>{{ $dt->judul_buku }}</td>
                    <td>{{ $dt->penulis }}</td>
                    <td>{{ $dt->penerbit }}</td>
                    <td>{{ $dt->th_terbit}}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>
