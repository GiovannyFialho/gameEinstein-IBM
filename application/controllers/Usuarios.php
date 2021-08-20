<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->hasActiveSession();

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.kinghost.net',
			'smtp_port' => 587,
			'smtp_user' => 'no_reply@desafiomundohibrido.com',
			'smtp_pass' => 'IBMdesafiomundo2021',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1'
		);

		$this->load->model("UsuariosModel", "usuarios");
		$this->load->library('email', $config);
		
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
				'password'
			)
		);

		$nome = $this->input->post('name');
		$email = $this->input->post('email');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

		$arrayInsert = [
			"name" => $nome,
			"email" => $email,
			"password" => $password,
		];
		
		$resultEmail = $this->usuarios->getUserByEmail($email);
		
		$erro = true;
		if (count($resultEmail) > 0) {
			$message = "Email já cadastrado no sistema.";
		} else {
			$erro = false;
			$usuarioId = $this->usuarios->saveNewUser($arrayInsert);
			
			$this->email->from('no_reply@desafiomundohibrido.com', 'IBM');
			$this->email->to($email);
			
			$this->email->subject('Vamos iniciar o Desafio de Conhecimento!');
			$this->email->message('Testing the email class.');
			
			$this->email->send();
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
				'password'
			)
		);

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$this->usuarios->email = $email;
		$this->usuarios->senha = $password;

		$userLogin = $this->usuarios->loginUser();
		
		$message = "";
		
		if ($userLogin) {
			if($userLogin->finishGame == 0){
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
			}else{
				$message = "Seu usuário já participou do desafio. Você só pode participar do desafio 1 vez!";
			}
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
		
		redirect('game/ranking');

		// $this->sendJSON(
		// 	array(
		// 		'success' => true
		// 	),
		// 	200
		// );
	}

	public function registrarParticipacao()
	{
		if($this->session->userSession){
			$this->usuarios->idUsuario = $this->session->userSession->idUsuario;
			$user = $this->usuarios->updateUser(array('finishGame' => 1));

			$this->sendJSON(
				array(
					'success' => true
				),
				200
			);
		}else{
			$this->sendJSON(
				array(
					'success' => false,
					'title' => 'Ops',
					'message' => 'Nenhum usuário logado'
				),
				200
			);
		}
	}
}
