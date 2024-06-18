<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		cek_user();
	}

	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		// Ambil parameter filter dari request, default ke 'Today'
		$pasienFilter = $this->input->get('pasienFilter') ? $this->input->get('pasienFilter') : 'Today';
		
		// Ambil data berdasarkan filter
		$data['total_pasien'] = $this->ModelDashboard->getTotalPatients($pasienFilter);
		$data['selected_pasien_filter'] = $pasienFilter;

		$data['total_instansi'] = $this->ModelDashboard->getTotalInstansi();

		$rekamMedisFilter = $this->input->get('rekamMedisFilter') ? $this->input->get('rekamMedisFilter') : 'Today';
		// Ambil data berdasarkan filter
		$data['total_rekam_medis'] = $this->ModelDashboard->getTotalRekamMedis($rekamMedisFilter, $data['user']['id_instansi']);
		$data['selected_rekam_medis_filter'] = $rekamMedisFilter;

		$listRekamMedisFilter = $this->input->get('listRekamMedisFilter') ? $this->input->get('listRekamMedisFilter') : 'Today';
		$data['selected_list_rekam_medis_filter'] = $listRekamMedisFilter;

		$data['rekam_medis'] = $this->ModelDashboard->getListRekamMedis($listRekamMedisFilter, $data['user']['id_instansi']);

		$data['top_diseases'] = $this->ModelDashboard->getTopDiseasesLastMonth();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/admin/footer');
	}

	public function profile()
	{
		$data['judul'] = 'Profile';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		// Data Instansi Petugas
		$data['instansi'] = $this->ModelInstansiKesehatan->instansiKesehatanWhere(['id_instansi' => $data['user']['id_instansi']])->row_array();
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('templates/admin/footer');
	}

	public function ubahProfil()
	{
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules(
			'nama',
			'Nama Lengkap',
			'required|trim',
			[
				'required' => 'Nama tidak Boleh Kosong'
			]
		);

		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim',
			[
				'required' => 'Email tidak Boleh Kosong'
			]
		);


		//Form validasi
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Akses ditolak </div>');
			redirect('admin/profile');
		} else {
			$nama = $this->input->post('nama', true);
			$email = $this->input->post('email', true);

			$query = ['nama' => $nama, 'email' => $email,];
			$where = ['id_user' => $data['user']['id_user']];
			$this->ModelUser->updateUserProfile($query, $where);


			// Refresh Session
			$user = $this->ModelUser->cekData(['email' => $email])->row_array();
			$this->session->set_userdata($user);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
			redirect('admin/profile');
		}
	}

	public function ubahPassword()
	{
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$newpassword = $this->input->post('newpassword', true);
		$renewpassword = $this->input->post('renewpassword', true);

		$this->form_validation->set_rules(
			'newpassword',
			'Password',
			'required',
			[
				'required' => 'Password tidak Boleh Kosong'
			]
		);

		$this->form_validation->set_rules(
			'renewpassword',
			'Password',
			'required',
			[
				'required' => 'Password tidak Boleh Kosong'
			]
		);

		if ($newpassword != $renewpassword) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password tidak sama </div>');
			redirect('admin/profile');
		}

		//Form validasi
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Akses ditolak </div>');
			redirect('admin/profile');
		} else {
			$query = ['password' => password_hash($renewpassword, PASSWORD_DEFAULT)];
			$where = ['id_user' => $data['user']['id_user']];
			$this->ModelUser->updateUserProfile($query, $where);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Password Berhasil diubah </div>');
			redirect('admin/profile');
		}
	}
}
