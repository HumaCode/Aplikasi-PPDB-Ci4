<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<?php if ($ta) { ?>
    <div class="col-sm-5 mt-4">
        <img src="<?= base_url('img/register.png') ?>" class="img-fluid pad" alt="">
    </div>

    <!-- flashdata sweetalert -->
    <?php
    if (session()->getFlashdata('pesan')) { ?>
        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>
    <?php } else { ?>
        <div class="flash" data-flashdata="<?= session()->getFlashdata('gagal') ?>"></div>
    <?php } ?>

    <?= session()->getFlashdata('errors') ?>

    <div class="col-sm-7">
        <?= form_open('pendaftaran/simpanPendaftaran') ?>
        <?= csrf_field(); ?>
        <div class="card card-outline card-cyan">
            <div class="card-header">
                <h3><strong>Buat Akun</strong></h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="number" min="0" name="nisn" id="nisn" class="form-control form-control-sm" style="border-radius: 0;" placeholder="Masukan NISN" value="<?= old('nisn') ?>">
                            <p class="text-danger pl-2"><strong><?= $validation->hasError('nisn') ? $validation->getError('nisn') : '' ?></strong></p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="form-control form-control-sm" style="border-radius: 0;" placeholder="Masukan Nama Lengkap" value="<?= old('nama') ?>">
                            <p class="text-danger pl-2"><strong><?= $validation->hasError('nama') ? $validation->getError('nama') : '' ?></strong></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama_panggilan">Nama Panggilan</label>
                            <input type="text" name="nama_panggilan" id="nama_panggilan" class="form-control form-control-sm" style="border-radius: 0;" placeholder="Masukan Nama Panggilan" value="<?= old('nama_panggilan') ?>">
                            <p class="text-danger pl-2"><strong><?= $validation->hasError('nama_panggilan') ? $validation->getError('nama_panggilan') : '' ?></strong></p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="lahir"> Tempat Lahir</label>
                            <input type="text" name="lahir" id="lahir" class="form-control form-control-sm" style="border-radius: 0;" placeholder="Masukan Tempat Lahir" value="<?= old('lahir') ?>">
                            <p class="text-danger pl-2"><strong><?= $validation->hasError('lahir') ? $validation->getError('lahir') : '' ?></strong></p>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="jk"> Jenis Kelamin</label>
                            <select name="jk" id="jk" class="form-control form-control-sm" style="border-radius: 0;">
                                <option value="">-- Pilih --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <p class="text-danger pl-2"><strong><?= $validation->hasError('jk') ? $validation->getError('jk') : '' ?></strong></p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="jalur"> Jalur Masuk Pendaftaran</label>
                            <select name="jalur" id="jalur" class="form-control form-control-sm" style="border-radius: 0;">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($jm as $j) { ?>
                                    <option value="<?= $j['id_jalur_masuk'] ?>"><?= $j['jalur_masuk'] ?></option>
                                <?php } ?>
                            </select>
                            <p class="text-danger pl-2"><strong><?= $validation->hasError('jalur') ? $validation->getError('jalur') : '' ?></strong></p>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tgl">Tanggal</label>
                            <select name="tgl" id="tgl" class="form-control form-control-sm" style="border-radius: 0;">
                                <option value="">-- Tanggal Kelahiran --</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>

                                <?php for ($i = 10; $i <= 31; $i++) { ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                            </select>
                            <p class="text-danger pl-2"><strong><?= $validation->hasError('tgl') ? $validation->getError('tgl') : '' ?></strong></p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="bln">Bulan</label>
                            <select name="bln" id="bln" class="form-control form-control-sm" style="border-radius: 0;">
                                <option value="">-- Bulan Kelahiran --</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <?php
                                for ($i = 10; $i <= 12; $i++) { ?>

                                    <option value="<?= $i ?>"><?= $i ?></option>

                                <?php } ?>
                            </select>
                            <p class="text-danger pl-2"><strong><?= $validation->hasError('bln') ? $validation->getError('bln') : '' ?></strong></p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="thn">Tahun</label>
                            <select name="thn" id="thn" class="form-control form-control-sm" style="border-radius: 0;">
                                <option value="">-- Tahun Kelahiran --</option>
                                <?php $now = date('Y');
                                for ($i = 1998; $i <= $now + 2; $i++) { ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php } ?>
                            </select>
                            <p class="text-danger pl-2"><strong><?= $validation->hasError('thn') ? $validation->getError('thn') : '' ?></strong></p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="jurusan"> Jurusan</label>
                    <select name="jurusan" id="jurusan" class="form-control form-control-sm" style="border-radius: 0;">
                        <option value="0">Tidak Ada Jurusan</option>
                        <?php foreach ($jurusan as $j) { ?>
                            <option value="<?= $j['id_jurusan'] ?>"><?= $j['jurusan'] ?></option>
                        <?php } ?>
                    </select>
                    <small class="text-danger">*Pilih Jurusan Jika Ada.</small>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn bg-lightblue btn-flat btn-block"><i class="fas fa-save"></i> Daftar</button>
            </div>
        </div>
    </div>
    <?= form_close() ?>
    </div>
<?php } else { ?>
    <div class="col-lg-12">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            Pendaftaran Sudah di Tutup...!
        </div>
    </div>
<?php } ?>


<?= $this->endSection() ?>