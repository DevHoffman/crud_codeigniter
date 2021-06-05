<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Redefinir extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->model('Usuarios_model', 'usuario');
        $this->load->model('SendMail_model', 'sendmail');
	}

	public function index() {

		$page_title = "Teste_PHP - Redefinir";
		$data['header'] = $this->template->header([ 'title' => $page_title ]);
		$data['footer'] = $this->template->footer();
		$data['scripts'] = $this->template->scripts();

        // Formulário de Acesso
        $data['atributos_form_redefinir'] = array(
            'id'            =>      'formredefinir',
            'novalidate'    =>      'novalidate'
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

		$data['h3'] 			= 'Redefinir Senha';
		$data['h1'] 			= 'Receba o Código em seu email';
        $data['Link1']          = base_url();
		$data['Texto_Link1'] 	= 'Clique aqui e autentique-se';
        $data['Link2']          = base_url('cadastrar');
		$data['Texto_Link2'] 	= 'Clique aqui e cadastre-se';
		$data['Botao'] 			= 'Encaminhar Código';

		//Carrega View
		$this->load->view('usuarios/redefinir', $data);

	}

	public function get_code()
	{
		
		$dados_form = $this->input->post();

        $this->form_validation->set_rules('email','email','trim|required|min_length[3]|valid_email');

        if ( isset($dados_form['email']) ) {

        	$dados_form = $this->sendmail->get_code($dados_form['email']);
        
        }

		$this->output->set_content_type('application/json')->set_output(json_encode($dados_form));

	}

	public function update_password() {

		$page_title = "Teste_PHP - Redefinir";
		$data['header'] = $this->template->header([ 'title' => $page_title ]);
		$data['footer'] = $this->template->footer();
		$data['scripts'] = $this->template->scripts();

        // Formulário de Acesso
        $data['atributos_form_redefinir'] = array(
            'id'            =>      'formredefinir',
            'novalidate'    =>      'novalidate'
        );

        $data['atributos_email'] = array(
                'type'          =>      'text',
                'id'            =>      'number',
                'name'          =>      'number',
                'minlength'     =>      '3',
                'required'      =>      '',
                'placeholder'   =>      'Insira o código',
                'aria-required' =>      'true',
                'class'         =>      'full-width'
        );

		$data['h3'] 			= 'Redefinir Senha';
		$data['h1'] 			= 'Insira o código enviado por email';
		$data['Link1'] 			= base_url();
		$data['Texto_Link1'] 	= 'Clique aqui e autentique-se';
		$data['Link2'] 			= base_url('cadastrar');
		$data['Texto_Link2'] 	= 'Clique aqui e cadastre-se';
		$data['Botao'] 			= 'Validar Código';

		//Carrega View
		$this->load->view('usuarios/redefinir', $data);

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

}
