<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= Header ======= -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Beranda</h1>
            </div>
        </div>
    </div>
</section>
<!-- ======= /Header ======= -->

<!-- ======= MainContent -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $menungguPersetujuan; ?></h3>

                        <p>Menunggu Persetujuan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $diterima; ?></h3>

                        <p>Diterima</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $tidakDiterima; ?></h3>

                        <p>Tidak Diterima</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-times-circle"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3><?= $cadangan; ?></h3>

                        <p>Cadangan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-undo-alt"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>
</section>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>