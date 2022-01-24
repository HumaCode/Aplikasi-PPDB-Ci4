<?php

// agar template_frontend terkoneksi dengan database
$db = \Config\Database::connect();

$setting = $db->table('tbl_setting')
  ->where('id', 1)
  ->get()
  ->getRowArray();

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | <?= $title ?></title>

  <link rel="icon" href="<?= base_url('img/' . $setting['logo']) ?>" type="image*">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/plugins/summernote/summernote-bs4.min.css">


  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>/AdminLTE3/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>/AdminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?= base_url() ?>/AdminLTE3/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/AdminLTE3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/AdminLTE3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>/AdminLTE3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/AdminLTE3/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>/AdminLTE3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/AdminLTE3/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url() ?>/AdminLTE3/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url() ?>/AdminLTE3/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url() ?>/AdminLTE3/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url() ?>/AdminLTE3/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url() ?>/AdminLTE3/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>/AdminLTE3/dist/js/adminlte.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url() ?>/AdminLTE3/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url() ?>/sweetalert/sweetalert2.all.min.js"></script>

  <style>
    .bg {
      background-image: url('<?= base_url('img/bg.png') ?>');
    }
  </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?= base_url() ?>/img/school.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-lightblue navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <h3>Halaman Admin</h3>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-tie"></i>&nbsp; <strong> Selamat datang <?= session('nama_user') ?></strong>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <button class="dropdown-item" data-toggle="modal" data-target="#confirm"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</button>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url('img/' . $setting['logo']) ?>" alt="PPDB-Online" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PPDB-Online</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('foto/' . session('foto')) ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= session('nama_user') ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column mb-5" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-header">MENU</li>

            <li class="nav-item">
              <a href="<?= base_url('admin') ?>" class="nav-link <?php if ($title == 'Dashboard') {
                                                                    echo 'active';
                                                                  } ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('pekerjaan') ?>" class="nav-link <?php if ($title == 'Pekerjaan') {
                                                                        echo 'active';
                                                                      } ?>">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>Pekerjaan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('pendidikan') ?>" class="nav-link <?php if ($title == 'Pendidikan') {
                                                                        echo 'active';
                                                                      } ?>">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>Pendidikan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('jurusan') ?>" class="nav-link <?php if ($title == 'Jurusan') {
                                                                      echo 'active';
                                                                    } ?>">
                <i class="nav-icon fas fa-list-ul"></i>
                <p>Jurusan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('ta') ?>" class="nav-link <?php if ($title == 'Tahun Pelajaran') {
                                                                echo 'active';
                                                              } ?>">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>Tahun Pelajaran</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('agama') ?>" class="nav-link <?php if ($title == 'Agama') {
                                                                    echo 'active';
                                                                  } ?>">
                <i class="nav-icon fas fa-cog"></i>
                <p>Agama</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('jalurMasuk') ?>" class="nav-link <?php if ($title == 'Jalur Masuk') {
                                                                        echo 'active';
                                                                      } ?>">
                <i class="nav-icon fas fa-user-plus"></i>
                <p>Jalur Masuk</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('penghasilan') ?>" class="nav-link <?php if ($title == 'Penghasilan') {
                                                                          echo 'active';
                                                                        } ?>">
                <i class="nav-icon fas fa-money-bill-wave"></i>
                <p>Penghasilan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('lampiran') ?>" class="nav-link <?php if ($title == 'Lampiran') {
                                                                      echo 'active';
                                                                    } ?>">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Lampiran</p>
              </a>
            </li>

            <li class="nav-item <?php if ($title == 'Pendaftar Masuk' || $title == 'Pendaftar Diterima' || $title == 'Pendaftar Ditolak' || $title == 'Detail Siswa') {
                                  echo 'menu-open';
                                } ?>">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                  Pendaftaran
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('ppdb') ?>" class="nav-link <?php if ($title == 'Pendaftar Masuk' || $title == 'Detail Siswa') {
                                                                      echo 'active';
                                                                    } ?>">
                    <i class="nav-icon fas fa-arrow-alt-circle-down text-lightblue"></i>
                    <p>Masuk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('ppdb/listditerima') ?>" class="nav-link <?php if ($title == 'Pendaftar Diterima') {
                                                                                    echo 'active';
                                                                                  } ?>">
                    <i class="nav-icon fas fa-check-circle text-success"></i>
                    <p>Diterima</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('ppdb/listditolak') ?>" class="nav-link <?php if ($title == 'Pendaftar Ditolak') {
                                                                                  echo 'active';
                                                                                } ?>">
                    <i class="nav-icon fas fa-times-circle text-danger"></i>
                    <p>Ditolak</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('ppdb/laporan') ?>" class="nav-link <?php if ($title == 'Laporan') {
                                                                          echo 'active';
                                                                        } ?>">
                <i class="nav-icon far fa-clipboard"></i>
                <p>Laporan</p>
              </a>
            </li>

            <div class="user-panel mt-2 pb-2 mb-2 d-flex"></div>

            <li class="nav-item">
              <a href="<?= base_url('user') ?>" class="nav-link <?php if ($title == 'User') {
                                                                  echo 'active';
                                                                } ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>User</p>
              </a>
            </li>


            <li class="nav-item <?php if ($title == 'Pengaturan' || $title == 'Banner' || $title == 'Beranda') {
                                  echo 'menu-open';
                                } ?>">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-wrench"></i>
                <p>
                  Pengaturan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/setting') ?>" class="nav-link <?php if ($title == 'Pengaturan') {
                                                                                echo 'active';
                                                                              } ?>">
                    <i class="nav-icon fas fa-cogs "></i>
                    <p>Seting Website</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('banner') ?>" class="nav-link <?php if ($title == 'Banner') {
                                                                        echo 'active';
                                                                      } ?>">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>Setting Banner</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/beranda') ?>" class="nav-link <?php if ($title == 'Beranda') {
                                                                                echo 'active';
                                                                              } ?>">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>Setting Beranda</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $title ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>"><span class="text-dark">PPDB Online</span></a></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <?= $this->renderSection('content') ?>

          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <div class="modal fade" id="confirm">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text-warning"><i class="fas fa-exclamation-triangle"></i>&nbsp; Konfirmasi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3>Apakah anda yakin akan logout..?</h3>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-primary btn-sm">Ya, Logout</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= $setting['web'] ?>" target="_blank"><?= $setting['nama_sekolah'] ?></a>.</strong>
    </footer>
  </div>
  <!-- ./wrapper -->


  <script>
    window.setTimeout(function() {
      $('.alert').fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 3000);

    // sweetalert flashdata
    const flashData = $('.flash-data').data('flashdata');
    // jika ada flashDatanya maka jalankan sweetalertnya
    if (flashData) {
      Swal.fire(
        'Berhasil',
        flashData,
        'success'
      )
    }

    // tombol hapus
    $('.tombol-hapus').on('click', function(e) {
      e.preventDefault();

      const href = $(this).attr('href');

      Swal.fire({
        title: 'Apakah Anda Yakin.?',
        text: "Data ini akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
    });
  </script>

</body>

</html>