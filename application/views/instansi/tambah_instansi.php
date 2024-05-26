<main id="main" class="main">
    <div class="pagetitle">
        <h1><?= $judul; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Usershtml">Home</a></li>
                <li class="breadcrumb-item">Instansi Kesehatan</li>
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
                        <h5 class="card-title p-0"></h5>

                        <form id="editForm" action="<?= base_url('InstansiKesehatan/createInstansi') ?>" method="post"
                            enctype="multipart/form-data">

                            <div class="form-group mb-2">
                                <label for="id_instansi" class="mr-2">ID Instansi</label>
                                <input type="text" class="form-control" id="id_instansi" name="id_instansi"
                                    value="<?= $last_id ?>" disabled>
                                <input type="hidden" class="form-control" id="id_instansi" name="id_instansi"
                                    value="<?= $last_id ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label for="nama_instansi" class="mr-2">Nama Instansi</label>
                                <input type="text" class="form-control" id="nama_instansi" name="nama_instansi">
                            </div>

                            <!-- <div class="form-group mb-2">
                                <label for="tipe" class="mr-2">Tipe</label>
                                <input type="text" class="form-control" id="tipe" name="tipe">
                            </div> -->

                            <div class="form-group mb-2">
                                <label for="tipe" class="mr-2">Tipe:</label>
                                <select class="form-control" id="tipe" name="tipe">
                                    <option value="<?= $instansi['tipe']?>">~ Pilih ~</option>
                                    <?php
                                        foreach ($enum_values as $value) {
                                            echo "<option value='$value'>$value</option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label for="alamat" class="mr-2">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            </div>

                            <div class="form-group mb-2">
                                <label for="kontak" class="mr-2">Kontak</label>
                                <input type="text" class="form-control" id="kontak" name="kontak">
                            </div>

                            <div class="form-group mb-2">
                                <label for="id_kecamatan" class="mr-2">Kecamatan:</label>
                                <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                                    <?php foreach ($kecamatan as $kecamatan) { ?>
                                        <option value="<?= $kecamatan['id_kecamatan'] ?>" <?php if ($kecamatan['id_kecamatan'] == $instansi['id_kecamatan']) echo "selected"; ?>>
                                            <?= $kecamatan['nama_kecamatan'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div> 

                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->