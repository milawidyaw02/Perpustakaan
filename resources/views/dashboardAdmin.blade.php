<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Perpus - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body.dark-mode {
            background: #121212;
            color: #e0e0e0;
        }
        body.dark-mode .navbar-nav.bg-gradient-primary,
        body.dark-mode .card,
        body.dark-mode .table,
        body.dark-mode .modal-content,
        body.dark-mode .card-header,
        body.dark-mode .navbar-nav,
        body.dark-mode .konten,
        body.dark-mode nav,
        body.dark-mode .wrap {
            background-color: #333;
            color: #e0e0e0;
        }

    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Halo {{ Auth::user()->nama_lengkap }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/dashboardAdmin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/halamanAnggota">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Anggota</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/halamanBuku">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Buku</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/halamanPeminjaman">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Peminjaman</span></a>
            </li>
    
            <li class="nav-item">
                <a class="nav-link" href="/bukuAPI">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Buku API</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/laporanBuku">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Laporan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/logout">
                    <i class="fas fa-fw fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column wrap">
            <nav class="navbar navbar-expand topbar static-top shadow">
                <!-- Other navbar content -->
                <ul class="navbar-nav ml-auto">
                    <!-- Other items -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="theme-toggle">
                            <i class="fas fa-adjust"></i>
                            <span class="ml-2">Toggle Theme</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <div id="content" class="konten">
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Buku</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $buku->count() }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Anggota</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $anggota->count() }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Buku Tersedia</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $buku->where('status', '=', 'Tersedia')->count() }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                               Jumlah Anggota Aktif</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $anggota->where('status_anggota', '=', 'Aktif')->count() }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Anggota</th>
                                        <th>Alamat</th>
                                        <th>Nomor Telepon</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $tambah = 1;
                                    @endphp
                                    @foreach ($member as $dt)
                                        <tr>
                                            <td>{{ $tambah++ }}</td>
                                            <td>{{ $dt->nama_lengkap }}</td>
                                            <td>{{ $dt->alamat }}</td>
                                            <td>{{ $dt->no_telp }}</td>
                                            <td>{{ $dt->status_anggota }}</td>
                                        </tr>
                                         
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="/halamanAnggota">Lihat Anggota Lainnya</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    @foreach ($book as $dt)
                                        <tr>
                                            <td>{{ $tambah++ }}</td>
                                            <td>{{ $dt->judul_buku }}</td>
                                            <td>{{ $dt->penulis }}</td>
                                            <td>{{ $dt->penerbit }}</td>
                                            <td>{{ $dt->th_terbit }}</td>
                                            
                                        </tr>
                                         
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="/halamanBuku">Lihat Buku Lainnya</a>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="https://kit.fontawesome.com/1c31143314.js" crossorigin="anonymous"></script>
    <script>
        // Select the theme toggle button
const themeToggleButton = document.getElementById('theme-toggle');

// Add an event listener to the button
themeToggleButton.addEventListener('click', () => {
    // Toggle the 'dark-mode' class on the body element
    document.body.classList.toggle('dark-mode');

    // Optionally, save the theme preference in localStorage
    if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }
});

// On page load, check for saved theme preference and apply it
document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
    }
});
</script>
</body>

</html>