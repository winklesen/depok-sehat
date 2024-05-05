<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $judul; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Usershtml">Home</a></li>
                <li class="breadcrumb-item">Pengguna</li>
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
                            <a href="<?= base_url('user/tambahUser') ?>" class="btn btn-success mb-2">Tambah Pengguna</a>
                            <form class="d-flex" method="post" action="<?= base_url(''); ?>">
                                <input class="form-control mb-2" type="text" placeholder="Cari Pengguna" name="keyword">
                                <button type="submit" class="btn btn-success mb-2"><i class="fa-solid fa-magnifying-glass"></i></button>

                            </form>
                        </div>



                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
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