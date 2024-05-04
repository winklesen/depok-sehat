<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body m-3">
                        <h5 class="card-title p-0">Edit Data Instansi</h5>
                        <!-- Form untuk mengedit data pasien -->
                        <form id="editForm" action="<?= base_url('instansi/createInstansiKesehatan') ?>" method="post">

                            <div class="form-group mb-2">
                                <label for="id_instansi" class="mr-2">ID Instansi:</label>
                                <input type="text" class="form-control" id="id_instansi" name="id_instansi">
                            </div>

                            <div class="form-group mb-2">
                                <label for="nama_instansi" class="mr-2">Nama Instansi:</label>
                                <input type="text" class="form-control" id="nama_instansi" name="nama_instansi">
                            </div>


                            <div class="form-group mb-2">
                                <form id="editForm" action="<?= base_url('instansi/createInstansiKesehatan') ?>"
                                    method="post">

                                    <div class="form-group mb-2">
                                        <label for="id_instansi" class="mr-2">ID Instansi:</label>
                                        <input type="text" class="form-control" id="id_instansi" name="id_instansi">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="nama_instansi" class="mr-2">Nama Instansi:</label>
                                        <input type="text" class="form-control" id="nama_instansi" name="nama_instansi">
                                    </div>


                                    <div class="form-group mb-2">
                                        <select name="tipe" id="tipe">Tipe:</select>
                                        <option>Rumah Sakit</option>
                                        <option>Puskesmas</option>
                                        <option>Klinik</option>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="alamat class=" mr-2">Alamat:</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat"
                                            value="<?= $alamat[''] ?>">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="info_kontak" class="mr-2">Info Kontak:</label>
                                        <input type="text" class="form-control" id="info_kontak" name="info_kontak">
                                    </div>

                                    <div class="form-group mb-2">
                                        <?php foreach ($list_kecamatan as $kecamatan) { ?>
                                        <option value="<?= $kecamatan['id_kecamatan'] ?>">
                                            <?= $kecamatan['nama_kecamatan'] ?></option>
                                        <?php } ?>

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
</div>
<div class="form-group mb-2">
    <label for="alamat class=" mr-2">Alamat:</label>
    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat[''] ?>">
</div>

<div class="form-group mb-2">
    <label for="info_kontak" class="mr-2">Info Kontak:</label>
    <input type="text" class="form-control" id="info_kontak" name="info_kontak">
</div>

<div class="form-group mb-2">
    <?php foreach ($list_kecamatan as $kecamatan) { ?>
    <option value="<?= $kecamatan['id_kecamatan'] ?>"><?= $kecamatan['nama_kecamatan'] ?></option>
    <?php } ?>
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