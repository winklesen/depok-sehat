<?php

// TODO : masih blm diapa apain ini
class Autentifikasi extends CI_Controller
{
    public function index()
    {
        //jika statusnya sudah login, maka tidak bisa mengakses
        //halaman login alias dikembalikan ke tampilan user
        if ($this->session->userdata('email')) {
            redirect('admin');
        }


        // Set method Validation untuk form
        $this->form_validation->set_rules('user_email', 'email',
            'required|trim|valid_email', [
            'required' => 'Anda Belum Memasukkan Alamat Email!',
            'valid_email' => 'Email yang Anda Masukkan Salah atau Belum Terdaftar'
        ]);

        $this->form_validation->set_rules('user_password', 'Password',
            'required|trim', [
            'required' => 'Password Harus diisi'
        ]);

        // eksekusi form validasi
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
            $data['user'] = '';

            //kata 'login' merupakan nilai dari variabel judul dalam
            //array $data dikirimkan ke view aute_header
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('autentifikasi/login');
            $this->load->view('templates/auth/auth_footer');
        }
        else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('user_email', true));
        $password = $this->input->post('user_password', true);
        $user = $this->ModelUser->cekData(['email' => $email])->row_array();

        //jika usernya ada (exist)
        if ($user) {
            //cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id'],
                    'id_instansi' => $user['id_instansi']
                ];
                $this->session->set_userdata($data);

                if ($user['role_id'] == 1 || $user['role_id'] == 2)  {
                    redirect('admin');
                } else {
                    if ($user['image'] == 'default.jpg') {
                        $this->session->set_flashdata('pesan',
                            '<div class="alert alert-info alert-message" role="alert">Silahkan Ubah Profile Anda untuk Ubah Photo Profil</div>');
                    }

                    redirect('admin');
                }
            }
            else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                redirect('autentifikasi');
            }
        }
        else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
            redirect('autentifikasi');
        }
    }

    public function blok()
    {
        $this->load->view('autentifikasi/blok');
    }
    public function gagal()
    {
        $this->load->view('autentifikasi/gagal');
    }

    public function logout()
    {
        $item = array('email', 'role_id');
        $this->session->unset_userdata($item);
        redirect('autentifikasi');
    }
}