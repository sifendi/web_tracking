<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_findme');
        $this->load->library('session');
    }

    public function index() {
        
    }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */