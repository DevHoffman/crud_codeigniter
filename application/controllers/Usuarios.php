<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->route = base_url('/usuarios');
		$this->view = 'usuarios';
		$this->load->model('Selects_model', 'select');
		$this->load->model('Usuarios_model', 'usuario');
		header('Access-Control-Allow-Origin: http://localhost:3000');
		header("Access-Control-Allow-Headers: *");
	}

	public function index() {

		$usuarioSessao = $this->select->session_start();

		$page_title = "Teste_PHP - Usuários";
		$data['header'] = $this->template->header([ 
			'title' 	=> $page_title,
			'styles' 	=> [
				base_url(THIRD_PARTY . "datatables/datatables.min.css"),
				base_url(THIRD_PARTY . "jquery-confirm/jquery-confirm.min.css")
			]
		]);
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
		$data['scripts'] = $this->template->scripts([
			'scripts'	=> 	[
				base_url(THIRD_PARTY . "datatables/pdfmake.min.js"),
				base_url(THIRD_PARTY . "datatables/vfs_fonts.js"),
				base_url(THIRD_PARTY . "datatables/datatables.min.js"),
				base_url(THIRD_PARTY . "jquery-confirm/jquery-confirm.min.js")
			]
		]);

		$data['h1'] = "Lista de Usuários";
		$data['usuarioNivelAcesso'] = $usuarioSessao['CodiNivelAcesso'];
		$data['datatables'] = "{$this->route}/datatables";
		$data['url_detalhes'] = "{$this->route}/detalhes/";
		$data['url_delete'] = "{$this->route}/remove/";
		$data['url_insert'] = "{$this->route}/insert/";

		$this->load->view( $this->view . '/usuarios', $data);
	}

	public function datatables() {

		$datatables = $this->datatable->exec(
			$this->input->get(),
			'tbl_usuarios U',
			[
				['db' => 'U.CodiUsuario', 'dt' => 'CodiUsuario'],
				['db' => 'U.Usuario', 'dt' => 'Usuario'],
				['db' => 'U.Login', 'dt' => 'Login'],
				['db' => 'U.Email', 'dt' => 'Email'],
				['db' => 'N.NivelAcesso', 'dt' => 'NivelAcesso'],
			],
			[
				['tbl_nivelacesso N', "N.CodiNivelAcesso = U.CodiNivelAcesso"]
			],
			// "CodiUsuario <> {$this->session->CodiUsuario} AND U.CodiNivelAcesso <> 1"
			"CodiUsuario <> {$this->session->CodiUsuario}"
		);

		$this->output->set_content_type('application/json')->set_output(json_encode($datatables));
	}

	public function remove($codiusuario){

		$dados_form = $this->usuario->remove($codiusuario);

		$this->output->set_content_type('application/json')->set_output(json_encode($dados_form));
	}

    public function insert(){

        $dados_form = $this->input->post();

        // Regras de Validação
        $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('login', 'login', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email','email','trim|required|min_length[3]|valid_email');
        $this->form_validation->set_rules('senha','senha','trim|required|min_length[8]');
        $this->form_validation->set_rules('senha2','senha','trim|required|min_length[8]|matches[senha]');

        if ( !empty($dados_form['login']) && !empty($dados_form['senha']) && !empty($dados_form['senha2'])  ) {

        	if (!isset($dados_form['admin'])){
        		$dados_form['admin'] = 0;
        	}

            $dados_form = $this->usuario->create_account($dados_form['login'], $dados_form['senha'], $dados_form['senha2'], $dados_form['name'], $dados_form['email'], $dados_form['admin']);

            $this->output->set_content_type('application/json')->set_output(json_encode($dados_form));
        }
    }

	public function update() {
		
		$dados_form = $this->input->post();

		if ( !empty($_FILES['arquivo']) ){
			$dados_form['Foto'] = $_FILES['arquivo'];
		}
		else {
			$dados_form['Foto'] = null;
		}

		$dados_form = $this->usuario->update_perfil($dados_form['codiusuario'], $dados_form['name'], $dados_form['email'], $dados_form['login'], $dados_form['senha'], $dados_form['senha2'], $dados_form['Foto']);
		$this->output->set_content_type('application/json')->set_output(json_encode($dados_form));
	}

	public function detalhes($id_usuario) {

		$usuarioSessao = $this->select->session_start();
		if ( $usuarioSessao['CodiNivelAcesso'] != 1 ) { echo 'Acesso Negado'; exit(); }

		$page_title = "Mablix - Usuários";
		$data['header'] = $this->template->header([ 
			'title' 	=> $page_title,
			'styles' 	=> [
				base_url(THIRD_PARTY . "datatables/datatables.min.css"),
				base_url(THIRD_PARTY . "jquery-confirm/jquery-confirm.min.css")
			]
		]);
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
		$data['scripts'] = $this->template->scripts([
			'scripts'	=> 	[
				base_url(THIRD_PARTY . "datatables/pdfmake.min.js"),
				base_url(THIRD_PARTY . "datatables/vfs_fonts.js"),
				base_url(THIRD_PARTY . "datatables/datatables.min.js"),
				base_url(THIRD_PARTY . "jquery-confirm/jquery-confirm.min.js")
			]
		]);

		$data['h1'] = "Edição de Usuários";
		$data['datatables'] = "{$this->route}/datatables";
		$data['url_delete'] = "{$this->route}/remove/";
		$data['url_insert'] = "{$this->route}/insert/";
		$data['url_update'] = "{$this->route}/update/";
		$data['url_detalhes'] = "{$this->route}/detalhes/";

		$data['dados'] = $this->select->findById('CodiUsuario, Usuario, Login, Email, CodiNivelAcesso, Foto', 'tbl_usuarios', array('CodiUsuario' => $id_usuario));

		$this->load->view( $this->view . "/detalhes", $data);
	}

}
