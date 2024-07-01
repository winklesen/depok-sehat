<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">


  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-heading">Pages</li>
    <?php if ($user['role_id'] == 2 || $user['role_id'] == 1) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('admin'); ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
    <?php } ?>
    <?php if ( $user['role_id'] == 1) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('pasien'); ?>">
          <i class="fa-solid fa-hospital-user"></i>
          <span>Pasien</span>
        </a>
      </li>
    <?php } ?>
    <?php if ($user['role_id'] == 1) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('rekamMedis'); ?>">
          <i class="fa-solid fa-file-medical"></i>
          <span>Rekam Medis</span>
        </a>
      </li>
    <?php } ?>
    <?php if ($user['role_id'] == 1) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('penyakit'); ?>">
          <i class="fa-solid fa-virus"></i>
          <span>Penyakit</span>
        </a>
      </li>
    <?php } ?>
    <?php if ($user['role_id'] == 2) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('user/master'); ?>">
          <i class="fa-solid fa-user"></i>
          <span>Pengguna</span>
        </a>
      </li>
    <?php } ?>
    <?php if ($user['role_id'] == 2) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('instansiKesehatan'); ?>">
          <i class="fa-solid fa-house-medical"></i>
          <span>Instansi Kesehatan</span>
        </a>
      </li>
    <?php } ?>
    <?php if ($user['role_id'] == 2) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('kecamatan'); ?>">
          <i class="fa-solid fa-city"></i>
          <span>Kecamatan</span>
        </a>
      </li>
    <?php } ?>


  </ul>
</aside><!-- End Sidebar-->