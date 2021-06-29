<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PSB SMA | <?= $halaman; ?></title>

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/template/plugins/fontawesome-free/css/all.min.css">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/template/dist/css/mycss.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/template/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <!-- ======= Wrapper ======= -->
  <div class="wrapper">

    <!-- ======= Header ======= -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left Side -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right Side -->
      <ul class="navbar-nav ml-auto">
        <!-- Buat Logout -->
        <li class="nav-item">
          <a type="button" class="btn btn-danger" href="/logout">Logout</a>
        </li>
      </ul>
    </nav>
    <!-- ======= /Header ======= -->

    <!-- ======= Sidebar ======= -->
    <?= $this->include('layout/sidebar'); ?>
    <!-- ======= /Sidebar ======= -->

    <!-- ======= Konten ======= -->
    <div class="content-wrapper">
      <?= $this->renderSection('content'); ?>
    </div>
    <!-- ======= /Konten ======= -->

    <!-- ======== Footer ======= -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        Noval Aditya Marlon
      </div>
      Copyright &copy; 2021.
    </footer>
    <!-- ======= /Footer ======= -->

  </div>
  <!-- ======= /Wrapper ======= -->

  <!-- Vendor JS Files -->
  <script src="<?= base_url(); ?>/assets/template/plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>/assets/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>/assets/template/dist/js/adminlte.min.js"></script>

  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>