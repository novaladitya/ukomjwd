<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= Header ======= -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail</h1>
            </div>
        </div>
    </div>
</section>
<!-- ======= /Header ======= -->

<!-- ======= MainContent -->
<section class="content">
    <div class="container-fluid">

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Detail Data Pendaftar</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/admin/updatependaftar/<?= $pendaftar['id']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" class="form-control" id="email" value="<?= $pendaftar['email']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="ID Pendaftaran">ID Pendaftaran</label>
                        <input type="text" class="form-control" id="id_pendaftaran" value="<?= $pendaftar['id_pendaftaran']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" value="<?= $pendaftar['nama']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" value="<?= $pendaftar['alamat']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="asal_sekolah">Asal Sekolah</label>
                        <input type="text" class="form-control" id="asal_sekolah" value="<?= $pendaftar['asal_sekolah']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nilai_mtk">Nilai Matematika</label>
                        <input type="text" class="form-control" id="nilai_mtk" value="<?= $pendaftar['nilai_mtk']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nilai_bing">Nilai Bahasa Inggris</label>
                        <input type="text" class="form-control" id="nilai_bing" value="<?= $pendaftar['nilai_bing']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="status">Ubah Status</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="status">Status</label>
                            </div>
                            <select class="custom-select" id="status" name="status">
                                <option selected><?= $pendaftar['status']; ?></option>
                                <option value="Diterima">Diterima</option>
                                <option value="Cadangan">Cadangan</option>
                                <option value="Tidak Diterima">Tidak Diterima</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a type="button" class="btn btn-secondary" href="/admin/info-pendaftar">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>