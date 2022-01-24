<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>

    <div class="col md-12">

    <!-- flashdata sweetalert -->
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>

        <div class="card card-outline card-lightblue">
            <div class="card-header">
                <h3 class="card-title">Data Tahun Pelajaran</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="t-ajar" class="table table-hover text-nowrap">
                    <thead class="table-dark text-center">
                        <tr>
                            <th width="40">No</th>
                            <th>Tahun</th>
                            <th>Tahun Pelajaran</th>
                            <th>Status</th>
                            <th>Aktif/Non Aktif</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $i=1;
                        foreach($ta as $a) { ?>
                            <tr>
                                <td ><?= $i ?>.</td>
                                <td><?= $a['tahun'] ?></td>
                                <td><?= $a['ta'] ?></td>
                                
                                <td>
                                    <?php if($a['status'] == 1) { ?>
                                        <strong class="text-success">Aktif</strong>
                                    <?php }else{ ?>
                                        <strong class="text-danger">Tidak Aktif</strong>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($a['status'] == 1) { ?>
                                            <a href="<?= base_url('ta/statusNonAktif/' . $a['id_th_ajar']) ?>" class="badge badge-danger">Non Aktifkan</a>
                                    <?php }else{ ?>
                                        <a href="<?= base_url('ta/statusAktif/' . $a['id_th_ajar']) ?>" class="badge badge-success">Aktifkan</a>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-success btn-flat btn-xs" data-toggle="modal" data-target="#edit<?= $a['id_th_ajar'] ?>"><i class="fas fa-edit"></i> Edit</button>
                                    <a href="<?= base_url('ta/hapusData/' . $a['id_th_ajar']) ?>" class="btn btn-danger btn-flat btn-xs tombol-hapus" ><i class="fas fa-trash"></i> Hapus</a>
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
                    <h4 class="modal-title">Tambah Tahun Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('ta/insertData') ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <select name="tahun" id="tahun" class="form-control">
                                <?php $now = date('Y');
                                    for($i=$now; $i <= $now + 2; $i++) { ?>
                                        <option value="<?= $i; ?>" <?php if($now == $i) {echo 'selected';} ?> ><?= $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ta">Tahun Pelajaran</label>
                            <input type="text" class="form-control" name="ta" id="ta" placeholder="Masukan Tahun Pelajaran" required>
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
    <?php foreach($ta as $a) { ?>
        <div class="modal fade" id="edit<?= $a['id_th_ajar'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Tahun Pelajaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open('ta/updateData/' . $a['id_th_ajar']) ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select name="tahun" id="tahun" class="form-control">
                                    <?php $now = date('Y');
                                        for($i=2021; $i <= $now + 2; $i++) { ?>
                                            <option value="<?= $i; ?>" <?php if($i == $a['tahun']) {echo 'selected';} ?> ><?= $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ta">Tahun Pelajaran</label>
                                <input type="text" class="form-control" name="ta" id="ta" value="<?= $a['ta'] ?>" required>
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