<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $judul; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Penyakit</li>
                <li class="breadcrumb-item active">Master</li>
            </ol>
        </nav>
    </div>

    <?= $this->session->flashdata('pesan'); ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-start mt-2 mb-3">
                    <a href="<?= base_url('penyakit/addPenyakit') ?>" class="btn btn-success">Tambah Data</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Master <?= $judul; ?></h5>

                        <table class="table datatable table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Penyakit</th>
                                    <th scope="col">Info Gejala</th>
                                    <th scope="col">Info Pencegahan</th>
                                    <th scope="col">Info Pengobatan</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($penyakit as $key => $p) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><b><?= $p['nama_penyakit'] ?></b></td>
                                        <td><?= $p['info_gejala'] ?></td>
                                        <td><?= $p['info_pencegahan'] ?></td>
                                        <td><?= $p['info_pengobatan'] ?></td>
                                        <td><img src="<?= base_url('assets/img/penyakit/') . $p['gambar_penyakit'] ?>" alt="Gambar <?= $p['gambar_penyakit'] ?>" style="max-width: 100px; max-height: 100px;"></td>
                                        <td>
                                            <a href="<?= base_url('penyakit/editpenyakit/' . $p['id_penyakit']) ?>" class="btn btn-primary">Edit</a>
                                            <a href="<?= base_url('penyakit/hapusPenyakit/') . $p['id_penyakit']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $p['nama_penyakit']; ?> ?');" class="btn btn-danger"> Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tr>
                                <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->