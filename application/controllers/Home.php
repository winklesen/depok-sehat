<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();
    }

    public function index(){        
        // TODO di Akhir (Hard)
		// - Desain sesuai mockup
		// - Tampil data sesuai mockup		
        $this->load->view('templates/user/header');
		$this->load->view('home/index');	
        $this->load->view('templates/user/footer');
        
    }
}