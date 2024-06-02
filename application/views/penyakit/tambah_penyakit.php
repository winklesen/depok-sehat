<main id="main" class="main">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <div class="pagetitle">
        <h1><?= $judul; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Usershtml">Home</a></li>
                <li class="breadcrumb-item">Penyakit</li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div>
    <?= $this->session->flashdata('pesan'); ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body m-3">
                        <h5 class="card-title p-0">Tambah Data Pasien</h5>
                        <!-- Form untuk mengedit data pasien -->
                        <form id="editForm" action="<?= base_url('penyakit/tambahPenyakit') ?>" method="post">

                            <div class="form-group mb-2">
                                <label for="id_penyakit" class="mr-2">ID Penyakit:</label>
                                <input type="text" class="form-control" id="id_penyakit" name="id_penyakit" value="<?= $last_id ?>" readonly>
                            </div>

                            <div class="form-group mb-2">
                                <label for="nama_penyakit" class="mr-2">Nama Penyakit:</label>
                                <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit">
                            </div>

                            <div class="form-group mb-2">
                                <label for="info_gejala" class="mr-2">Info Gejala:</label>
                                <textarea class="form-control" id="info_gejala" name="info_gejala"></textarea>
                            </div>

                            <script>
                                CKEDITOR.replace('info_gejala');
                            </script>

                            <div class="form-group mb-2">
                                <label for="info_pencegahan" class="mr-2">Info Pencegahan:</label>
                                <textarea class="form-control" id="info_pencegahan" name="info_pencegahan"></textarea>
                            </div>

                            <script>
                                CKEDITOR.replace('info_pencegahan');
                            </script>

                            <div class="form-group mb-2">
                                <label for="info_pengobatan" class="mr-2">Info Pengobatan:</label>
                                <textarea class="form-control" id="info_pengobatan" name="info_pengobatan"></textarea>
                            </div>

                            <script>
                                CKEDITOR.replace('info_pengobatan');
                            </script>

                            <div class="form-group mb-2">
                                <label for="gambar_penyakit" class="mr-2">Gambar Penyakit:</label>
                                <input type="file" class="form-control" id="gambar_penyakit" name="gambar_penyakit">
                            </div>

                            <!-- Tambahkan field lainnya sesuai dengan kebutuhan -->

                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->