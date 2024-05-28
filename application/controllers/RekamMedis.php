<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekamMedis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		cek_user();
		error_reporting(0);
	}

	public function index()
	{
		$data['judul'] = 'Rekam Medis';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		$data['rekam_medis'] = $this->ModelRekamMedis->getRekamMedis($data['user']['id_instansi']);
		// var_dump($data['rekam_medis']); exit;

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('rekam-medis/rekam-medis', $data);
		$this->load->view('templates/admin/footer');
	}

	public function tambahRekamMedis()
	{
		cek_petugas();
		$data['judul'] = 'Tambah Rekam Medis';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['list_pasien'] = $this->ModelPasien->getAllPasien();
		$data['list_penyakit'] = $this->ModelRekamMedis->getAllPenyakit(); // Mengambil data penyakit dari model

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('rekam-medis/tambah_rekam_medis', $data);
		$this->load->view('templates/admin/footer');
	}

	public function get_nama_pasien()
	{
		$term = $this->input->get('term'); // Ambil teks yang diketikkan pengguna
		$results = $this->ModelRekamMedis->search_nama_pasien($term); // Lakukan pencarian nama pasien berdasarkan teks
		echo json_encode($results); // Keluarkan hasil pencarian dalam format JSON
	}

	public function get_nama_penyakit()
	{
		$term = $this->input->get('term'); // Ambil teks yang diketikkan pengguna
		$results = $this->ModelRekamMedis->get_nama_penyakit($term); // Lakukan pencarian nama pasien berdasarkan teks
		echo json_encode($results); // Keluarkan hasil pencarian dalam format JSON
	}

	public function createRekamMedis()
	{
		$userData = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		$data = array(
			'id_pasien' => $this->input->post('id_pasien'),
			'id_penyakit' => $this->input->post('id_penyakit'),
			'tanggal_pemeriksaan' => $this->input->post('tanggal_pemeriksaan'),
			'keterangan' => $this->input->post('keterangan'),
			'id_instansi' => $userData['id_instansi']
		);

		// Panggil model untuk menyimpan data
		$result = $this->ModelRekamMedis->simpanRekamMedis($data);

		// Periksa hasil simpan
		if ($result) {
			// Simpan berhasil
			echo "<script>alert('Data pasien berhasil disimpan');</script>";
			redirect('RekamMedis'); // Redirect ke halaman pasien setelah simpan
		} else {
			// Simpan gagal
			echo "<script>alert('Gagal menyimpan data pasien. Mohon coba lagi');</script>";
			redirect('RekamMedis/tambahRekamMedis');
		}
	}

	public function downloadCSV()
	{
		// Set header untuk memberitahu browser bahwa ini adalah file CSV
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename="template.csv"');

		// Buat file handle untuk output ke browser
		$output = fopen('php://output', 'w');

		// Tulis header kolom ke file CSV
		fputcsv($output, array('nik', 'nama', 'tanggal_lahir', 'alamat', 'info_kontak', 'id_kecamatan', 'id_penyakit', 'keterangan'));

		// Tulis baris kosong untuk memberi ruang bagi pengguna untuk mengisi data
		fputcsv($output, array());

		// Tutup file handle
		fclose($output);
	}

	public function importCSV()
	{
		// Pastikan file CSV diunggah
		if (!empty($_FILES['csv_file']['name'])) {
			// Memeriksa ekstensi file
			$file_ext = pathinfo($_FILES['csv_file']['name'], PATHINFO_EXTENSION);
			if ($file_ext != 'csv') {
				$error_message = "File harus memiliki ekstensi CSV.";
				$this->session->set_flashdata('error', $error_message);
				redirect('RekamMedis');
				return;
			}

			// Memeriksa tipe MIME file
			$file_mime = $_FILES['csv_file']['type'];
			if ($file_mime != 'text/csv' && $file_mime != 'application/csv') {
				$error_message = "File harus memiliki tipe MIME CSV.";
				$this->session->set_flashdata('error', $error_message);
				redirect('RekamMedis');
				return;
			}

			// Mengambil semua data kecamatan dan penyakit dari database
			$all_kecamatan = $this->db->get('kecamatan')->result_array();
			$all_penyakit = $this->db->get('penyakit')->result_array();
			$userData = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

			// Menyimpan semua id kecamatan dan id penyakit dari database ke dalam array
			$kecamatan_ids = array_column($all_kecamatan, 'id_kecamatan');
			$penyakit_ids = array_column($all_penyakit, 'id_penyakit');

			// Buka file CSV untuk validasi
			$csv_file = fopen($_FILES['csv_file']['tmp_name'], 'r');
			$invalid_kecamatan = []; // Array untuk menyimpan id kecamatan yang tidak tersedia di database
			$invalid_penyakit = []; // Array untuk menyimpan id penyakit yang tidak tersedia di database
			$invalid_tanggal = []; // Array untuk menyimpan baris dengan tanggal pemeriksaan tidak valid
			$invalid_date_pasien = [];

			// Membaca header untuk mendapatkan nama kolom
			$header = fgetcsv($csv_file, 1000, ',');

			// Array untuk menyimpan data yang akan di-insert dan di-update
			$all_pasien_data = [];
			$all_rekam_medis_data = [];
			$nik_list = [];

			// Lakukan validasi pada setiap baris file CSV
			$row_number = 2; // Nomor baris awal (setelah header)
			while (($data = fgetcsv($csv_file, 1000, ',')) !== false) {
				// Memeriksa id kecamatan (kolom keenam)
				$id_kecamatan = $data[5]; // Kolom id_kecamatan
				if (!in_array($id_kecamatan, $kecamatan_ids)) {
					$invalid_kecamatan[] = $id_kecamatan;
				}

				// Memeriksa id penyakit (kolom ketujuh)
				$id_penyakit = $data[6]; // Kolom id_penyakit
				if (!in_array($id_penyakit, $penyakit_ids)) {
					$invalid_penyakit[] = $id_penyakit;
				}

				// Memeriksa format tanggal lahir (kolom ketiga)
				$tanggal_lahir = $data[2]; // Kolom tanggal_lahir
				if (!strtotime($tanggal_lahir)) {
					// Jika format tanggal lahir tidak valid, tambahkan nama pasien ke dalam array
					$invalid_date_pasien[] = $data[1]; // Kolom nama
					$invalid_tanggal[] = $row_number;
			}

				// Persiapkan data pasien
				$nik = $data[0]; // Nik digunakan sebagai id_pasien
				$pasien_data = [
					'id_pasien' => $nik,
					'nama' => $data[1],
					'tanggal_lahir' => $data[2],
					'alamat' => $data[3],
					'info_kontak' => $data[4],
					'id_kecamatan' => $id_kecamatan,
					'created_at' => date('Y-m-d H:i:s') // Waktu saat ini sebagai created_at
				];

				// Persiapkan data rekam medis
				$rekam_medis_data = [
					'id_pasien' => $nik,
					'id_penyakit' => $id_penyakit,
					'id_instansi' => $userData['id_instansi'], // Ganti dengan id_instansi yang sesuai
					'tanggal_pemeriksaan' => date('Y-m-d'), // Ganti dengan tanggal pemeriksaan yang sesuai
					'keterangan' => $data[7], // Kolom keterangan dari CSV
					'created_at' => date('Y-m-d H:i:s') // Waktu saat ini sebagai created_at
				];

				// Kumpulkan NIK untuk pengecekan di database
				$nik_list[] = $nik;

				// Menyimpan data pasien ke dalam array untuk di-insert/update nanti
				$all_pasien_data[$nik] = $pasien_data;
				$all_rekam_medis_data[] = $rekam_medis_data;

				$row_number++; // Increment nomor baris
			}

			fclose($csv_file); // Tutup file CSV setelah validasi selesai

			// Setelah selesai membaca file CSV, tampilkan pesan kesalahan jika ada
			$error_messages = [];
			if (!empty($invalid_kecamatan)) {
				$error_messages[] = "ID kecamatan tidak tersedia di database: " . implode(', ', array_unique($invalid_kecamatan)) . ".";
			}
			if (!empty($invalid_penyakit)) {
				$error_messages[] = "ID penyakit tidak tersedia di database: " . implode(', ', array_unique($invalid_penyakit)) . ".";
			}
			if (!empty($invalid_tanggal)) {
				$error_messages[] = "Format tanggal lahir tidak valid untuk pasien dengan nama: " . implode(', ', $invalid_date_pasien) . "." . " Pada baris: " . implode(', ', $invalid_tanggal) . ".";
			}

			// Jika ada pesan kesalahan, set flashdata error dan redirect kembali
			if (!empty($error_messages)) {
				$error_message = implode(' ', $error_messages);
				$this->session->set_flashdata('error', $error_message);
				redirect('RekamMedis');
				return;
			}

			// Cek keberadaan pasien di database berdasarkan NIK yang sudah dikumpulkan
			$existing_pasien = $this->db->where_in('id_pasien', $nik_list)->get('pasien')->result_array();
			$existing_nik = array_column($existing_pasien, 'id_pasien');

			// Pisahkan data pasien yang akan di-insert dan di-update
			$new_pasien_data = [];
			$update_pasien_data = [];
			foreach ($all_pasien_data as $nik => $pasien_data) {
				if (in_array($nik, $existing_nik)) {
					$update_pasien_data[$nik] = $pasien_data;
				} else {
					$new_pasien_data[] = $pasien_data;
				}
			}
			if (!empty($new_pasien_data)) {
				$this->db->insert_batch('pasien', $new_pasien_data);
			}

			// Lakukan update untuk data pasien yang ada
			foreach ($update_pasien_data as $nik => $pasien_data) {
				$this->db->where('id_pasien', $nik);
				$this->db->update('pasien', $pasien_data);
			}

			// Ambil ID terakhir dari tabel rekam medis
			$last_id_query = $this->db->select('id_rekam_medis')->order_by('id_rekam_medis', 'DESC')->limit(1)->get('rekam_medis');
			$last_id = $last_id_query->row_array();

			// Jika tidak ada data rekam medis sebelumnya, mulai dari RKM0001
			if (!$last_id) {
				$next_id_number = 1;
			} else {
				$last_id_number = substr($last_id['id_rekam_medis'], 3); // Mengambil angka setelah awalan "RKM"
				$next_id_number = (int) $last_id_number + 1; // Menambahkan 1 untuk mendapatkan nomor urut berikutnya
			}

			// Tentukan berapa banyak data rekam medis yang akan diinsert
			$batch_count = count($all_rekam_medis_data);

			// Lakukan iterasi pada data rekam medis dan tambahkan ID rekam medis sesuai urutan
			for ($i = 0; $i < $batch_count; $i++) {
				// Format ID rekam medis yang baru
				$next_id = 'RKM' . sprintf('%04d', $next_id_number + $i);

				// Set ID rekam medis untuk data yang akan diinsert
				$all_rekam_medis_data[$i]['id_rekam_medis'] = $next_id;
			}

			// Lakukan insert batch untuk data rekam medis
			if (!empty($all_rekam_medis_data)) {
				$this->db->insert_batch('rekam_medis', $all_rekam_medis_data);
			}

			$error_message = "Import data rekam medis sukses";
			$this->session->set_flashdata('error', $error_message);
			redirect('RekamMedis');
		} else {
			$error_message = "File CSV belum diunggah.";
			$this->session->set_flashdata('error', $error_message);
			redirect('RekamMedis');
		}
	}
}