<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelRekamMedis extends CI_Model
{
  public function getRekamMedis($id_instansi)
  {
    $this->db->select('rekam_medis.*, pasien.nama AS nama_pasien, penyakit.nama_penyakit AS nama_penyakit, instansi_kesehatan.nama_instansi AS nama_instansi');
    $this->db->from('rekam_medis');
    $this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
    $this->db->join('penyakit', 'penyakit.id_penyakit = rekam_medis.id_penyakit');
    $this->db->join('instansi_kesehatan', 'instansi_kesehatan.id_instansi = rekam_medis.id_instansi');
    $this->db->where('rekam_medis.id_instansi', $id_instansi);
    return $this->db->get()->result_array();
  }

  public function simpanRekamMedis($data = null)
  {
    $this->db->select('id_rekam_medis');
    $this->db->order_by('id_rekam_medis', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('rekam_medis');

    if ($query->num_rows() == 0) {
      $newRekamMedis = 'RKM0001';
    } else {
      $lastId = $query->row()->id_rekam_medis;

      $numericPart = intval(substr($lastId, 4));

      $newNumericPart = $numericPart + 1;

      $newRekamMedis = 'RKM' . sprintf('%04s', $newNumericPart);
    }
    $data['id_rekam_medis'] = $newRekamMedis;

    return $this->db->insert('rekam_medis', $data);
  }
  public function getAllPenyakit()
  {
    $this->db->limit(10);
    return $this->db->get('penyakit')->result_array();
  }
  public function search_nama_pasien($term)
  {
    $this->db->select('id_pasien, nama');
    $this->db->like('nama', $term); // Lakukan pencarian berdasarkan teks yang diberikan
    $query = $this->db->get('pasien');
    return $query->result(); // Kembalikan hasil pencarian
  }

  public function get_nama_penyakit($term)
  {
    $this->db->select('id_penyakit, nama_penyakit');
    $this->db->like('nama_penyakit', $term); // Lakukan pencarian berdasarkan teks yang diberikan
    $query = $this->db->get('penyakit');
    return $query->result(); // Kembalikan hasil pencarian
  }
}
