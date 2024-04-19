<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		cek_user();
	}

	public function index()
	{
		$data['judul'] = 'Kecamatan';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		// Get Data Kecamatan
		$data['kecamatan'] = $this->ModelKecamatan->getKecamatan()->result_array();

		// TODO (Easy)
		// - Add Kecamatan
		// - Edit Kecamatan
		// - Delete Kecamatan

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('kecamatan/index', $data);
		$this->load->view('templates/admin/footer');
	}
}
