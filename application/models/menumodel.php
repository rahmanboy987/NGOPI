<?php 

class Menumodel extends CI_Model{
	function tampil_menu(){
		$query = $this->db->get('menu');
		return $query->result_array();
	}

	public function daftar(){
	$temp1=$this->session->userdata('keranjang');
	$no =1;
	foreach ($temp1 as $temp2) :
		$this->db->select('menu.*');
		$this->db->from('menu');
		$this->db->where(['id_menu'=> $temp2]);
		$query = $this->db->get()->result_array();
		if ($no = 1){
			$list[] = $query;
			$no = $no + 1;
		}else {
			array_push($list, $query);
		}
	endforeach;
	return $list;
}
}