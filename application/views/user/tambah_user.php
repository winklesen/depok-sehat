<main id="main" class="main">
  <div class="pagetitle">
      <h1><?= $judul; ?></h1>
      <nav>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="Usershtml">Home</a></li>
              <li class="breadcrumb-item">User</li>
              <li class="breadcrumb-item active">Add</li>
          </ol>
      </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body m-3">
            <h5 class="card-title p-0">Tambah Data User</h5>
            <!-- Form untuk mengedit data user -->
            <form id="editForm" action="<?= base_url('user/createUser') ?>" method="post">

              <div class="form-group mb-2">
                <label for="nama" class="mr-2">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama">
              </div>

              <div class="form-group mb-2">
                <label for="email" class="mr-2">Email:</label>
                <input type="text" class="form-control" id="email" name="email">
              </div>

              <div class="form-group mb-2">
                <label for="password" class="mr-2">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>

              <div class="form-group mb-2">
                <label for="id_instansi" class="mr-2">ID Instansi:</label>
                <input type="text" class="form-control" id="id_instansi" name="id_instansi">
              </div>


              <!-- Tambahkan field lainnya sesuai dengan kebutuhan -->

              <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->