<main id="main" class="main">

<div class="pagetitle">
    <h1><?= $judul; ?></h1>
    <!-- <nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
    <li class="breadcrumb-item">Tables</li>
    <li class="breadcrumb-item active">General</li>
  </ol>
</nav> -->
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Master <?= $judul; ?></h5>

                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID Instansi/th>
                                <th scope="col">Nama Instansi</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Kontak</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($instansi as $key => $i) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $p['id_instansi'] ?></td>
                                        <td><?= $p['nama_instansi'] ?></td>
                                        <td><?= $p['tipe'] ?></td>
                                        <td><?= $p['alamat'] ?></td>
                                        <td><?= $p['kontak'] ?></td>
                                        <td>
                                            <a href="<?= base_url('instansi/editInstansi/' . $p['id_instansi']) ?>"
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
                    <h5 class="modal-title" id="editModalLabel">Edit Data Instansi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk mengedit data instansi -->
                    <form id="editForm" action="<?= base_url('instansi/update') ?>" method="post">
                        <!-- Isi formulir dengan data instansi -->
                        <input type="hidden" name="id_instansi" id="editid_instansi">
                        <div class="form-group">
                            <label for="editnama_instansi">Nama Instansi:</label>
                            <input type="text" class="form-control" id="editnama_instansi" name="nama_instansi">
                        </div>
                        <div class="form-group">
                            <label for="edittipe">Tipe:</label>
                            <input type="text" class="form-control" id="edittipe" name="tipe">
                        </div>
                        <div class="form-group">
                            <label for="editalamat">Alamat:</label>
                            <input type="text" class="form-control" id="editalamat" name="alamat">
                        </div>
                        <!-- Tambahkan field lainnya sesuai dengan kebutuhan -->
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main><!-- End #main -->