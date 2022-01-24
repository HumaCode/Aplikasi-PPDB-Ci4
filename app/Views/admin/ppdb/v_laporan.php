<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card card-outline card-lightblue">
        <div class="card-header">
            <h3 class="card-title">Laporan Kelulusan</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm">
                    <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="t-ajar" class="table table-hover text-nowrap">
                <thead class="table-dark text-center">
                    <tr>
                        <th width="40">No</th>
                        <th>Tahun</th>
                        <th>Tahun Pelajaran</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $i = 1;
                    foreach ($ta as $a) { ?>
                        <tr>
                            <td><?= $i ?>.</td>
                            <td><?= $a['tahun'] ?></td>
                            <td><?= $a['ta'] ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('ppdb/cetakLaporan/' . $a['tahun']) ?>" target="_blank" class="btn bg-lightblue btn-flat btn-xs"><i class="fas fa-print"></i> Cetak</a>
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#t-ajar').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<?= $this->endSection() ?>