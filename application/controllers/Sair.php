<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sair extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Selects_model', 'select');
	}

	public function index() {
		$this->select->session_exit();
		redirect('/', 'redirect');
	}

}
