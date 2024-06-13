<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    public function getUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function userWhere($where)
    {
        return $this->db->get_where('user', $where);
    }

    public function getLastIdUser()
    {
        // Mendapatkan ID user terakhir dari database
        $this->db->select('id_user');
        $this->db->order_by('id_user', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('user');

        // Jika tidak ada data user, kita mulai dengan nomor 1
        if ($query->num_rows() == 0) {
            $newIdUser = 'USR001';
        } else {
            $lastId = $query->row()->id_user;
            // Mendapatkan bagian numerik dari ID user terakhir
            $numericPart = intval(substr($lastId, 3));

            // Menambahkan 1 ke bagian numerik
            $newNumericPart = $numericPart + 1;

            // Membuat ID user baru
            $newIdUser = 'USR' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
        }
        return $newIdUser;
    }


    public function simpanUserIncrement($data = null)
    {
        // Mendapatkan ID user terakhir dari database
        $this->db->select('id_user');
        $this->db->order_by('id_user', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('user');

        // Jika tidak ada data user, kita mulai dengan nomor 1
        if ($query->num_rows() == 0) {
            $newIdUser = 'USR001';
        } else {
            $lastId = $query->row()->id_user;
            // Mendapatkan bagian numerik dari ID user terakhir
            $numericPart = intval(substr($lastId, 3));

            // Menambahkan 1 ke bagian numerik
            $newNumericPart = $numericPart + 1;

            // Membuat ID user baru
            $newIdUser = 'USR' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
        }

        // Menambahkan ID user baru ke dalam data
        $data['id_user'] = $newIdUser;

        // Memasukkan data ke dalam database
        return $this->db->insert('user', $data);
    }

    public function simpanUser($data = null)
    {
        $this->db->insert('user', $data);
    }

    public function updateUserProfile($data = null, $where = null)
    {
        $this->db->update('user', $data, $where);
    }

    public function updateUser($id_user, $data)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->update('user', $data);
    }

    public function deleteUser($id_user)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->delete('user');
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function getUserById($id_user)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.id_user', $id_user);
        return $this->db->get()->row_array();
    }


    public function cekUserAccess($where = null)
    {
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);
        return $this->db->get();
    }

    public function getAllInstansi()
    {
        return $this->db->get('instansi_kesehatan')->result_array();
    }
}