<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PPDB-Online | <?= $title ?></title>

  <link rel="icon" href="<?= base_url('img/school.png') ?>" type="image*">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE3') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE3') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE3') ?>/dist/css/adminlte.min.css">

  <style>
    .bg {
      background-image: url('<?= base_url('img/bg.png') ?>');
    }
  </style>
</head>
<body class="hold-transition login-page bg">

  <!-- flashdata sweetalert -->
  <?php 
  if(session()->getFlashdata('pesan')) { ?>
        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>
    <?php }else{ ?>
        <div class="flash" data-flashdata="<?= session()->getFlashdata('p') ?>"></div>
    <?php } ?>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-lightblue">
    <div class="card-header text-center">
      <a href="#" style="cursor: not-allowed;" class="h1"><b>PPDB</b> Online</a>
    </div>
    <div class="card-body">
    

    <p class="login-box-msg">Halaman Login Administrator</p>
      <?= form_open('auth/cek_login_user') ?>
      <?= csrf_field() ?>

        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <p class="text-danger pl-2"><strong><?= $validation->hasError('email') ? $validation->getError('email') : '' ?></strong></p>


        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <p class="text-danger pl-2"><strong><?= $validation->hasError('password') ? $validation->getError('password') : '' ?></strong></p>


        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
                <a href="<?= base_url() ?>" class="text-dark">
                    <i class="fa fa-globe"></i> Website
                </a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      <?= form_close() ?>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('AdminLTE3') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('AdminLTE3') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('AdminLTE3') ?>/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>/sweetalert/sweetalert2.all.min.js"></script>

<script>


    // sweetalert flashdata
    const flashData = $('.flash-data').data('flashdata');
    const flash     = $('.flash').data('flashdata');
        // jika ada flashDatanya maka jalankan sweetalertnya
        if(flashData) {
            Swal.fire(
                'Berhasil',
                flashData,
                'success'
            )
        }

        if(flash) {
            Swal.fire(
                'Gagal',
                flash,
                'error'
            )
        }

  </script>
</body>
</html>
