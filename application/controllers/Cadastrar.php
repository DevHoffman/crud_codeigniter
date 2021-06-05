<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastrar extends CI_Controller {

	function __construct() {
		parent::__construct();
		// $this->load->model('Selects_model', 'select');
        $this->load->model('Usuarios_model', 'usuario');
	}

	public function index() {

		$page_title = "Teste_PHP - Cadastrar";
		$data['header'] = $this->template->header([ 'title' => $page_title ]);
		$data['footer'] = $this->template->footer();
		$data['scripts'] = $this->template->scripts();

        // Formulário de Acesso
        $data['atributos_form_login'] = array(
            'id'            =>      'formcadastro',
            'novalidate'    =>      'novalidate'
        );

		$data['atributos_name'] = array(
		        'id'            =>      'name',
		        'name'          =>      'name',
		        'minlength'     =>      '3',
		        'required'      =>      '',
		        'placeholder'   =>      'Seu Nome',
		        'aria-required' =>      'true',
		        'class'         =>      'full-width'
		);

        $data['atributos_email'] = array(
                'type'          =>      'email',
                'id'            =>      'email',
                'name'          =>      'email',
                'minlength'     =>      '3',
                'required'      =>      '',
                'placeholder'   =>      'Seu Email',
                'aria-required' =>      'true',
                'class'         =>      'full-width'
        );

		$data['atributos_login'] = array(
            'name'          =>      'login',
            'minlength'     =>      '3',
            'required'      =>      '',
            'placeholder'   =>      'Login',
            'aria-required' =>      'true',
            'class'         =>      'full-width'
		);

		$data['atributos_senha'] = array(
            'name'          =>      'senha',
            'minlength'     =>      '8',
            'required'      =>      '',
            'placeholder'   =>      'Senha',
            'aria-required' =>      'true',
            'class'         =>      'full-width error'
		);

		$data['atributos_senha2'] = array(
            'name'          =>      'senha2',
            'minlength'     =>      '8',
            'required'      =>      '',
            'placeholder'   =>      'Confirme sua Senha',
            'aria-required' =>      'true',
            'class'         =>      'full-width'
		);

        $data['h3'] = 'Cadastrar Usuários';
        $data['h1'] = 'Cadastre-se por aqui!';
        $data['Link1']          = base_url('redefinir');
        $data['Texto_Link1']    = 'Esqueceu sua senha?';
        $data['Link2']          = base_url();
        $data['Texto_Link2']    = 'Já é cadastrado? Autentique-se';

		$this->load->view('usuarios/cadastrar', $data);
        
	}

    public function insert(){

        $dados_form = $this->input->post();

        // Regras de Validação
        $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('login', 'login', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email','email','trim|required|min_length[3]|valid_email');
        $this->form_validation->set_rules('senha','senha','trim|required|min_length[8]');
        $this->form_validation->set_rules('senha2','senha','trim|required|min_length[8]|matches[senha]');

        if ( !empty($dados_form['name']) && !empty($dados_form['email']) && !empty($dados_form['login']) && !empty($dados_form['senha']) && !empty($dados_form['senha2'])  ) {

            if (!isset($dados_form['admin'])){
                $dados_form['admin'] = 0;
            }

            $dados_form = $this->usuario->create_account($dados_form['login'], $dados_form['senha'], $dados_form['senha2'], $dados_form['name'], $dados_form['email'], $dados_form['admin']);

            $this->output->set_content_type('application/json')->set_output(json_encode($dados_form));
        }
    }
}
