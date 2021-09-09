<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->model('Usuarios_model', 'usuarios');
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: GET, POST, PUT');
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

        $dados_form = $this->input->post();

        if ( !empty($dados_form['login']) && !empty($dados_form['senha']) ) {

            $dados_form = $this->usuarios->autenticate($dados_form['login'], $dados_form['senha']);

            $this->output->set_content_type('application/json')->set_output(json_encode($dados_form));
        }
    }
    
}
