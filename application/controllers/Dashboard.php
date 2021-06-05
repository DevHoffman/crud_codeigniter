<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Selects_model', 'select');
	}

	public function index() {

		$usuarioSessao = $this->select->session_start();

		$page_title = "Teste_PHP - Dashboard";
		$data['header'] = $this->template->header([ 'title' => $page_title ]);
		$data['navbar']  = $this->template->navbar(
			[
				'usuarioFistName' => $usuarioSessao['FistName'],
				'usuarioNome' => $usuarioSessao['Name'],
				'usuarioFoto' => $usuarioSessao['Foto'],
				'usuarioLogin' => $usuarioSessao['Login'],
				'usuarioEmail' => $usuarioSessao['Email'],
				'usuarioFistLetra' => $usuarioSessao['FistLetra']
			]
		);
		$data['footer'] = $this->template->footer();
		$data['scripts'] = $this->template->scripts();

		$this->load->view('dashboard', $data);

	}
}
