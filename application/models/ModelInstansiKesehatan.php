<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelInstansiKesehatan extends CI_Model
{
    public function getInstansiKesehatan()
    {
        return $this->db->get('instansi_kesehatan');
    }
    public function instansiKesehatanWhere($where)
    {
        return $this->db->get_where('instansi_kesehatan', $where);
    }
    public function simpanInstansiKesehatan($data = null)
    {
        $this->db->insert('instansi_kesehatan', $data);
    }
    public function updateInstansiKesehatan($data = null, $where = null)
    {
        $this->db->update('instansi_kesehatan', $data, $where);
    }
    public function hapusInstansiKesehatan($where = null)
    {
        $this->db->delete('instansi_kesehatan', $where);
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('instansi_kesehatan');
        return $this->db->get()->row($field);
    }

    public function getInstansiKesehatanLimit()
    {
        $this->db->limit(15);
        return $this->db->get('instansi_kesehatan');
    }   
}