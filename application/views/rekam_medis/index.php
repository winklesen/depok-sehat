<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $judul; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Rekam Medis</li>
                <li class="breadcrumb-item active">Master</li>
            </ol>
        </nav>
    </div>

    <div id="error-message" class="alert alert-danger" style="display: none;"></div>
    <?= $this->session->flashdata('pesan'); ?>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Master Rekam Medis</h5>
                        <div class="d-flex flex-start mb-3 gap-4 justify-content-between">
                            <div>
                                <a href="<?= base_url('RekamMedis/downloadCSV') ?>" class="btn btn-primary">Unduh Template</a>
                                <?php if ($user['role_id'] == 1) { ?>
                                    <a href="<?= base_url('RekamMedis/tambahRekamMedis') ?>" class="btn btn-success">Tambah
                                        Rekam Medis</a>
                                <?php } ?>
                            </div>
                            <form action="<?= base_url('RekamMedis/importCSV') ?>" method="post" enctype="multipart/form-data">
                                <input type="file" name="csv_file">
                                <button type="submit" class="btn btn-success">Import Data</button>
                            </form>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table datatable table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID Rekam Medis</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Nama Penyakit</th>
                                    <th scope="col">Nama Instansi</th>
                                    <th scope="col">Tanggal Pemeriksaan</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data rekam medis -->
                                <?php foreach ($rekam_medis as $key => $r) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $r['id_rekam_medis'] ?></td>
                                        <td><?= $r['nama_pasien'] ?></td>
                                        <td><?= $r['nama_penyakit'] ?></td>
                                        <td><?= $r['nama_instansi'] ?></td>
                                        <td><?= $r['tanggal_pemeriksaan'] ?></td>
                                        <td><?= $r['keterangan'] ?></td>
                                    </tr>
                                <?php } ?>
                                <!-- End data rekam medis -->
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

    <script>
        // Ambil pesan kesalahan dari session jika ada
        let errorMessage = "<?php echo $this->session->flashdata('error'); ?>";

        // Tampilkan pesan kesalahan dalam alert jika ada
        if (errorMessage !== "") {
            alert(errorMessage);
        }
    </script>

</main><!-- End #main -->