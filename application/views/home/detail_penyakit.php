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
                <figure class="mb-4">
                    <img class="img-fluid rounded" src="<?= base_url('assets/img/penyakit/') . $penyakit['gambar_penyakit'];?>" alt="Gambar <?= $penyakit['nama_penyakit'];?>" style="max-width: 800px; max-height: 600px;" />
                </figure>

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
                <div class="card-header mb-3">Cari Penyakit Lainnya:</div>
                <div class="card-body">
                    <form id="searchForm" class="form-inline d-flex" action="<?= base_url('home/searchPenyakit') ?>" method="GET">
                        <div class="input-group">
                            <input type="search" id="nama_penyakit" name="nama_penyakit" class="form-control" placeholder="Cari Nama Penyakit" required>
                            <input type="hidden" id="id_penyakit" name="id_penyakit"> <!-- Menyimpan ID penyakit yang dipilih -->
                            <div id="nama_penyakit_error" class="text-danger"></div> <!-- Menampilkan pesan error -->
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Cari</button> <!-- Tombol pencarian -->
                            </div>  
                        </div>
                    </form>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
  $(function() {
    // Autocompletion untuk input penyakit
    $("#nama_penyakit").autocomplete({
        source: function(request, response) {
            console.log('Requesting penyakit data with term:', request.term); // Debugging line
            $.ajax({
                url: "<?= base_url('Home/get_nama_penyakit') ?>",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    console.log('Received penyakit data:', data); // Debugging line
                    response($.map(data, function(item) {
                        return {
                            label: item.nama_penyakit, // Menampilkan nama penyakit sebagai label dropdown
                            value: item.nama_penyakit, // Menetapkan nilai input ke nama penyakit yang dipilih
                            id_penyakit: item.id_penyakit // Menyimpan ID penyakit yang dipilih
                        };
                    }));
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error fetching penyakit data: ", textStatus, errorThrown); // Debugging line
                }
            });
        },
        minLength: 2,
        autoFocus: true, // Membuat dropdown muncul secara otomatis saat input mendapatkan fokus
        select: function(event, ui) {
            $("#id_penyakit").val(ui.item.id_penyakit); // Set nilai ID penyakit
        }
    });
});

</script>