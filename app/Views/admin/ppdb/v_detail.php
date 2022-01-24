<?= $this->extend('template/template-backend') ?>

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


<div class="col-lg-12">

    <div class="card card-outline card-lightblue">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-list-alt mr-1"></i><strong>Formulir Pendaftaran</strong></h3>
            <div class="card-tools">
                <a href="<?= base_url('ppdb') ?>" class="btn btn-danger btn-sm btn-flat">Kembali</a>
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
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong><i class="fas fa-table mr-1"></i> NISN</strong>
                                    <p class="text-muted"><?= $siswa['nisn'] ?></p>
                                    <hr>
                                </div>
                                <div class="col-md-3">
                                    <strong><i class="fas fa-table mr-1"></i> Tanggal Pendaftaran</strong>
                                    <p class="text-muted"><?= tgl_indo($siswa['tgl_pendaftaran']) ?></p>
                                    <hr>
                                </div>
                                <div class="col-md-3">
                                    <strong><i class="fas fa-table mr-1"></i> Nomor Pendaftaran</strong>
                                    <p class="text-muted"><?= $siswa['no_pendaftaran'] ?></p>
                                    <hr>
                                </div>
                                <div class="col-md-3">
                                    <strong><i class="fas fa-table mr-1"></i> Jalur Masuk</strong>
                                    <p class="text-muted"><?= $siswa['jalur_masuk'] ?></p>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-lightblue card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <?php if ($siswa['foto'] == null) { ?>
                                    <img class="profile-user-img img-fluid img-circle" style="width: 210px !important;" src="<?= base_url('img/noimage.png') ?>" alt="User profile picture">
                            </div>
                        <?php } else { ?>
                            <img class="profile-user-img img-fluid img-circle" style="width: 210px !important; height: 210px;" src="<?= base_url('foto/siswa/' . $siswa['foto']) ?>" alt="User profile picture">
                        </div>
                    <?php } ?>

                    <hr class="p-0">
                    <hr class="p-0">
                    <hr class="p-0">
                    <hr class="p-0">
                    <hr class="p-0">
                    <?php if ($siswa['id_jurusan'] == 0) { ?>
                        <h3 class="profile-username text-center"><span class="text-lightblue">Nomer : <?= $siswa['no_pendaftaran'] ?></span></h3>
                        <hr class="p-0">
                    <?php } else { ?>
                        <h3 class="profile-username text-center"><span class="text-lightblue"><?= $siswa['jurusan'] ?></span></h3>
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
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <strong><i class="fas fa-book mr-1"></i> Nama Lengkap</strong>
                                <p class="text-muted"><?= $siswa['nama_lengkap'] ?></p>
                                <hr>
                                <strong><i class="fas fa-pencil-alt mr-1"></i> NIK</strong>
                                <p class="text-muted"><?= $siswa['nik'] ?></p>
                                <hr>
                                <strong><i class="far fa-file-alt mr-1"></i> Agama</strong>
                                <p class="text-muted"><?= $siswa['agama'] ?></p>
                                <hr>
                                <strong><i class="fas fa-phone-alt mr-1"></i> No Telepon</strong>
                                <p class="text-muted"><?= $siswa['no_telepon'] ?></p>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fas fa-book mr-1"></i> Nama Panggilan</strong>
                                <p class="text-muted"><?= $siswa['nama_panggilan'] ?></p>
                                <hr>
                                <strong><i class="fas fa-calendar-alt mr-1"></i> Tempat Tanggal Lahir</strong>
                                <p class="text-muted"><?= $siswa['tempat_lahir'] . ', ' . tgl_indo($siswa['tgl_lahir']) ?></p>
                                <hr>
                                <strong><i class="fas fa-genderless mr-1"></i> Jenis Kelamin</strong>
                                <p class="text-muted">
                                    <span class="tag tag-danger"><?= ($siswa['jk'] == 'L') ? 'Laki-laki' : 'Perempuan' ?></span>
                                </p>
                                <hr>
                                <strong><i class="fas fa-language mr-1"></i> Bahasa Sehari-hari dirumah</strong>
                                <p class="text-muted"><?= $siswa['bahasa'] ?> </p>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fas fa-user-friends mr-1"></i> Jumlah Saudara Angkat</strong>
                                <p class="text-muted"><?= $siswa['saudara_angkat'] ?></p>
                                <hr>
                                <strong><i class="fas fa-user-friends mr-1"></i> Jumlah Saudara Tiri</strong>
                                <p class="text-muted"><?= $siswa['saudara_tiri'] ?></p>
                                <hr>
                                <strong><i class="fas fa-user mr-1"></i> Anak Keberapa</strong>
                                <p class="text-muted"><?= $siswa['anak_ke'] ?></p>
                                <hr>
                                <strong><i class="fas fa-users mr-1"></i> Jumlah Saudara Kandung</strong>
                                <p class="text-muted"><?= $siswa['jml_saudara'] ?></p>
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
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Provinsi</strong>
                            <p class="text-muted"><?= $siswa['nama_provinsi'] ?> </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Kabupaten</strong>
                            <p class="text-muted"><?= $siswa['nama_kabupaten'] ?> </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Kecamatan</strong>
                            <p class="text-muted"><?= $siswa['nama_kecamatan'] ?> </p>
                        </div>
                        <div class="col-md-4">
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Desa</strong>
                            <p class="text-muted"><?= $siswa['desa'] ?> </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Rt</strong>
                            <p class="text-muted"><?= $siswa['rt'] ?> </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Rw</strong>
                            <p class="text-muted"><?= $siswa['rw'] ?> </p>
                        </div>
                        <div class="col-md-4">
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Kode Pos</strong>
                            <p class="text-muted"><?= $siswa['kode_pos'] ?> </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Jarak Rumah Dengan Sekolah</strong>
                            <p class="text-muted"><?= $siswa['jarak_sekolah'] ?> </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Ke Sekolah Dengan</strong>
                            <p class="text-muted"><?= $siswa['berangkat'] ?> </p>
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
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong><i class="fas fa-briefcase-medical mr-1"></i> Berat Badan</strong>
                            <p class="text-muted"><?= $siswa['berat_badan'] ?> Kg</p>
                            <hr>
                            <strong><i class="fas fa-briefcase-medical mr-1"></i> Tinggi Badan</strong>
                            <p class="text-muted"><?= $siswa['tinggi_badan'] ?> Cm</p>
                            <hr>
                            <strong><i class="fas fa-briefcase-medical mr-1"></i> Golongan Darah</strong>
                            <p class="text-muted"><?= $siswa['golongan_darah'] ?> </p>
                        </div>
                        <div class="col-md-6">
                            <strong><i class="fas fa-briefcase-medical mr-1"></i> Riwayat Penyakit</strong>
                            <p class="text-muted"><?= $siswa['penyakit'] ?> </p>
                            <hr>
                            <strong><i class="fas fa-briefcase-medical mr-1"></i> Kelainan Jasmainiah Lainya</strong>
                            <p class="text-muted"><?= $siswa['kelainan_lain'] ?> </p>
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
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong><i class="fas fa-book mr-1"></i> Asal Sekolah</strong>
                            <p class="text-muted"><?= $siswa['asal_sekolah'] ?> </p>
                            <hr>
                            <strong><i class="far fa-id-card mr-1"></i> Tahun Lulus</strong>
                            <p class="text-muted"><?= $siswa['th_lulus'] ?> </p>
                        </div>
                        <div class="col-md-6">
                            <strong><i class="fas fa-file mr-1"></i> No. Ijazah</strong>
                            <p class="text-muted"><?= $siswa['no_ijazah'] ?> </p>
                            <hr>
                            <strong><i class="fas fa-file mr-1"></i> No. SKHUN</strong>
                            <p class="text-muted"><?= $siswa['no_skhun'] ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ayah kandung -->
        <?php if ($siswa['nik_wali'] == null || $siswa['nik_ayah'] != null) { ?>
            <div class="col-md-12">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-male mr-1"></i><strong> Ayah Kandung</strong></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <strong><i class="fas fa-book mr-1"></i> NIK Ayah</strong>
                                <p class="text-muted"><?= $siswa['nik_ayah'] ?> </p>
                                <hr>
                                <strong><i class="far fa-id-card mr-1"></i> Nama Ayah</strong>
                                <p class="text-muted"><?= $siswa['ayah'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-calendar-alt mr-1"></i> Tempat Tanggal Lahir</strong>
                                <p class="text-muted"><?= ($siswa['tempat_lahir_ayah'] == null) ? '-' : $siswa['tempat_lahir_ayah'] . ', ' . tgl_indo($siswa['tgl_lahir_ayah']) ?> </p>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                                <p class="text-muted"><?= $siswa['alamat_ayah'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-university mr-1"></i> Pendidikan</strong>
                                <p class="text-muted"><?= $siswa['pendidikan_ayah'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-briefcase mr-1"></i> Pekerjaan</strong>
                                <p class="text-muted"><?= $siswa['pekerjaan_ayah'] ?> </p>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fas fa-money-bill-wave mr-1"></i> Pendapatan Per Bulan</strong>
                                <p class="text-muted"><?= $siswa['penghasilan_ayah'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-phone-alt mr-1"></i> No. Hp</strong>
                                <p class="text-muted"><?= $siswa['no_hp_ayah'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-globe-asia mr-1"></i> Kewarganegaraan</strong>
                                <p class="text-muted"><?= $siswa['kewarganegaraan_ayah'] ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- ibu kandung -->
        <?php if ($siswa['nik_wali'] == null || $siswa['nik_ibu'] != null) { ?>
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-female mr-1"></i><strong> Ibu Kandung</strong></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <strong><i class="fas fa-book mr-1"></i> NIK Ibu</strong>
                                <p class="text-muted"><?= $siswa['nik_ibu'] ?> </p>
                                <hr>
                                <strong><i class="far fa-id-card mr-1"></i> Nama Ibu</strong>
                                <p class="text-muted"><?= $siswa['ibu'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-calendar-alt mr-1"></i> Tempat Tanggal Lahir</strong>
                                <p class="text-muted"><?= ($siswa['tempat_lahir_ibu'] == null) ? '-' : $siswa['tempat_lahir_ibu'] . ', ' . tgl_indo($siswa['tgl_lahir_ibu']) ?> </p>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                                <p class="text-muted"><?= $siswa['alamat_ibu'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-university mr-1"></i> Pendidikan</strong>
                                <p class="text-muted"><?= $siswa['pendidikan_ibu'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-briefcase mr-1"></i> Pekerjaan</strong>
                                <p class="text-muted"><?= $siswa['pekerjaan_ibu'] ?> </p>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fas fa-money-bill-wave mr-1"></i> Pendapatan Per Bulan</strong>
                                <p class="text-muted"><?= $siswa['penghasilan_ibu'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-phone-alt mr-1"></i> No. Hp</strong>
                                <p class="text-muted"><?= $siswa['no_hp_ibu'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-globe-asia mr-1"></i> Kewarganegaraan</strong>
                                <p class="text-muted"><?= $siswa['kewarganegaraan_ibu'] ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- Data Wali -->
        <?php if ($siswa['nik_ayah'] == null || $siswa['nik_ibu'] == null) { ?>
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-female mr-1"></i><strong>Data Wali Murid</strong></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <strong><i class="fas fa-book mr-1"></i> NIK Wali</strong>
                                <p class="text-muted"><?= $siswa['nik_wali'] ?> </p>
                                <hr>
                                <strong><i class="far fa-id-card mr-1"></i> Nama Wali</strong>
                                <p class="text-muted"><?= $siswa['wali'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-calendar-alt mr-1"></i> Tempat Tanggal Lahir</strong>
                                <p class="text-muted"><?= ($siswa['tempat_lahir_wali'] == null) ? '-' : $siswa['tempat_lahir_wali'] . ', ' . tgl_indo($siswa['tgl_lahir_wali']) ?> </p>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                                <p class="text-muted"><?= $siswa['alamat_wali'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-university mr-1"></i> Pendidikan</strong>
                                <p class="text-muted"><?= $siswa['pendidikan_wali'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-briefcase mr-1"></i> Pekerjaan</strong>
                                <p class="text-muted"><?= $siswa['pekerjaan_wali'] ?> </p>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fas fa-money-bill-wave mr-1"></i> Pendapatan Per Bulan</strong>
                                <p class="text-muted"><?= $siswa['penghasilan_wali'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-phone-alt mr-1"></i> No. Hp</strong>
                                <p class="text-muted"><?= $siswa['no_hp_wali'] ?> </p>
                                <hr>
                                <strong><i class="fas fa-globe-asia mr-1"></i> Kewarganegaraan</strong>
                                <p class="text-muted"><?= $siswa['kewarganegaraan_wali'] ?> </p>
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
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>




<!-- jQuery -->
<script src="<?= base_url() ?>/AdminLTE3/plugins/jquery/jquery.min.js"></script>


<script>
    // menampilkan kabupaten
    $(document).ready(function() {
        $('body').addClass('sidebar-collapse');

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