<section class="section">
    <div class="container justify-content-center p-5">
        <h2 class="mt-5 fw-bold">Daftar Instansi Kesehatan di Kota Depok</h2>
        <p class="small">Data ini merupakan Daftar Instansi Kesehatan yang Telah Terdaftar di Website Depok Sehat.</p>
        <div class="card mt-5">
            <div class="card-body">
                <table class="table datatable table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Instansi</th>
                            <th scope="col">Tipe</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kontak</th>
                            <th scope="col">Kecamatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($instansi as $key => $p) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $p['nama_instansi'] ?></td>
                            <td><?= $p['tipe'] ?></td>
                            <td><?= $p['alamat'] ?></td>
                            <td><?= $p['kontak'] ?></td>
                            <td><?= $p['nama_kecamatan'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- End Table with hoverable rows -->
            </div>
        </div>
    </div>
</section>