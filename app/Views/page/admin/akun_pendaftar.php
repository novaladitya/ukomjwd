<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= Header ======= -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Akun Pendaftar</h1>
            </div>
        </div>
    </div>
</section>
<!-- ======= /Header ======= -->

<!-- ======= MainContent -->
<section class="content">
    <div class="container-fluid">
        <h5>Anda Dapat Melihat Akun yang Terdaftar di Bawah</h5>

        <table class="table mt-5">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>No.</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Level</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($user as $u) : ?>
                    <tr class="text-center">
                        <td><?= $i++; ?></td>
                        <td><?= $u['email']; ?></td>
                        <td><?= $u['password']; ?></td>
                        <td><?= $u['level'] == 1 ? 'Admin' : 'User'; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>