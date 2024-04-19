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
}
