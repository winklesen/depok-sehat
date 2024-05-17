

<main id="main" class="main">

<div class="pagetitle">
        <h1><?= $judul; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin') ;?>">Home</a></li>
                <li class="breadcrumb-item">Pasien</li>
                <li class="breadcrumb-item active">Master</li>
            </ol>
        </nav>
    </div>

    <?= $this->session->flashdata('pesan'); ?>
    
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-start mt-2 mb-4">
                    <a href="<?= base_url('pasien/tambahpasien') ?>" class="btn btn-success">Tambah Data
                        Pasien</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Master <?= $judul;?></h5>
                        
                        <table class="table datatable table-hover">
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
                            <tbody>
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