<main id="main" class="main">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body m-3">
            <h5 class="card-title p-0">Tambah Rekam Medis</h5>
            <!-- Form untuk menambahkan data rekam medis -->
            <form id="editForm" action="<?= base_url('rekam-medis/createRekamMedis') ?>" method="post">

              <div class="form-group mb-2">
                <label for="nama_pasien" class="mr-2">Nama Pasien:</label>
                <input type="text" id="nama_pasien" name="nama_pasien" class="form-control"
                  placeholder="Cari Nama Pasien">
                <input type="hidden" id="id_pasien" name="id_pasien"> <!-- Menyimpan ID pasien yang dipilih -->
              </div>

              <div class="form-group mb-2">
                <label for="nama_penyakit" class="mr-2">Nama Penyakit:</label>
                <input type="text" id="nama_penyakit" name="nama_penyakit" class="form-control"
                  placeholder="Cari Nama Penyakit">
                <input type="hidden" id="id_penyakit" name="id_penyakit"> <!-- Menyimpan ID penyakit yang dipilih -->
              </div>

              <div class="form-group mb-2">
                <label for="tanggal_pemeriksaan" class="mr-2">Tanggal Pemeriksaan:</label>
                <input type="date" class="form-control" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan">
              </div>

              <div class="form-group mb-2">
                <label for="keterangan" class="mr-2">Keterangan:</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan">
              </div>

              <!-- Tambahkan field lainnya sesuai dengan kebutuhan -->

              <button type="submit" class="btn btn-primary mt-4">Simpan Rekam Medis</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->

<script src="<?= base_url('assets/'); ?>jquery/jquery-min.js"></script>
<script src="<?= base_url('assets/'); ?>jquery/jquery-ui.js"></script>

<script>
  $(function () {
    // Autocompletion untuk input pasien
    $("#nama_pasien").autocomplete({
      source: function (request, response) {
        $.ajax({
          url: "<?= base_url('RekamMedis/get_nama_pasien') ?>",
          dataType: "json",
          data: {
            term: request.term
          },
          success: function (data) {
            response($.map(data, function (item) {
              return {
                label: item.nama, // Menampilkan nama pasien sebagai label dropdown
                value: item.nama, // Menetapkan nilai input ke nama pasien yang dipilih
                id_pasien: item.id_pasien // Menyimpan ID pasien yang dipilih
              };
            }));
          }
        });
      },
      minLength: 2,
      autoFocus: true, // Membuat dropdown muncul secara otomatis saat input mendapatkan fokus
      select: function (event, ui) {
        $("#id_pasien").val(ui.item.id_pasien); // Set nilai ID pasien
      }
    });

    // Autocompletion untuk input penyakit
    $("#nama_penyakit").autocomplete({
      source: function (request, response) {
        $.ajax({
          url: "<?= base_url('RekamMedis/get_nama_penyakit') ?>",
          dataType: "json",
          data: {
            term: request.term
          },
          success: function (data) {
            response($.map(data, function (item) {
              return {
                label: item.nama_penyakit, // Menampilkan nama penyakit sebagai label dropdown
                value: item.nama_penyakit, // Menetapkan nilai input ke nama penyakit yang dipilih
                id_penyakit: item.id_penyakit // Menyimpan ID penyakit yang dipilih
              };
            }));
          }
        });
      },
      minLength: 2,
      autoFocus: true, // Membuat dropdown muncul secara otomatis saat input mendapatkan fokus
      select: function (event, ui) {
        $("#id_penyakit").val(ui.item.id_penyakit); // Set nilai ID penyakit
      }
    });

    // Fungsi response untuk menampilkan dropdown
    function responseFunction(data) {
      $("#nama_pasien").autocomplete("search", "");
      $("#nama_pasien").autocomplete("option", "source", data);
    }
  });
</script>

