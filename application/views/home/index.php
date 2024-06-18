<!-- Carousel -->
<div id="myCarousel" class="carousel slide carousel-fade mt-5" data-ride="carousel">
    <div class="carousel-inner mt-5 ">
        <div class="carousel-item mt-5 active">
            <div class="mask flex-center">
                <div class="container px-5 ">
                    <div class="row align-items-center">
                        <div class="col-md-7 col-12 order-md-1 order-2">
                            <h4>Lihat Penyakit <br>
                                Trending</h4>
                            <p>Pantau Data Real Time total penyakit trending di Kota Depok.</p>
                            <a href="#trendingpenyakit">Lihat</a>
                        </div>
                        <div class="col-md-5 col-12 order-md-2 order-1"><img src="<?= base_url('assets/'); ?>img/undraw_medical_care_movn.svg" class="mx-auto" alt="slide"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item mt-5">
            <div class="mask flex-center">
                <div class="container px-5 ">
                    <div class="row align-items-center">
                        <div class="col-md-7 col-12 order-md-1 order-2">
                            <h4>Pahami Informasi Kesehatan</h4>
                            <p>Pahami informasi mengenai penyakit yang sedang trending di Kota Depok.</p>
                            <a href="#">Lihat</a>
                        </div>
                        <div class="col-md-5 col-12 order-md-2 order-1"><img src="<?= base_url('assets/'); ?>img/undraw_medical_care_movn.svg" class="mx-auto" alt="slide"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item mt-5">
            <div class="mask flex-center">
                <div class="container px-5 ">
                    <div class="row align-items-center">
                        <div class="col-md-7 col-12 order-md-1 order-2">
                            <h4>Akses Informasi <br>
                                Instansi Kesehatan</h4>
                            <p>Tersedia informasi Insantsi Kesehatan di Kota Depok</p>
                            <a href="#instansikesehatan">Lihat</a>
                        </div>
                        <div class="col-md-5 col-12 order-md-2 order-1"><img src="<?= base_url('assets/'); ?>img/undraw_medical_care_movn.svg" class="mx-auto" alt="slide"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
</div>
<!--slide end-->

<section id="trendingpenyakit">
    <!-- Trending Information Section -->
    <div class="main-container container justify-content-center">
        <h2 class="section-title mt-5">Trending Penyebaran Penyakit</h2>
        <p class="section-subtitle">Kami menyediakan data real time, dan transparan mengenai penyakit di kota depok</p>
        <div class="row align-items-center d-flex">
            <div class="row justify-content-between  align-items-end ">
                <div class="col-2">
                </div>
                <div class="col-8">
                    <h3 class="mt-5 text-center font-weight-bold">
                        <?= isset($kecamatan_name) ? $kecamatan_name : 'Depok' ?>
                    </h3>
                </div>

                <!-- Tambahkan dropdown di view -->
                <div class="col-2">
                    <button type="button" class="btn btn-success" id="filterButton">
                        Filter Kecamatan
                    </button>
                    <div id="dropdownKecamatan" class="dropdown-content">
                        <?php foreach ($kecamatan_list as $kecamatan) { ?>
                            <a href="
                            <?= base_url('home/filterKecamatan/') . $kecamatan->id_kecamatan ?>">
                                <?= $kecamatan->nama_kecamatan ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php foreach ($most_common_diseases as $disease) { ?>
                <div class="col-md-4 mt-4">
                    <a href=" <?= base_url('home/detailpenyakit/') . $disease->id_penyakit ?>" class="link-dark">
                        <div class="card">
                            <div class="card-body text-center">
                                <h3 class=" card-title">
                                    <?= $disease->nama_penyakit ?>
                                </h3>
                                <div class="row justify-content-center">
                                    <div class="col-1">
                                        <div class="card-icon">
                                            <i class="fas fa-hospital"></i>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <h3 class="card-text-number">
                                            <?= $disease->total ?>
                                        </h3>
                                        <h5 class="card-text">Pasien</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Waspada Section -->
<div class="half-screen-container container">
    <div class="row p-2">
        <div class="col-12 col-md-6 text-center text-md-start">
            <h1 class="fw-bold">
                <d class="text-success">Waspada</d> Akan Bahaya Wabah Penyakit
            </h1>
            <p class="text-secondary">Pentingnya Kesadaran Terhadap Penyebaran Penyakit di Sekitar Anda</p>
        </div>
        <div class="col-12 col-md-6">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="card-icon">
                                <i class="fa-solid fa-hospital-user"></i>
                            </div>
                        </div>
                        <div class="col-md-11">
                            <h3 class="fw-bold">
                                <?= $total_pasien; ?></h3>
                            <p class="small">Pasien Terdata</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="card-icon">
                                <i class="fas fa-hospital"></i>
                            </div>
                        </div>
                        <div class="col-md-11">
                            <h3 class="fw-bold">
                                <?= $total_instansi; ?>
                            </h3>
                            <p class="small">Instansi Kesehatan</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="card-icon">
                                <i class="fa-solid fa-city"></i>
                            </div>
                        </div>
                        <div class="col-md-11">
                            <h3 class="fw-bold">
                                <?= $total_kecamatan; ?>
                            </h3>
                            <p class="small">Kecamatan</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<section id="instansikesehatan">
    <!-- Instansi Kesehatan Section -->
    <div class="main-container container   justify-content-center">
        <h2 class="section-title mt-5">Instansi Kesehatan</h2>
        <p class="section-subtitle">Data instansi kesehatan di kota depok</p>
        <div class="row align-items-center d-flex">
            <div class="col-md-4 mt-5">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title">Total Puskesmas</h3>
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <div class="card-icon">
                                    <i class="fas fa-hospital"></i>
                                </div>
                            </div>
                            <div class="col-5">
                                <h3 class="card-text-number">
                                    <?= $jumlah_puskesmas; ?>
                                </h3>
                                <h5 class="card-text">Instansi Tersedia </h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-5">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title">Total Rumah Sakit</h3>
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <div class="card-icon">
                                    <i class="fas fa-hospital"></i>
                                </div>
                            </div>
                            <div class="col-5">
                                <h3 class="card-text-number">
                                    <?= $jumlah_rumah_sakit; ?>
                                </h3>
                                <h5 class="card-text">Instansi Tersedia</h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-5">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title">Total Klinik</h3>
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <div class="card-icon">
                                    <i class="fas fa-hospital"></i>
                                </div>
                            </div>
                            <div class="col-5">
                                <h3 class="card-text-number">
                                    <?= $jumlah_klinik; ?>
                                </h3>
                                <h5 class="card-text">Instansi Tersedia</h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href=" <?= base_url('home/listinstansi'); ?>" class="link-success">Selengkapnya</a>
        </div>
    </div>
</section>

<style>
    /* Style untuk dropdown */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .show {
        display: block;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('filterButton').addEventListener('click', function() {
            document.getElementById('dropdownKecamatan').classList.toggle('show');
        });
    });
</script>