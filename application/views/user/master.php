<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $judul; ?></h1>
        <nav>
            <ol class="breadcrumb">
<<<<<<< HEAD
                <li class="breadcrumb-item"><a href="<?= base_url('admin') ;?>">Home</a></li>
=======
                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
>>>>>>> cb8a9d87c6ed37bde02d40d34974044764e02e6c
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item active">Master</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
<<<<<<< HEAD

=======
    <?= $this->session->flashdata('pesan'); ?>
>>>>>>> cb8a9d87c6ed37bde02d40d34974044764e02e6c

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-start mt-2 mb-3">
                    <a href="<?= base_url('user/tambahUser') ?>" class="btn btn-success">Tambah Data</a>
                </div>
                <div class="card">
                    <div class="card-body">
<<<<<<< HEAD
                        <h5 class="card-title">Master <?= $judul;?></h5>
=======
                        <h5 class="card-title">Master <?= $judul; ?></h5>
>>>>>>> cb8a9d87c6ed37bde02d40d34974044764e02e6c
                        <!-- <a href="<?= base_url('user/tambahUser') ?>" class="btn btn-success mt-2 mb-3">Tambah User</a> -->

                        <!-- Table with hoverable rows -->
                        <table class="table datatable table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID User</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">ID Instansi</th>
                                    <th scope="col">Tanggal Daftar</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (is_array($User) && count($User) > 0) {
                                    foreach ($User as $key => $p) {
                                        if (is_array($p)) { ?>
                                            <tr>
                                                <th scope="row"><?= $key + 1 ?></th>
                                                <td><?= isset($p['id_user']) ? $p['id_user'] : '' ?></td>
                                                <td><?= isset($p['nama']) ? $p['nama'] : '' ?></td>
                                                <td><?= isset($p['email']) ? $p['email'] : '' ?></td>
                                                <td><?= isset($p['id_instansi']) ? $p['id_instansi'] : '' ?></td>

                                                <td><?= isset($p['created_at']) ? $p['created_at'] : '' ?></td>
                                                <td>
                                                    <a href="<?= base_url('user/editUser/' . $p['id_user']) ?>" class="btn btn-primary">Edit</a>

                                                    <a href="<?= base_url('user/deleteUser/' . $p['id_user']) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</a>
                                                </td>

                                            </tr>
                                <?php }
                                    }
                                } else {
                                    echo "Variabel User tidak berisi array seperti yang diharapkan.";
                                } ?>
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->