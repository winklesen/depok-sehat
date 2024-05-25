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
            //jika user sudah aktif
            // if ($user['is_active'] == 1) 
            // {

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

            // }
            // else {
            //     $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User belum diaktifasi!!</div>');
            //     redirect('autentifikasi');
            // }
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


    // public function registrasi()
    // {
    //     if ($this->session->userdata('email')) {
    //         redirect('user');
    //     }

    //     //membuat rule untuk inputan nama agar tidak boleh kosong
    //     //dengan membuat pesan error dengan
    //     //bahasa sendiri yaitu 'Nama Belum diisi'
    //     $this->form_validation->set_rules(
    //         'user_nama',
    //         'Nama Lengkap',
    //         'required', [
    //         'required' => 'Nama Belum diisi!!'
    //     ]);
    //     //membuat rule untuk inputan email agar tidak boleh kosong,
    //     //tidak ada spasi, format email harus valid
    //     //dan email belum pernah dipakai sama user lain dengan
    //     //membuat pesan error dengan bahasa sendiri
    //     ////yaitu jika format email tidak benar maka pesannya 'Email
    //     //Tidak Benar!!'. jika email belum diisi,
    //     //maka pesannya adalah 'Email Belum diisi', dan jika email
    //     //yang diinput sudah dipakai user lain,
    //     //maka pesannya 'Email Sudah dipakai'
    //     $this->form_validation->set_rules(
    //         'user_email',
    //         'Alamat Email',
    //         'required|trim|valid_email|is_unique[user.email]', [
    //         'valid_email' => 'Email Tidak Benar!!',
    //         'required' => 'Email Belum diisi!!',
    //         'is_unique' => 'Email Sudah Terdaftar!'
    //     ]);
    //     //membuat rule untuk inputan password agar tidak boleh
    //     //kosong, tidak ada spasi, tidak boleh kurang dari
    //     //dari 3 digit, dan password harus sama dengan repeat
    //     //password dengan membuat pesan error dengan
    //     //bahasa sendiri yaitu jika password dan repeat password
    //     //tidak diinput sama, maka pesannya
    //     //'Password Tidak Sama'. jika password diisi kurang dari 3
    //     //digit, maka pesannya adalah
    //     //'Password Terlalu Pendek'.
    //     $this->form_validation->set_rules(
    //         'user_password1',
    //         'Password',
    //         'required|trim|min_length[3]|matches[user_password2]', [
    //         'matches' => 'Password Tidak Sama!!',
    //         'required' => 'Password Harus diisi',
    //         'min_length' => 'Password Terlalu Pendek'
    //     ]);
    //     $this->form_validation->set_rules(
    //         'user_password2',
    //         'RepeatPassword',
    //         'required|trim|matches[user_password1]', [
    //         'matches' => 'Password Tidak Sama!!',
    //         'required' => 'Password Harus diisi',
    //         'min_length' => 'Password Terlalu Pendek'
    //     ]
    //     );
    //     //jika jida disubmit kemudian validasi form diatas tidak
    //     //berjalan, maka akan tetap berada di
    //     //tampilan registrasi. tapi jika disubmit kemudian val   about_contentidasi
    //     //form diatas berjalan, maka data yang
    //     //diinput akan disimpan ke dalam tabel user
    //     if ($this->form_validation->run() == false) {
    //         $data['judul'] = 'Registrasi Member';
    //         $this->load->view('templates/auth/auth_header', $data);
    //         $this->load->view('autentifikasi/registrasi');
    //         $this->load->view('templates/auth/auth_footer');
    //     }
    //     else {
    //         $email = $this->input->post('user_email', true);
    //         $data = [
    //             'nama' => htmlspecialchars($this->input->post('user_nama', true)),
    //             'email' => htmlspecialchars($email),
    //             // 'image' => 'default.jpg',
    //             'password' => password_hash($this->input->post('user_password1'), PASSWORD_DEFAULT),
    //             'role_id' => 2,
    //             // 'is_active' => 1,
    //             'created_at' => date('Y-m-d H:i:s')
    //         ];
    //         $this->ModelUser->simpanData($data); //menggunakan model

    //         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
    //         redirect('autentifikasi');
    //     }
    // }

    public function logout()
    {
        $item = array('email', 'role_id');
        $this->session->unset_userdata($item);
        redirect('autentifikasi');
    }
}