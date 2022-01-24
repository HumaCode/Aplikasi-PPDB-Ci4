<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>

    <div class="col md-12">

    <!-- flashdata sweetalert -->
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>

        <div class="card card-outline card-lightblue">
            <div class="card-header">
                <h3 class="card-title">Data Jurusan</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="tb-jurusan" class="table table-hover text-nowrap">
                    <thead class="table-dark text-center">
                        <tr>
                            <th width="40">No</th>
                            <th>Jurusan</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;
                        foreach($jurusan as $a) { ?>
                            <tr>
                                <td class="text-center"><?= $i ?>.</td>
                                <td><?= $a['jurusan'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-success btn-flat btn-xs" data-toggle="modal" data-target="#edit<?= $a['id_jurusan'] ?>"><i class="fas fa-edit"></i> Edit</button>
                                    <a href="<?= base_url('jurusan/hapusData/' . $a['id_jurusan']) ?>" class="btn btn-danger btn-flat btn-xs tombol-hapus" ><i class="fas fa-trash"></i> Hapus</a>
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
                    <h4 class="modal-title">Tambah Jurusan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('jurusan/insertData') ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Masukan Jurusan" required>
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
    <?php foreach($jurusan as $a) { ?>
        <div class="modal fade" id="edit<?= $a['id_jurusan'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Jurusan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open('jurusan/updateData/' . $a['id_jurusan']) ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?= $a['jurusan'] ?>" required>
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
            $('#tb-jurusan').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
    </script>

<?= $this->endSection() ?>