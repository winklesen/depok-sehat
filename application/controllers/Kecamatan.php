<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		cek_admin();
	}

	public function index()
	{
		$data['judul'] = 'Kecamatan';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		// Get Data Kecamatan
		$data['kecamatan'] = $this->ModelKecamatan->getKecamatan()->result_array();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('kecamatan/index', $data);
		$this->load->view('templates/admin/footer');
	}

	public function tambahKecamatan()
	{
		$data['judul'] = 'Tambah Kecamatan';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['last_kec_id'] = $this->ModelKecamatan->getLastIdKecamatan();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('kecamatan/tambah_kecamatan', $data);
		$this->load->view('templates/admin/footer');
	}

	public function createKecamatan()
	{
		$data = array(
			// 'id_kecamatan' => $this->input->post('id_kecamatan'),
			'nama_kecamatan' => $this->input->post('nama_kecamatan'),
			'created_at' => null,
		);

		$rules = [
			[
				'field' => 'nama_kecamatan', //<- ini mengikuti nama input di form
				'label' => 'Nama Kecamatan',
				'rules' => 'required'
			],			
		];
		$this->form_validation->set_rules($rules);

		// var_dump($data); exit;
		if ($this->form_validation->run() != true) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">' . validation_errors() . '</div>');
			redirect('kecamatan/tambahKecamatan');
		}

		// Panggil model untuk menyimpan data
		$result = $this->ModelKecamatan->simpanKecamatanIncrement($data);

		// Periksa hasil simpan
		if ($result) {
			// Simpan berhasil						
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data berhasil disimpan</div>');
			redirect('kecamatan'); // Redirect ke halaman kecamatan setelah simpan
		} else {
			// Simpan gagal
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal menyimpan data. Mohon coba lagi</div>');
			redirect('kecamatan/tambahKecamatan');
		}
	}

	public function editKecamatan($id)
	{
		$data['judul'] = 'Edit Kecamatan';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['kecamatan'] = $this->ModelKecamatan->getKecamatanById($id);


		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('kecamatan/edit_kecamatan', $data);
		$this->load->view('templates/admin/footer');
	}

	public function updateKecamatan()
	{
		// Ambil data dari form
		$data = array(
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			'nama_kecamatan' => $this->input->post('nama_kecamatan'),
			'created_at' => null,
		);

		$rules = [
			[
				'field' => 'nama_kecamatan', 
				'label' => 'Nama Kecamatan',
				'rules' => 'required'
			]
		];
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() != true) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">' . validation_errors() . '</div>');
			redirect('kecamatan/editkecamatan/'.$data['id_kecamatan']);
		}

		// Panggil model untuk melakukan update data
		$result = $this->ModelKecamatan->updateKecamatan($data['id_kecamatan'], $data);

		if ($result) {
			// Update berhasil						
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data berhasil disimpan</div>');
			redirect('kecamatan'); // Redirect ke halaman kecamatan setelah update
		} else {
			// Update gagal
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal menyimpan data. Mohon coba lagi</div>');
			redirect('kecamatan/editKecamatan');
		}
	}
}
