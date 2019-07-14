<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	require_once APPPATH.'libraries/jwt/src/JWT.php';
	use \Firebase\JWT\JWT;

class Api extends CI_Controller{

	public function login(){
		$key = 'interview';

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('M_api');		
		$id = $this->M_api->login($username, $password);
		$token = array();
		$status = 0;

		if ($id != false) {
			$token['id'] = $id;
			$token['status'] = true;
			$status = 200;
			$token['username'] = $username;
			$token['token'] = JWT::encode($token, $key);
			$output = $token;
		}else{
			$status = 401;
			$output['errors'] = '{"type" : "invalid"}';
		}


		$this->output
			->set_status_header($status)
			->set_content_type('application/json')
			->set_output(json_encode($output));


	}
	

}