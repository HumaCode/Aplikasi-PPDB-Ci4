<?php

// agar template_frontend terkoneksi dengan database
$db = \Config\Database::connect();

$setting = $db->table('tbl_setting')
    ->where('id', 1)
    ->get()
    ->getRowArray();

$th_ajar = $db->table('tbl_th_ajar')
    ->where('status', 1)
    ->get()
    ->getRowArray();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPDB-Online | <?= $title ?></title>

    <link rel="icon" href="<?= base_url('img/' . $setting['logo']) ?>" type="image*">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/plugins/bs-stepper/css/bs-stepper.min.css"> -->
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/dist/css/adminlte.min.css">
    <style>
        .bg {
            background-image: url('<?= base_url('img/bg.png') ?>');
        }
    </style>

</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed ">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-lightblue">
            <div class="container">
                <a href="<?= base_url() ?>" class="navbar-brand">
                    <img src="<?= base_url('img/' . $setting['logo']) ?>" alt="PPDB Online" width="50px" style="opacity: .8">
                    <span class="brand-text font-weight-light"><b>PPDB Online <?= $setting['nama_sekolah'] ?></b></span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item <?php if ($title == 'Home') {
                                                echo 'active';
                                            } ?>">
                            <a href="<?= base_url() ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Petunjuk Pendaftaran</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Hubungi Kami</a>
                        </li>
                    </ul>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand m-auto">
                    <li class="nav-item">

                        <?php if (!session('level')) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-sign-in-alt"></i>&nbsp; <strong> Login</strong>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= base_url('auth/login') ?>"><i class="fas fa-user-tie"></i>&nbsp; Administrator</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('auth/loginSiswa') ?>"><i class="fas fa-user"></i>&nbsp; Siswa</a>
                        </div>
                    </li>
                <?php } else { ?>

                <?php } ?>


                <?php if (session('level') == 'siswa') { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong> Halo, <?= session('nama_panggilan') ?> </strong>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= base_url('siswa') ?>"><i class="fas fa-address-card"></i>&nbsp; Biodata</a>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" data-toggle="modal" data-target="#confirm"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</button>
                        </div>
                    </li>
                <?php } else if (session('level') == 'admin') { ?>
                    <a class="nav-link " href="<?= base_url('admin') ?>">
                        <i class="fas fa-tachometer-alt"></i> <strong> Dashboard</strong>
                    </a>
                <?php } ?>
                </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2 mt-5">
                        <div class="col-sm-6">
                            <?php if (!$th_ajar) { ?>
                                <h1 class="text-danger"><strong>Pendaftaran tahun ini sudah ditutup</strong></h1>
                            <?php } else { ?>
                                <h1 class="m-0"> Pendaftaran Tahun Pelajaran <?= $th_ajar['ta'] ?></h1>
                            <?php } ?>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="<?= base_url() ?>"><span class="text-dark">PPDB Online</span></a></li>
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
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
                        <a href="<?= base_url('auth/logoutSiswa') ?>" class="btn btn-primary btn-sm">Ya, Logout</a>
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

    <!-- jQuery -->
    <script src="<?= base_url() ?>/AdminLTE3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/AdminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url() ?>/AdminLTE3/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?= base_url() ?>/AdminLTE3/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="<?= base_url() ?>/AdminLTE3/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE3/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?= base_url() ?>/AdminLTE3/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?= base_url() ?>/AdminLTE3/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url() ?>/AdminLTE3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="<?= base_url() ?>/AdminLTE3/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <!-- <script src="<?= base_url() ?>/AdminLTE3/plugins/bs-stepper/js/bs-stepper.min.js"></script> -->
    <!-- dropzonejs -->
    <script src="<?= base_url() ?>/AdminLTE3/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/AdminLTE3/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?= base_url() ?>/AdminLTE3/dist/js/demo.js"></script> -->
    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>/sweetalert/sweetalert2.all.min.js"></script>

    <script>
        // sweetalert flashdata
        const flashData = $('.flash-data').data('flashdata');
        const flash = $('.flash').data('flashdata');
        const login = $('.login').data('flashdata');
        const logout = $('.logout').data('flashdata');
        // jika ada flashDatanya maka jalankan sweetalertnya
        if (flashData) {
            Swal.fire(
                'Berhasil',
                flashData,
                'success'
            )
        }

        if (flash) {
            Swal.fire(
                'Gagal',
                flash,
                'error'
            )
        }

        if (login) {
            Swal.fire({
                icon: 'success',
                title: login,
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 2500,
            })
        }

        if (logout) {
            Swal.fire({
                icon: 'success',
                title: logout,
                text: 'Terimakasih..',
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 3000,
            })
        }

        window.setTimeout(function() {
            $('.alr').fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);



        // tooltops
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        function bacaGambar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#gambar_load').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        };

        $('#preview_gambar').change(function() {
            bacaGambar(this);
        });

        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })


            //Date picker siswa
            $('#reservationdate').datetimepicker({
                format: 'yyyy-MM-DD'
            });

            //Date picker1 ayah
            $('#reservationdate1').datetimepicker({
                format: 'yyyy-MM-DD'
            });

            //Date picker2 ibu
            $('#reservationdate2').datetimepicker({
                format: 'yyyy-MM-DD'
            });

            //Date picker3 wali
            $('#reservationdate3').datetimepicker({
                format: 'yyyy-MM-DD'
            });

            //Date range picker
            $('#reservation').daterangepicker()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            })

            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

        })
    </script>
</body>

</html>