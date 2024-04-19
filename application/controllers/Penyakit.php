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
}
