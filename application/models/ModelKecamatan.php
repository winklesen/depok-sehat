<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelKecamatan extends CI_Model
{
    public function getKecamatan()
    {
        return $this->db->get('kecamatan');
    }
    public function kecamatanWhere($where)
    {
        return $this->db->get_where('kecamatan', $where);
    }
    public function simpanKecamatan($data = null)
    {
        return $this->db->insert('kecamatan', $data);
    }
    // public function updateKecamatan($data = null, $where = null)
    // {
    //     $this->db->update('kecamatan', $data, $where);
    // }
    public function updateKecamatan($id_kecamatan, $data)
    {
        $this->db->where('id_kecamatan', $id_kecamatan);
        return $this->db->update('kecamatan', $data);
    }
    // public function hapusKecamatan($where = null)
    // {
    //     $this->db->delete('kecamatan', $where);
    // }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('kecamatan');
        return $this->db->get()->row($field);
    }

    // Mendapatkan data kecamatan berdasarkan ID kecamatan beserta informasi nama kecamatan
    public function getKecamatanById($id)
    {
        $this->db->select('*');
        $this->db->from('kecamatan');
        $this->db->where('id_kecamatan', $id);
        return $this->db->get()->row_array();
    }

    public function getKecamatanLimit()
    {
        return $this->db->get('kecamatan')->result_array();
    } 
    
    public function searchKecamatan($keyword)
    {   
        // Menentukan kolom yang ingin dicari
        $this->db->select('*');
        $this->db->from('kecamatan');
        $this->db->group_start(); // Open a parenthesis for grouping OR conditions
        $this->db->like('kecamatan.id_kecamatan', $keyword);
        
        $this->db->or_like('kecamatan.nama_kecamatan', $keyword);
        $this->db->group_end(); // Close the parenthesis for grouping OR conditions
        
        // Mengambil data dari tabel 'acara'
        return $this->db->get();

    }
}