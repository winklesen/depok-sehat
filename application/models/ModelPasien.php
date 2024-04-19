<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelPasien extends CI_Model
{
    public function getPasien()
    {
        return $this->db->get('pasien');
    }
    public function pasienWhere($where)
    {
        return $this->db->get_where('pasien', $where);
    }
    public function simpanPasien($data = null)
    {
        $this->db->insert('pasien', $data);
    }
    public function updatePasien($data = null, $where = null)
    {
        $this->db->update('pasien', $data, $where);
    }
    public function hapusPasien($where = null)
    {
        $this->db->delete('pasien', $where);
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('pasien');
        return $this->db->get()->row($field);
    }

    public function getPasienLimit()
    {
        $this->db->limit(15);
        return $this->db->get('pasien');
    }   
}