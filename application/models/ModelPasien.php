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

    public function getLastIdPasien(){
        // Mendapatkan ID pasien terakhir dari database
        $this->db->select('id_pasien');
        $this->db->order_by('id_pasien', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pasien');

        // Jika tidak ada data pasien, kita mulai dengan nomor 1
        if ($query->num_rows() == 0) {
            $newIdPasien = 'PS00000001';
        } else {
            $lastId = $query->row()->id_pasien;
            // Mendapatkan bagian numerik dari ID pasien terakhir
            $numericPart = intval(substr($lastId, 2));

            // Menambahkan 1 ke bagian numerik
            $newNumericPart = $numericPart + 1;

            // Membuat ID pasien baru
            $newIdPasien = 'PS' . str_pad($newNumericPart, 8, '0', STR_PAD_LEFT);
        }
        return $newIdPasien;
    }

    
    public function simpanPasienIncrement($data = null)
    {
        // Mendapatkan ID pasien terakhir dari database
        $this->db->select('id_pasien');
        $this->db->order_by('id_pasien', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pasien');

        // Jika tidak ada data pasien, kita mulai dengan nomor 1
        if ($query->num_rows() == 0) {
            $newIdPasien = 'PS00000001';
        } else {
            $lastId = $query->row()->id_pasien;
            // Mendapatkan bagian numerik dari ID pasien terakhir
            $numericPart = intval(substr($lastId, 2));

            // Menambahkan 1 ke bagian numerik
            $newNumericPart = $numericPart + 1;

            // Membuat ID pasien baru
            $newIdPasien = 'PS' . str_pad($newNumericPart, 8, '0', STR_PAD_LEFT);
        }

        // Menambahkan ID pasien baru ke dalam data
        $data['id_pasien'] = $newIdPasien;

        // Memasukkan data ke dalam database
        return $this->db->insert('pasien', $data);
    }

    public function simpanPasien($data = null)
    {
        return $this->db->insert('pasien', $data);
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
        $this->db->select('pasien.*, kecamatan.nama_kecamatan');
        $this->db->from('pasien');
        $this->db->join('kecamatan', 'pasien.id_kecamatan = kecamatan.id_kecamatan');
        $this->db->limit(15); // Batasan 15 entri
        return $this->db->get()->result_array();
    }

    // Mendapatkan data pasien berdasarkan ID pasien beserta informasi nama kecamatan
    public function getPasienById($id_pasien)
    {
        $this->db->select('pasien.*, kecamatan.nama_kecamatan');
        $this->db->from('pasien');
        $this->db->join('kecamatan', 'pasien.id_kecamatan = kecamatan.id_kecamatan');
        $this->db->where('pasien.id_pasien', $id_pasien);
        return $this->db->get()->row_array();
    }

    public function getAllKecamatan()
    {
        return $this->db->get('kecamatan')->result_array();
    }

    public function updatePasien($id_pasien, $data)
    {
        $this->db->where('id_pasien', $id_pasien);
        return $this->db->update('pasien', $data);
    }

    public function searchPasien($keyword)
    {
        // Menentukan kolom yang ingin dicari
        $this->db->select('pasien.*, kecamatan.nama_kecamatan');
        $this->db->from('pasien');
        $this->db->join('kecamatan', 'pasien.id_kecamatan = kecamatan.id_kecamatan');
        $this->db->group_start(); // Open a parenthesis for grouping OR conditions
        $this->db->like('pasien.id_pasien', $keyword);

        $this->db->or_like('pasien.nama', $keyword);
        $this->db->or_like('pasien.tanggal_lahir', $keyword);
        $this->db->or_like('pasien.alamat', $keyword);
        $this->db->or_like('pasien.info_kontak', $keyword);
        $this->db->or_like('kecamatan.nama_kecamatan', $keyword);
        $this->db->or_like('pasien.created_at', $keyword);
        $this->db->group_end(); // Close the parenthesis for grouping OR conditions

        // Mengambil data dari tabel 'acara'
        return $this->db->get();
    }
}
