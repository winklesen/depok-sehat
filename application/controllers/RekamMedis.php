<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekamMedis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		cek_user();
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

}
