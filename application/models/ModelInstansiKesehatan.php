<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelInstansiKesehatan extends CI_Model
{
    public function getInstansiKesehatan()
    {
        return $this->db->get('instansi');
    }
    public function updateInstansiKesehatanWhere($where)
    {
        return $this->db->get_where('instansi', $where);
    }
    public function simpanInstansiKesehatan($data = null)
    {
        return $this->db->insert('instansi', $data);
    }
    public function hapusInstansiKesehatan($where = null)
    {
        $this->db->delete('instansi', $where);
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('instansi');
        return $this->db->get()->row($field);
    }

    public function getInstansiKesehataniLimit()
    {
        $this->db->select('instansi.*, kecamatan.nama_kecamatan');
        $this->db->from('instansi');
        $this->db->join('kecamatan', 'instansi.id_kecamatan = kecamatan.id_kecamatan');
        $this->db->limit(15); // Batasan 15 entri
        return $this->db->get()->result_array();
    }

    // Mendapatkan data pasien berdasarkan ID pasien beserta informasi nama kecamatan
    public function getInstansiKesehatanById($id_instansi)
    {
        $this->db->select('instansi.*, kecamatan.nama_kecamatan');
        $this->db->from('instansi');
        $this->db->join('kecamatan', 'instansi.id_kecamatan = instansi.id_kecamatan');
        $this->db->where('instansi.id_instansi', $id_instansi);
        return $this->db->get()->row_array();
    }

    public function getAllKecamatan()
    {
        return $this->db->get('kecamatan')->result_array();
    }

    public function updateInstansiKesehatan($id_instansi, $data)
    {
        $this->db->where('id_instansi', $id_instansi);
        return $this->db->update('instansi', $data);
    }
}