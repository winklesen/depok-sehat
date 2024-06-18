<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $judul; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Usershtml">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <!-- <li class="breadcrumb-item active"></li> -->
            </ol>
        </nav>
    </div>

    <?= $this->session->flashdata('pesan'); ?>
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card patients-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="<?= base_url('admin?pasienFilter=Today'); ?>">Today</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?= base_url('admin?pasienFilter=This Month'); ?>">This
                                            Month</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('admin?pasienFilter=This Year'); ?>">This
                                            Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Pasien <span>| <?= $selected_pasien_filter; ?></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $total_pasien; ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Instansi Kesehatan</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $total_instansi; ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card medical-records-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="<?= base_url('admin?rekamMedisFilter=Today'); ?>">Today</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?= base_url('admin?rekamMedisFilter=This Month'); ?>">This
                                            Month</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('admin?rekamMedisFilter=This Year'); ?>">This
                                            Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Rekam Medis <span>| <?= $selected_rekam_medis_filter; ?></span>
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-file-medical"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $total_rekam_medis; ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-rekam-medis overflow-auto">

                            <!-- Filter -->
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="<?= base_url('admin?listRekamMedisFilter=Today'); ?>">Today</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('admin?listRekamMedisFilter=This Month'); ?>">This
                                            Month</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('admin?listRekamMedisFilter=This Year'); ?>">This
                                            Year</a></li>
                                </ul>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body">
                                <h5 class="card-title">Rekam Medis Terkini<span>|
                                        <?= $selected_list_rekam_medis_filter; ?></span></h5>

                                <!-- Tabel untuk Menampilkan Rekam Medis -->
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Patient</th>
                                            <th scope="col">Disease</th>
                                            <th scope="col">Examination Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data rekam medis akan ditampilkan di sini -->
                                        <?php foreach ($rekam_medis as $data) : ?>
                                            <tr>
                                                <th scope="row"><?= $data['id_rekam_medis']; ?></th>
                                                <td><?= $data['nama_pasien']; ?></td>
                                                <td><?= $data['nama_penyakit']; ?></td>
                                                <td><?= $data['tanggal_pemeriksaan']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">
                <!-- Website Traffic -->
                <div class="card">
                    <div class="card-body pb-0">
                        <h5 class="card-title">Top Diseases <span>| Last Month</span></h5>
                        <div id="diseaseChart" style="min-height: 400px;" class="echart"></div>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                var topDiseases = <?= json_encode($top_diseases); ?>;
                                var data = topDiseases.map(disease => ({
                                    value: disease.total,
                                    name: disease.nama_penyakit
                                }));

                                echarts.init(document.querySelector("#diseaseChart")).setOption({
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        top: '5%',
                                        left: 'center'
                                    },
                                    series: [{
                                        name: 'Diseases',
                                        type: 'pie',
                                        radius: ['40%', '70%'],
                                        avoidLabelOverlap: false,
                                        label: {
                                            show: false,
                                            position: 'center'
                                        },
                                        emphasis: {
                                            label: {
                                                show: true,
                                                fontSize: '18',
                                                fontWeight: 'bold'
                                            }
                                        },
                                        labelLine: {
                                            show: false
                                        },
                                        data: data
                                    }]
                                });
                            });
                        </script>
                    </div>
                </div>

            </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->