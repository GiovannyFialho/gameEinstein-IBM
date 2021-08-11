<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->hasActiveSession();

		$this->load->model("Log");
		$this->load->model("UsuariosModel", "usuarios");
		
		$this->data['scripts'][] = 'usuarios';
		
	}

	public function index()
	{
		redirect('admin/usuarios/gerenciar/');
	}

	public function gerenciar($page = null)
	{
		$pag = is_null($page) ? "1" : $page;
		$this->load->helper('pagination');

		$result = $this->usuarios->getUsers($pag);
		
		$page = $page ? $page : 1;
		$this->data['Breadcrumb'] = array('Usuários', "Gerenciar");
		$this->data['pagination'] = pagination($result['totalRows'], $page, 'admin/usuarios/gerenciar');
		$this->data['usuarios'] = $result['data'];
		$this->content = "admin/usuarios/index";
		$this->renderer();
	}

	public function cadastrar()
	{
		$this->data['Breadcrumb'] = array('Usuarios', 'Cadastrar');
		$this->content = "admin/usuarios/editar";
		$this->renderer();
	}
	
	public function editar($idUsuario = false)
	{
		$idUsuario = intval($idUsuario);
		if (!$idUsuario || !is_int($idUsuario)) {
			redirect('admin/usuarios/gerenciar/');
		}

		$this->usuarios->idUsuario = $idUsuario;
		$dataUpdate = $this->usuarios->getUser();
		
		if (!$dataUpdate) {
			redirect('admin/usuarios/gerenciar/');
		}
		
		$this->data['Breadcrumb'] = array('Usuarios', 'Editar');
		$this->data['update'] = $dataUpdate;
		$this->content = "admin/usuarios/editar";
		$this->renderer();
	}

	public function atualizar()
	{
		$this->validateRequiredParameters(
			$_POST,
			array(
				'id',
				'nome',
				'documento'
			)

		);

		$id = $this->input->post('id');
		$nome = $this->input->post('nome');
		$documento = $this->input->post('documento');
		$ativo = $this->input->post('ativo') ? 1 : 0;

		$arrayUpdate = [
			"Nome" => $nome,
			"Documento" => $documento,
			"Status" => $ativo
		];
		
		$this->usuarios->idUsuario = $id;

		if ($this->usuarios->updateUser($arrayUpdate)) {
			$logDetalhes = array(
				"Descrição"             => "Atualização de Usuario",
				"Usuario ID"        	=> $_SESSION['userSession']->IdUsuario,
				"Antes" =>	array(
					"Nome"              => $_SESSION['userSession']->Nome,
					"Documento"         => $_SESSION['userSession']->Documento,
					"Status"            => $_SESSION['userSession']->Status
				),
				"Depois" =>	array(
					"Nome"              => $nome,
					"Documento"         => $documento,
					"Status"          	=> $ativo,
				)
			);

			$this->Log->registraAuditoria($logDetalhes, "LOG_TIPO_ATUALIZAR_USUARIO", $_SESSION['userSession']->IdUsuario, null);

			$this->sendJSON(
				array(
					'success' => true,
					'title' => 'Tudo certo',
					'text' => 'Os dados do usuário foram alterados com sucesso!'
				),
				200
			);
		} else {
			$this->sendJSON(
				array(
					'success' => false,
					'title' => 'Ops',
					'text' => "Algo deu errado. Tente novamente, por favor."
				),
				400
			);
		}
	}

	public function salvar() 
	{
		$this->validateRequiredParameters(
			$_POST,
			array(
				'nome',
				'email',
				'documento'
			)
		);

		$nome = $this->input->post('nome');
		$email = $this->input->post('email');
		$documento = $this->input->post('documento');
		$ativo = $this->input->post('ativo') ? 1 : 0;
		$senha = password_hash("Mudar@123", PASSWORD_DEFAULT);

		$arrayInsert = [
			"Nome" => $nome,
			"Email" => $email,
			"Documento" => $documento,
			"Status" => $ativo,
			"Senha" => $senha
		];
		
		$resultEmail = $this->usuarios->getUserByEmail($email);
		
		$erro = true;
		if (count($resultEmail) > 0) {
			$message = "Email já cadastrado no sistema.";
		} else {
			$erro = false;
			$usuarioId = $this->usuarios->saveNewUser($arrayInsert);

			if ($usuarioId !== false) {
				$logDetalhes = array(
					"Descrição"             => "Registro de usuário",
					array(
						"Usuario ID"        => $usuarioId,
						"Nome"              => $nome,
						"Email"	            => $email,
						"Documento"	        => $documento
					)
				);
	
				$this->Log->registraAuditoria($logDetalhes, 'LOG_TIPO_CADASTRAR_USUARIO', $_SESSION['userSession']->IdUsuario, null);
			} else {
				$erro = true;
				$message = "Erro ao registrar novo usuário. Por favor, tente novamente.";
			}
			
		}
		
		if (!$erro) {
			$this->sendJSON(
				array(
					'success' => true,
					'title' => 'Tudo certo!',
					'text' => 'Novo usuário cadastraro com sucesso'
				),
				200
			);
		} else {
			$this->sendJSON(
				array(
					'success' => false,
					'title' => 'Ops',
					'text' => $message
				),
				400
			);
		}

	}

}
