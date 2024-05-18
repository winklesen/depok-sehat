<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $judul; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Instansi Kesehatan</li>
                <li class="breadcrumb-item active">Master</li>
            </ol>
        </nav>
    </div>

    <?= $this->session->flashdata('pesan'); ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-start mt-2 mb-4">
                    <a href="<?= base_url('InstansiKesehatan/tambahinstansi') ?>" class="btn btn-success">Tambah Data</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Master <?= $judul; ?></h5>

                        <table class="table datatable table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID Instansi</th>
                                    <th scope="col">Nama Instansi</th>
                                    <th scope="col">Tipe</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kontak</th>
                                    <th scope="col">Id Kecamatan</th>
                                    <th scope="col">Tgl Ditambahkan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($instansi as $key => $p) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $p['id_instansi'] ?></td>
                                        <td><?= $p['nama_instansi'] ?></td>
                                        <td><?= $p['tipe'] ?></td>
                                        <td><?= $p['alamat'] ?></td>
                                        <td><?= $p['kontak'] ?></td>
                                        <td><?= $p['id_kecamatan'] ?></td>
                                        <td><?= $p['created_at'] ?></td>
                                        <td class="">
                                            <a href="<?= base_url('InstansiKesehatan/editInstansi/' . $p['id_instansi']) ?>" class="btn btn-primary">Edit</a>
                                            <a href="<?= base_url('instansiKesehatan/deleteInstansi/') . $p['id_instansi']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $p['nama_instansi']; ?> ?');" class="btn btn-danger"> Hapus</a>
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