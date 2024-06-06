<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center mb-5">
    <div class="d-flex align-items-center justify-content-between">
        <a href="<?= base_url('admin'); ?>" class="logo d-flex align-items-center">
            <!-- <img src="<?= base_url('assets/'); ?>img/logo.png" alt=""> -->
            <span class="d-none d-lg-block title-green">Depok Sehat</span>
        </a>
        <!-- <i class="bi bi-list toggle-sidebar-btn"></i> -->
    </div>
    <!-- End Logo -->
    <nav class="header-nav ms-auto">
        <div class="d-flex align-items-center p-5">
            <a class="nav-item p-3 <?php if ($judul == "Home") { echo 'link-success'; } ?> nav-link" href="<?= base_url('home')?>">Home</a>
            <!-- <a class="nav-item p-3 <?php if ($judul == "List Penyakit") { echo 'link-success'; } ?> nav-link" href="<?= base_url('home/listpenyakit')?>">Daftar Penyakit</a> -->
            <!-- <a class="nav-item p-3 <?php if ($judul == "List Instansi") { echo 'link-success'; } ?> nav-link" href="<?= base_url('home/listinstansi')?>">Instansi Kesehatan</a> -->
            <a class="nav-item p-3 <?php if ($judul == "About") { echo 'link-success'; } ?> nav-link" href="<?= base_url('home/about')?>">About</a>
            <!-- Tambahkan item navbar lainnya di sini -->
        </div>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
