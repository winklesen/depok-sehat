<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelInstansiKesehatan extends CI_Model
{
    public function getInstansiKesehatan()
    {
        return $this->db->get('instansi_kesehatan')->result_array();
    }

    public function instansikesehatanWhere($where)
    {
        return $this->db->get_where('instansi_kesehatan', $where)->result_array();
    }

    public function simpanInstansiKesehatan($data = null)
    {
        return $this->db->insert('instansi_kesehatan', $data);
    }

    public function hapusInstansiKesehatan($where = null)
    {
        $this->db->delete('instansi_kesehatan', $where);
    }

    public function total($field, $where = null)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('instansi_kesehatan');
        return $this->db->get()->row($field);
    }

    public function updateInstansiKesehatan($id_instansi, $data)
    {
        $this->db->where('id_instansi', $id_instansi);
        return $this->db->update('instansi_kesehatan', $data);
    }
}
