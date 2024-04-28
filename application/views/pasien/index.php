<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $judul; ?></h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Master <?= $judul; ?></h5>
                        <a href="<?= base_url('pasien/tambahPasien') ?>" class="btn btn-success mb-3">Tambah Pasien</a>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nik</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Info Kontak</th>
                                    <th scope="col">Kecamatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pasien as $key => $p) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $p['id_pasien'] ?></td>
                                        <td><?= $p['nama'] ?></td>
                                        <td><?= $p['alamat'] ?></td>
                                        <td><?= $p['tanggal_lahir'] ?></td>
                                        <td><?= $p['info_kontak'] ?></td>
                                        <td><?= $p['nama_kecamatan'] ?></td>
                                        <td>
                                            <a href="<?= base_url('pasien/editpasien/' . $p['id_pasien']) ?>"
                                                class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk mengedit data pasien -->
                    <form id="editForm" action="<?= base_url('pasien/update') ?>" method="post">
                        <!-- Isi formulir dengan data pasien -->
                        <input type="hidden" name="id_pasien" id="editIdPasien">
                        <div class="form-group">
                            <label for="editNama">Nama:</label>
                            <input type="text" class="form-control" id="editNama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="editAlamat">Alamat:</label>
                            <input type="text" class="form-control" id="editAlamat" name="alamat">
                        </div>
                        <!-- Tambahkan field lainnya sesuai dengan kebutuhan -->
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main><!-- End #main -->