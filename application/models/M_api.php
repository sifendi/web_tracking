<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_api extends CI_Model {

	public function login($username, $password)
	{
		$query =$this->db->query("Select * from admin where username = '$username'");
		if ($query->num_rows()== 1) {
			foreach ($query->result() as $data) {
				$password_db = $data->password;
				if ($password_db == md5($password)) {
					return true;
					# code...
				}else{
					return false;
				}
			}
		}else{
			return false;
		}
	}



}