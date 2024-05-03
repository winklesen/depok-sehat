<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		cek_user();
	}

	public function index()
	{
		$data['judul'] = 'Kecamatan';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		// Ubah role dari angka 2 menjadi 'admin'
		if ($data['user']['role_id'] == 2) {
			$data['user']['role_id'] = 'Admin';
		} else {
			$data ['user']['role_id'] = 'Petugas';
		}

		// Get Data Kecamatan
		$data['kecamatan'] = $this->ModelKecamatan->getKecamatanLimit();
		// var_dump($data['kecamatan']);
		// exit;
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('kecamatan/index', $data);
		$this->load->view('templates/admin/footer');
	}

	public function tambahKecamatan() {
		$data['judul'] = 'Tambah Kecamatan';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('kecamatan/tambah_kecamatan', $data);
		$this->load->view('templates/admin/footer');
	}

	public function createKecamatan() {
		$data = array(
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			'nama_kecamatan' => $this->input->post('nama_kecamatan'),
		);

		// var_dump($data); exit;

		// Panggil model untuk menyimpan data
    $result = $this->ModelKecamatan->simpanKecamatan($data);

    // Periksa hasil simpan
    if ($result) {
			// Simpan berhasil
			echo "<script>alert('Data kecamatan berhasil disimpan');</script>";
			redirect('kecamatan'); // Redirect ke halaman kecamatan setelah simpan
	} else {
			// Simpan gagal
			echo "<script>alert('Gagal menyimpan data kecamatan. Mohon coba lagi');</script>";
	}
	}

	public function editKecamatan($id) {
		$data['judul'] = 'Edit Kecamatan';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['kecamatan'] = $this->ModelKecamatan->getKecamatanById($id);


		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('kecamatan/edit_kecamatan', $data);
		$this->load->view('templates/admin/footer');
	}

	public function updateKecamatan() {
		// Ambil data dari form
		$data = array(
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			'nama_kecamatan' => $this->input->post('nama_kecamatan')
		);

			
		// Ambil ID kecamatan dari form
		$id_kecamatan = $this->input->post('id_kecamatan');
			
		// Panggil model untuk melakukan update data
		$result = $this->ModelKecamatan->updateKecamatan($id_kecamatan, $data);
			
		if ($result) {
			// Update berhasil
					echo "<script>alert('Data kecamatan berhasil di edit');</script>";
			redirect('kecamatan'); // Redirect ke halaman kecamatan setelah update
		} else {
			// Update gagal
			echo "<script>alert('Gagal menyimpan data kecamatan. Mohon coba lagi');</script>";
		}
	}

    public function hapusKecamatan()
    {
        $where = ['id_kecamatan' => $this->uri->segment(3)];
        $this->ModelKecamatan->hapusKecamatan($where);
        redirect('kecamatan');
    }

	public function searchKecamatan() {
			
		// Ahmad Search
		// Mengambil kata kunci pencarian dari form
		$data['judul'] = 'Data Kecamatan';

		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['kecamatan'] = $this->ModelKecamatan->getKecamatanLimit();
		$keyword = $this->input->post('keyword');

		// Melakukan pencarian dengan memanggil fungsi searchPasien
		$data['search_kecamatan'] = $this->ModelKecamatan->searchKecamatan($keyword)->result_array();

		// Memeriksa apakah hasil pencarian kosong
		if (empty($data['search_kecamatan'])) {
		// Jika kosong, atur pesan yang akan ditampilkan
			$data['search_message'] = 'Data tidak ditemukan.';
		}

		// Bila route diakses dengan TIDAK membawa parameter        
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);

			// Tampilkan view sesuai dengan kondisi
			if (empty($data['search_message'])) {
				$this->load->view('kecamatan/index', $data);
			} else {
				redirect('kecamatan');
			}

			$this->load->view('templates/admin/footer', $data);

	}


}