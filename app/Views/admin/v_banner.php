<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>

    <div class="col md-12">

    <!-- flashdata sweetalert -->
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>

        <div class="card card-outline card-lightblue">
            <div class="card-header ">
                <h3 class="card-title">Data Banner</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tb-agama" class="table table-hover text-nowrap">
                    <thead class="table-dark text-center">
                        <tr>
                            <th width="40">No</th>
                            <th>Ket</th>
                            <th>Banner</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;
                        foreach($banner as $a) { ?>
                            <tr>
                                <td class="text-center"><?= $i ?>.</td>
                                <td><?= $a['ket'] ?></td>
                                <td class="text-center">
                                    <img src="<?= base_url('img/banner/' . $a['banner']) ?>" width="100" class="img-fluid" alt="">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-success btn-flat btn-xs" data-toggle="modal" data-target="#edit<?= $a['id_banner'] ?>"><i class="fas fa-edit"></i> Edit</button>
                                    <a href="<?= base_url('banner/hapusData/' . $a['id_banner']) ?>" class="btn btn-danger btn-flat btn-xs tombol-hapus" ><i class="fas fa-trash"></i> Hapus</a>
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
                    <h4 class="modal-title">Tambah Banner</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('banner/insertData') ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <input type="text" class="form-control" name="ket" id="ket" placeholder="Masukan Keterangan" required>
                        </div>
                        <div class="form-group">
                            <label for="banner">File Banner</label>
                            <input type="file" class="form-control" name="banner" id="preview_gambar" accept=".jpg,.jpeg,.png" required>
                            <small class="text-danger"><strong>*File maksimal 1,5 Mb</strong></small>
                        </div>

                        <div class="form-group">
                            <label >Preview</label> <br>
                            <div class="text-center">
                                <img src="<?= base_url('img/noimage.png') ?>" id="gambar_load" width="200" alt="">
                            </div>
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
    <?php foreach($banner as $a) { ?>
        <div class="modal fade" id="edit<?= $a['id_banner'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Banner</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open_multipart('banner/updateData/' . $a['id_banner']) ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="ket">Keterangan</label>
                                <input type="text" class="form-control" name="ket" id="ket" placeholder="Masukan Keterangan" value="<?= $a['ket'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="banner">File Banner</label>
                                <input type="file" class="form-control" name="banner" id="preview_gambar" accept=".jpg,.jpeg,.png">
                                <small class="text-danger"><strong>*File maksimal 1,5 Mb</strong></small>
                            </div>

                            <div class="form-group">
                                <label >Preview</label> <br>
                                <div class="text-center">
                                    <img src="<?= base_url('img/banner/' . $a['banner']) ?>" id="gambar_load" width="200" alt="">
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
                <!-- /.modal-dialog -->
        </div>
    <?php } ?>



    <script>
                
        function bacaGambar(input) {
            if(input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#gambar_load').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        };

        $('#preview_gambar').change(function() {
            bacaGambar(this);
        });
                


        $(function () {
            $('#tb-agama').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
    </script>

<?= $this->endSection() ?>