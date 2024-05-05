<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_user();
    }

    public function master()
    {
        $data['judul'] = 'User';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']['role_id'] == 2) {
            $data['user']['role_id'] = 'Admin';
        } else {
            $data['user']['role_id'] = 'Petugas';
        }

        $data['User'] = $this->ModelUser->getUser();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('user/master', $data);
        $this->load->view('templates/admin/footer');
    }


    public function tambahUser()
    {
        $data['judul'] = 'Tambah User';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        // $data['list_kecamatan'] = $this->ModelUser->getAllKecamatan();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('user/tambah_user', $data);
        $this->load->view('templates/admin/footer');
    }

    public function createUser() {
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => '1',
            'id_instansi' => $this->input->post('id_instansi'),
        );
    
        // Panggil model untuk menyimpan data
        $this->ModelUser->simpanUser($data);
    
        // Periksa hasil simpan
        if ($this->db->affected_rows() > 0) {
            // Simpan berhasil
            $this->session->set_flashdata('message', 'Data User berhasil disimpan');
            redirect('user/master'); // Redirect ke halaman user setelah simpan
        } else {
            // Simpan gagal
            $this->session->set_flashdata('error', 'Gagal menyimpan data User. Mohon coba lagi');
            redirect('user/tambahUser'); // Redirect kembali ke form create user
        }
    }
    

    public function editUser($id_user)
    {
        $data['judul'] = 'Edit User';
        $data['user'] = $this->ModelUser->getUserById($id_user);
        $data['id_user'] = $this->ModelUser->getUserById($id_user);


        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('user/edit_user', $data);
        $this->load->view('templates/admin/footer');
    }


    public function deleteUser($id_user) {
        $result = $this->ModelUser->deleteUser($id_user);

        if ($result) {
            echo "<script>alert('Data user berhasil dihapus');</script>";
            redirect('user/master');
        } else {
            echo "<script>alert('Gagal menghapus data user. Mohon coba lagi');</script>";
        }
    }

    public function updateUser()
    {
        // Ambil data dari form
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'id_instansi' => $this->input->post('id_instansi'),
        );

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
            echo "<script>alert('Data pasien berhasil di edit');</script>";
            redirect('user/master'); // Redirect ke halaman pasien setelah update
        } else {
            // Update gagal
            echo "<script>alert('Gagal menyimpan data pasien. Mohon coba lagi');</script>";
        }
    }
}
