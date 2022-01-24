<?= $this->extend('template/template-frontend') ?>

<?= $this->section('content') ?>

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
<!-- flashdata sweetalert -->
<?php

if (session()->getFlashdata('login')) { ?>
    <div class="login" data-flashdata="<?= session()->getFlashdata('login') ?>"></div>
<?php } else if (session()->getFlashdata('pesan')) { ?>
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>
<?php } ?>

<div class="col-lg-12">

    <?php if ($biodata['stat_pendaftaran'] == 0 && $biodata['stat_ppdb'] == 0) { ?>
        <div class="alert alert-warning alert-dismissible">
            <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian.!</h5>
            Lengkapi dahulu formulir pendaftaran anda sebelum melanjutkan pendaftaran..!!! <br>
            Isikan data dengan benar. Data tidak bisa di rubah setelah menekan tombol lanjut pendaftaran
        </div>
    <?php } else if ($biodata['stat_pendaftaran'] == 1 && $biodata['stat_ppdb'] == 0) {  ?>
        <div class="alert bg-lightblue alert-dismissible">
            <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian.!</h5>
            Formulir pendaftaran berhasil dikirim <br>
            Harap cek akun anda secara berkala untuk mengetahui hasil pendaftaran...
        </div>
    <?php } else if ($biodata['stat_pendaftaran'] == 1 && $biodata['stat_ppdb'] == 1) { ?>
        <div class="alert alert-success alert-dismissible">
            <h5><i class="icon fas fa-exclamation-triangle"></i> Selamat.!</h5>
            Kamu Lulus Seleksi... <br>
            Silahkan unduh bukti kelulusan <a href="<?= base_url('siswa/buktiLulus') ?>" target="_blank">disini..!!</a>
        </div>
    <?php } else if ($biodata['stat_pendaftaran'] == 1 && $biodata['stat_ppdb'] == 2) {  ?>
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-exclamation-triangle"></i> Mohon maaf.!</h5>
            Kamu tidak lolos kualifikasi... <br>
            Tetap semangat...
        </div>
    <?php } ?>

    <?php
    $errors = session()->getFlashdata('errors');
    if (!empty($errors)) { ?>
        <div class="alert alert-danger alr" role="alert">
            <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal Menambahkan Berkas.!</h5>
            <ul>
                <?php foreach ($errors as $error) { ?>
                    <li><?= esc($error) ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>

    <?php if ($biodata['stat_ppdb'] == 0) { ?>
        <div class="card card-outline card-lightblue">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list-alt mr-1"></i><strong>Formulir Pendaftaran</strong></h3>
                <div class="card-tools">
                    <strong class="text-danger">Tanggal Daftar, <?= tgl_indo($biodata['tgl_pendaftaran']) ?></strong>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-lightblue card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-list mr-1"></i><strong>Pendaftaran</strong></h3>
                                <div class="card-tools">
                                    <?php if ($biodata['stat_pendaftaran'] == 0) { ?>
                                        <a href="" class="btn btn-xs btn-flat" data-toggle="modal" data-target="#editPendaftaran<?= $biodata['id_siswa'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                            <i class="fas fa-pencil-alt mr-1 text-lightblue"></i>
                                        </a>
                                    <?php } ?>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong><i class="fas fa-table mr-1"></i> NISN</strong>
                                        <p class="text-muted"><?= $biodata['nisn'] ?></p>
                                        <hr>
                                    </div>
                                    <div class="col-md-3">
                                        <strong><i class="fas fa-table mr-1"></i> Tanggal Pendaftaran</strong>
                                        <p class="text-muted"><?= tgl_indo($biodata['tgl_pendaftaran']) ?></p>
                                        <hr>
                                    </div>
                                    <div class="col-md-3">
                                        <strong><i class="fas fa-table mr-1"></i> Nomor Pendaftaran</strong>
                                        <p class="text-muted"><?= $biodata['no_pendaftaran'] ?></p>
                                        <hr>
                                    </div>
                                    <div class="col-md-3">
                                        <strong><i class="fas fa-table mr-1"></i> Jalur Masuk</strong>
                                        <p class="text-muted"><?= ($biodata['jalur_masuk'] == null) ? '<strong class="text-danger">Belum Diisi</strong>' : $biodata['jalur_masuk'] ?></p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <?php if (session()->getFlashdata('errors')) { ?>
                            <p class="text-danger pl-2"><strong><?= $validation->hasError('foto') ? $validation->getError('foto') : '' ?></strong></p>
                        <?php } ?>
                    </div>


                    <div class="col-md-3">
                        <div class="card card-lightblue card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <?php if ($biodata['foto'] == null) { ?>
                                        <img class="profile-user-img img-fluid img-circle" style="width: 210px !important;" src="<?= base_url('img/noimage.png') ?>" alt="User profile picture">
                                </div>
                            <?php } else { ?>
                                <img class="profile-user-img img-fluid img-circle" style="width: 210px !important; height: 210px;" src="<?= base_url('foto/siswa/' . $biodata['foto']) ?>" alt="User profile picture">
                            </div>
                        <?php } ?>

                        <?php if ($biodata['id_jurusan'] == 0) { ?>
                            <h3 class="profile-username text-center"><span class="text-lightblue">Nomer : <?= $biodata['no_pendaftaran'] ?></span></h3>
                            <hr class="p-0">
                        <?php } else { ?>
                            <h3 class="profile-username text-center"><span class="text-lightblue"><?= $biodata['jurusan'] ?></span></h3>
                        <?php } ?>
                        <hr class="p-0">
                        <hr class="p-0">
                        <hr class="p-0">

                        <?php if ($biodata['foto'] == null) { ?>
                            <a href="" data-toggle="modal" data-target="#editFoto<?= $biodata['id_siswa'] ?>" class="btn btn-flat btn-xs btn-block bg-lightblue">Ubah Foto</a>
                        <?php } else { ?>
                            <button class="btn btn-flat btn-xs btn-block bg-lightblue" style="pointer-events: none;">Foto</button>
                        <?php } ?>
                        </div>
                    </div>
                </div>

                <!-- identitas siswa -->
                <div class="col-md-9">
                    <div class="card card-lightblue card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-graduation-cap mr-1"></i><strong>Identitas Siswa</strong></h3>
                            <div class="card-tools">
                                <?php if ($biodata['stat_pendaftaran'] == 0) { ?>
                                    <a href="" class="btn btn-xs btn-flat" data-toggle="modal" data-target="#editIdentitas<?= $biodata['id_siswa'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                        <i class="fas fa-pencil-alt mr-1 text-lightblue"></i>
                                    </a>
                                <?php } ?>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong><i class="fas fa-book mr-1"></i> Nama Lengkap</strong>
                                    <p class="text-muted"><?= $biodata['nama_lengkap'] ?></p>
                                    <hr>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> NIK</strong>
                                    <p class="text-muted"><?= ($biodata['nik'] == null) ? '<span class="text-danger">Wajib diisi.!!!</span>' : $biodata['nik'] ?></p>
                                    <hr>
                                    <strong><i class="far fa-file-alt mr-1"></i> Agama</strong>
                                    <p class="text-muted">
                                        <span class="tag tag-danger"><?= ($biodata['agama'] == null) ? '<span class="text-danger">Wajib diisi.!!!</span>' : $biodata['agama'] ?></span>
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-phone-alt mr-1"></i> No Telepon</strong>
                                    <p class="text-muted"><?= ($biodata['no_telepon'] == null) ? '<span class="text-danger">Wajib diisi.!!!</span>' : $biodata['no_telepon'] ?></p>
                                </div>
                                <div class="col-md-4">
                                    <strong><i class="fas fa-book mr-1"></i> Nama Panggilan</strong>
                                    <p class="text-muted"><?= $biodata['nama_panggilan'] ?></p>
                                    <hr>
                                    <strong><i class="fas fa-calendar-alt mr-1"></i> Tempat Tanggal Lahir</strong>
                                    <p class="text-muted"><?= $biodata['tempat_lahir'] . ', ' . tgl_indo($biodata['tgl_lahir']) ?></p>
                                    <hr>
                                    <strong><i class="fas fa-genderless mr-1"></i> Jenis Kelamin</strong>
                                    <p class="text-muted">
                                        <span class="tag tag-danger"><?= ($biodata['jk'] == 'L') ? 'Laki-laki' : 'Perempuan' ?></span>
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-language mr-1"></i> Bahasa Sehari-hari dirumah</strong>
                                    <p class="text-muted"><?= ($biodata['bahasa'] == null) ? '<span class="text-danger">Wajib diisi.!!!</span>' : $biodata['bahasa'] ?> </p>
                                </div>
                                <div class="col-md-4">
                                    <strong><i class="fas fa-user-friends mr-1"></i> Jumlah Saudara Angkat</strong>
                                    <p class="text-muted"><?= ($biodata['saudara_angkat'] == null) ? '<span class="text-danger">Wajib diisi.!!!</span>' : $biodata['saudara_angkat'] ?></p>
                                    <hr>
                                    <strong><i class="fas fa-user-friends mr-1"></i> Jumlah Saudara Tiri</strong>
                                    <p class="text-muted"><?= ($biodata['saudara_tiri'] == null) ? '<span class="text-danger">Wajib diisi.!!!</span>' : $biodata['saudara_tiri'] ?></p>
                                    <hr>
                                    <strong><i class="fas fa-user mr-1"></i> Anak Keberapa</strong>
                                    <p class="text-muted"><?= ($biodata['anak_ke'] == null) ? '<span class="text-danger">Wajib diisi.!!!</span>' : $biodata['anak_ke'] ?></p>
                                    <hr>
                                    <strong><i class="fas fa-users mr-1"></i> Jumlah Saudara Kandung</strong>
                                    <p class="text-muted"><?= ($biodata['jml_saudara'] == null) ? '<span class="text-danger">Wajib diisi.!!!</span>' : $biodata['jml_saudara'] ?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- alamat lengkap -->
            <div class="col-md-12">
                <div class="card card-cyan card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-home mr-1"></i><strong> Alamat Lengkap</strong></h3>
                        <div class="card-tools">
                            <?php if ($biodata['stat_pendaftaran'] == 0) { ?>
                                <a href="" class="btn btn-xs btn-flat" data-toggle="modal" data-target="#editDataAlamat<?= $biodata['id_siswa'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                    <i class="fas fa-pencil-alt mr-1 text-lightblue"></i>
                                </a>
                            <?php } ?>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Provinsi</strong>
                                <p class="text-muted"><?= ($biodata['nama_provinsi'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['nama_provinsi'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Kabupaten</strong>
                                <p class="text-muted"><?= ($biodata['nama_kabupaten'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['nama_kabupaten'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Kecamatan</strong>
                                <p class="text-muted"><?= ($biodata['nama_kecamatan'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['nama_kecamatan'] ?> </p>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Desa</strong>
                                <p class="text-muted"><?= ($biodata['desa'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['desa'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Rt</strong>
                                <p class="text-muted"><?= ($biodata['rt'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['rt'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Rw</strong>
                                <p class="text-muted"><?= ($biodata['rw'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['rw'] ?> </p>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Kode Pos</strong>
                                <p class="text-muted"><?= ($biodata['kode_pos'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['kode_pos'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Jarak Rumah Dengan Sekolah</strong>
                                <p class="text-muted"><?= ($biodata['jarak_sekolah'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['jarak_sekolah'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Ke Sekolah Dengan</strong>
                                <p class="text-muted"><?= ($biodata['berangkat'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['berangkat'] ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- keterangan kesehatan -->
            <div class="col-md-12">
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-briefcase-medical mr-1"></i><strong> Keterangan Kesehatan</strong></h3>
                        <div class="card-tools">
                            <?php if ($biodata['stat_pendaftaran'] == 0) { ?>
                                <a href="" class="btn btn-xs btn-flat" data-toggle="modal" data-target="#editDataKesehatan<?= $biodata['id_siswa'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                    <i class="fas fa-pencil-alt mr-1 text-lightblue"></i>
                                </a>
                            <?php } ?>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fas fa-briefcase-medical mr-1"></i> Berat Badan</strong>
                                <p class="text-muted"><?= ($biodata['berat_badan'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['berat_badan'] ?> Kg</p>
                                <hr>
                                <strong><i class="fas fa-briefcase-medical mr-1"></i> Tinggi Badan</strong>
                                <p class="text-muted"><?= ($biodata['tinggi_badan'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['tinggi_badan'] ?> Cm</p>
                                <hr>
                                <strong><i class="fas fa-briefcase-medical mr-1"></i> Golongan Darah</strong>
                                <p class="text-muted"><?= ($biodata['golongan_darah'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['golongan_darah'] ?> </p>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fas fa-briefcase-medical mr-1"></i> Riwayat Penyakit</strong>
                                <p class="text-muted"><?= ($biodata['penyakit'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['penyakit'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-briefcase-medical mr-1"></i> Kelainan Jasmainiah Lainya</strong>
                                <p class="text-muted"><?= ($biodata['kelainan_lain'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['kelainan_lain'] ?> </p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- asal sekolah -->
            <div class="col-md-12">
                <div class="card card-danger card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-school mr-1"></i><strong>Asal Sekolah</strong></h3>
                        <div class="card-tools">
                            <?php if ($biodata['stat_pendaftaran'] == 0) { ?>
                                <a href="" class="btn btn-xs btn-flat" data-toggle="modal" data-target="#editDataAsalSekolah<?= $biodata['id_siswa'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                    <i class="fas fa-pencil-alt mr-1 text-lightblue"></i>
                                </a>
                            <?php } ?>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fas fa-book mr-1"></i> Asal Sekolah</strong>
                                <p class="text-muted"><?= ($biodata['asal_sekolah'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['asal_sekolah'] ?> </p>
                                <hr>
                                <strong><i class="far fa-id-card mr-1"></i> Tahun Lulus</strong>
                                <p class="text-muted"><?= ($biodata['th_lulus'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['th_lulus'] ?> </p>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fas fa-file mr-1"></i> No. Ijazah</strong>
                                <p class="text-muted"><?= ($biodata['no_ijazah'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['no_ijazah'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-file mr-1"></i> No. SKHUN</strong>
                                <p class="text-muted"><?= ($biodata['no_skhun'] == null) ? '<span class="text-danger">Wajib Diisi.!!!</span>' : $biodata['no_skhun'] ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ayah kandung -->
            <div class="col-md-12">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-male mr-1"></i><strong> Ayah Kandung</strong></h3>
                        <div class="card-tools">
                            <?php if ($biodata['stat_pendaftaran'] == 0) { ?>
                                <a href="" class="btn btn-xs btn-flat" data-toggle="modal" data-target="#editDataAyah<?= $biodata['id_siswa'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                    <i class="fas fa-pencil-alt mr-1 text-lightblue"></i>
                                </a>
                            <?php } ?>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <strong><i class="fas fa-book mr-1"></i> NIK Ayah</strong>
                                <p class="text-muted"><?= ($biodata['nik_ayah'] == null) ? '<span class="text-danger">-</span>' : $biodata['nik_ayah'] ?> </p>
                                <hr>
                                <strong><i class="far fa-id-card mr-1"></i> Nama Ayah</strong>
                                <p class="text-muted"><?= ($biodata['ayah'] == null) ? '<span class="text-danger">-</span>' : $biodata['ayah'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-calendar-alt mr-1"></i> Tempat Tanggal Lahir</strong>
                                <p class="text-muted"><?= ($biodata['tempat_lahir_ayah'] == null) ? '<span class="text-danger">-</span>' : $biodata['tempat_lahir_ayah'] . ', ' . tgl_indo($biodata['tgl_lahir_ayah']) ?> </p>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                                <p class="text-muted"><?= ($biodata['alamat_ayah'] == null) ? '<span class="text-danger">-</span>' : $biodata['alamat_ayah'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-university mr-1"></i> Pendidikan</strong>
                                <p class="text-muted"><?= ($biodata['pendidikan_ayah'] == null) ? '<span class="text-danger">-</span>' : $biodata['pendidikan_ayah'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-briefcase mr-1"></i> Pekerjaan</strong>
                                <p class="text-muted"><?= ($biodata['pekerjaan_ayah'] == null) ? '<span class="text-danger">-</span>' : $biodata['pekerjaan_ayah'] ?> </p>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fas fa-money-bill-wave mr-1"></i> Pendapatan Per Bulan</strong>
                                <p class="text-muted"><?= ($biodata['penghasilan_ayah'] == null) ? '<span class="text-danger">-</span>' : $biodata['penghasilan_ayah'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-phone-alt mr-1"></i> No. Hp</strong>
                                <p class="text-muted"><?= ($biodata['no_hp_ayah'] == null) ? '<span class="text-danger">-</span>' : $biodata['no_hp_ayah'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-globe-asia mr-1"></i> Kewarganegaraan</strong>
                                <p class="text-muted"><?= ($biodata['kewarganegaraan_ayah'] == null) ? '<span class="text-danger">-</span>' : $biodata['kewarganegaraan_ayah'] ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ibu kandung -->
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-female mr-1"></i><strong> Ibu Kandung</strong></h3>
                        <div class="card-tools">
                            <?php if ($biodata['stat_pendaftaran'] == 0) { ?>
                                <a href="" class="btn btn-xs btn-flat" data-toggle="modal" data-target="#editDataIbu<?= $biodata['id_siswa'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                    <i class="fas fa-pencil-alt mr-1 text-lightblue"></i>
                                </a>
                            <?php } ?>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <strong><i class="fas fa-book mr-1"></i> NIK Ibu</strong>
                                <p class="text-muted"><?= ($biodata['nik_ibu'] == null) ? '<span class="text-danger">-</span>' : $biodata['nik_ibu'] ?> </p>
                                <hr>
                                <strong><i class="far fa-id-card mr-1"></i> Nama Ibu</strong>
                                <p class="text-muted"><?= ($biodata['ibu'] == null) ? '<span class="text-danger">-</span>' : $biodata['ibu'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-calendar-alt mr-1"></i> Tempat Tanggal Lahir</strong>
                                <p class="text-muted"><?= ($biodata['tempat_lahir_ibu'] == null) ? '<span class="text-danger">-</span>' : $biodata['tempat_lahir_ibu'] . ', ' . tgl_indo($biodata['tgl_lahir_ibu']) ?> </p>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                                <p class="text-muted"><?= ($biodata['alamat_ibu'] == null) ? '<span class="text-danger">-</span>' : $biodata['alamat_ibu'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-university mr-1"></i> Pendidikan</strong>
                                <p class="text-muted"><?= ($biodata['pendidikan_ibu'] == null) ? '<span class="text-danger">-</span>' : $biodata['pendidikan_ibu'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-briefcase mr-1"></i> Pekerjaan</strong>
                                <p class="text-muted"><?= ($biodata['pekerjaan_ibu'] == null) ? '<span class="text-danger">-</span>' : $biodata['pekerjaan_ibu'] ?> </p>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fas fa-money-bill-wave mr-1"></i> Pendapatan Per Bulan</strong>
                                <p class="text-muted"><?= ($biodata['penghasilan_ibu'] == null) ? '<span class="text-danger">-</span>' : $biodata['penghasilan_ibu'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-phone-alt mr-1"></i> No. Hp</strong>
                                <p class="text-muted"><?= ($biodata['no_hp_ibu'] == null) ? '<span class="text-danger">-</span>' : $biodata['no_hp_ibu'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-globe-asia mr-1"></i> Kewarganegaraan</strong>
                                <p class="text-muted"><?= ($biodata['kewarganegaraan_ibu'] == null) ? '<span class="text-danger">-</span>' : $biodata['kewarganegaraan_ibu'] ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Wali -->
            <?php if ($biodata['nik_ayah'] == null || $biodata['nik_ibu'] == null) { ?>
                <div class="col-md-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-female mr-1"></i><strong>Data Wali Murid</strong></h3>
                            <div class="card-tools">
                                <?php if ($biodata['nik_ayah'] == null || $biodata['nik_ibu'] == null || $biodata['stat_pendaftaran'] == 0) { ?>
                                    <a href="" class="btn btn-xs btn-flat" data-toggle="modal" data-target="#editDataWali<?= $biodata['id_siswa'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                        <i class="fas fa-pencil-alt mr-1 text-lightblue"></i>
                                    </a>
                                <?php } ?>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <small class="text-danger"><strong> Data Wali Calon Siswa boleh di Kosongkan.</strong></small>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <strong><i class="fas fa-book mr-1"></i> NIK Wali</strong>
                                    <p class="text-muted"><?= ($biodata['nik_wali'] == null) ? '<span class="text-danger">-</span>' : $biodata['nik_wali'] ?> </p>
                                    <hr>
                                    <strong><i class="far fa-id-card mr-1"></i> Nama Wali</strong>
                                    <p class="text-muted"><?= ($biodata['wali'] == null) ? '<span class="text-danger">-</span>' : $biodata['wali'] ?> </p>
                                    <hr>
                                    <strong><i class="fas fa-calendar-alt mr-1"></i> Tempat Tanggal Lahir</strong>
                                    <p class="text-muted"><?= ($biodata['tempat_lahir_wali'] == null) ? '<span class="text-danger">-</span>' : $biodata['tempat_lahir_wali'] . ', ' . tgl_indo($biodata['tgl_lahir_wali']) ?> </p>
                                </div>
                                <div class="col-md-4">
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                                    <p class="text-muted"><?= ($biodata['alamat_wali'] == null) ? '<span class="text-danger">-</span>' : $biodata['alamat_wali'] ?> </p>
                                    <hr>
                                    <strong><i class="fas fa-university mr-1"></i> Pendidikan</strong>
                                    <p class="text-muted"><?= ($biodata['pendidikan_wali'] == null) ? '<span class="text-danger">-</span>' : $biodata['pendidikan_wali'] ?> </p>
                                    <hr>
                                    <strong><i class="fas fa-briefcase mr-1"></i> Pekerjaan</strong>
                                    <p class="text-muted"><?= ($biodata['pekerjaan_wali'] == null) ? '<span class="text-danger">-</span>' : $biodata['pekerjaan_wali'] ?> </p>
                                </div>
                                <div class="col-md-4">
                                    <strong><i class="fas fa-money-bill-wave mr-1"></i> Pendapatan Per Bulan</strong>
                                    <p class="text-muted"><?= ($biodata['penghasilan_wali'] == null) ? '<span class="text-danger">-</span>' : $biodata['penghasilan_wali'] ?> </p>
                                    <hr>
                                    <strong><i class="fas fa-phone-alt mr-1"></i> No. Hp</strong>
                                    <p class="text-muted"><?= ($biodata['no_hp_wali'] == null) ? '<span class="text-danger">-</span>' : $biodata['no_hp_wali'] ?> </p>
                                    <hr>
                                    <strong><i class="fas fa-globe-asia mr-1"></i> Kewarganegaraan</strong>
                                    <p class="text-muted"><?= ($biodata['kewarganegaraan_wali'] == null) ? '<span class="text-danger">-</span>' : $biodata['kewarganegaraan_wali'] ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>


            <!-- berkas tambahan -->
            <div class="col-md-12">
                <div class="card card-purple card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-file mr-1"></i><strong>Berkas Tambahan/Berkas Pendukung</strong></h3>
                        <div class="card-tools">
                            <?php if ($biodata['stat_pendaftaran'] == 0) { ?>
                                <a href="" class="btn btn-xs btn-flat" data-toggle="modal" data-target="#editFile<?= $biodata['id_siswa'] ?>" data-toggle="tooltip" data-placement="bottom" title="Tambah Berkas">
                                    <i class="fas fa-plus mr-1 text-lightblue"></i>
                                </a>
                            <?php } ?>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th><i class="fas fa-cog"></i></th>
                                    <th>Jenis Berkas</th>
                                    <th>Keterangan</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($berkas as $b) { ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $b['lampiran'] ?></td>
                                        <td><?= $b['ket'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('berkas/' . $b['berkas']) ?>" target="_blank"><i class="fa fa-file-pdf fa-2x text-danger"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('siswa/deleteBerkas/' . $b['id_berkas']) ?>" <?= ($biodata['stat_pendaftaran'] == 1) ? 'style="cursor: not-allowed;"' : '' ?> class="btn btn-xs btn-danger btn-flat"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <?php if ($biodata['stat_pendaftaran'] == 1) { ?>
                <button class="btn btn-success btn-flat btn-block" style="cursor: not-allowed;">Anda Sudah Melakukan Pendaftaran, Silahkan Menunggu Hasil Pengumuman.</button>
            <?php } else { ?>
                <?php if ($biodata['no_ijazah'] == null) { ?>
                    <button class="btn btn-danger btn-flat btn-block" style="cursor: not-allowed;">Anda harus melengkapi data terlebih dahulu</button>
                <?php } else { ?>
                    <button data-toggle="modal" data-target="#apply" class="btn btn-primary btn-flat btn-block">
                        <i class="fas fa-hand-point-right mr-2 "></i>
                        Lanjutkan Pendaftaran
                    </button>
                <?php } ?>
            <?php } ?>
        </div>

    <?php } ?>
</div>
</div>


<!-- modal edit pendaftaran-->
<div class="modal fade" id="editPendaftaran<?= $biodata['id_siswa'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Pendaftaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('siswa/updatePendaftaran/' . $biodata['id_siswa']) ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>NISN</label>
                    <input type="text" class="form-control" value="<?= $biodata['nisn'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Tanggal Pendaftaran</label>
                    <input type="text" class="form-control" value="<?= tgl_indo($biodata['tgl_pendaftaran']) ?>" readonly>
                </div>
                <div class="form-group">
                    <label>No. Pendaftaran</label>
                    <input type="text" class="form-control" value="<?= $biodata['no_pendaftaran'] ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="jalur">Jalur Masuk</label>
                    <select name="jalur" id="jalur" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($jm as $j) { ?>
                            <?php if ($j['id_jalur_masuk'] == $biodata['id_jalur_masuk']) { ?>
                                <option value="<?= $j['id_jalur_masuk'] ?>" selected><?= $j['jalur_masuk'] ?></option>
                            <?php } else { ?>
                                <option value="<?= $j['id_jalur_masuk'] ?>"><?= $j['jalur_masuk'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select name="jurusan" id="jurusan" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($jurusan as $j) { ?>
                            <?php if ($j['id_jurusan'] == $biodata['id_jurusan']) { ?>
                                <option value="<?= $j['id_jurusan'] ?>" selected><?= $j['jurusan'] ?></option>
                            <?php } else { ?>
                                <option value="<?= $j['id_jurusan'] ?>"><?= $j['jurusan'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- modal edit foto -->
<div class="modal fade" id="editFoto<?= $biodata['id_siswa'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Foto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('siswa/updateFoto/' . $biodata['id_siswa']) ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" name="foto" id="preview_gambar" required accept=".jpg,.jpeg,.png">
                    <small class="text-danger"><strong>*File maksimal 1,5 Mb</strong></small><br>
                    <small class="text-danger"><strong>*Background foto warna merah</strong></small>
                </div>

                <div class="form-group">
                    <label>Preview</label> <br>
                    <div class="text-center">
                        <img src="<?= base_url('foto/siswa/' . $biodata['foto']) ?>" id="gambar_load" width="200" alt="">
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm btn-flat" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm btn-flat">Edit</button>
            </div>
            <?= form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<!-- modal edit identitas siswa-->
<div class="modal fade" id="editIdentitas<?= $biodata['id_siswa'] ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Edit Identitas Calon Siswa
                </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('siswa/updateIdentitas/' . $biodata['id_siswa']) ?>
            <div class="modal-body">
                <small class="text-danger">Silahkan lengkapi kolom yang masih kosong</small><br>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="number" min="1" name="nik" class="form-control" value="<?= $biodata['nik'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" value="<?= $biodata['nama_lengkap'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama_panggilan">Nama Panggilan</label>
                            <input type="text" name="nama_panggilan" class="form-control" value="<?= $biodata['nama_panggilan'] ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="<?= $biodata['tempat_lahir'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="tgl_lahir" value="<?= $biodata['tgl_lahir'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="id_agama">Agama</label>
                            <select name="id_agama" id="id_agama" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <?php foreach ($agama as $a) { ?>
                                    <option value="<?= $a['id_agama'] ?>" <?= ($a['id_agama'] == $biodata['id_agama']) ? 'selected' : '' ?>><?= $a['agama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="no_telepon">No. Hp</label>
                            <input type="number" min="1" name="no_telepon" class="form-control" value="<?= $biodata['no_telepon'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select name="jk" id="jk" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="L" <?php if ($biodata['jk'] == 'L') {
                                                        echo 'selected';
                                                    } ?>>Laki-laki</option>
                                <option value="P" <?php if ($biodata['jk'] == 'P') {
                                                        echo 'selected';
                                                    } ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="anak_ke">Anak Ke berapa</label>
                            <input type="text" name="anak_ke" class="form-control" value="<?= $biodata['anak_ke'] ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jml_saudara">Jumlah Saudara Kandung</label>
                            <input type="text" name="jml_saudara" class="form-control" value="<?= $biodata['jml_saudara'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="saudara_angkat">Jumlah Saudara Angkat</label>
                            <input type="text" name="saudara_angkat" class="form-control" value="<?= $biodata['saudara_angkat'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="saudara_tiri">Jumlah Saudara Tiri</label>
                            <input type="text" name="saudara_tiri" class="form-control" value="<?= $biodata['saudara_tiri'] ?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="bahasa">Bahasa Sehari-hari di Rumah</label>
                    <input type="text" name="bahasa" class="form-control" value="<?= $biodata['bahasa'] ?>" required>
                </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- modal edit Data ayah kandung-->
<div class="modal fade" id="editDataAyah<?= $biodata['id_siswa'] ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Edit Data Ayah Kandung
                </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('siswa/updateDataAyah/' . $biodata['id_siswa']) ?>
            <div class="modal-body">
                <small class="text-danger">Silahkan lengkapi kolom yang masih kosong</small><br>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nik_ayah">NIK Ayah</label>
                            <input type="number" min="1" name="nik_ayah" class="form-control" value="<?= $biodata['nik_ayah'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ayah">Nama Ayah</label>
                            <input type="text" name="ayah" class="form-control" value="<?= $biodata['ayah'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?= $biodata['alamat_ayah'] ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="<?= $biodata['tempat_lahir_ayah'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                <input type="text" name="tgl_lahir" value="<?= $biodata['tgl_lahir_ayah'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate1" />
                                <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <select name="pendidikan" id="pendidikan" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($pendidikan as $a) { ?>
                                    <option value="<?= $a['pendidikan'] ?>" <?= ($a['pendidikan'] === $biodata['pendidikan_ayah']) ? 'selected' : '' ?>><?= $a['pendidikan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <select name="pekerjaan" id="pekerjaan" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($pekerjaan as $a) { ?>
                                    <option value="<?= $a['pekerjaan'] ?>" <?= ($a['pekerjaan'] === $biodata['pekerjaan_ayah']) ? 'selected' : '' ?>><?= $a['pekerjaan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="penghasilan">Pendapatan Per Bulan</label>
                            <select name="penghasilan" id="penghasilan" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($penghasilan as $a) { ?>
                                    <option value="<?= $a['penghasilan'] ?>" <?= ($a['penghasilan'] === $biodata['penghasilan_ayah']) ? 'selected' : '' ?>><?= $a['penghasilan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="no_telepon">No. Hp</label>
                            <input type="number" min="1" name="no_telepon" class="form-control" value="<?= $biodata['no_hp_ayah'] ?>" required>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan" class="form-control" value="<?= $biodata['kewarganegaraan_ayah'] ?>" required>
                </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- modal edit Data ibu kandung-->
<div class="modal fade" id="editDataIbu<?= $biodata['id_siswa'] ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Edit Data Ibu Kandung
                </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('siswa/updateDataIbu/' . $biodata['id_siswa']) ?>
            <div class="modal-body">
                <small class="text-danger">Silahkan lengkapi kolom yang masih kosong</small><br>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nik_ibu">NIK Ibu</label>
                            <input type="number" min="1" name="nik_ibu" class="form-control" value="<?= $biodata['nik_ibu'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ibu">Nama Ibu</label>
                            <input type="text" name="ibu" class="form-control" value="<?= $biodata['ibu'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?= $biodata['alamat_ibu'] ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="<?= $biodata['tempat_lahir_ibu'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                <input type="text" name="tgl_lahir" value="<?= $biodata['tgl_lahir_ibu'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate2" />
                                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <select name="pendidikan" id="pendidikan" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($pendidikan as $a) { ?>
                                    <option value="<?= $a['pendidikan'] ?>" <?= ($a['pendidikan'] === $biodata['pendidikan_ibu']) ? 'selected' : '' ?>><?= $a['pendidikan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <select name="pekerjaan" id="pekerjaan" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($pekerjaan as $a) { ?>
                                    <option value="<?= $a['pekerjaan'] ?>" <?= ($a['pekerjaan'] === $biodata['pekerjaan_ibu']) ? 'selected' : '' ?>><?= $a['pekerjaan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="penghasilan">Pendapatan Per Bulan</label>
                            <select name="penghasilan" id="penghasilan" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($penghasilan as $a) { ?>
                                    <option value="<?= $a['penghasilan'] ?>" <?= ($a['penghasilan'] === $biodata['penghasilan_ibu']) ? 'selected' : '' ?>><?= $a['penghasilan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="no_telepon">No. Hp</label>
                            <input type="number" min="1" name="no_telepon" class="form-control" value="<?= $biodata['no_hp_ibu'] ?>" required>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan" class="form-control" value="<?= $biodata['kewarganegaraan_ibu'] ?>" required>
                </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- modal edit Data wali-->
<div class="modal fade" id="editDataWali<?= $biodata['id_siswa'] ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Edit Data Wali Calon Siswa
                </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('siswa/updateDataWali/' . $biodata['id_siswa']) ?>
            <div class="modal-body">
                <small class="text-danger">Silahkan lengkapi kolom yang masih kosong</small><br>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nik_wali">NIK Wali SIswa</label>
                            <input type="number" min="1" name="nik_wali" class="form-control" value="<?= $biodata['nik_wali'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="wali">Nama Wali Siswa</label>
                            <input type="text" name="wali" class="form-control" value="<?= $biodata['wali'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?= $biodata['alamat_wali'] ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="<?= $biodata['tempat_lahir_wali'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                                <input type="text" name="tgl_lahir" value="<?= $biodata['tgl_lahir_wali'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate3" />
                                <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <select name="pendidikan" id="pendidikan" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($pendidikan as $a) { ?>
                                    <option value="<?= $a['pendidikan'] ?>" <?= ($a['pendidikan'] === $biodata['pendidikan_wali']) ? 'selected' : '' ?>><?= $a['pendidikan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <select name="pekerjaan" id="pekerjaan" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($pekerjaan as $a) { ?>
                                    <option value="<?= $a['pekerjaan'] ?>" <?= ($a['pekerjaan'] === $biodata['pekerjaan_wali']) ? 'selected' : '' ?>><?= $a['pekerjaan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="penghasilan">Pendapatan Per Bulan</label>
                            <select name="penghasilan" id="penghasilan" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($penghasilan as $a) { ?>
                                    <option value="<?= $a['penghasilan'] ?>" <?= ($a['penghasilan'] === $biodata['penghasilan_wali']) ? 'selected' : '' ?>><?= $a['penghasilan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="no_telepon">No. Hp</label>
                            <input type="number" min="1" name="no_telepon" class="form-control" value="<?= $biodata['no_hp_wali'] ?>" required>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan" class="form-control" value="<?= $biodata['kewarganegaraan_wali'] ?>" required>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- modal edit Data alamat-->
<div class="modal fade" id="editDataAlamat<?= $biodata['id_siswa'] ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Edit Alamat Lengkap
                </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('siswa/updateDataAlamat/' . $biodata['id_siswa']) ?>
            <div class="modal-body">
                <small class="text-danger">Silahkan lengkapi kolom yang masih kosong</small><br>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="id_provinsi">Provinsi</label>
                            <select name="id_provinsi" id="provinsi" class="form-control select2">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($provinsi as $p) { ?>
                                    <?php if ($p['id_provinsi'] == $biodata['id_provinsi']) { ?>
                                        <option value="<?= $p['id_provinsi'] ?>" selected><?= $p['nama_provinsi'] ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $p['id_provinsi'] ?>"><?= $p['nama_provinsi'] ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="id_kabupaten">Kabupaten</label>
                            <select name="id_kabupaten" id="kabupaten" class="form-control select2">
                                <option value="">-- Pilih --</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="id_kecamatan">Kecamatan</label>
                            <select name="id_kecamatan" id="kecamatan" class="form-control select2">
                                <option value="">-- Pilih --</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="desa">Desa</label>
                            <input type="text" name="desa" class="form-control" value="<?= $biodata['desa'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="rt">Rt</label>
                            <input type="number" min="1" name="rt" class="form-control" value="<?= $biodata['rt'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="rw">Rw</label>
                            <input type="number" min="1" name="rw" class="form-control" value="<?= $biodata['rw'] ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="number" min="1" name="kode_pos" class="form-control" value="<?= $biodata['kode_pos'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jarak">Jarak Rumah Ke Sekolah</label>
                            <input type="text" name="jarak_sekolah" class="form-control" value="<?= $biodata['jarak_sekolah'] ?>" required>
                            <small class="text-danger">*Contoh 700 Meter / 2 Km</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="berangkat">Berangkat Sekolah Dengan</label>
                            <input type="text" name="berangkat" class="form-control" value="<?= $biodata['berangkat'] ?>" required>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- modal edit Data kesehatan-->
<div class="modal fade" id="editDataKesehatan<?= $biodata['id_siswa'] ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Edit Data Kesehatan
                </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('siswa/updateDataKesehatan/' . $biodata['id_siswa']) ?>
            <div class="modal-body">
                <small class="text-danger">Silahkan lengkapi kolom yang masih kosong</small><br>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="berat_badan">Berat Badan</label>
                            <input type="number" min="1" name="berat_badan" class="form-control" value="<?= $biodata['berat_badan'] ?>" required>
                            <small class="text-danger">*contoh 60</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tinggi_badan">Tinggi Badan</label>
                            <input type="number" min="1" name="tinggi_badan" class="form-control" value="<?= $biodata['tinggi_badan'] ?>" required>
                            <small class="text-danger">*contoh 160</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="golongan_darah">Golongan Darah</label>
                            <input type="text" name="golongan_darah" class="form-control" value="<?= $biodata['golongan_darah'] ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="penyakit">Riwayat Penyakit</label>
                            <input type="text" name="penyakit" class="form-control" value="<?= $biodata['penyakit'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kelainan_lain">Kelainan Jasmaniah Lainya</label>
                            <input type="text" name="kelainan_lain" class="form-control" value="<?= $biodata['kelainan_lain'] ?>" required>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- modal edit Data asal sekolah-->
<div class="modal fade" id="editDataAsalSekolah<?= $biodata['id_siswa'] ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Edit Data Asal Sekolah
                </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('siswa/updateDataAsalSekolah/' . $biodata['id_siswa']) ?>
            <div class="modal-body">
                <small class="text-danger">Silahkan lengkapi kolom yang masih kosong</small><br>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="asal_sekolah">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control" value="<?= $biodata['asal_sekolah'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="th_lulus">Tahun Lulus</label>
                            <select name="th_lulus" id="th_lulus" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <?php for ($i = 2015; $i <= date('Y'); $i++) { ?>
                                    <option value="<?= $i ?>" <?= ($i == $biodata['th_lulus']) ? 'selected' : '' ?>><?= $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_ijazah">No Ijazah</label>
                            <input type="number" min="1" name="no_ijazah" class="form-control" value="<?= $biodata['no_ijazah'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_skhun">No. SKHUN</label>
                            <input type="text" name="no_skhun" class="form-control" value="<?= $biodata['no_skhun'] ?>" required>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- modal tambah Data file/berkas-->
<div class="modal fade" id="editFile<?= $biodata['id_siswa'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Berkas
                </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('siswa/addBerkas/' . $biodata['id_siswa']) ?>
            <div class="modal-body">
                <small class="text-danger">Silahkan lengkapi kolom yang masih kosong</small><br>
                <hr>
                <div class="form-group">
                    <label for="id_lampiran">Lampiran</label>
                    <select name="id_lampiran" id="id_lampiran" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($lampiran as $l) { ?>
                            <option value="<?= $l['id_lampiran'] ?>"><?= $l['lampiran'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
                </div>

                <div class="form-group">
                    <label for="berkas">Berkas</label>
                    <input type="file" name="berkas" class="form-control" accept=".pdf" required>
                    <small class="text-danger">Silahkan upload berkas berformat pdf.</small>
                </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- modal apply-->
<div class="modal fade" id="apply">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Apakah anda yakin..?
                </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Pastikan data yang anda kirim sudah benar..</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                <a href="<?= base_url('siswa/apply/' . $biodata['id_siswa']) ?>" type="submit" class="btn btn-primary btn-sm">Ya, Benar</a>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="<?= base_url() ?>/AdminLTE3/plugins/jquery/jquery.min.js"></script>


<script>
    // menampilkan kabupaten
    $(document).ready(function() {
        $("#provinsi").change(function() {
            var id_provinsi = $("#provinsi").val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('/Wilayah/dataKabupaten') ?>/' + id_provinsi,
                success: function(html) {
                    $("#kabupaten").html(html);
                }
            });
        });

        // menampilkan kecamatan
        $(document).ready(function() {
            $("#kabupaten").change(function() {
                var id_kabupaten = $("#kabupaten").val();
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url('/Wilayah/dataKEcamatan') ?>/' + id_kabupaten,
                    success: function(html) {
                        $("#kecamatan").html(html);
                    }
                });
            });
        });

    });
</script>

<?= $this->endSection() ?>