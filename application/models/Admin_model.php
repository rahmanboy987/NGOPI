<?php

class Admin_model extends CI_Model
{
    public function get_session()
    {
        $query = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
        return $query->row_array();
    }
    public function get_user($id)
    {
        $user_id = $this->user['id'];
        $query = $this->db->query("SELECT * from `user` WHERE id='$user_id' AND pass='$id'");
        return $query->row_array();
    }

    public function get_Menu($id)
    {
        $query = $this->db->get_where('produk', array('id_produk' => $id));
        return $query->row_array();
    }

    public function getAllMenu()
    {
        return $this->db->order_by('jenis_produk', 'ASC')->get('produk');
    }

    public function getAllMenuSum()
    {
        $query = $this->db->query("SELECT SUM(stock_produk) AS total FROM `produk`");
        return $query->row_array();
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

    public function getAllPembelian()
    {
        $query = $this->db->query("SELECT pembelian_masuk.id_masuk, pembelian_masuk.waktu_masuk, user.nama, pembelian_masuk.total_harga, pembelian_masuk.keterangan FROM pembelian_masuk LEFT JOIN user ON pembelian_masuk.id_user=user.id");
        return $query;
    }

    public function getAllPenjualanBanyak()
    {
        $query = $this->db->query("SELECT COUNT(id_user) AS banyak, nama FROM `penjualan_keluar` LEFT JOIN user ON penjualan_keluar.id_user=user.id");
        return $query;
    }

    public function getAllPembelianBanyak()
    {
        $query = $this->db->query("SELECT COUNT(id_user) AS banyak, nama FROM `pembelian_masuk` LEFT JOIN user ON pembelian_masuk.id_user=user.id");
        return $query;
    }

    public function getAllPenjualanSum()
    {
        $query = $this->db->query("SELECT SUM(total_harga) AS totalPenjualan FROM `penjualan_keluar`");
        return $query->row_array();
    }

    public function getAllPembelianSum()
    {
        $query = $this->db->query("SELECT SUM(total_harga) AS totalPembelian FROM `pembelian_masuk`");
        return $query->row_array();
    }

    public function getAllHomeMenu()
    {
        $query = $this->db->query("SELECT menu.id_menu, menu.id_produk, produk.nama_produk, produk.harga_jual FROM `menu` LEFT JOIN produk ON menu.id_produk=produk.id_produk");
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

    public function hapusKeranjang($id)
    {
        $this->db->where('id_keranjang', $id);
        $this->db->delete('keranjang');
    }

    public function hapusPembelian($id)
    {
        $this->db->where('id_masuk', $id);
        $this->db->delete('pembelian_masuk');
    }

    public function hapusPenjualan($id)
    {
        $this->db->where('id_keluar', $id);
        $this->db->delete('penjualan_keluar');

        $this->db->where('id_keluar', $id);
        $this->db->delete('detail_keluar');
    }

    public function resetKeranjang($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('keranjang');
    }

    public function hapusHighlight($id)
    {
        $this->db->where('id_highlight', $id);
        $this->db->delete('highlight');
    }

    public function hapusHomeMenu($id)
    {
        $this->db->where('id_menu', $id);
        $this->db->delete('menu');
    }
}
