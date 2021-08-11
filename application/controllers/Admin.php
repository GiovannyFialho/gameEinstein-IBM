<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("UsuariosModel", "Usuarios");
		$this->load->model("Log");
		
	}
	
	public function index()
	{
		$this->hasActiveSession();
		redirect('admin/login');
	}

	public function login()
	{
		$this->load->view('admin/login/index');	
	}

	public function logar()
	{
		$this->validateRequiredParameters(
			$_POST,
			array(
				'email',
				'senha',
			)
		);

		$email = $this->input->post('email');
		$senha = $this->input->post('senha');

		$this->Usuarios->email = $email;
		$this->Usuarios->senha = $senha;

		$userLogin = $this->Usuarios->loginUser();
		
		$message = "";
		
		if ($userLogin) {
			$this->Usuarios->idUsuario = $userLogin->IdUsuario;
			$user = $this->Usuarios->getUser();

			$allowedIdArea = [];

			$expNome = explode(" ", $user->Nome);
			$fNome = $expNome[0];
			$lNome = end($expNome);
			$user->iniciais = strtoupper($fNome[0]).strtoupper($lNome[0]);
			$user->ip = $_SERVER['REMOTE_ADDR'];
			$user->userAgent = $_SERVER['HTTP_USER_AGENT'];
			$user->allowedIdAreas = $allowedIdArea;
			
			$this->session->set_userdata('userSession', $user);
			$logDetalhes = array(
				"Descrição"             => "Login de usuario",
				array(
					"Usuario ID"        => $user->IdUsuario,
					"Nome"              => $user->Nome,
					"Email"	            => $user->Email,
					"Documento"	        => $user->Documento,
					"Data"	        	=> date("d/m/Y H:i:s")
				)
			);

			$this->Log->registraAuditoria($logDetalhes, 'LOG_TIPO_LOGIN_USUARIO', $user->IdUsuario, null);

			$this->sendJSON(
				array(
					'success' => true
				),
				200
			);
		} else {
			$message = "Email ou senha incorreto. Por favor tente novamente";
		}

		$this->sendJSON(
			array(
				'success' => false,
				'title' => 'Ops',
				'text' => $message
			),
			200
		);
	}

	public function logout()
	{
		session_destroy();

		$this->sendJSON(
			array(
				'success' => true
			),
			200
		);
	}

	public function home()
	{
		$this->hasActiveSession();
		$this->data['title'] = 'Home';
		$this->data['Breadcrumb'] = array('');
		$this->content = "admin/home/index";
		$this->renderer();
	}

}
