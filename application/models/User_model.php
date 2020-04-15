<?php

class User_model extends CI_Model
{
    public function getAllUser()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function hapusUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}
