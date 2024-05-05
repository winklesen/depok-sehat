<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelRekamMedis extends CI_Model
{
    public function getRekamMedis()
    {
        return $this->db->get('rekam_medis');
    }
    public function rekamMedisWhere($where)
    {
        return $this->db->get_where('rekam_medis', $where);
    }

    public function simpanRekamMedisIncrement($data = null)
    {
        // Mendapatkan ID instansi terakhir dari database
        $this->db->select('id_rekam_medis');
        $this->db->order_by('id_rekam_medis', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('rekam_medis');


        if ($query->num_rows() == 0) {
            $newIdRekamMedis = 'IS0001';
        } else {
            $lastId = $query->row()->id_rekam_medis;

            $numericPart = intval(substr($lastId, 2));


            $newNumericPart = $numericPart + 1;


            $newIdRekamMedis = 'IS' . str_pad($newNumericPart, 4, '0', STR_PAD_LEFT);
        }

        $data['id_rekam_medis'] = $newIdRekamMedis;

        return $this->db->insert('rekam_medis', $data);
    }

    // public function getLastIdRekamMedis()
    // {
    //     // Mendapatkan ID instansi terakhir dari database
    //     $this->db->select('id_rekam_medis');
    //     $this->db->order_by('id_rekam_medis', 'DESC');
    //     $this->db->limit(1);
    //     $query = $this->db->get('rekam_medis');

    //     // Jika tidak ada data instansi, kita mulai dengan nomor 1
    //     if ($query->num_rows() == 0) {
    //         $newIdRekamMedis = 'IS0001';
    //     } else {
    //         $lastId = $query->row()->id_rekam_medis;
    //         // Mendapatkan bagian numerik dari ID instansi terakhir
    //         $numericPart = intval(substr($lastId, 2));

    //         // Menambahkan 1 ke bagian numerik
    //         $newNumericPart = $numericPart + 1;

    //         // Membuat ID instansi baru
    //         $newIdRekamMedis = 'IS' . str_pad($newNumericPart, 4, '0', STR_PAD_LEFT);
    //     }
    //     return $newIdRekamMedis;
    // }

    public function simpanRekamMedis($data = null)
    {
        $this->db->insert('rekam_medis', $data);
    }
    public function updateRekamMedis($data = null, $where = null)
    {
        $this->db->update('rekam_medis', $data, $where);
    }
    public function hapusRekamMedis($where = null)
    {
        $this->db->delete('rekam_medis', $where);
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('rekam_medis');
        return $this->db->get()->row($field);
    }

    public function getRekamMedisLimit()
    {
        $this->db->limit(15);
        return $this->db->get('rekam_medis');
    }
}
