<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InstansiKesehatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		cek_user();
	}

	public function index()
	{
		$data['judul'] = 'instansi';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		// Ubah role dari angka 2 menjadi 'admin'
		if ($data['user']['role_id'] == 2) {
			$data['user']['role_id'] = 'Admin';
		} else {
			$data ['user']['role_id'] = 'Petugas';
		}

		// Get Data Instansi
		$data['instansi'] = $this->ModelInstansiKesehatan->getInstansiKesehatan();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('instansi/index', $data);
		$this->load->view('templates/admin/footer');
	}

	public function tambahInstansiKesehatan() {
		$data['judul'] = 'Tambah Instansi';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['list_kecamatan'] = $this->ModelInstansiKesehatan->getAllKecamatan();
	
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('Instansikesehatan/tambah_InstansiKesehatan', $data);
		$this->load->view('templates/admin/footer');
	}
	
	public function editInstansiKesehatan($id) {
		$data['judul'] = 'Edit Instansi';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['instansi'] = $this->ModelInstansiKesehatan->getById($id);
		$data['list_kecamatan'] = $this->ModelInstansiKesehatan->getAllKecamatan();
	
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('InstansiKesehatan/edit_Instansikesehatan', $data);
		$this->load->view('templates/admin/footer');
	}
	
	public function updateInstansiKesehatan() {
		// Ambil data dari form
		$data = array(
			'nama' => $this->input->post('nama'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'info_kontak' => $this->input->post('info_kontak'),
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			'alamat' => $this->input->post('alamat')
		);
	
		// Ambil ID pasien dari form
		$id_instansi = $this->input->post('id_instansi');
		
		// Panggil model untuk melakukan update data
		$result = $this->ModelInstansiKesehatan->updateInstansiKesehatan($id_instansi, $data);
		
		if ($result) {
			// Update berhasil
			echo "<script>alert('Data pasien berhasil di edit');</script>";
			redirect('InstansiKesehatan'); // Redirect ke halaman pasien setelah update
		} else {
			// Update gagal
			echo "<script>alert('Gagal menyimpan data pasien. Mohon coba lagi');</script>";
		}
	}
}	