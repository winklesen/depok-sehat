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

	
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('rekam_medis/index', $data);
		$this->load->view('templates/admin/footer');
	}
	
}
