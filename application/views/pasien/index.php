<main id="main" class="main">

<div class="pagetitle">
        <h1><?= $judul; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Usershtml">Home</a></li>
                <li class="breadcrumb-item">Pasien</li>
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
                            <a href="<?= base_url('pasien/tambahPasien') ?>" class="btn btn-success mb-2">Tambah Pasien</a>
                            <form class="d-flex" method="post" action="<?= base_url('pasien/searchpasien'); ?>">
                                <input class="form-control mb-2" type="text" placeholder="Cari Pasien" name="keyword">
                                <button type="submit" class="btn btn-success mb-2"><i class="fa-solid fa-magnifying-glass"></i></button>
                              
                            </form>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nik</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Info Kontak</th>
                                    <th scope="col">Kecamatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <!-- <tbody>
                                <?php foreach ($pasien as $key => $p) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $p['id_pasien'] ?></td>
                                        <td><?= $p['nama'] ?></td>
                                        <td><?= $p['alamat'] ?></td>
                                        <td><?= $p['tanggal_lahir'] ?></td>
                                        <td><?= $p['info_kontak'] ?></td>
                                        <td><?= $p['nama_kecamatan'] ?></td>
                                        <td>
                                            <a href="<?= base_url('pasien/editpasien/' . $p['id_pasien']) ?>"
                                                class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody> -->
                            <tbody>
                                <p></p>
                                <?php if (isset($search_pasien)) {
                                    foreach ($search_pasien as $key => $s) { ?>
                                        <tr>
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td><?= $s['id_pasien'] ?></td>
                                            <td><?= $s['nama'] ?></td>
                                            <td><?= $s['alamat'] ?></td>
                                            <td><?= $s['tanggal_lahir'] ?></td>
                                            <td><?= $s['info_kontak'] ?></td>
                                            <td><?= $s['nama_kecamatan'] ?></td>
                                            <td>
                                                <a href="<?= base_url('pasien/editpasien/' . $s['id_pasien']) ?>"
                                                    class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    <?php } 
                                    } else {
                                    // Tampilkan semua data acara jika tidak ada hasil pencarian
                                    foreach ($pasien as $key => $p) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $p['id_pasien'] ?></td>
                                        <td><?= $p['nama'] ?></td>
                                        <td><?= $p['alamat'] ?></td>
                                        <td><?= $p['tanggal_lahir'] ?></td>
                                        <td><?= $p['info_kontak'] ?></td>
                                        <td><?= $p['nama_kecamatan'] ?></td>
                                        <td>
                                            <a href="<?= base_url('pasien/editpasien/' . $p['id_pasien']) ?>"
                                                class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>

   

</main><!-- End #main -->