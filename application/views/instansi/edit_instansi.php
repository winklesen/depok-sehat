<main id="main" class="main">
    <div class="pagetitle">
        <h1><?= $judul; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Usershtml">Home</a></li>
                <li class="breadcrumb-item">Instansi Kesehatan</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>
    <?= $this->session->flashdata('pesan'); ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body m-3">
                        <h5 class="card-title p-0"></h5>
                        <!-- Form untuk mengedit data kecamatan -->
                        <form id="editForm" action="<?= base_url('instansikesehatan/updateinstansi') ?>" method="post">

                            <div class="form-group mb-2">
                                <label for="id_instansi" class="mr-2">ID Instansi:</label>
                                <input type="text" class="form-control" id="id_instansi" name="id_instansi" value="<?= $instansi['id_instansi'] ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label for="nama_instansi" class="mr-2">Nama Instansi:</label>
                                <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" value="<?= $instansi['nama_instansi'] ?>">
                            </div>
                            
                            <div class="form-group mb-2">
                                <label for="tipe" class="mr-2">Tipe:</label>
                                <select class="form-control" id="tipe" name="tipe_instansi">
                                    <?php
                                        foreach ($enum_values as $value) {
                                            echo "<option value='$value'>$value</option>";
                                        }
                                    ?>
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