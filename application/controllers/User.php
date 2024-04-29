<?php

defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();
    }

    public function home(){        
        // TODO di Akhir (Hard)
		// - Desain sesuai mockup
		// - Tampil data sesuai mockup		
		$this->load->view('home/index');		
    }
    
    public function master(){
        $data['judul'] = 'Pengguna';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		// Get Data Pengguna
		$data['pengguna'] = $this->ModelUser->getUser()->result_array();

		// TODO (Easy)
		// - Add User
		// - Edit User
		// - Active / Inactive User

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('user/master', $data);
		$this->load->view('templates/admin/footer');
    }
    
    public function index()
    {
        $data['judul'] = 'Profil Saya';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function anggota()
    {
        $data['judul'] = 'Data Anggota';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('role_id', 1);
        $data['anggota'] = $this->db->get('user')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/anggota', $data);
        $this->load->view('templates/footer');
    }

    public function ubahProfil()
    {
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules(
            'nama',
            'Nama Lengkap',
            'required|trim', [
                'required' => 'Nama tidak Boleh Kosong'
        ]);

        //Form validasi
        if ($this->form_validation->run() == false) 
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubah-profile', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);

            //jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            //Cek kalau image exist
            if ($upload_image) 
            {
                //Eksekusi script
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '3000';
                $config['max_width'] = '3000';
                $config['max_height'] = '3000';
                $config['file_name'] = 'pro' . time();
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) 
                {
                    $gambar_lama = $data['user']['image'];

                    if ($gambar_lama != 'default.jpg') { unlink(FCPATH . 'assets/img/profile/' .$gambar_lama); }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else { }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
            redirect('user');
        }
    }
}

// ============================================
// KODINGAN CONTEKAN (DIHAPUS DIAKHIR)
// ============================================
// <?php
// defined('BASEPATH') or exit('No direct script access allowed');
// class Banner extends CI_Controller
// {
//     public function __construct()
//     {
//         parent::__construct();
//         cek_login('admin');
//     }

//     public function index()
//     {
//         // Judul Halaman
//         $data['judul'] = 'Data Banner';                

//         $data['userSession'] = $this->ModelUser->cekData(['user_email' => $this->session->userdata('user_email')])->row_array();

//         // Data yang dibawa
//         $data['banner'] = $this->ModelBanner->getBanner()->result_array();
//         $data['acara'] = $this->ModelAcara->getAcara()->result_array();

//         // Valdiasi Form
//         $this->form_validation->set_rules('banner_name', 'banner_name', 'required', [
//             'required' => 'Nama Banner harus diisi'
//         ]);
//         // $this->form_validation->set_rules('banner_poster', 'banner_poster', 'required', [
//         //     'required' => 'Gambar Banner harus diisi'
//         // ]);
//         $this->form_validation->set_rules('banner_acara_id', 'banner_acara_id', 'required', [
//             'required' => 'Acara Id harus diisi'
//         ]);

//         // Konfigurasi sebelum gambar diupload
//         $config['upload_path'] = './assets/img/banner/';
//         $config['allowed_types'] = 'jpg|png|jpeg';
//         $config['max_size'] = '10000';
//         $config['max_width'] = '10000';
//         $config['max_height'] = '10000';
//         $config['file_name'] = 'img' . time();

//         // Memuat atau memanggil library upload
//         $this->load->library('upload', $config);

//         // Bila route diakses dengan TIDAK membawa parameter
//         if ($this->form_validation->run() == false) { // masuk ke view            
//             $this->load->view('templates/admin/header', $data);
//             $this->load->view('templates/admin/sidebar', $data);        
//             $this->load->view('templates/admin/topbar', $data);
//             $this->load->view('banner/index', $data);
//             $this->load->view('templates/admin/footer', $data);
//         } else { // jalankan fungsi tambah data
            
//             if ($this->upload->do_upload('banner_poster')) {
//                 $image = $this->upload->data();
//                 $gambar = $image['file_name'];
//             } else {                
//                 $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Harap pilih gambar banner</div>');
//                 redirect('banner');
//             }

//             $query = [
//                 // formatnya
//                 // nama kolom => nama input
//                 'banner_id' => uniqid(),
//                 'banner_name' => $this->input->post('banner_name', true),
//                 'banner_poster' => $gambar,
//                 'banner_acara_id' => $this->input->post('banner_acara_id', true),
//                 'banner_actived' => 'Y'
//             ];

//             $this->ModelBanner->simpanBanner($query);

