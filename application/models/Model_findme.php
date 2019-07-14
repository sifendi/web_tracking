<?php 
 
class Model_findme extends CI_Model{

	function get_bydo($no_do){
        $sql = "SELECT * FROM tb_order o
        join tb_jenis_pengiriman p on o.id_jenis_pengiriman = p.id_jenis_pengiriman
        join tb_jadwal_kapal kap on o.id_jadwal_kapal = kap.id_jadwal_kapal
        join tb_jenis_container con on o.id_jenis_container = con.id_jenis_container
         where o.no_do = '{$no_do}'";
        $data = $this->db->query($sql);
        return $data->result();
	}


	function get_detail($id_order){
	    $sql = "SELECT * FROM tb_history h join tb_status s on h.id_status = s.id_status where h.id_order = '{$id_order}'";
        $data = $this->db->query($sql);
        return $data->result();	
	}

	public function savefromcustomer($data){
        $sql = "INSERT INTO tb_order VALUES
        ('',
        '" . $data['nama_pengirim'] . "',
        '" . $data['no_tlp_pengirim'] . "',
        '" . $data['kota_muat'] . "',
        '" . $data['kota_tujuan'] . "',

        '" . $data['no_do'] . "',
        '" . $data['tanggal_order'] . "',
        '" . $data['tanggal_selesai_order'] . "',
        '" . $data['ukuran'] . "',
        '" . $data['berat'] . "',
        '" . $data['id_jenis_pengiriman'] . "',
        '" . $data['id_jenis_container'] . "',
        '" . $data['id_jadwal_kapal'] . "')";
        $this->db->query($sql);
        $hasil = $this->db->affected_rows();
        return $hasil;
    }


}