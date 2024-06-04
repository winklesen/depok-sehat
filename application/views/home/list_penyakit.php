<!-- Trending Information Section -->
<div class="main-container container ">
    <div class="row">
        <div class="col-6">
                
            <h2 class="mt-5">Daftar Penyakit</h2>
            <p>Kami menyediakan data real time, dan transparan mengenai penyakit di kota depok</p>
            <hr>

            <form id="searchForm" class="form-inline d-flex mt-5" action="<?= base_url('home/searchPenyakit') ?>" method="GET">
                <div class="input-group">
                    <input type="search" id="nama_penyakit" name="nama_penyakit" class="form-control" placeholder="Cari Nama Penyakit" required>
                    <input type="hidden" id="id_penyakit" name="id_penyakit"> <!-- Menyimpan ID penyakit yang dipilih -->
                    <div id="nama_penyakit_error" class="text-danger"></div> <!-- Menampilkan pesan error -->
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button> <!-- Tombol pencarian -->
                    </div>  
                </div>
            </form>
            <div class="mt-3">
                <ul class="list-group list-group-flush">
                    <?php foreach ($list_penyakit as $penyakit) { ?>
                        <li class="list-group-item">
                            <a href="<?= base_url('home/detailpenyakit/') . $penyakit['id_penyakit'] ?>" class="link-dark"><?= $penyakit['nama_penyakit']; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="mt-5 mb-5">
                <a href="javascript:history.back()" class="link-secondary"><b>Kembali ke Halaman Sebelumnya</b> <i class="fa-solid fa-arrow-right"></i></a>
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
