<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Perpus - Buku</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        body.dark-mode {
            background: #121212;
            color: #e0e0e0;
        }

        body.dark-mode .navbar-nav.bg-gradient-primary {
            background: #000568;

        }

        body.dark-mode .card {
            background-color: #000568;
            color: #e0e0e0;
        }

        body.dark-mode .table {
            background-color: #333;
            color: #e0e0e0;
        }

        body.dark-mode .modal-content {
            background-color: #333;
            color: #e0e0e0;
        }

        body.dark-mode .card-header {
            background-color: #333;
            color: #e0e0e0;
        }

        body.dark-mode .navbar-nav {
            background-color: #333;
            color: #e0e0e0;
        }

        body.dark-mode .konten {
            background-color: #333;
            color: #e0e0e0;
        }

        body.dark-mode nav {
            background-color: #333;
            color: #e0e0e0;
        }

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
        <li class="nav-item">
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
        
        <li class="nav-item active">
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 mt-4">Laporan</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Laporan Data Buku</h6>
                            
                        </div>
                        <div class="card-body">
                            <a href="/eksportPdf"><button class="btn btn-info mb-3">Eksport PDF</button></a>
                            <a href="/eksportExcel"><button class="btn btn-info mb-3">Eksport Excel</button></a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Judul Buku</th>
                                            <th>Penulis</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Terbit</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $dt)
                                            <tr>
                                                <td>{{ $dt->judul_buku }}</td>
                                                <td>{{ $dt->penulis }}</td>
                                                <td>{{ $dt->penerbit }}</td>
                                                <td>{{ $dt->th_terbit }}</td>
                                                <td>{{ $dt->status }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="https://kit.fontawesome.com/1c31143314.js" crossorigin="anonymous"></script>
    <script>
        // Menghilangkan pesan sukses setelah 3 detik
        setTimeout(function(){
            var sessionMessage = document.getElementById('sessionMessage');
            if(sessionMessage) {
                sessionMessage.style.display = 'none';
            }
        }, 3000); // 3000 milidetik = 3 detik
      </script>
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