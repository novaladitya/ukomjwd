<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= Header ======= -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data</h1>
            </div>
        </div>
    </div>
</section>
<!-- ======= /Header ======= -->

<?php
session()->getFlashdata('error') !== null ? $error = session()->getFlashdata('error') : $error = null;
?>
<!-- ======= MainContent -->
<section class="content">
    <div class="container-fluid">
        <h5>Silahkan Lengkapi Data Diri Anda di Bawah.</h5>

        <div class="card card-<?= isset($error) ? 'danger' : 'primary'; ?> mt-5">
            <div class="card-header">
                <h3 class="card-title"><?= isset($error) ? $error['header'] : 'Isi Data Anda di Bawah'; ?></h3>
            </div>

            <?= form_open_multipart(base_url("user/updatependaftar/" . $pendaftar['id'])); ?>
            <div class="card-body">
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $pendaftar['email']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="ID Pendaftaran">ID Pendaftaran</label>
                    <input type="text" class="form-control" id="id_pendaftaran" name="id_pendaftaran" value="PSBID-<?= $user['id']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <div class="input-group flex-wrap">
                        <input type="text" class="form-control <?= isset($error['nama']) && $error['nama'] !== ''  ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ? old('nama') : $pendaftar['nama']; ?>" placeholder="Masukkan Nama Anda">
                        <div class="invalid-feedback d-block">
                            <?= isset($error) ? $error['nama'] : null; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <div class="input-group flex-wrap">
                        <input type="text" class="form-control <?= isset($error['alamat']) && $error['alamat'] !== ''  ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat') ? old('alamat') : $pendaftar['alamat']; ?>" placeholder="Masukkan Alamat Anda">
                        <div class="invalid-feedback d-block">
                            <?= isset($error) ? $error['alamat'] : null; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="asal_sekolah">Asal Sekolah</label>
                    <div class="input-group flex-wrap">
                        <input type="text" class="form-control <?= isset($error['asal_sekolah']) && $error['asal_sekolah'] !== ''  ? 'is-invalid' : ''; ?>" id="asal_sekolah" name="asal_sekolah" value="<?= old('asal_sekolah') ? old('asal_sekolah') : $pendaftar['asal_sekolah']; ?>" placeholder="Masukkan Asal Sekolah Anda">
                        <div class="invalid-feedback d-block">
                            <?= isset($error) ? $error['asal_sekolah'] : null; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nilai_mtk">Nilai Matematika</label>
                    <div class="input-group flex-wrap">
                        <input type="text" class="form-control <?= isset($error['nilai_mtk']) && $error['nilai_mtk'] !== ''  ? 'is-invalid' : ''; ?>" id="nilai_mtk" name="nilai_mtk" value="<?= old('nilai_mtk') ? old('nilai_mtk') : $pendaftar['nilai_mtk']; ?>" placeholder="Masukkan Nilai Matematika Anda">
                        <div class="invalid-feedback d-block">
                            <?= isset($error) ? $error['nilai_mtk'] : null; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nilai_bing">Nilai Bahasa Inggris</label>
                    <div class="input-group flex-wrap">
                        <input type="text" class="form-control <?= isset($error['nilai_bing']) && $error['nilai_bing'] !== ''  ? 'is-invalid' : ''; ?>" id="nilai_bing" name="nilai_bing" value="<?= old('nilai_bing') ? old('nilai_bing') : $pendaftar['nilai_bing']; ?>" placeholder="Masukkan Nilai Bahasa Inggris Anda">
                        <div class="invalid-feedback d-block">
                            <?= isset($error) ? $error['nilai_bing'] : null; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <img src="<?= base_url(); ?>/assets/img/<?= $pendaftar['foto']; ?>" style="width = 200px; height: 250px;">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="foto">File Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <a type="button" class="btn btn-secondary" href="/beranda">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</section>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>