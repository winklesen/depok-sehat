<?php
function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login!! </div>');

        // Petugas = 1, Admin  = 2
        if ($ci->session->userdata('role_id') == 1 || $ci->session->userdata('role_id') == 2) {
            redirect('autentifikasi');
        } else {
            redirect('home');
        }
    } else {
        $role_id = $ci->session->userdata('role_id');
        $id_user = $ci->session->userdata('id_user');
    }
}
function cek_user()
{
    $ci = get_instance();
    $role_id = $ci->session->userdata('role_id');
    if ($role_id != 1 && $role_id != 2) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses tidak diizinkan </div>');
        redirect('home');
    }
}

function cek_admin()
{
    $ci = get_instance();
    $role_id = $ci->session->userdata('role_id');
    if ($role_id != 2) 
    {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda tidak diizinkan untuk mengakses Halaman Admin</div>');
        redirect('admin');
    }
}

function cek_petugas()
{
    $ci = get_instance();
    $role_id = $ci->session->userdata('role_id');
    if ($role_id != 1) 
    {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda tidak diizinkan untuk mengakses Halaman Admin</div>');
        redirect('admin');
    }
}

// ============================================
// KODINGAN CONTEKAN (DIHAPUS DIAKHIR)
// ============================================
// <?php 
// function cek_login($pagePermission)
// {
// 	// $pagePermission == admin hanya admin
// 	// $pagePermission == eo hanya admin & EO
// 	// $pagePermission == user hanya user_login
// 	// $pagePermission == '' semua bisa akses

// 	$ci = get_instance();
// 	if (!$ci->session->userdata('user_email') && $pagePermission != '') {
// 		$ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login!! </div>');
// 		redirect('autentifikasi');
// 	} else {
// 		if ($pagePermission == $ci->session->userdata('user_role')) {
// 			$role = $ci->session->userdata('user_role');
// 		} else if ($pagePermission == 'eo' && $ci->session->userdata('user_role') == 'admin') {
// 			$role = $ci->session->userdata('user_role');
// 		} else if ($pagePermission == 'user' && $ci->session->userdata('user_role') == 'admin' || $ci->session->userdata('user_role') == 'eo') {
// 			$role = $ci->session->userdata('user_role');
// 		}
// 	}
// }
