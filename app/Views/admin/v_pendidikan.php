<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>

    <div class="col md-12">

    <!-- flashdata sweetalert -->
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>

        <div class="card card-outline card-lightblue">
            <div class="card-header">
                <h3 class="card-title">Data Pendidikan</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tb-pendidikan" class="table table-hover text-nowrap">
                    <thead class="table-dark text-center">
                        <tr>
                            <th width="40">No</th>
                            <th>Pendidikan</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;
                        foreach($pendidikan as $p) { ?>
                            <tr>
                                <td class="text-center"><?= $i ?>.</td>
                                <td><?= $p['pendidikan'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-success btn-flat btn-xs" data-toggle="modal" data-target="#edit<?= $p['id_pendidikan'] ?>"><i class="fas fa-edit"></i> Edit</button>
                                    <a href="<?= base_url('pendidikan/hapusData/' . $p['id_pendidikan']) ?>" class="btn btn-danger btn-flat btn-xs tombol-hapus" ><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <!-- modal tambah -->
    <div class="modal fade" id="tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pendidikan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('pendidikan/insertData') ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Masukan Pendidikan" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                <?= form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
            <!-- /.modal-dialog -->
    </div>

    <!-- modal edit -->
    <?php foreach($pendidikan as $p) { ?>
        <div class="modal fade" id="edit<?= $p['id_pendidikan'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Pendidikan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open('pendidikan/updateData/' . $p['id_pendidikan']) ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="pendidikan">Pendidikan</label>
                                <input type="text" class="form-control" name="pendidikan" id="pendidikan" value="<?= $p['pendidikan'] ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                        </div>
                    <?= form_close() ?>
                </div>
                <!-- /.modal-content -->
            </div>
                <!-- /.modal-dialog -->
        </div>
    <?php } ?>

    <script>
        $(function () {
            $('#tb-pendidikan').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
    </script>

<?= $this->endSection() ?>