<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>

<div class="col-md-12">

    <?php
    $errors = session()->getFlashdata('errors');
    ?>

    <!-- flashdata sweetalert -->
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>

    <?php if (!empty($errors)) { ?>
        <!-- flashData -->
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal</h5>
            <?php foreach ($errors as $error) : ?>
                <?= esc($error) ?>
            <?php endforeach ?>
        </div>
    <?php } ?>

    <div class="card card-outline card-lightblue">
        <div class="card-header">
            <h3 class="card-title">Data User</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm">
                    <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</button>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="tb-user" class="table table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th width="50">No</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>foto</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($user as $u) { ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $u['nama_user'] ?></td>
                            <td><?= $u['email'] ?></td>
                            <td class="text-center">
                                <img class="img-fluid img-circle" src="<?= base_url('foto/' . $u['foto']) ?>" width="70">
                            </td>
                            <td class="text-center">
                                <button class="btn btn-success btn-flat btn-xs" data-toggle="modal" data-target="#edit<?= $u['id_user'] ?>"><i class="fas fa-edit"></i> Edit</button>
                                <a href="<?= base_url('user/hapusData/' . $u['id_user']) ?>" class="btn btn-danger btn-flat btn-xs tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
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

<!-- modal tambah -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('user/insertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_user">Nama User</label>
                    <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Masukan Nama User" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password" required>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" name="foto" id="foto" accept=".jpg,.png" required>
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
<?php foreach ($user as $p) { ?>
    <div class="modal fade" id="edit<?= $p['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('user/updateData/' . $p['id_user']) ?>
                <input type="hidden" name="passLama" id="passLama" value="<?= $p['password'] ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_user">Nama User</label>
                        <input type="text" class="form-control" name="nama_user" id="nama_user" value="<?= $p['nama_user'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= $p['email'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                        <small>*jika ingin mengubah password silahkan diisi.</small>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto" id="preview_gambar" accept=".jpg,.png">
                        <small>*jika ingin mengubah foto silahkan upload foto.</small>
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto Lama</label><br>
                        <div class="text-center">
                            <img src="<?= base_url('foto/' . $p['foto']) ?>" id="gambar_load" width="100" alt="">
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
<?php } ?>


<script>
    $(function() {
        $('#tb-user').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<?= $this->endSection() ?>