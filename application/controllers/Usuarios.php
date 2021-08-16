<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->hasActiveSession();
		$this->load->model("UsuariosModel", "usuarios");
		
		$this->data['title'] = 'Cadastro';
		
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
				'nickname',
				'cargo'
			)
		);

		$nome = $this->input->post('name');
		$email = $this->input->post('email');
		$nickname = $this->input->post('nickname');
		$cargo = $this->input->post('cargo');

		$arrayInsert = [
			"name" => $nome,
			"email" => $email,
			"nickname" => $nickname,
			"cargo" => $cargo,
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
			)
		);

		$email = $this->input->post('email');

		$this->usuarios->email = $email;

		$userLogin = $this->usuarios->loginUser(false);
		
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
