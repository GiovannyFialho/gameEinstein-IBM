<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->hasActiveSession();
		$this->load->model("UsuariosModel", "usuarios");
		
		$this->data['scripts'][] = 'usuarios';
		
	}

	public function index()
	{
		$this->rendererSite('site/usuarios/index');
	}

	public function cadastrar() 
	{
		$this->validateRequiredParameters(
			$_POST,
			array(
				'name',
				'email',
				'password'
			)
		);

		$nome = $this->input->post('name');
		$email = $this->input->post('email');
		$senha = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

		$arrayInsert = [
			"name" => $nome,
			"email" => $email,
			"password" => $senha
		];
		
		$resultEmail = $this->usuarios->getUserByEmail($email);
		
		$erro = true;
		if (count($resultEmail) > 0) {
			$message = "Email já cadastrado no sistema.";
		} else {
			$erro = false;
			$usuarioId = $this->usuarios->saveNewUser($arrayInsert);
			
		}
		
		if (!$erro) {
			$this->sendJSON(
				array(
					'success' => true,
					'title' => 'Tudo certo!',
					'message' => 'Novo usuário cadastrado com sucesso'
				),
				200
			);
		} else {
			$this->sendJSON(
				array(
					'success' => false,
					'title' => 'Ops',
					'message' => $message
				),
				400
			);
		}

	}

	public function logar()
	{
		$this->validateRequiredParameters(
			$_POST,
			array(
				'email',
				'password',
			)
		);

		$email = $this->input->post('email');
		$senha = $this->input->post('password');

		$this->usuarios->email = $email;
		$this->usuarios->senha = $senha;

		$userLogin = $this->usuarios->loginUser();
		
		$message = "";
		
		if ($userLogin) {
			$this->usuarios->idUsuario = $userLogin->idUsuario;
			$user = $this->usuarios->getUser();
			$user->ip = $_SERVER['REMOTE_ADDR'];
			$user->userAgent = $_SERVER['HTTP_USER_AGENT'];
			
			$this->session->set_userdata('userSession', $user);

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
				'message' => $message
			),
			200
		);
	}

	public function logout()
	{
		session_destroy();
		
		redirect();

		// $this->sendJSON(
		// 	array(
		// 		'success' => true
		// 	),
		// 	200
		// );
	}

}
