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
    <div class="wrapper ">
        <!-- title row -->
        <div class="row mb-2">
            <div class="col-sm-12">
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <td rowspan="3"><img src="<?= base_url('img/' . $setting['logo']) ?>" class="img-fluid" width="100" alt=""></td>
                            <td></td>
                            <td rowspan="3" width="230"></td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <h1><?= $setting['nama_sekolah'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <h5><?= $setting['alamat'] ?></h5>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <hr>

        <div class="row p-4">
            <div class="col-12 mb-5">
                <div class="text-center">
                    <h5><strong>Surat Keterangan Lulus</strong></h5>
                </div>
            </div>
            <div class="col-3 ">
                <div class="text-center mt-4">
                    <img class="profile-user-img img-fluid img-circle" style="width: 210px !important; height: 210px;" src="<?= base_url('foto/siswa/' . $siswa['foto']) ?>" alt="User profile picture">
                </div>
            </div>
            <div class="col-9">
                <table class="table table-bordered">
                    <tr>
                        <th width="200">No. Pendaftaran</th>
                        <th width="50" class="text-center">:</th>
                        <th><?= $siswa['no_pendaftaran'] ?></th>
                    </tr>
                    <tr>
                        <th width="200">NISN</th>
                        <th width="50" class="text-center">:</th>
                        <th><?= $siswa['nisn'] ?></th>
                    </tr>
                    <tr>
                        <th width="200">Nama Lengkap</th>
                        <th width="50" class="text-center">:</th>
                        <th><?= $siswa['nama_lengkap'] ?></th>
                    </tr>
                    <tr>
                        <th width="200">Tempat/Tanggal Lahir</th>
                        <th width="50" class="text-center">:</th>
                        <th><?= $siswa['tempat_lahir'] . ', ' . tgl_indo($siswa['tgl_lahir']) ?></th>
                    </tr>
                    <tr>
                        <th width="200">Jalur Masuk</th>
                        <th width="50" class="text-center">:</th>
                        <th><?= $siswa['jalur_masuk'] ?></th>
                    </tr>
                    <tr>
                        <th width="200">Jurusan</th>
                        <th width="50" class="text-center">:</th>
                        <th><?= ($siswa['id_jurusan'] != 0) ? $siswa['jurusan'] : '-'  ?></th>
                    </tr>
                </table>
            </div>

        </div>
    </div>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>