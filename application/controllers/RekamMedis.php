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

	public function createRekamMedis() {
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
}