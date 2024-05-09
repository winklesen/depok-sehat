<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $judul; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Usershtml">Home</a></li>
                <li class="breadcrumb-item">Rekam Medis</li>
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
                            <a href="<?= base_url('') ?>" class="btn btn-success mb-2">Tambah Kecamatan</a>
                            <form class="d-flex" method="post" action="<?= base_url(''); ?>">
                                <input class="form-control mb-2" type="text" placeholder="Cari Rekam Medis" name="keyword">
                                <button type="submit" class="btn btn-success mb-2"><i class="fa-solid fa-magnifying-glass"></i></button>

                            </form>
                        </div>


                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">id_rekam_medis</th>
                                    <th scope="col">id_pasien</th>
                                    <th scope="col">id_penyakit</th>
                                    <th scope="col">id_instansi</th>
                                    <th scope="col">tanggal_pemeriksaan</th>
                                    <th scope="col">keterangan</th>
                                    <th scope="col">created_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rekam_medis as $key => $p) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $p['id_rekam_medis'] ?></td>
                                        <td><?= $p['id_pasien'] ?></td>
                                        <td><?= $p['id_penyakit'] ?></td>
                                        <td><?= $p['id_instansi'] ?></td>
                                        <td><?= $p['tanggal_pemeriksaan'] ?></td>
                                        <td><?= $p['keterangan'] ?></td>
                                        <td><?= $p['created_at'] ?></td>
                                        <td>
                                            <a href="" class="btn btn-primary">Edit</a>
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

</main><!-- End #main -->