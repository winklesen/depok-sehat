<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $judul; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Usershtml">Home</a></li>
                <li class="breadcrumb-item">Instansi Kesehatan</li>
                <li class="breadcrumb-item active">Master</li>
            </ol>
        </nav>
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Master <?= $judul; ?></h5> -->
                        <div class=" justify-content-between mt-3 mb-3 d-flex">
                            <a href="<?= base_url('InstansiKesehatan/tambahInstansi') ?>" class="btn btn-success mb-2">Tambah Kecamatan</a>
                            <form class="d-flex" method="post" action="<?= base_url('InstansiKesehatan/search'); ?>">
                                <input class="form-control mb-2" type="text" placeholder="Cari Instansi Kesehatan" name="keyword">
                                <button type="submit" class="btn btn-success mb-2"><i class="fa-solid fa-magnifying-glass"></i></button>

                            </form>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID Instansi</th>
                                    <th scope="col">Nama Instansi</th>
                                    <th scope="col">Tipe</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kontak</th>
                                    <th scope="col">Id Kecamatan</th>
                                    <th scope="col">Tgl Ditambahkan</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($instansi as $key => $p) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $p['id_instansi'] ?></td>
                                        <td><?= $p['nama_instansi'] ?></td>
                                        <td><?= $p['tipe'] ?></td>
                                        <td><?= $p['alamat'] ?></td>
                                        <td><?= $p['kontak'] ?></td>
                                        <td><?= $p['id_kecamatan'] ?></td>
                                        <td><?= $p['created_at'] ?></td>                                        
                                        <td>
                                            <a href="<?= base_url('InstansiKesehatan/editInstansi/' . $p['id_instansi']) ?>"
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

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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