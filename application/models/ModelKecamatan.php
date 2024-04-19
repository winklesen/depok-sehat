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
        $this->db->insert('kecamatan', $data);
    }
    public function updateKecamatan($data = null, $where = null)
    {
        $this->db->update('kecamatan', $data, $where);
    }
    public function hapusKecamatan($where = null)
    {
        $this->db->delete('kecamatan', $where);
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('kecamatan');
        return $this->db->get()->row($field);
    }

    public function getKecamatanLimit()
    {
        $this->db->limit(15);
        return $this->db->get('kecamatan');
    }   
}