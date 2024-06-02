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


<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <h2></h2>
            <p></p>
            <a href="#" class="btn btn-primary">Lihat</a>
        </div>

        <div class="carousel-item">
            <h2> </h2>
            <p></p>
            <a href="#" class="btn btn-primary">Lihat</a>
        </div>
        <div class="carousel-item">
            <h2></h2>
            <p></p>
            <a href="#" class="btn btn-primary">Lihat</a>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div> -->

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
                <h3 class=" mt-5 text-center font-weight-bold">Depok</h3>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong">
                    Filter Kecamatan
                </button>
            </div>


        </div>
        <?php foreach ($most_common_diseases as $disease) { ?>
        <div class="col-md-4 mt-4">
            <a href="<?= base_url('home/detailpenyakit/') . $disease->id_penyakit ?>" class="link-dark">  
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title"><?= $disease->nama_penyakit ?></h3>
                        <div class="row justify-content-center">
                            <div class="col-1">
                                <div class="card-icon">
                                    <i class="fas fa-hospital"></i>
                                </div>
                            </div>
                            <div class="col-5">
                                <h3 class="card-text-number"><?= $disease->total ?></h3>
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
                            <h3 class="fw-bold"><?= $total_pasien; ?></h3>
                            <p class="small">Pasien Terdata <span>| <?= $selected_pasien_filter; ?></span></p>
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
                            <h3 class="fw-bold"><?= $total_instansi; ?></h3>
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
                            <h3 class="fw-bold"><?= $total_kecamatan; ?></h3>
                            <p class="small">Kecamatan</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="filter">
            <a class="icon" href="#" data-toggle="dropdown">
                <i class="bi bi-three-dots"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <h6 class="dropdown-header text-start">Filter</h6>
                <a class="dropdown-item" href="<?= base_url('admin?pasienFilter=Today'); ?>">Today</a>
                <a class="dropdown-item" href="<?= base_url('admin?pasienFilter=This Month'); ?>">This Month</a>
                <a class="dropdown-item" href="<?= base_url('admin?pasienFilter=This Year'); ?>">This Year</a>
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
                                <h3 class="card-text-number"><?= $jumlah_puskesmas ;?></h3>
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
                                <h3 class="card-text-number"><?= $jumlah_rumah_sakit ;?></h3>
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
                                <h3 class="card-text-number"><?= $jumlah_klinik ;?></h3>
                                <h5 class="card-text">Instansi Tersedia</h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="<?= base_url('home/listinstansi') ;?>" class="link-success">Selengkapnya</a>
        </div>
    </div>
</section>

<!-- Himbauawan Secton -->
<!-- <div class="half-screen-container">    
    <div class="row p-2">
        <div class="col-12 col-md-6 text-center text-md-start">
            <h1 class="fw-bold">
                <d class="text-success">Waspada</d> Akan Bahaya Wabah Penyakit
            </h1>
            <p class="text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt, mollitia?</p>
        </div>
        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h3 class="fw-bold">2000000000</h3>
                    <p class="small">Pasien Terdata</p>
                </div>
                <div class="col-12 col-md-6">
                    <h3 class="fw-bold">200000</h3>
                    <p class="small">Instansi Kesehatan</p>
                </div>
                <div class="col-12 col-md-12">
                    <h3 class="fw-bold">825000</h3>
                    <p class="small">Kecamatan</p>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia, quae doloribus voluptatum, ipsa nobis quas tenetur vero quod saepe sed hic rem magnam voluptate natus similique ipsum. Nisi, molestias cupiditate?
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis rerum id blanditiis perspiciatis placeat dolorem fugiat pariatur repellat laboriosam, deleniti debitis minus aliquid exercitationem optio autem ab numquam. Ad, veritatis?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ducimus tenetur quod repudiandae at ut obcaecati atque ipsam necessitatibus ex, minus voluptate maxime cupiditate vitae facilis. Repellat aspernatur nam saepe.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>