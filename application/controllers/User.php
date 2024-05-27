<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_admin();
    }

    public function master()
    {
        $data['judul'] = 'Pengguna';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();


        $data['User'] = $this->ModelUser->getUser();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('user/master', $data);
        $this->load->view('templates/admin/footer');
    }


    public function tambahUser()
    {
        $data['judul'] = 'Tambah Pengguna';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        // $data['list_kecamatan'] = $this->ModelUser->getAllKecamatan();
        $data['last_id'] = $this->ModelUser->getLastIdUser();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('user/tambah_user', $data);
        $this->load->view('templates/admin/footer');
    }

    public function createUser()
    {

        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => '1',
            'id_instansi' => $this->input->post('id_instansi'),
        );

        $rules = [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],
            // [
            //     'field' => 'role_id',
            //     'label' => 'Role Id',
            //     'rules' => 'required'
            // ],
            [
                'field' => 'id_instansi',
                'label' => 'Id Instansi',
                'rules' => 'required'
            ],
        ];
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() != true) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">' . validation_errors() . '</div>');
            redirect('user/tambahUser');
        }

        // Panggil model untuk menyimpan data
        $this->ModelUser->simpanUserIncrement($data);

        // Periksa hasil simpan
        if ($this->db->affected_rows() > 0) {
            // Simpan berhasil
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data berhasil disimpan</div>');
            redirect('user/master'); // Redirect ke halaman user setelah simpan
        } else {
            // Simpan gagal
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal menyimpan data. Mohon coba lagi</div>');
            redirect('user/tambahUser'); // Redirect kembali ke form create user
        }
    }


    public function editUser($id_user)
    {
        $data['judul'] = 'Edit Pengguna';
        $data['user'] = $this->ModelUser->getUserById($id_user);
        $data['id_user'] = $this->ModelUser->getUserById($id_user);


        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('user/edit_user', $data);
        $this->load->view('templates/admin/footer');
    }


    public function deleteUser($id_user)
    {
        $result = $this->ModelUser->deleteUser($id_user);

        if ($result) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data berhasil dihapus</div>');
            redirect('user/master');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal menghapus data. Mohon coba lagi</div>');
        }
    }

    public function updateUser()
    {
        // Ambil data dari form
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'id_instansi' => $this->input->post('id_instansi'),
        );

        $rules = [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ],
            [
                'field' => 'id_instansi',
                'label' => 'Id Instansi',
                'rules' => 'required'
            ],
        ];
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() != true) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">' . validation_errors() . '</div>');
            redirect('user/editUser/' . $data['id_user']);
        }

        // Jika pengguna memasukkan password baru, hash dan tambahkan ke data
        if (!empty($this->input->post('password'))) {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        // Ambil ID user dari form
        $id_user = $this->input->post('id_user');
        // Panggil model untuk melakukan update data
        $result = $this->ModelUser->updateUser($id_user, $data);

        if ($result) {
            // Update berhasil
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data berhasil disimpan</div>');
            redirect('user/master'); // Redirect ke halaman pasien setelah update
        } else {
            // Update gagal
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal menyimpan data. Mohon coba lagi</div>');
            redirect('user/editUser/' . $data['id_user']);
        }
    }
}
