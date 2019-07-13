<?php 
 
class Model_findme extends CI_Model{

	function get_bydo($no_do){
        $sql = "SELECT * FROM tb_order o join tb_customer c on o.id_customer = c.id_customer
        join tb_driver d on d.id_driver = o.id_driver
        join tb_kendaraan k on d.id_kendaraan = k.id_kendaraan where o.no_do = '{$no_do}'";
        $data = $this->db->query($sql);
        return $data->result();
	}


	function get_detail($id_order){
	    $sql = "SELECT * FROM tb_history h join tb_status s on h.id_status = s.id_status where h.id_order = '{$id_order}'";
        $data = $this->db->query($sql);
        return $data->result();	
	}

}