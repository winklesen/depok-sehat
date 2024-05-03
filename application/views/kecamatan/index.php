<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $judul; ?></h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Master <?= $judul; ?></h5> -->
                        <div class=" justify-content-between mt-3 mb-3 d-flex">
                            <a href="<?= base_url('kecamatan/tambahkecamatan') ?>" class="btn btn-success mb-2">Tambah Kecamatan</a>
                            <form class="d-flex" method="post" action="<?= base_url('kecamatan/searchkecamatan'); ?>">
                                <input class="form-control mb-2" type="text" placeholder="Cari Pesanan" name="keyword">
                                <button type="submit" class="btn btn-success mb-2"><i class="fa-solid fa-magnifying-glass"></i></button>
                              
                            </form>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID Kecamatan</th>
                                    <th scope="col">Nama Kecamatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <p></p>
                                <?php if (isset($search_kecamatan)) {
                                    foreach ($search_kecamatan as $key => $s) { ?>
                                        <tr>
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td><?= $s['id_kecamatan'] ?></td>
                                            <td><?= $s['nama_kecamatan'] ?></td>
                                            <td>
                                                <a href="<?= base_url('kecamatan/editkecamatan/' . $s['id_kecamatan']) ?>"
                                                    class="btn btn-primary">Edit</a>
                                                    <a href="<?= base_url('kecamatan/hapuskecamatan/').$s['id_kecamatan'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $s['nama_kecamatan'];?> ?');" class="btn btn-danger"> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } 
                                    } else {
                                    // Tampilkan semua data acara jika tidak ada hasil pencarian
                                    foreach ($kecamatan as $key => $p) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $p['id_kecamatan'] ?></td>
                                        <td><?= $p['nama_kecamatan'] ?></td>
                                        <td>
                                            <a href="<?= base_url('kecamatan/editkecamatan/' . $p['id_kecamatan']) ?>"
                                                class="btn btn-primary">Edit</a>
                                            <a href="<?= base_url('kecamatan/hapuskecamatan/').$p['id_kecamatan'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $p['nama_kecamatan'];?> ?');" class="btn btn-danger"> Hapus</a>
                                        </td>
                                    </tr>
                                <?php } }?>
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