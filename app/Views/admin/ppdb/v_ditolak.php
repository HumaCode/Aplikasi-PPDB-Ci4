<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>

<div class="col md-12">

    <!-- flashdata sweetalert -->
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>

    <div class="card card-outline card-lightblue">
        <div class="card-header">
            <h3 class="card-title">Pendaftaran Ditolak</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="tb-ditolak" class="table table-hover text-nowrap projects">
                <thead class="table-dark text-center">
                    <tr>
                        <th width="40">No</th>
                        <th>Foto</th>
                        <th>No. Pendaftaran</th>
                        <th>Tahun Pelajaran</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Jalur Masuk</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($masuk as $p) { ?>
                        <tr>
                            <td class="text-center"><?= $i ?>.</td>
                            <td>
                                <ul class="list-inline">
                                    <?php if ($p['foto'] == null) { ?>
                                        <li class="list-inline-item">
                                            <img alt="<?= $p['nama_panggilan'] ?>" class="table-avatar" src="<?= base_url('img/noimage.png') ?>">
                                        </li>
                                    <?php } else { ?>
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="<?= base_url('foto/siswa/' . $p['foto']) ?>">
                                        </li>
                                    <?php } ?>
                                </ul>
                            </td>
                            <td><?= $p['no_pendaftaran'] ?></td>
                            <td><?= $p['ta'] ?></td>
                            <td><?= $p['nisn'] ?></td>
                            <td><?= $p['nama_lengkap'] ?></td>
                            <td><span class="badge badge-secondary"><?= $p['jalur_masuk'] ?></span></td>
                            <td class="text-center">
                                <a href="<?= base_url('ppdb/detail/' . $p['id_siswa']) ?>" class="btn bg-cyan btn-xs btn-flat"><i class="fas fa-eye"></i> Detail</a>
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>


<script>
    $(function() {
        $('body').addClass('sidebar-collapse');

        $("#tb-ditolak").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#tb-ditolak_wrapper .col-md-6:eq(0)');
    });
</script>

<?= $this->endSection() ?>