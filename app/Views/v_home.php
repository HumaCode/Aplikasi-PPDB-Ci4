<?= $this->extend('template/template-frontend') ?>

<?= $this->section('content') ?>

<div class="col-lg-8 mb-3">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $i = 0;
            foreach ($banner as $b) { ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="<?= ($i == 0) ? 'active' : ''  ?>"></li>
            <?php $i++;
            } ?>
        </ol>
        <div class="carousel-inner">
            <?php $i = 0;
            foreach ($banner as $b) { ?>
                <div class="carousel-item <?= ($i == 0) ? 'active' : ''  ?>">
                    <img class="d-block w-100" height="420px" src="<?= base_url('img/banner/' . $b['banner']) ?>" alt="First slide">
                </div>
            <?php $i++;
            } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-custom-icon" aria-hidden="true">
                <i class="fas fa-chevron-left"></i>
            </span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-custom-icon" aria-hidden="true">
                <i class="fas fa-chevron-right"></i>
            </span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="col-lg-4">
    <div class="card card-outline card-lightblue">
        <div class="card-header"><strong>Estimasi Pendaftar Tahun <?= date('Y') ?></strong></div>
        <div class="card-body">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-graduation-cap"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Pendaftaran</span>
                        <span class="info-box-number"><?= $jmlPendaftar ?></span>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-male"></i></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Laki-laki</span>
                        <span class="info-box-number"><?= $jmlLk ?></span>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fas fa-female"></i></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Perempuan</span>
                        <span class="info-box-number"><?= $jmlPr ?></span>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-12">
                <?php if ($ta) { ?>
                    <a href="<?= base_url('pendaftaran') ?>" class="btn bg-lightblue btn-block"> <i class="fas fa-file-alt"></i> Daftar Sekarang</a>
                <?php } else { ?>
                    <span class="btn btn-danger btn-block" style="cursor: not-allowed;"><strong>Pendaftaran Sudah Ditutup</strong></span>
                <?php } ?>

            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card card-outline card-lightblue">
        <div class="card-header"><strong>Beranda</strong></div>
        <div class="card-body">
            <?= $beranda['beranda'] ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>