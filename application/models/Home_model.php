<?php
class Home_model extends CI_Model
{
    public function warkop_settings()
    {
        $query = $this->db->get_where('warkop_settings', ['id' => 1]);
        return $query->row_array();
    }

    public function getHighlight()
    {
        return $this->db->get('highlight');
    }

    function tampil_menu()
    {
        $query = $this->db->query("SELECT menu.id_menu, produk.nama_produk, produk.harga_jual FROM `menu` LEFT JOIN produk ON menu.id_produk=produk.id_produk");
        return $query;
    }

    public function getSchedule()
    {
        return $this->db->get('schedule');
    }
}
