<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $judul; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Kecamatan</li>
                <li class="breadcrumb-item active">Master</li>
            </ol>
        </nav>
    </div>

    <?= $this->session->flashdata('pesan'); ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-start mt-2 mb-4">
                    <a href="<?= base_url('kecamatan/tambahkecamatan') ?>" class="btn btn-success">Tambah Data</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Master <?= $judul; ?></h5>

                        <table class="table datatable table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID Kecamatan</th>
                                    <th scope="col">Nama Kecamatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kecamatan as $key => $k) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $k['id_kecamatan'] ?></td>
                                        <td><?= $k['nama_kecamatan'] ?></td>
                                        <td>
                                            <a href="<?= base_url('kecamatan/editkecamatan/' . $k['id_kecamatan']) ?>" class="btn btn-primary">Edit</a>
                                            <a href="<?= base_url('kecamatan/hapuskecamatan/') . $k['id_kecamatan']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $k['nama_kecamatan']; ?> ?');" class="btn btn-danger"> Hapus</a>
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