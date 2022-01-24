<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>

<div class="col-lg-4 col-4">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?= $jurusan ?></h3>

            <p>Jurusan</p>
        </div>
        <div class="icon">
            <i class="fas fa-list"></i>
        </div>
        <a href="<?= base_url('jurusan') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-4 col-4">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
            <h3><?= $pekerjaan ?></h3>

            <p>Pekerjaan</p>
        </div>
        <div class="icon">
            <i class="fas fa-briefcase"></i>
        </div>
        <a href="<?= base_url('pekerjaan') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-4 col-4">
    <!-- small box -->
    <div class="small-box bg-secondary">
        <div class="inner">
            <h3><?= $agama ?></h3>

            <p>Agama</p>
        </div>
        <div class="icon">
            <i class="fas fa-cog"></i>
        </div>
        <a href="<?= base_url('agama') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-4 col-4">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">
            <h3><?= $penghasilan ?></h3>

            <p>Penghasilan</p>
        </div>
        <div class="icon">
            <i class="fas fa-money-bill-wave"></i>
        </div>
        <a href="<?= base_url('penghasilan') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-4 col-4">
    <!-- small box -->
    <div class="small-box bg-primary">
        <div class="inner">
            <h3><?= $pendidikan ?></h3>

            <p>Pendidikan</p>
        </div>
        <div class="icon">
            <i class="fas fa-user-graduate"></i>
        </div>
        <a href="<?= base_url('pendidikan') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-4 col-4">
    <!-- small box -->
    <div class="small-box bg-cyan">
        <div class="inner">
            <h3><?= $user ?></h3>

            <p>User</p>
        </div>
        <div class="icon">
            <i class="fas fa-users"></i>
        </div>
        <a href="<?= base_url('user') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-4 col-4">
    <!-- small box -->
    <div class="small-box bg-lightblue">
        <div class="inner">
            <h3><?= $pendaftarMasuk ?></h3>

            <p>Pendaftar Masuk</p>
        </div>
        <div class="icon">
            <i class="fas fa-arrow-alt-circle-down"></i>
        </div>
        <a href="<?= base_url('ppdb') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-4 col-4">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3><?= $pendaftarDiterima ?></h3>

            <p>Pendaftar Diterima</p>
        </div>
        <div class="icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <a href="<?= base_url('ppdb/listditerima') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-4 col-4">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
            <h3><?= $pendaftarDitolak ?></h3>

            <p>Pendaftar Ditolak</p>
        </div>
        <div class="icon">
            <i class="fas fa-times-circle"></i>
        </div>
        <a href="<?= base_url('ppdb/listditolak') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<?= $this->endSection() ?>