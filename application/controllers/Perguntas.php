<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perguntas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->hasActiveSession();

		$this->load->model("Log");
		$this->load->model("PerguntasModel", "perguntas");
		
		$this->data['scripts'][] = 'perguntas';
		
	}

	public function index()
	{
		redirect('admin/perguntas/gerenciar/');
	}

	public function gerenciar($page = null)
	{
		$pag = is_null($page) ? "1" : $page;
		$this->load->helper('pagination');

		$result = $this->perguntas->getQuestions($pag);
		
		$page = $page ? $page : 1;
		$this->data['Breadcrumb'] = array('Perguntas', "Gerenciar");
		$this->data['pagination'] = pagination($result['totalRows'], $page, 'admin/perguntas/gerenciar');
		$this->data['perguntas'] = $result['data'];
		$this->content = "admin/perguntas/index";
		$this->renderer();
	}

	public function cadastrar()
	{
		$this->data['Breadcrumb'] = array('Perguntas', 'Cadastrar');
		$this->content = "admin/perguntas/editar";
		$this->renderer();
	}
	
	public function editar($idPergunta = false)
	{
		$idPergunta = intval($idPergunta);
		if (!$idPergunta || !is_int($idPergunta)) {
			redirect('admin/perguntas/gerenciar/');
		}

		$this->perguntas->idPergunta = $idPergunta;
		$dataUpdate = $this->perguntas->getQuestion();
		
		if (!$dataUpdate) {
			redirect('admin/perguntas/gerenciar/');
		}
		
		$this->data['Breadcrumb'] = array('Perguntas', 'Editar');
		$this->data['update'] = $dataUpdate;
		$this->content = "admin/perguntas/editar";
		$this->renderer();
	}

	public function atualizar()
	{
		$this->validateRequiredParameters(
			$_POST,
			array(
				'enunciado',
				'resposta1',
				'resposta2',
				'resposta3',
				'resposta4',
				'resposta5',
				'respostaCorreta'
			)

		);

		$id = $this->input->post('id');
		$enunciado = $this->input->post('enunciado');
		$resposta1 = $this->input->post('resposta1');
		$resposta2 = $this->input->post('resposta2');
		$resposta3 = $this->input->post('resposta3');
		$resposta4 = $this->input->post('resposta4');
		$resposta5 = $this->input->post('resposta5');
		$respostaCorreta = $this->input->post('respostaCorreta');
		$ativo = $this->input->post('ativo') ? 1 : 0;

		$arrayUpdate = [
			"Enunciado" 		=> $enunciado,
			"Resposta1"			=> $resposta1,
			"Resposta2"			=> $resposta2,
			"Resposta3"			=> $resposta3,
			"Resposta4"			=> $resposta4,
			"Resposta5"			=> $resposta5,
			"RespostaCorreta"	=> $respostaCorreta,
			"Status" => $ativo
		];
		
		$this->perguntas->idPergunta = $id;

		if ($this->perguntas->updateQuestion($arrayUpdate)) {
			// $logDetalhes = array(
			// 	"Descrição"             => "Atualização de Usuario",
			// 	"Usuario ID"        	=> $_SESSION['userSession']->IdUsuario,
			// 	"Antes" =>	array(
			// 		"Nome"              => $_SESSION['userSession']->Nome,
			// 		"Documento"         => $_SESSION['userSession']->Documento,
			// 		"Status"            => $_SESSION['userSession']->Status
			// 	),
			// 	"Depois" =>	array(
			// 		"Nome"              => $nome,
			// 		"Documento"         => $documento,
			// 		"Status"          	=> $ativo,
			// 	)
			// );

			// $this->Log->registraAuditoria($logDetalhes, "LOG_TIPO_ATUALIZAR_USUARIO", $_SESSION['userSession']->IdUsuario, null);

			$this->sendJSON(
				array(
					'success' => true,
					'title' => 'Tudo certo',
					'text' => 'Os dados da pergunta foram alterados com sucesso!'
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
				'enunciado',
				'resposta1',
				'resposta2',
				'resposta3',
				'resposta4',
				'resposta5',
				'respostaCorreta'
			)
		);

		$enunciado = $this->input->post('enunciado');
		$resposta1 = $this->input->post('resposta1');
		$resposta2 = $this->input->post('resposta2');
		$resposta3 = $this->input->post('resposta3');
		$resposta4 = $this->input->post('resposta4');
		$resposta5 = $this->input->post('resposta5');
		$respostaCorreta = $this->input->post('respostaCorreta');
		$ativo = $this->input->post('ativo') ? 1 : 0;

		$arrayInsert = [
			"Enunciado" 		=> $enunciado,
			"Resposta1"			=> $resposta1,
			"Resposta2"			=> $resposta2,
			"Resposta3"			=> $resposta3,
			"Resposta4"			=> $resposta4,
			"Resposta5"			=> $resposta5,
			"RespostaCorreta"	=> $respostaCorreta,
			"Status"			=> $ativo,
		];
		
		$erro = false;
		$perguntaId = $this->perguntas->saveNewQuestion($arrayInsert);

		if ($perguntaId !== false) {
			$logDetalhes = array(
				"Descrição"             => "Registro de pergunta",
				array(
					"Pergunta ID"       => $perguntaId,
					"Enunciado"         => $enunciado,
					"RespostaCorreta"	=> $respostaCorreta
				)
			);

			$this->Log->registraAuditoria($logDetalhes, 'LOG_TIPO_CADASTRAR_PERGUNTA', $_SESSION['userSession']->IdUsuario, null);
		} else {
			$erro = true;
			$message = "Erro ao registrar nova pergunta. Por favor, tente novamente.";
		}
		
		if (!$erro) {
			$this->sendJSON(
				array(
					'success' => true,
					'title' => 'Tudo certo!',
					'text' => 'Nova pergunta cadastrado com sucesso'
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
