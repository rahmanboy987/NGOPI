<?php

class Admin_model extends CI_Model
{
    public function get_session()
    {
        $query = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
        return $query->row_array();
    }

    public function getAllMenu()
    {
        return $this->db->get('produk');
    }

    public function getAllUser()
    {
        return $this->db->get('user');
    }

    public function getAllKeranjang($id)
    {
        $query = $this->db->query("SELECT produk.id_produk, keranjang.id_keranjang, produk.nama_produk, produk.harga_jual, keranjang.jumlah_jual FROM keranjang LEFT JOIN produk ON keranjang.id_barang=produk.id_produk WHERE keranjang.id_user=$id");
        return $query;
    }

    public function getAllPenjualan()
    {
        $query = $this->db->query("SELECT penjualan_keluar.id_keluar, penjualan_keluar.waktu_keluar, user.nama, penjualan_keluar.total_harga FROM penjualan_keluar LEFT JOIN user ON penjualan_keluar.id_user=user.id");
        return $query;
    }

    public function hapusMenu($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
    }

    public function hapusUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function hapusPesanan($id)
    {
        $this->db->where('id_keranjang', $id);
        $this->db->delete('keranjang');
    }

    public function resetPesanan($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('keranjang');
    }
}
