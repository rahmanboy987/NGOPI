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

    public function getSchedule()
    {
        return $this->db->get('schedule');
    }
}
