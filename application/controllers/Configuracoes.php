<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracoes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->hasActiveSession();
		$this->load->model("UsuariosModel", "usuarios");
		$this->load->model("Log");
	}

	public function index()
	{
		$this->usuarios->idUsuario = $_SESSION['userSession']->IdUsuario;
		$usuario = $this->usuarios->getUser();
		
		$this->data['title'] = 'Configurações';
		$this->data['scripts'] = array('configuracoes');
		$this->data['Breadcrumb'] = array('Configurações');
		$this->data['usuario'] = $usuario;
		$this->data['blockData'] = false;
		$this->content = "admin/configuracoes/index";
		$this->renderer();
	}

	public function atualizarSenha()
	{
		$this->validateRequiredParameters(
			$_POST,
			array(
				'senha',
				'senha2',
			)
		);

		$pass = $this->input->post('senha');
		$this->usuarios->idUsuario = $_SESSION['userSession']->IdUsuario;
		$this->usuarios->senha = $pass;

		if ($this->usuarios->changePassword()) {
			
			$logDetalhes = array(
				"Descrição"             => "Alteração de senha",
				array(
					"Usuario ID"        => $_SESSION['userSession']->IdUsuario,
					"Data" 				=> date("d/m/Y H:i:s")
				)
			);

			$this->Log->registraAuditoria($logDetalhes, 'LOG_TIPO_ALTERAR_SENHA', $_SESSION['userSession']->IdUsuario, null);

			$this->sendJSON(
				array(
					'success' => true,
					'title' => 'Tudo certo',
					'text' => "Sua senha foi alterada com sucesso"
				)
			);
		} else {
			$this->sendJSON(
				array(
					'success' => false,
					'title' => 'Ops',
					'text' => ""
				),
				400
			);
		}

	}

	public function checardadosCompletos()
	{
		$this->vendedores->idVendedor = $_SESSION['userSession']->IdVendedor;
		$usuario = $this->vendedores->getUser();

		if ($usuario->Cep && $usuario->Endereco && $usuario->Numero && $usuario->Bairro && $usuario->Cidade && $usuario->Estado && $usuario->Pais && $usuario->DataNascimento && ($usuario->Cpf || $usuario->Cnpj)) {
			$status = true;
			$statusCode = 200;
		} else {
			$status = false;
			$statusCode = 400;
		}

		$this->sendJSON(
			array(
				'success' => $status,
			),
			$statusCode
		);
	}

}
