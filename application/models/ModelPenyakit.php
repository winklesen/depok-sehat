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

    public function getLastIdPenyakit(){
        // Mendapatkan ID penyakit terakhir dari database
        $this->db->select('id_penyakit');
        $this->db->order_by('id_penyakit', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('penyakit');

        // Jika tidak ada data penyakit, kita mulai dengan nomor 1
        if ($query->num_rows() == 0) {
            $newIdPenyakit = 'PK001';
        } else {
            $lastId = $query->row()->id_penyakit;
            // Mendapatkan bagian numerik dari ID penyakit terakhir
            $numericPart = intval(substr($lastId, 2));

            // Menambahkan 1 ke bagian numerik
            $newNumericPart = $numericPart + 1;

            // Membuat ID penyakit baru
            $newIdPenyakit = 'PK' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
        }
        return $newIdPenyakit;
    }

    public function simpanPenyakitIncrement($data = null)
    {
        // Mendapatkan ID penyakit terakhir dari database
        $this->db->select('id_penyakit');
        $this->db->order_by('id_penyakit', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('penyakit');

        // Jika tidak ada data penyakit, kita mulai dengan nomor 1
        if ($query->num_rows() == 0) {
            $newIdPenyakit = 'PK001';
        } else {
            $lastId = $query->row()->id_penyakit;
            // Mendapatkan bagian numerik dari ID penyakit terakhir
            $numericPart = intval(substr($lastId, 2));

            // Menambahkan 1 ke bagian numerik
            $newNumericPart = $numericPart + 1;

            // Membuat ID penyakit baru
            $newIdPenyakit = 'PK' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
        }

        // Menambahkan ID penyakit baru ke dalam data
        $data['id_penyakit'] = $newIdPenyakit;

        // Memasukkan data ke dalam database
        return $this->db->insert('penyakit', $data);
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
