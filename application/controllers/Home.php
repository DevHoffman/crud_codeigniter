<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->model('Usuarios_model', 'usuarios');
        header('Access-Control-Allow-Origin: http://localhost:3000');
        header("Access-Control-Allow-Headers: *");
    }

	public function index() {

        $page_title = "Teste PHP - Login";
        $data['header'] = $this->template->header([ 'title' => $page_title ]);
        $data['scripts'] = $this->template->scripts();
        $data['footer'] = $this->template->footer();

        // Formulário de Acesso
        $data['atributos_form_login'] = array(
            'id'            =>      'formlogin',
            'novalidate'    =>      'novalidate'
        );

		$data['atributos_login'] = array(
            'type'          =>      'text',
            'name'          =>      'login',
            'minlength'     =>      '3',
            'required'      =>      '',
            'placeholder'   =>      'Login',
            'aria-required' =>      'true',
            'class'         =>      'full-width',
            'autofocus' => 'autofocus'
		);

		$data['atributos_senha'] = array(
            'name'          =>      'senha',
            'minlength'     =>      '8',
            'required'      =>      '',
            'placeholder'   =>      'Senha',
            'aria-required' =>      'true',
            'class'         =>      'full-width'
		);

		$data['h3'] = 'Acesse o Painel';
		$data['h1'] = 'Use suas Credenciais';
        $data['Link1']          = base_url('redefinir');
        $data['Texto_Link1']    = 'Esqueceu sua senha?';
        $data['Link2']          = base_url('cadastrar');
        $data['Texto_Link2']    = 'Clique aqui e cadastre-se';

		//Carrega View
		$this->load->view('home', $data);
	}

    public function autenticate() {
        // $dados_form = $this->input->post();
        $dados_form = json_decode(file_get_contents('php://input'), true); // Toda vez que receber como json

        // Regras de Validação
        $this->form_validation->set_rules('login', 'login', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('senha','senha','trim|required|min_length[8]');

        if ( !empty($dados_form['login']) && !empty($dados_form['senha']) ) {

            $dados_form = $this->usuarios->autenticate($dados_form['login'], $dados_form['senha']);

            $data = [
                "userdata" => $dados_form,
                "sessionData" => $this->session->userdata()
            ];

            //$this->output->set_content_type('application/json')->set_output(json_encode(["userdata" => $dados_form, "sessionData" => $this->session->get_user_data()]));
            $this->output->set_status_header(200)
                            ->set_content_type('application/json')
                            ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        }
    }

    public function autenticate2() {

        $dados_form = $this->input->post();

        if ( !empty($dados_form['login']) && !empty($dados_form['senha']) ) {

            $dados_form = $this->usuarios->autenticate2($dados_form['login'], $dados_form['senha']);
            $this->output->set_content_type('application/json')->set_output(json_encode($dados_form));
        }
        else {
            $this->output->set_content_type('application/json')->set_output(json_encode($dados_form));
        }
    }
    
}
