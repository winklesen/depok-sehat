<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelHome extends CI_Model
{

  // public function penyakitTrending() {
  //     $this->db->select('kecamatan.id_kecamatan, pasien.id_pasien, penyakit.*,rekam_medis.id_penyakit, COUNT(rekam_medis.id_penyakit) as total');
  //     $this->db->group_by('rekam_medis.id_penyakit');
  //     $this->db->order_by('total', 'DESC');
  //     $this->db->where('rekam_medis.tanggal_pemeriksaan >=', date('Y-m-d', strtotime('-1 month')));
  //     $this->db->join('penyakit', 'rekam_medis.id_penyakit = penyakit.id_penyakit');
  //     $this->db->join('pasien', 'rekam_medis.id_pasien = pasien.id_pasien');
  //     $this->db->join('kecamatan', 'pasien.id_kecamatan = kecamatan.id_kecamatan');
  //     $this->db->limit(3); // Ambil 3 jenis penyakit terbanyak
  //     $query = $this->db->get('rekam_medis');
  //     return $query->result();
  // }

  public function getKecamatanList()
  {
    $query = $this->db->get('kecamatan');
    return $query->result();
  }

  public function getKecamatanName($id_kecamatan)
  {
    $query = $this->db->get_where('kecamatan', array('id_kecamatan' => $id_kecamatan));
    return $query->row()->nama_kecamatan;
  }

  public function getDiseasesByKecamatan($id_kecamatan)
  {
    $this->db->select('penyakit.id_penyakit, penyakit.nama_penyakit, COUNT(rekam_medis.id_penyakit) as total');
    $this->db->group_by('rekam_medis.id_penyakit');
    $this->db->order_by('total', 'DESC');
    $this->db->where('rekam_medis.tanggal_pemeriksaan >=', date('Y-m-d', strtotime('-1 month')));
    $this->db->join('penyakit', 'rekam_medis.id_penyakit = penyakit.id_penyakit');
    $this->db->join('pasien', 'rekam_medis.id_pasien = pasien.id_pasien');
    $this->db->where('pasien.id_kecamatan', $id_kecamatan);
    $this->db->limit(3);
    $query = $this->db->get('rekam_medis');
    return $query->result();
  }

  public function penyakitTrending()
  {
    $this->db->select('penyakit.id_penyakit, penyakit.nama_penyakit, COUNT(rekam_medis.id_penyakit) as total');
    $this->db->group_by('rekam_medis.id_penyakit');
    $this->db->order_by('total', 'DESC');
    $this->db->where('rekam_medis.tanggal_pemeriksaan >=', date('Y-m-d', strtotime('-1 month')));
    $this->db->join('penyakit', 'rekam_medis.id_penyakit = penyakit.id_penyakit');
    $this->db->limit(3); // Ambil 3 jenis penyakit terbanyak
    $query = $this->db->get('rekam_medis');
    return $query->result();
  }


  public function getPenyakit()
  {
    return $this->db->get('penyakit');
  }

  public function get_nama_penyakit($term)
  {
    $this->db->select('id_penyakit, nama_penyakit');
    $this->db->like('nama_penyakit', $term); // Lakukan pencarian berdasarkan teks yang diberikan
    $query = $this->db->get('penyakit');
    return $query->result(); // Kembalikan hasil pencarian
  }

  public function penyakitWhere($where)
  {
    return $this->db->get_where('penyakit', $where);
  }

  public function getInstansiByTipe($tipe)
  {
    return $this->db->get_where('instansi_kesehatan', array('tipe' => $tipe))->result_array();
  }

  public function getInstansiKesehatanJoinKecamatan()
  {
    $this->db->select('instansi_kesehatan.*, kecamatan.nama_kecamatan');
    $this->db->from('instansi_kesehatan');
    $this->db->join('kecamatan', 'instansi_kesehatan.id_kecamatan = kecamatan.id_kecamatan');
    return $this->db->get();
  }

  public function getTotalPatients()
  {
    $this->db->select('COUNT(*) as total');
    $this->db->from('pasien');

    $query = $this->db->get();
    return $query->row()->total;
  }

  public function getTotalInstansi()
  {
    // Logika untuk mendapatkan total revenue (jumlah instansi kesehatan)
    return $this->db->count_all('instansi_kesehatan');
  }

  public function getTotalKecamatan()
  {
    // Logika untuk mendapatkan total revenue (jumlah instansi kesehatan)
    return $this->db->count_all('kecamatan');
  }

}
