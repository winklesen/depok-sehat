<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();
        error_reporting(0);
    }

    public function index(){        
        // TODO di Akhir (Hard)
        // - Desain sesuai mockup
        // - Tampil data sesuai mockup   
        $data['judul'] = 'Home';
    
        $data['most_common_diseases'] = $this->ModelHome->penyakitTrending();
        $data['total_kecamatan'] = $this->ModelHome->getTotalKecamatan();
        $data['total_instansi'] = $this->ModelHome->getTotalInstansi();


        // Ambil parameter filter dari request, default ke 'Today'
        $pasienFilter = $this->input->get('pasienFilter') ? $this->input->get('pasienFilter') : 'Today';
        // Ambil data berdasarkan filter
        $data['total_pasien'] = $this->ModelHome->getTotalPatients($pasienFilter);
        $data['selected_pasien_filter'] = $pasienFilter;

        // Menghitung jumlah instansi
        $data['jumlah_rumah_sakit'] = count($this->ModelHome->getInstansiByTipe('Rumah Sakit'));
        $data['jumlah_puskesmas'] = count($this->ModelHome->getInstansiByTipe('Puskesmas'));
        $data['jumlah_klinik'] = count($this->ModelHome->getInstansiByTipe('Klinik'));

        
        $this->load->view('templates/user/header', $data);
        $this->load->view('templates/user/navbar');
        $this->load->view('home/index', $data);          
        $this->load->view('templates/user/footer');        
    }

    public function listPenyakit() {
        $data['judul'] = 'List Penyakit';
        $data['list_penyakit'] = $this->ModelHome->getPenyakit()->result_array();
        
        $this->load->view('templates/user/header', $data);
        $this->load->view('templates/user/navbar');
        $this->load->view('home/list_penyakit', $data);          
        $this->load->view('templates/user/footer');    
    }
    
    public function listInstansi() {
        $data['judul'] = 'List Instansi';
        $data['instansi'] = $this->ModelHome->getInstansiKesehatanJoinKecamatan()->result_array();
        
        $this->load->view('templates/user/header', $data);
        $this->load->view('templates/user/navbar');
        $this->load->view('home/list_instansi', $data);          
        $this->load->view('templates/user/footer');    
    }
    

    public function about(){        
        // TODO di Akhir (Hard)
		// - Desain sesuai mockup
		// - Tampil data sesuai mockup	
        $data['judul'] = 'About';	
        $this->load->view('templates/user/header', $data);
        $this->load->view('templates/user/navbar');
		$this->load->view('home/about');	
        $this->load->view('templates/user/footer');
        
        
    }

	public function get_nama_penyakit()
	{
		$term = $this->input->get('term'); // Ambil teks yang diketikkan pengguna
		$results = $this->ModelHome->get_nama_penyakit($term); // Lakukan pencarian nama pasien berdasarkan teks
		echo json_encode($results); // Keluarkan hasil pencarian dalam format JSON
	}

    public function searchPenyakit()
    {
        // Ambil teks pencarian dari input form
        $term = $this->input->get('nama_penyakit');

        // Panggil method dari model untuk mencari data penyakit berdasarkan teks pencarian
        $results = $this->ModelHome->get_nama_penyakit($term);

        // Periksa apakah ada hasil pencarian
        if (!$results) {
            // Jika tidak ada hasil, arahkan kembali ke halaman list penyakit
            redirect('home/listPenyakit');
        } else {
            $id = $results[0]->id_penyakit;
            redirect('home/detailPenyakit/' . $id);
        }
    }

    public function detailPenyakit($id)
	{
		$data['judul'] = 'Detail Penyakit ';
        $data['penyakit'] = $this->ModelHome->penyakitWhere(['id_penyakit' => $this->uri->segment(3)])->result_array();


        $this->load->view('templates/user/header', $data);
        $this->load->view('templates/user/navbar');
        $this->load->view('home/detail_penyakit', $data);          
        $this->load->view('templates/user/footer');
	}
}