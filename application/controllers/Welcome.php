<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Model_findme');
		$this->load->helper('url');

	}


	public function index()
	{
		$this->load->helper('url');
		$this->load->view('portal');
	}

	public function find_status(){
		$nama = $this->input->post('bantu');
		$out = $this->Model_findme->get_bydo($nama);

		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($out));	
    }

    public function get_detail($id_order){
    	$output = $this->Model_findme->get_detail($id_order);
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($output));	
    }



    public function login(){
		$this->load->view('login');
    }
	


	public function create_order(){
		// $data['id_order'] = $this->input->post('id_order');
		$data['nama_pengirim'] = $this->input->post('nama_pengirim');
		$data['no_tlp_pengirim'] = $this->input->post('no_tlp_pengirim');
		$data['kota_muat'] = $this->input->post('kota_muat');
		$data['kota_tujuan'] = $this->input->post('kota_tujuan');
		$data['no_do'] = $this->input->post('no_do');
		$data['tanggal_order'] = $this->input->post('tanggal_order');
		$data['tanggal_selesai_order'] = $this->input->post('tanggal_selesai_order');
		$data['ukuran'] = $this->input->post('ukuran');
		$data['berat'] = $this->input->post('berat');
		$data['id_jenis_pengiriman'] = $this->input->post('id_jenis_pengiriman');
		$data['id_jenis_container'] = $this->input->post('id_jenis_container');
		$data['id_jadwal_kapal']	 = $this->input->post('id_jadwal_kapal');

		$config = [
					    [
					            'field' => 'nama_pengirim',
					            'label' => 'Nama Pengirim',
					            'rules' => 'required|min_length[3]',
					            'errors' => [
					                    'required' => 'We need both Nama Pengirim',
					                    'min_length' => 'Minimum Nama Pengirim length is 3 characters',
					            ],
					    ],
					    [
					            'field' => 'no_tlp_pengirim',
					            'label' => 'No Telpohonne',
					            'rules' => 'required|min_length[6]',
					            'errors' => [
					                    'required' => 'You must provide a No Telp.',
					                    'min_length' => 'Minimum No Telp length is 6 characters',
					            ],
					    ],
					];


		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($config);
		$result_json = [];
		$status = 0;
		if($this->form_validation->run()==FALSE){
		    $this->form_validation->error_array();
		    $result_json['success'] = false;
		    $result_json['message'] = $this->form_validation->error_array();
		    $status = 400;

		}else{
		    $save = $this->Model_findme->savefromcustomer($data);
		    if ($save == 1) {
			    $result_json['success'] = true;
			    $result_json['message'] = 'Berhasil';
			    $status = 200;
	        }else{
			    $result_json['success'] = false;
			    $result_json['message'] = 'Internal Server Error';
			    $status = 500;
	        }
		}

		$this->output
			->set_status_header($status)
			->set_content_type('application/json')
			->set_output(json_encode($result_json));

	}

}
