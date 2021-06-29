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
        <h5>Anda Dapat Melihat Data dan Status Anda di Bawah</h5>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <table class="table mt-5">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>ID Pendaftaran</th>
                    <th>Nama</th>
                    <th>Status Pendaftaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>PSBID-<?= $user['id']; ?></td>
                    <td><?= $pendaftar['nama'] == '' ? 'Belum di-set' : $pendaftar['nama']; ?></td>
                    <td><?= $pendaftar['status']; ?></td>
                    <td><a href="/edit-data/<?= $pendaftar['id']; ?>" type="button" class="btn btn-primary">Edit</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>