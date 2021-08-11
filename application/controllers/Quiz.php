<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->hasActiveSession();

		$this->load->model("Log");
		$this->load->model("QuizModel", "quiz");
		
		$this->data['scripts'][] = 'quiz';
		
	}

	public function index()
	{
		redirect('admin/quiz/gerenciar/');
	}

	public function gerenciar($page = null)
	{
		$result = $this->quiz->getQuiz();
		
		$page = $page ? $page : 1;
		$this->data['Breadcrumb'] = array('Quiz', "Gerenciar");
		$this->data['quiz'] = $result;
		$this->content = "admin/quiz/index";
		$this->renderer();
	}

	public function cadastrar()
	{
		$this->data['Breadcrumb'] = array('Perguntas', 'Cadastrar');
		$this->content = "admin/perguntas/editar";
		$this->renderer();
	}
	
	public function editar($idQuiz = false)
	{
		$idQuiz = intval($idQuiz);
		if (!$idQuiz || !is_int($idQuiz)) {
			redirect('admin/perguntas/gerenciar/');
		}

		$this->quiz->idConfigQuiz = $idQuiz;
		$dataUpdate = $this->quiz->getQuiz();
		
		if (!$dataUpdate) {
			redirect('admin/quiz/gerenciar/');
		}
		
		$this->data['Breadcrumb'] = array('Quiz', 'Editar');
		$this->data['update'] = $dataUpdate;
		$this->content = "admin/quiz/editar";
		$this->renderer();
	}

	public function atualizar()
	{
		$this->validateRequiredParameters(
			$_POST,
			array(
				'dataHoraInicioInscricao',
				'dataHoraInicioQuiz'
			)
		);

		$id = $this->input->post('id');
		$dataHoraInicioInscricao = $this->input->post('dataHoraInicioInscricao');
		$dataHoraInicioQuiz = $this->input->post('dataHoraInicioQuiz');

		$dataHoraInicioInscricao = date("Y-d-m H:i:s", strtotime($dataHoraInicioInscricao));
		$dataHoraInicioQuiz		 = date("Y-d-m H:i:s", strtotime($dataHoraInicioQuiz));

		$arrayUpdate = [
			"DataHoraInicioInscricao" 		=> $dataHoraInicioInscricao,
			"DataHoraInicioQuiz"			=> $dataHoraInicioQuiz
		];
		
		$this->quiz->idConfigQuiz = $id;

		if ($this->quiz->updateQuiz($arrayUpdate)) {
			$this->sendJSON(
				array(
					'success' => true,
					'title' => 'Tudo certo',
					'text' => 'Os dados do quiz foram alterados com sucesso!'
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
