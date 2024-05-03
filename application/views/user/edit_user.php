<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body m-3">
                        <h5 class="card-title p-0">Edit Data User</h5>
                        <!-- Form untuk mengedit data pasien -->
                        <form id="editForm" action="<?= base_url('user/updateUser') ?>" method="post">
                            <div class="form-group mb-2">
                                <label for="nama" class="mr-2">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="<?= $user['nama'] ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label for="email" class="mr-2">Email:</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="<?= $user['email'] ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label for="password" class="mr-2">Password:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    value="<?= $user['password'] ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label for="id_instansi" class="mr-2">ID Instansi:</label>
                                <input type="text" class="form-control" id="id_instansi" name="id_instansi"
                                    value="<?= $user['id_instansi'] ?>">
                            </div>


                            <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                            <!-- Tambahkan field lainnya sesuai dengan kebutuhan -->

                            <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->