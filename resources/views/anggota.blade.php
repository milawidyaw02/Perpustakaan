<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Perpus - Anggota</title>

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
            <div class="sidebar-brand-text mx-3">Halo {{ Auth::user()->username }}</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/dashboardAdmin">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item active">
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 mt-4">Anggota</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Anggota</h6>
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success" id="sessionMessage">
                                <b>Yeayyy!</b> {{session('success')}}
                            </div>
                        @endif
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">
                                Tambah Anggota
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/aksiTambahAnggota" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label class="mb-1">Nama Lengkap</label>
                                                <input type="text" class="form-control form-control-user" name="nama_lengkap">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1">Alamat</label>
                                                <input type="text" class="form-control form-control-user" name="alamat">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1">Nomor Telepon</label>
                                                <input type="text" class="form-control form-control-user" name="no_telp">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1">Email</label>
                                                <input type="text" class="form-control form-control-user" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1">Tanggal Lahir</label>
                                                <input type="date" class="form-control form-control-user" name="tgl_lahir">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1">Tanggal Bergabung</label>
                                                <input type="date" class="form-control form-control-user" name="tgl_gabung">
                                            </div>
                                            <div class="mb-3">
                                                <label class="mb-1">Status Anggota</label>
                                                <select name="status_anggota" class="form-control">
                                                    <option value="Aktif" >Aktif</option>
                                                    <option value="Non Aktif" >Non Aktif</option>
                                                </select>
                                            </div>  
                                            <div class="form-group">
                                                <label for="foto">Foto:</label>
                                                <input type="file" class="form-control" id="foto" name="foto">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tambah Anggota</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telepon</th>
                                            <th>Email</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Tanggal Bergabung</th>
                                            <th>Status Anggota</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $dt)
                                            <tr>
                                                <td>{{ $dt->nama_lengkap }}</td>
                                                <td>{{ $dt->alamat }}</td>
                                                <td>{{ $dt->no_telp }}</td>
                                                <td>{{ $dt->email }}</td>
                                                <td>{{ $dt->tgl_lahir }}</td>
                                                <td>{{ $dt->tgl_bergabung }}</td>
                                                <td>{{ $dt->status_anggota }}</td>
                                                <td> <img id="currentImage" src="{{ asset('assets/img/' . $dt->foto) }}" alt="Gambar" style="max-width: 200px; max-height: 200px;"></td>
                                                <td>
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#ubahModal-{{ $dt->id }}">
                                                        <i class="fas fa-pen fa-sm"></i>
                                                    </button>
                                                    <a href="/aksiHapusAnggota/{{ $dt->id }}">
                                                        <button class="btn btn-danger">
                                                            <i class="fas fa-trash fa-sm"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                             <!-- Modal -->
                                            <div class="modal fade" id="ubahModal-{{ $dt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Anggota</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/aksiUbahAnggota/{{ $dt->id }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label class="mb-1">Nama Lengkap</label>
                                                                <input type="text" class="form-control form-control-user" name="nama_lengkap" value="{{ $dt->nama_lengkap }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="mb-1">Alamat</label>
                                                                <input type="text" class="form-control form-control-user" name="alamat" value="{{ $dt->alamat }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="mb-1">Nomor Telepon</label>
                                                                <input type="text" class="form-control form-control-user" name="no_telp" value="{{ $dt->no_telp}}"
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="mb-1">Email</label>
                                                                <input type="text" class="form-control form-control-user" name="email" value="{{ $dt->email }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="mb-1">Tanggal Lahir</label>
                                                                <input type="date" class="form-control form-control-user" name="tgl_lahir" value="{{ $dt->tgl_lahir }}"
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="mb-1">Tanggal Bergabung</label>
                                                                <input type="date" class="form-control form-control-user" name="tgl_gabung" value="{{ $dt->tgl_bergabung }}"
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="mb-1">Status Anggota</label>
                                                                <select name="status_anggota" class="form-control">
                                                                    <option value="Aktif" {{ $dt->status_anggota == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                                    <option value="Non Aktif" {{ $dt->status_anggota == 'Non Aktif' ? 'selected' : '' }}>Non Aktif</option>
                                                                </select>
                                                            </div>  
                                                            <div class="form-group">
                                                                <label for="foto">Foto:</label>
                                                                <img id="currentImage" src="{{ asset('assets/img/' . $dt->foto) }}" alt="Gambar" style="max-width: 200px; max-height: 200px;"><br>
                                                                <input type="file" class="form-control" id="foto" name="foto" onchange="previewImage(event)"/>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Update Anggota</button>
                                                            <button type="reset" class="btn btn-danger">Reset</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
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
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('currentImage');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        document.getElementById('gambar').addEventListener('change', previewImage);
    </script>

</body>

</html>