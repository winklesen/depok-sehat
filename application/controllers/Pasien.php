<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		cek_user();
	}

	public function index()
	{
		$data['judul'] = 'Pasien';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		// Ubah role dari angka 2 menjadi 'admin'
		if ($data['user']['role_id'] == 2) {
			$data['user']['role_id'] = 'Admin';
		} else {
			$data['user']['role_id'] = 'Petugas';
		}

		// Get Data Pasien
		$data['pasien'] = $this->ModelPasien->getPasienLimit();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('pasien/index', $data);
		$this->load->view('templates/admin/footer');
	}

	public function tambahPasien()
	{
		$data['judul'] = 'Tambah Pasien';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['list_kecamatan'] = $this->ModelPasien->getAllKecamatan();

		$data['last_id'] = $this->ModelPasien->getLastIdPasien();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('pasien/tambah_pasien', $data);
		$this->load->view('templates/admin/footer');
	}

	public function createPasien()
	{
		$data = array(
			// 'id_pasien' => $this->input->post('id_pasien'),
			'nama' => $this->input->post('nama'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'info_kontak' => $this->input->post('info_kontak'),
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			'alamat' => $this->input->post('alamat'),
			'created_at' => null,
		);

		$rules = [	
			[
				'field' => 'nama', //<- ini mengikuti nama input di form
				'label' => 'Nama Pasien',
				'rules' => 'required'
			],	
			[
				'field' => 'tanggal_lahir', //<- ini mengikuti nama input di form
				'label' => 'Tanggal Lahir Pasien',
				'rules' => 'required'
			],		
			[
				'field' => 'info_kontak', //<- ini mengikuti nama input di form
				'label' => 'Info Kontak Pasien',
				'rules' => 'required'
			],	
			[
				'field' => 'alamat', //<- ini mengikuti nama input di form
				'label' => 'Alamat Pasien',
				'rules' => 'required'
			],	
		];
		$this->form_validation->set_rules($rules);

		// var_dump($data); exit;
		if ($this->form_validation->run() != true) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">' . validation_errors() . '</div>');
			redirect('pasien/tambahPasien');
		}

		// Panggil model untuk menyimpan data
		$result = $this->ModelPasien->simpanPasienIncrement($data);

		// Periksa hasil simpan
		if ($result) {
			// Simpan berhasil						
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data berhasil disimpan</div>');
			redirect('pasien'); // Redirect ke halaman kecamatan setelah simpan
		} else {
			// Simpan gagal
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal menyimpan data. Mohon coba lagi</div>');
			redirect('pasien/tambahPasien');
		}
	}

	public function editpasien($id)
	{
		$data['judul'] = 'Edit Pasien';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['pasien'] = $this->ModelPasien->getPasienById($id);
		$data['list_kecamatan'] = $this->ModelPasien->getAllKecamatan();


		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('pasien/edit_pasien', $data);
		$this->load->view('templates/admin/footer');
	}

	public function updatePasien()
	{
		$data = array(
			'id_pasien' => $this->input->post('id_pasien'),
			'nama' => $this->input->post('nama'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'info_kontak' => $this->input->post('info_kontak'),
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			'alamat' => $this->input->post('alamat'),
			'created_at' => null,
		);

		$rules = [	
			[
				'field' => 'nama', //<- ini mengikuti nama input di form
				'label' => 'Nama Pasien',
				'rules' => 'required'
			],	
			[
				'field' => 'tanggal_lahir', //<- ini mengikuti nama input di form
				'label' => 'Tanggal Lahir Pasien',
				'rules' => 'required'
			],		
			[
				'field' => 'info_kontak', //<- ini mengikuti nama input di form
				'label' => 'Info Kontak Pasien',
				'rules' => 'required'
			],	
			[
				'field' => 'alamat', //<- ini mengikuti nama input di form
				'label' => 'Alamat Pasien',
				'rules' => 'required'
			],	
		];
		$this->form_validation->set_rules($rules);

		// var_dump($data); exit;
		if ($this->form_validation->run() != true) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">' . validation_errors() . '</div>');
			redirect('pasien/editPasien/'  . $data['id_pasien']);
		}

		// Panggil model untuk menyimpan data
		$result = $this->ModelPasien->updatePasien($data['id_pasien'], $data);

		// Periksa hasil simpan
		if ($result) {
			// Simpan berhasil						
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data berhasil disimpan</div>');
			redirect('pasien'); // Redirect ke halaman kecamatan setelah simpan
		} else {
			// Simpan gagal
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal menyimpan data. Mohon coba lagi</div>');
			redirect('pasien/editPasien');
		}
	}

	public function searchPasien()
	{

		// Ahmad Search
		// Mengambil kata kunci pencarian dari form
		$data['judul'] = 'Data Pasien';

		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['pasien'] = $this->ModelPasien->getPasienLimit();
		$keyword = $this->input->post('keyword');

		// Melakukan pencarian dengan memanggil fungsi searchPasien
		$data['search_pasien'] = $this->ModelPasien->searchPasien($keyword)->result_array();

		// Memeriksa apakah hasil pencarian kosong
		if (empty($data['search_pasien'])) {
			// Jika kosong, atur pesan yang akan ditampilkan
			$data['search_message'] = 'Data tidak ditemukan.';
		}

		// Bila route diakses dengan TIDAK membawa parameter        
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);

		// Tampilkan view sesuai dengan kondisi
		if (empty($data['search_message'])) {
			$this->load->view('pasien/index', $data);
		} else {
			redirect('pasien');
		}

		$this->load->view('templates/admin/footer', $data);
	}
}