//             $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Data telah tersimpan </div>');
//             redirect('banner');
//         }
//     }

//     public function ubahBanner()
//     {                
//         // Judul Halaman
//         $data['judul'] = 'Ubah Data Banner';                

//         $data['userSession'] = $this->ModelUser->cekData(['user_email' => $this->session->userdata('user_email')])->first_row();

//         // Data yang dibawa                
//         $data['banner'] = $this->ModelBanner->bannerWhere(['banner_id' => $this->uri->segment(3)])->result_array();
//         $data['selected'] = $this->ModelBanner->bannerWhere(['banner_id' => $this->input->post('banner_id')])->first_row(); 
//         $data['acara'] = $this->ModelAcara->getAcara()->result_array();

//         // Valdiasi Form
//         $this->form_validation->set_rules('banner_name', 'banner_name', 'required', [
//             'required' => 'Nama Banner harus diisi'
//         ]);
//         // $this->form_validation->set_rules('banner_poster', 'banner_poster', 'required', [
//         //     'required' => 'Gambar Banner harus diisi'
//         // ]);
//         $this->form_validation->set_rules('banner_acara_id', 'banner_acara_id', 'required', [
//             'required' => 'Acara Id harus diisi'
//         ]);
//         $this->form_validation->set_rules('banner_actived', 'banner_actived', 'required', [
//             'required' => 'Status harus diisi'
//         ]);

//         // Konfigurasi sebelum gambar diupload
//         $config['upload_path'] = './assets/img/banner/';
//         $config['allowed_types'] = 'jpg|png|jpeg';
//         $config['max_size'] = '10000';
//         $config['max_width'] = '10000';
//         $config['max_height'] = '10000';
//         $config['file_name'] = 'img' . time();

//         // Memuat atau memanggil library upload
//         $this->load->library('upload', $config);

//         // Bila route diakses dengan TIDAK membawa parameter
//         if ($this->form_validation->run() == false) { // masuk ke view            
//             $this->load->view('templates/admin/header', $data);
//             $this->load->view('templates/admin/sidebar', $data);
//             $this->load->view('templates/admin/topbar', $data);
//             $this->load->view('banner/ubah_banner', $data);
//             $this->load->view('templates/admin/footer', $data);
//         } else { // jalankan fungsi edit data
            
//             if ($this->upload->do_upload('banner_poster')) {
//                 $image = $this->upload->data();
//                 $gambar = $image['file_name'];
//             } else {                          
//                 $gambar = $data['selected']->banner_poster;
//             }

//             $query = [
//                 // formatnya
//                 // nama kolom => nama input
//                 // 'banner_id' =>  $data['selected']->banner_id,
//                 'banner_name' => $this->input->post('banner_name', true),
//                 'banner_poster' => $gambar,
//                 'banner_acara_id' => $this->input->post('banner_acara_id', true),
//                 'banner_actived' => $this->input->post('banner_actived', true),
//             ];
//             $where = ['banner_id' => $data['selected']->banner_id];
            
//             $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Banner '. $data['selected']->banner_name. ' telah diupdate. </div>');
//             $this->ModelBanner->updateBanner($query, $where);
//             redirect('banner');
//         }
//     }

//     public function ubahStatusBanner()
//     {        

//         $data['userSession'] = $this->ModelUser->cekData(['user_email' => $this->session->userdata('user_email')])->row_array();
//         $bannerData = $this->ModelBanner->bannerWhere(['banner_id' => $this->uri->segment(3)])->first_row();
//         $statusNew = $bannerData->banner_actived == 'N' ? 'Y' : 'N';
//         $query = [
//             'banner_actived' => $statusNew,
//         ];
//         $where = ['banner_id' => $this->uri->segment(3)];
//         $this->ModelBanner->updateBanner($query, $where);
//         $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Banner '. $bannerData->banner_name. ' telah diupdate. </div>');
//         redirect('banner');
//     }

//     public function hapusBanner()
//     {        
//         $data['userSession'] = $this->ModelUser->cekData(['user_email' => $this->session->userdata('user_email')])->row_array();
//         $bannerData = $this->ModelBanner->bannerWhere(['banner_id' => $this->uri->segment(3)])->first_row();        
//         $where = ['banner_id' => $this->uri->segment(3)];
//         $this->ModelBanner->hapusBanner($where);        
//         $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Banner '. $bannerData->banner_name. ' telah diahapus.</div>');
//         redirect('banner');
//     }
// }