<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InstansiKesehatan extends CI_Controller
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
		$data['judul'] = 'Instansi Kesehatan';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		// Get Data Instansi
		$data['instansi'] = $this->ModelInstansiKesehatan->getInstansiKesehatan()->result_array();

		// TODO (Easy)
		// - Add Instansi
		// - Edit Instansi
		// - Delete Instansi

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('instansi/index', $data);
		$this->load->view('templates/admin/footer');
	}

	public function tambahInstansi()
	{
		$data['judul'] = 'Tambah Instansi Kesehatan';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['list_kecamatan'] = $this->ModelPasien->getAllKecamatan();
		$data['last_id'] = $this->ModelInstansiKesehatan->getLastIdInstansiKesehatan();
		$data['enum_values'] = $this->ModelInstansiKesehatan->get_enum_values();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('instansi/tambah_instansi', $data);
		$this->load->view('templates/admin/footer');
	}

	public function editInstansi($id)
	{
		$data['judul'] = 'Edit Instansi Kesehatan';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['enum_values'] = $this->ModelInstansiKesehatan->get_enum_values();
		$data['instansi'] = $this->ModelInstansiKesehatan->getInstansiKesehatanById($id);

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('instansi/edit_instansi', $data);
		$this->load->view('templates/admin/footer');
	}

	public function createInstansi()
	{
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		$rules = [
			[
				'field' => 'id_instansi',
				'label' => "Id Instansi",
				'rules' => "required",
			],
			[
				'field' => 'nama_instansi',
				'label' => "Nama Instansi",
				'rules' => "required",
			],
			[
				'field' => 'tipe',
				'label' => "Tipe",
				'rules' => "required",
			],
			[
				'field' => 'alamat',
				'label' => "Alamat",
				'rules' => "required",
			],
			[
				'field' => 'kontak',
				'label' => "Kontak",
				'rules' => "required",
			],
			[
				'field' => 'id_kecamatan',
				'label' => "Id Kecamatan",
				'rules' => "required",
			],
		];
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() != true) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">' . validation_errors() . '</div>');
			redirect('InstansiKesehatan/tambahInstansi');
		}

		$id_instansi = $this->input->post('id_instansi', true);
		$nama_instansi = $this->input->post('nama_instansi', true);
		$tipe = $this->input->post('tipe', true);
		$alamat = $this->input->post('alamat', true);
		$kontak = $this->input->post('kontak', true);
		$id_kecamatan = $this->input->post('id_kecamatan', true);

		$query = array(
			'id_instansi' => $id_instansi,
			'nama_instansi' => $nama_instansi,
			'tipe' => $tipe,
			'alamat' => $alamat,
			'kontak' => $kontak,
			'id_kecamatan' => $id_kecamatan,
			'created_at' => null,
		);

		// Panggil model untuk menyimpan data
		$result = $this->ModelInstansiKesehatan->simpanInstansiKesehatan($query);

		// Periksa hasil simpan
		if ($result) {
			// Simpan berhasil
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Berhasil ditambahkan </div>');
			redirect('InstansiKesehatan');
		} else {
			// Simpan gagal
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Data gagal ditambahkan </div>');
			redirect('InstansiKesehatan/tambahInstansi');
		}
	}

	public function updateInstansi()
	{
		// Ambil data dari form
		$data = array(
			'id_instansi' => $this->input->post('id_instansi'),
			'nama_instansi' => $this->input->post('nama_instansi'),
			'tipe' => $this->input->post('tipe_instansi')
		);

		$rules = [
			[
				'field' => 'id_instansi',
				'label' => "Id Instansi",
				'rules' => "required",
			],
			[
				'field' => 'nama_instansi',
				'label' => "Nama Instansi",
				'rules' => "required",
			],
			[
				'field' => 'tipe',
				'label' => "Tipe",
				'rules' => "required",
			],
		];
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() != true) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">' . validation_errors() . '</div>');
			redirect('InstansiKesehatan/editInstansi'.$data['id_instansi']);
		}


		// Ambil ID Instansi dari form
		$id_instansi = $this->input->post('id_instansi');

		// Panggil model untuk melakukan update data
		$result = $this->ModelInstansiKesehatan->updateInstansiKesehatan($id_instansi, $data);

		if ($result) {
			// Update berhasil
			echo "<script>alert('Data kecamatan berhasil di edit');</script>";
			redirect('instansikesehatan'); // Redirect ke halaman kecamatan setelah update
		} else {
			// Update gagal
			echo "<script>alert('Gagal menyimpan data kecamatan. Mohon coba lagi');</script>";
			redirect('InstansiKesehatan/editInstansi');
		}
	}

	public function deleteInstansi($id)
	{
		$where = ['id_instansi' => $this->uri->segment(3)];
		$this->ModelInstansiKesehatan->hapusInstansiKesehatan($where);
		redirect('instansikesehatan');
	}
}
