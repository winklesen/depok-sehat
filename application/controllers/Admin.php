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




		// ============================================
		// KODINGAN CONTEKAN (SABEB RUBAH AJA)
		// ============================================
		// $data['anggota'] = $this->ModelUser->getUserLimit()->result_array();
		// $data['buku'] = $this->ModelBuku->getLimitBuku()->result_array();

		// //mengupdate stok dan dibooking pada tabel buku
		// $detail = $this->db->query("SELECT*FROM booking,booking_detail WHERE DAY(curdate()) < DAY(batas_ambil) AND booking.id_booking=booking_detail.id_booking")->result_array();
		// foreach ($detail as $key) {
		// 	$id_buku = $key['id_buku'];
		// 	$batas = $key['tgl_booking'];
		// 	$tglawal = date_create($batas);
		// 	$tglskrg = date_create();
		// 	$beda = date_diff($tglawal, $tglskrg);


		// 	if ($beda->days > 2)
		// 		$this->db->query("UPDATE buku SET stok=stok+1, dibooking=dibooking-1 WHERE id='$id_buku'");
		// }

		// //menghapus otomatis data booking yang sudah lewat dari 2 hari
		// $booking = $this->ModelBooking->getData('booking');
		// if (!empty($booking)) {
		// 	foreach ($booking as $bo) {
		// 		$id_booking = $booking->id_booking;
		// 		$tglbooking = $booking->tgl_booking;
		// 		$tglawal = date_create($tglbooking);
		// 		$tglskrg = date_create();
		// 		$beda = date_diff($tglawal, $tglskrg);
		// 		if ($beda->days > 2) {
		// 			$this->db->query("DELETE FROM booking WHERE id_booking='$id_booking'");
		// 			$this->db->query("DELETE FROM booking_detail WHERE id_booking='$id_booking'");
		// 		}
		// 	}
		// }


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
			$this->ModelUser->updateUser($query, $where);


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
			$this->ModelUser->updateUser($query, $where);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Password Berhasil diubah </div>');
			redirect('admin/profile');
		}
	}
}
