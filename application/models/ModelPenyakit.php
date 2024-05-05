<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelPenyakit extends CI_Model
{
    public function getPenyakit()
    {
        return $this->db->get('penyakit');
    }
    public function penyakitWhere($where)
    {
        return $this->db->get_where('penyakit', $where);
    }
    public function simpanPenyakit($data = null)
    {
        return $this->db->insert('penyakit', $data);
    }
    public function updatePenyakit($id_penyakit, $data)
    {
        $this->db->where('id_penyakit', $id_penyakit);
        return $this->db->update('penyakit', $data);
    }
    public function hapusPenyakit($where = null)
    {
        $this->db->delete('penyakit', $where);
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('penyakit');
        return $this->db->get()->row($field);
    }

    public function getPenyakitLimit()
    {
        $this->db->limit(15);
        return $this->db->get('penyakit');
    }   
    //buat function getPenyakitById
    public function getPenyakitById($id)
    {
        return $this->db->get_where('penyakit', ['id_penyakit' => $id])->row_array();
    }
}