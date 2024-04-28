<main id="main" class="main">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body m-3">
            <h5 class="card-title p-0">Edit Data Pasien</h5>
            <!-- Form untuk mengedit data pasien -->
            <form id="editForm" action="<?= base_url('pasien/createPasien') ?>" method="post">

              <div class="form-group mb-2">
                <label for="nik" class="mr-2">NIK:</label>
                <input type="text" class="form-control" id="nik" name="nik">
              </div>

              <div class="form-group mb-2">
                <label for="nama" class="mr-2">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama">
              </div>

              <div class="form-group mb-2">
                <label for="tanggal_lahir" class="mr-2">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
              </div>

              <div class="form-group mb-2">
                <label for="info_kontak" class="mr-2">Info Kontak:</label>
                <input type="text" class="form-control" id="info_kontak" name="info_kontak">
              </div>

              <div class="form-group mb-2">
                <label for="id_kecamatan" class="mr-2">Kecamatan:</label>
                <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                  <option value="" selected disabled>Pilih Kecamatan</option>
                  <?php foreach ($list_kecamatan as $kecamatan) { ?>
                    <option value="<?= $kecamatan['id_kecamatan'] ?>">
                      <?= $kecamatan['nama_kecamatan'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>


              <div class="form-group mb-2">
                <label for="alamat" class="mr-2">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
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