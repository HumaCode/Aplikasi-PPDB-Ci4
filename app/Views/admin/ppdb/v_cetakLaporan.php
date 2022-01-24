<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Cetak Laporan</title>
    <link rel="icon" href="<?= base_url('img/' . $setting['logo']) ?>" type="image*">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE3/dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row mb-2">
                <div class="col-md-1">
                    <img src="<?= base_url('img/' . $setting['logo']) ?>" class="img-fluid" width="100" alt="">
                </div>
                <div class="col-md-11">
                    <h2 class="page-header">
                        <?= $setting['nama_sekolah'] ?> <small class="float-right">Tanggal : <?= tgl_indo(date('Y-m-d')) ?></small>
                    </h2>
                    <span>Alamat : <?= $setting['alamat'] ?></span>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h5><strong>Laporan Kelulusan Siswa <?= $tahun ?></strong></h5>
                    </div>
                </div>
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No. Pendaftaran</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Tempat/Tanggal Lahir</th>
                                <th>Jalur Penerimaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($siswa as $s) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $s['no_pendaftaran'] ?></td>
                                    <td><?= $s['nisn'] ?></td>
                                    <td><?= $s['nama_lengkap'] ?></td>
                                    <td><?= $s['tempat_lahir'] . ', ' . tgl_indo($s['tgl_lahir']) ?></td>
                                    <td><?= $s['jalur_masuk'] ?></td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>