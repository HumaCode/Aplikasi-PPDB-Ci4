<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

    <div class="col-sm-5 mb-4 text-center mt-5">
        <img src="<?= base_url('img/lock.png') ?>" class="img-fluid pad" width="300" alt="">
    </div>

    <!-- flashdata sweetalert -->
    <?php 
    if(session()->getFlashdata('pesan')) { ?>
        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>
    <?php }else if(session()->getFlashdata('logout')){ ?>
        <div class="logout" data-flashdata="<?= session()->getFlashdata('logout') ?>"></div>
    <?php }else{ ?>
        <div class="flash" data-flashdata="<?= session()->getFlashdata('p') ?>"></div>
    <?php } ?>


    <div class="col-sm-7 ">
        <?= form_open('auth/cekLoginSiswa') ?>
        <?= csrf_field(); ?>
            <div class="card card-outline card-lightblue">
                <div class="card-header"><h3><strong>Login Siswa</strong></h3></div>
                    <div class="card-body">
                        
                        <div class="form-group">
                            <span class="text-danger">*) Lakukan pendaftaran sebelum login..!!!</span><br>
                            <span class="text-danger">*) Gunakan tanggal lahir sebagai Password..!!!</span>
                        </div>


                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="number" min="0" name="nisn" id="nisn" class="form-control form-control-sm" style="border-radius: 0;" placeholder="Masukan NISN" value="<?= old('nisn') ?>">
                            <p class="text-danger pl-2 err"><strong><?= $validation->hasError('nisn') ? $validation->getError('nisn') : '' ?></strong></p>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-sm" style="border-radius: 0;" placeholder="Masukan Password" value="<?= old('password') ?>">
                            <p class="text-danger pl-2 err"><strong><?= $validation->hasError('password') ? $validation->getError('password') : '' ?></strong></p>
                        </div>
                                
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn bg-lightblue btn-flat btn-block"><i class="fas fa-save"></i> Login</button>
                            </div>
                            <div class="col-md-6">
                                <a href="<?= base_url('pendaftaran') ?>" class="btn bg-teal btn-flat btn-block"><i class="fas fa-plus"></i> Buat Akun</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?= form_close() ?>
    </div>


    <script>
        window.setTimeout(function() {
        $('.err').fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
        }, 5000);
    </script>

<?= $this->endSection() ?>