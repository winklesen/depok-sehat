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

		// Get Data Pasien
		$data['pasien'] = $this->ModelPasien->getPasienLimit()->result_array();

		// TODO (Medium)
		// - Add Pasien (1 row)
		// - Import Template Excel
		// - Add Pasien Excel (bulk / import banyak)

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('pasien/index', $data);
		$this->load->view('templates/admin/footer');
	}
}
