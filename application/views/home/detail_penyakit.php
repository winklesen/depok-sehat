<div class="container mt-5">
    <div class="row">
    <?php foreach ($penyakit as $penyakit): ?>
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mt-5 mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">Penyakit <?= $penyakit['nama_penyakit'];?></h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Diposting pada <?= $penyakit['created_at']; ?></div>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="<?= base_url('assets/img/penyakit/') . $penyakit['gambar_penyakit'];?>" alt="Gambar  <?= $penyakit['nama_penyakit'];?>" /></figure>
                <!-- Post content-->
                <section class="mb-5" style="text-align: justify;">
                    <?= $penyakit['info_gejala']; ?>
                </section>
                <section class="mb-5" style="text-align: justify;">
                    <?= $penyakit['info_pencegahan']; ?>
                </section>
                <section class="mb-5" style="text-align: justify;">
                    <?= $penyakit['info_pengobatan']; ?>
                </section>
            </article>
            <div class="mt-3 mb-5">
                <a href="javascript:history.back()" class="link-secondary"><b>Kembali ke Halaman Sebelumnya</b> <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    <?php endforeach ;?>
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mt-5 mb-4">
                <div class="card-header">Cari Penyakit Lainnya:</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">cari</button>
                    </div>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Informasi Penting</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mt-2 mb-0">
                                <li><a class="link-dark" href="<?= base_url('home');?>">Home</a></li>
                                <li><a class="link-dark" href="<?= base_url('home');?>#trendingpenyakit">Trending Penyakit</a></li>
                                <li><a class="link-dark" href="<?= base_url('home');?>#instansikesehatan">Instansi Kesehatan</a></li>
                            </ul>
                        </div>
                        <!-- <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!"></a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
    </div>
</div>