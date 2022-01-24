<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>


    <!-- flashdata sweetalert -->
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>

            <div class="col-md-4">
                <div class="card card-outline card-lightblue">
                        <div class="card-header"><strong>Logo Sekolah</strong></div>
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?= base_url('img/' . $setting['logo']) ?>" class="img-fluid pad" id="gambar_load" alt="" width="230">
                            </div>
                            <?= form_open_multipart('admin/simpanPengaturan') ?>
                            <div class="form-group">
                                <label for="logo">Ganti Logo</label>
                                <input type="file" class="form-control" id="preview_gambar" style="border-radius: 0px;" name="logo" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card card-outline card-lightblue">
                        <div class="card-header"><strong>Data Sekolah</strong></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_sekolah">Nama Sekolah</label>
                                        <input type="text" class="form-control form-control-sm" style="border-radius: 0px;" name="nama_sekolah" id="nama_sekolah" value="<?= $setting['nama_sekolah'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telepon">No. Telepon</label>
                                        <input type="text" class="form-control form-control-sm" style="border-radius: 0px;" name="no_telepon" id="no_telepon" value="<?= $setting['no_telepon'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control form-control-sm" style="border-radius: 0px;" name="email" id="email" value="<?= $setting['email'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="web">Web</label>
                                        <input type="text" class="form-control form-control-sm" style="border-radius: 0px;" name="web" id="web" value="<?= $setting['web'] ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat">Alamat Sekolah</label>
                                        <input type="text" class="form-control form-control-sm" style="border-radius: 0px;" name="alamat" id="alamat" value="<?= $setting['alamat'] ?>"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control form-control-sm" style="border-radius: 0px;" name="kecamatan" id="kecamatan" value="<?= $setting['kecamatan'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kabupaten">Kabupaten/Kota</label>
                                        <input type="text" class="form-control form-control-sm" style="border-radius: 0px;" name="kabupaten" id="kabupaten" value="<?= $setting['kabupaten'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="provinsi">Provinsi</label>
                                        <input type="text" class="form-control form-control-sm" style="border-radius: 0px;" name="provinsi" id="provinsi" value="<?= $setting['provinsi'] ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header"><strong>Deskripsi Sekolah</strong></div>
                        <div class="card-body">
                            <div class="form-group">
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control form-control-sm"><?= $setting['deskripsi'] ?></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
        

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
                
        </script>

<?= $this->endSection() ?>

