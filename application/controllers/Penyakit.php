<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		cek_user();
	}

	public function index()
	{
		$data['judul'] = 'Penyakit';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		if ($data['user']['role_id'] == 2) {
			$data['user']['role_id'] = 'Admin';
		} else {
			$data['user']['role_id'] = 'Petugas';
		}
		// Get Data Penyakit
		$data['penyakit'] = $this->ModelPenyakit->getPenyakit()->result_array();

		// TODO (Med)
		// - Add Penyakit (Rich Text Editor)
		//   Referensi :
		//     - https://www.petanikode.com/codeigniter-quilljs/
		//     - tinymce 
		//     - Textarea WYSIWYG editor
		// - Edit Penyakit
		// - Delete Penyakit

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('penyakit/index', $data);
		$this->load->view('templates/admin/footer');
	}

	public function addPenyakit()
	{
		$data['judul'] = 'Tambah Penyakit';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['last_kec_id'] = $this->ModelPenyakit->getLastIdPenyakit();


		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('penyakit/tambah_penyakit', $data);
		$this->load->view('templates/admin/footer');
	}

	public function tambahPenyakit()
	{
		$data = array(
			'id_penyakit' => $this->input->post('id_penyakit'),
			'nama_penyakit' => $this->input->post('nama_penyakit'),
			'info_gejala' => $this->input->post('info_gejala'),
			'info_pencegahan' => $this->input->post('info_pencegahan'),
			'info_pengobatan' => $this->input->post('info_pengobatan'),
			'gambar_penyakit' => $this->input->post('gambar_penyakit')
		);

		// Panggil model untuk menyimpan data
		$result = $this->ModelPenyakit->simpanPenyakit($data);

		// Periksa hasil simpan
		if ($result) {
			// Simpan berhasil
			echo "<script>alert('Data penyakit berhasil ditambahkan');</script>";
			redirect('penyakit'); // Redirect ke halaman penyakit setelah simpan
		} else {
			// Simpan gagal
			echo "<script>alert('Gagal menambahkan data penyakit. Mohon coba lagi');</script>";
		}
	}

	public function editPenyakit($id)
	{
		$data['judul'] = 'Edit Penyakit';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['penyakit'] = $this->ModelPenyakit->getPenyakitById($id);

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('penyakit/ubah_penyakit', $data);
		$this->load->view('templates/admin/footer');
	}

	public function updatePenyakit()
	{
		// Ambil data dari form
		$data = array(
			'nama_penyakit' => $this->input->post('nama_penyakit'),
			'info_gejala' => $this->input->post('info_gejala'),
			'info_pencegahan' => $this->input->post('info_pencegahan'),
			'info_pengobatan' => $this->input->post('info_pengobatan'),
			'gambar_penyakit' => $this->input->post('gambar_penyakit')
		);

		// Ambil ID penyakit dari form
		$id_penyakit = $this->input->post('id_penyakit');

		// Panggil model untuk melakukan update data
		$result = $this->ModelPenyakit->updatePenyakit($id_penyakit, $data);

		if ($result) {
			// Update berhasil
			echo "<script>alert('Data penyakit berhasil diubah');</script>";
			redirect('penyakit'); // Redirect ke halaman penyakit setelah update
		} else {
			// Update gagal
			echo "<script>alert('Gagal mengubah data penyakit. Mohon coba lagi');</script>";
		}
	}
}