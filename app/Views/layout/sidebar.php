<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a class="brand-link">
        <span class="brand-text font-weight-light d-flex justify-content-center">Sistem PSB SMA</span>
    </a>

    <!-- ======= MenuSidebar ======= -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
            <div class="info">
                <a class="d-block">
                    <i class="fas fa-user"></i>
                    &nbsp;&nbsp;<?= session()->get('level') == 1 ? 'Admin' : session()->get('email'); ?>
                </a>
            </div>
        </div>

        <!-- ======= MainMenu ======= -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-compact nav-child-indent nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- ManajemenKonten -->
                <li class="nav-header">Manajemen Pendaftar</li>
                </li>
                <li class="nav-item">
                    <a href="<?= session()->get('level') == 1 ? '/admin' : '/beranda'; ?>" class="nav-link <?= $halaman == 'Beranda' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <?php if (session()->get('level') == 1) : ?>
                    <li class="nav-item">
                        <a href="/admin/info-pendaftar" class="nav-link <?= $halaman == 'Info Pendaftar' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Info Pendaftar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/akun-pendaftar" class="nav-link <?= $halaman == 'Akun Pendaftar' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Akun Pendaftar</p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- ======= /MainMenu ======= -->
    </div>
    <!-- ======= /MenuSidebar ======= -->
</aside>