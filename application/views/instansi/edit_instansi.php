<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body m-3">
                        <h5 class="card-title p-0">Edit Instansi Kesehatan</h5>
                        <!-- Form untuk mengedit data pasien -->
                        <form id="editForm" action="<?= base_url('Instansi/updateInstansi') ?>" method="post">

                            <div class="form-group mb-2">
                                <label for="id_instansi" class="mr-2">ID Instansi:</label>
                                <input type="text" class="form-control" id="id_instansi" name="id_instansi"
                                    value="<?= $id_instansi['id_instansi'] ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label for="nama_instansi" class="mr-2">Nama Instansi:</label>
                                <input type="text" class="form-control" id="nama_instansi" name="nama_instansi"
                                    value="<?= $nama_instansi['nama_instansi'] ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label for="tipe" class="mr-2">Tipe Instansi:</label>
                                <select name="tipe" id="tipe">
                                    <option value="Rumah Sakit">Rumah Sakit</option>
                                    <option value="Puskesmas">Puskesmas</option>
                                    <option value="Klinik">Klinik</option>
                                </select>
                            </div>


                            <div class="form-group mb-2">
                                <label for="alamat class=" mr-2">Alamat:</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="<?= $alamat[''] ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label for="kontak" class="mr-2">Kontak:</label>
                                <input type="text" class="form-control" id="kontak" name="kontak"
                                    value="<?= $pasien['kontak'] ?>">
                            </div>
                            <div class="form-group mb-2">
                                <label for="id_kecamatan" class="mr-2">Kecamatan:</label>
                                <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                                    <?php foreach ($list_kecamatan as $kecamatan) { ?>
                                    <option value="<?= $kecamatan['id_kecamatan'] ?>" <?php if ($kecamatan['id_kecamatan'] == $pasien['id_kecamatan'])
                                              echo "selected"; ?>>
                                        <?= $kecamatan['nama_kecamatan'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
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