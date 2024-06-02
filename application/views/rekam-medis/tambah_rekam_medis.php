<main id="main" class="main">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body m-3">
            <h5 class="card-title p-0">Tambah Rekam Medis</h5>
            <!-- Form untuk menambahkan data rekam medis -->
            <form id="editForm" action="<?= base_url('RekamMedis/createRekamMedis') ?>" method="post">

              <div class="form-group mb-2">
                <label for="nama_pasien" class="mr-2">Nama Pasien:</label>
                <input type="text" id="nama_pasien" name="nama_pasien" class="form-control " placeholder="Cari Nama Pasien" required>
                <input type="hidden" id="id_pasien" name="id_pasien"> <!-- Menyimpan ID pasien yang dipilih -->
                <div id="nama_pasien_error" class="text-danger"></div> <!-- Menampilkan pesan error -->
              </div>

              <div class="form-group mb-2">
                <label for="nama_penyakit" class="mr-2">Nama Penyakit:</label>
                <input type="text" id="nama_penyakit" name="nama_penyakit" class="form-control " placeholder="Cari Nama Penyakit" required>
                <input type="hidden" id="id_penyakit" name="id_penyakit"> <!-- Menyimpan ID penyakit yang dipilih -->
                <div id="nama_penyakit_error" class="text-danger"></div> <!-- Menampilkan pesan error -->
              </div>

              <div class="form-group mb-2">
                <label for="tanggal_pemeriksaan" class="mr-2">Tanggal Pemeriksaan:</label>
                <input type="date" class="form-control" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" required>
              </div>

              <div class="form-group mb-2">
                <label for="keterangan" class="mr-2">Keterangan:</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
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

<script>
  $(function() {
    // Autocompletion untuk input pasien
    $("#nama_pasien").autocomplete({
      source: function(request, response) {
        console.log('Requesting pasien data with term:', request.term); // Debugging line
        $.ajax({
          url: "<?= base_url('RekamMedis/get_nama_pasien') ?>",
          dataType: "json",
          data: {
            term: request.term
          },
          success: function(data) {
            console.log('Received pasien data:', data); // Debugging line
            response($.map(data, function(item) {
              return {
                label: item.nama, // Menampilkan nama pasien sebagai label dropdown
                value: item.nama, // Menetapkan nilai input ke nama pasien yang dipilih
                id_pasien: item.id_pasien // Menyimpan ID pasien yang dipilih
              };
            }));
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error fetching pasien data: ", textStatus, errorThrown); // Debugging line
          }
        });
      },
      minLength: 2,
      autoFocus: true, // Membuat dropdown muncul secara otomatis saat input mendapatkan fokus
      select: function(event, ui) {
        $("#id_pasien").val(ui.item.id_pasien); // Set nilai ID pasien
      }
    });

    // Autocompletion untuk input penyakit
    $("#nama_penyakit").autocomplete({
      source: function(request, response) {
        console.log('Requesting penyakit data with term:', request.term); // Debugging line
        $.ajax({
          url: "<?= base_url('RekamMedis/get_nama_penyakit') ?>",
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

    // Fungsi untuk validasi formulir sebelum disubmit
    $("#editForm").submit(function(event) {
      var selectedPasien = $("#id_pasien").val(); // Ambil ID pasien yang dipilih
      if (!selectedPasien) {
        // Jika tidak ada pasien yang dipilih, tampilkan pesan error
        $("#nama_pasien_error").text("Harap pilih nama pasien dari dropdown yang tersedia.");
        event.preventDefault(); // Hentikan proses submit formulir
      }

      var selectedPenyakit = $("#id_penyakit").val(); // Ambil ID penyakit yang dipilih
      if (!selectedPenyakit) {
        // Jika tidak ada penyakit yang dipilih, tampilkan pesan error
        $("#nama_penyakit_error").text("Harap pilih nama penyakit dari dropdown yang tersedia.");
        event.preventDefault(); // Hentikan proses submit formulir
      }
    });
  });
</script>