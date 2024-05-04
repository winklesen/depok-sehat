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
		$data['judul'] = 'instansikesehatan';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		// Ubah role dari angka 2 menjadi 'admin'
		if ($data['user']['role_id'] == 'Admin') {
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
		$this->load->view('instansi/tambah_instansikesehatan', $data);
		$this->load->view('templates/admin/footer');
	}
	public function createInstansiKesehatan() {
		$data = array(
			'id_instansi' => $this->input->post('id_instansi'),
			'nama_instansi' => $this->input->post('nama_instansi'),
			'tipe' => $this->input->post('tipe'),
			'alamat' => $this->input->post('alamat'),
			'kontak' => $this->input->post('kontak'),
			'id_kecamatan' => $this->input->post('id_kecamatan')
		);

		// Panggil model untuk menyimpan data
    $result = $this->ModelInstansiKesehatan->simpanInstansiKesehatan($data);

    // Periksa hasil simpan
    if ($result) {
			// Simpan berhasil
			echo "<script>alert('Data instansi berhasil disimpan');</script>";
			redirect('pasien'); // Redirect ke halaman pasien setelah simpan
	} else {
			// Simpan gagal
			echo "<script>alert('Gagal menyimpan data instansi. Mohon coba lagi');</script>";
	}
	}
	public function editInstansiKesehatan($id) {
		$data['judul'] = 'Edit Instansi';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['instansi'] = $this->ModelInstansiKesehatan->getById($id);
		$data['list_kecamatan'] = $this->ModelInstansiKesehatan->getAllKecamatan();
	
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('instansi/edit_instansikesehatan', $data);
		$this->load->view('templates/admin/footer');
	}
	
	public function updateInstansiKesehatan() {
		// Ambil data dari form
		$data = array(
			'nama_instansi' => $this->input->post('nama_instansi'),
			'tipe' => $this->input->post('tipe'),
			'alamat' => $this->input->post('alamat'),
			'kontak' => $this->input->post('kontak'),
			'nama_kecamatan' => $this->input->post('nama_kecamatan')
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