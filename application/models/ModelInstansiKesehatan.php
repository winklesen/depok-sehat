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

    public function simpanInstansiKesehatanIncrement($data = null)
    {
        // Mendapatkan ID instansi terakhir dari database
        $this->db->select('id_instansi');
        $this->db->order_by('id_instansi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('instansi_kesehatan');

        // Jika tidak ada data instansi, kita mulai dengan nomor 1
        if ($query->num_rows() == 0) {
            $newIdInstansi = 'IS0001';
        } else {
            $lastId = $query->row()->id_instansi;
            // Mendapatkan bagian numerik dari ID instansi terakhir
            $numericPart = intval(substr($lastId, 2));

            // Menambahkan 1 ke bagian numerik
            $newNumericPart = $numericPart + 1;

            // Membuat ID instansi baru
            $newIdInstansi = 'IS' . str_pad($newNumericPart, 4, '0', STR_PAD_LEFT);
        }

        // Menambahkan ID instansi baru ke dalam data
        $data['id_instansi'] = $newIdInstansi;

        // Memasukkan data ke dalam database
        return $this->db->insert('instansi_kesehatan', $data);
    }

    public function getLastIdInstansiKesehatan(){
        // Mendapatkan ID instansi terakhir dari database
        $this->db->select('id_instansi');
        $this->db->order_by('id_instansi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('instansi_kesehatan');

        // Jika tidak ada data instansi, kita mulai dengan nomor 1
        if ($query->num_rows() == 0) {
            $newIdInstansi = 'IS0001';
        } else {
            $lastId = $query->row()->id_instansi;
            // Mendapatkan bagian numerik dari ID instansi terakhir
            $numericPart = intval(substr($lastId, 2));

            // Menambahkan 1 ke bagian numerik
            $newNumericPart = $numericPart + 1;

            // Membuat ID instansi baru
            $newIdInstansi = 'IS' . str_pad($newNumericPart, 4, '0', STR_PAD_LEFT);
        }
        return $newIdInstansi;
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
