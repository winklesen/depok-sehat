<main id="main" class="main">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body m-3">
            <h5 class="card-title p-0">Tambah Kecamatan</h5>
            <!-- Form untuk mengedit data kecamatan -->
            <form id="editForm" action="<?= base_url('Kecamatan/createKecamatan') ?>" method="post">

              <div class="form-group mb-2">
                <label for="id_kecamatan" class="mr-2">ID Kecamatan:</label>
                <input type="text" class="form-control" id="id_kecamatan" name="id_kecamatan">
              </div>

              <div class="form-group mb-2">
                <label for="nama_kecamatan" class="mr-2">Nama Kecamatan:</label>
                <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan">
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