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
		
		$this->form_validation->set_rules(
			'id_instansi',
			'Id Instansi',
			'required',
			[
				'required' => 'Id Instansi tidak Boleh Kosong'
			]
		);

		$this->form_validation->set_rules(
			'nama_instansi',
			'Nama Instansi',
			'required',
			[
				'required' => 'Nama Instansi tidak Boleh Kosong'
			]
		);
		$this->form_validation->set_rules(
			'tipe',
			'Tipe',
			'required',
			[
				'required' => 'Tipe tidak Boleh Kosong'
			]
		);
		$this->form_validation->set_rules(
			'alamat',
			'Alamat',
			'required',
			[
				'required' => 'Alamat tidak Boleh Kosong'
			]
		);
		$this->form_validation->set_rules(
			'kontak',
			'Kontak',
			'required',
			[
				'required' => 'Kontak tidak Boleh Kosong'
			]
		);
		$this->form_validation->set_rules(
			'id_kecamatan',
			'Id Kecamatan',
			'required',
			[
				'required' => 'Id Kecamatan tidak Boleh Kosong'
			]
		);


		//Form validasi
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Akses ditolak </div>');
			redirect('InstansiKesehatan');
		} else {
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
			// if ($result) {
			// 	// Simpan berhasil
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Berhasil ditambahkan </div>');
				redirect('InstansiKesehatan');
			// } else {
			// 	// Simpan gagal
			// 	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Data gagal ditambahkan </div>');
			// }
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
		}
	}
}
