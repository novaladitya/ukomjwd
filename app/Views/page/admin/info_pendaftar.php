<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= Header ======= -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Info Pendaftar</h1>
            </div>
        </div>
    </div>
</section>
<!-- ======= /Header ======= -->

<!-- ======= MainContent -->
<section class="content">
    <div class="container-fluid">
        <h5>Anda Dapat Melihat Data dan Status Anda di Bawah</h5>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <table class="table mt-5">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>No.</th>
                    <th>ID Pendaftaran</th>
                    <th>Nama</th>
                    <th>Status Pendaftaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($pendaftar as $p) : ?>
                    <tr class="text-center">
                        <td><?= $i++; ?></td>
                        <td><?= $p['id_pendaftaran']; ?></td>
                        <td><?= $p['nama']; ?></td>
                        <td><?= $p['status']; ?></td>
                        <td><a href="/admin/detail-pendaftar/<?= $p['id']; ?>" type="button" class="btn btn-primary">Detail/Edit</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>