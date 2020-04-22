<?php

class Admin_model extends CI_Model
{
    public function get_session()
    {
        $query = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
        return $query->row_array();
    }

    public function getAllUser()
    {
        return $this->db->get('user');
    }

    public function hapusUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}
