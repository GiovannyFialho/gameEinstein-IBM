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
			'charset'   => 'utf-8'
		);

		$this->load->model("UsuariosModel", "usuarios");
		$this->load->library('email', $config);
		
		$this->data['title'] = 'Cadastro';
		
	}

	public function index()
	{
		$this->rendererSite('site/usuarios/index');
	}

	public function esqueciMinhaSenha()
	{
		$this->data['title'] = 'Esqueci Minha Senha.';
		$this->rendererSite('site/usuarios/esqueciMinhaSenha');
	}

	public function emailEsqueciMinhaSenha() 
	{
		$this->validateRequiredParameters(
			$_POST,
			array(
				'email'
			)
		);

		$email = $this->input->post('email');
		
		$resultEmail = $this->usuarios->getUserByEmail($email);
		
		$erro = true;
		if (count($resultEmail) == 0) {
			$message = "E-mail não foi cadastrado no sistema.";
		} else {
			$erro = false;
			$this->data['linkBtn'] = base_url('usuarios/formEsqueciMinhaSenha/?email='.$email);
			
			$this->email->from('no_reply@desafiomundohibrido.com', 'IBM');
			$this->email->to($email);
			
			$this->email->subject('Esqueci minha senha.');
			$this->email->message($this->data['linkBtn']);
			
			$this->email->send();
		}
		
		if (!$erro) {
			$this->sendJSON(
				array(
					'success' => true,
					'title' => 'E-mail enviado!',
					'message' => 'Verifique sua caixa de e-mail para fazer a troca da sua senha.'
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

	public function formEsqueciMinhaSenha()
	{
		$this->data['title'] = 'Esqueci Minha Senha.';
		$this->rendererSite('site/usuarios/formEsqueciMinhaSenha');
	}

	public function trocarSenha()
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
		
		$resultEmail = $this->usuarios->getUserByEmail($email);
		$this->usuarios->idUsuario 	= $resultEmail[0]->idUsuario;
		$this->usuarios->senha 		= $password;

		if($this->usuarios->changePassword())
		{
			$this->sendJSON(
				array(
					'success' => true,
					'title' => 'Tudo certo!',
					'message' => 'Senha trocada com sucesso'
				),
				200
			);
		}else{
			$this->sendJSON(
				array(
					'success' => false,
					'title' => 'Ops',
					'message' => 'Não foi possível trocar a senha do usuário.'
				),
				400
			);
		}
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
		$hash = password_hash($email, PASSWORD_DEFAULT);

		$arrayInsert = [
			"name" => $nome,
			"email" => $email,
			"password" => $password,
			"hash" => $hash,
		];
		
		$resultEmail = $this->usuarios->getUserByEmail($email);
		
		$erro = true;
		if (count($resultEmail) > 0) {
			$message = "Email já cadastrado no sistema.";
		} else {
			$erro = false;
			$usuarioId = $this->usuarios->saveNewUser($arrayInsert);
			$this->data['linkBtn'] = base_url('game/login/?hash='.$hash);
			
			$this->email->from('no_reply@desafiomundohibrido.com', 'IBM');
			$this->email->to($email);
			
			$this->email->subject('Vamos iniciar o Desafio de Conhecimento!');
			$this->email->message($this->load->view('site/email/index', $this->data, true));
			
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
				if($userLogin->active == 1){
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
					$message = "Seu usuário ainda não confirmou o cadastro. Verifique sua caixa de e-mail para fazer a verificação da sua conta.";
				}
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
