<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelDashboard extends CI_Model
{
  public function getTotalPatients($filter)
  {
    $this->db->select('COUNT(*) as total');
    $this->db->from('pasien');

    // Tambahkan kondisi berdasarkan filter
    if ($filter == 'Today') {
      $this->db->where('DATE(created_at)', date('Y-m-d'));
    } elseif ($filter == 'This Month') {
      $this->db->where('MONTH(created_at)', date('m'));
      $this->db->where('YEAR(created_at)', date('Y'));
    } elseif ($filter == 'This Year') {
      $this->db->where('YEAR(created_at)', date('Y'));
    }

    $query = $this->db->get();
    return $query->row()->total;
  }

  public function getTotalRekamMedis($filter, $idInstansi)
  {
    $this->db->select('COUNT(*) as total');
    $this->db->from('rekam_medis');
    $this->db->where('id_instansi', $idInstansi);

    // Tambahkan kondisi berdasarkan filter
    if ($filter == 'Today') {
      $this->db->where('DATE(created_at)', date('Y-m-d'));
    } elseif ($filter == 'This Month') {
      $this->db->where('MONTH(created_at)', date('m'));
      $this->db->where('YEAR(created_at)', date('Y'));
    } elseif ($filter == 'This Year') {
      $this->db->where('YEAR(created_at)', date('Y'));
    }

    $query = $this->db->get();
    return $query->row()->total;
  }


  public function getTotalInstansi()
  {
    // Logika untuk mendapatkan total revenue (jumlah instansi kesehatan)
    return $this->db->count_all('instansi_kesehatan');
  }

  public function getListRekamMedis($filter, $idInstansi)
  {
    $this->db->select('rekam_medis.id_rekam_medis, pasien.nama AS nama_pasien, penyakit.nama_penyakit, rekam_medis.tanggal_pemeriksaan');
    $this->db->from('rekam_medis');
    $this->db->where('id_instansi', $idInstansi);
    $this->db->join('pasien', 'rekam_medis.id_pasien = pasien.id_pasien');
    $this->db->join('penyakit', 'rekam_medis.id_penyakit = penyakit.id_penyakit');

    // Tambahkan kondisi berdasarkan filter
    if ($filter == 'Today') {
      $this->db->where('DATE(rekam_medis.tanggal_pemeriksaan)', date('Y-m-d'));
    } elseif ($filter == 'This Month') {
      $this->db->where('MONTH(rekam_medis.tanggal_pemeriksaan)', date('m'));
      $this->db->where('YEAR(rekam_medis.tanggal_pemeriksaan)', date('Y'));
    } elseif ($filter == 'This Year') {
      $this->db->where('YEAR(rekam_medis.tanggal_pemeriksaan)', date('Y'));
    }

    $this->db->limit(7);

    $query = $this->db->get();
    return $query->result_array();
  }

  public function getTopDiseasesLastMonth()
  {
    $this->db->select('penyakit.nama_penyakit, COUNT(rekam_medis.id_penyakit) as total');
    $this->db->from('rekam_medis');
    $this->db->join('penyakit', 'rekam_medis.id_penyakit = penyakit.id_penyakit');
    $this->db->where('rekam_medis.tanggal_pemeriksaan >=', date('Y-m-d', strtotime('-1 month')));
    $this->db->group_by('rekam_medis.id_penyakit');
    $this->db->order_by('total', 'DESC');
    $this->db->limit(3);
    $query = $this->db->get();
    $topDiseases = $query->result_array();

    return $topDiseases;
  }

}

