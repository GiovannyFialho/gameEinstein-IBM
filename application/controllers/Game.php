<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model("GamesModel", "games");
		
		$this->data['scripts'][] = 'games';
		
	}

	public function index()
	{
		$this->hasActiveSession();
		$this->rendererSite('site/game/index');
	}

	public function login()
	{
		$this->rendererSite('site/game/login');
	}

	public function ranking()
	{
		$this->hasActiveSession();
		$this->rendererSite('site/game/ranking');
	}

	public function salvar() 
	{
		$this->hasActiveSession();
		$this->validateRequiredParameters(
			$_POST,
			array(
				'score',
				'gametime'
			)
		);

		$idUser = $this->session->userSession->idUsuario;
		$score = $this->input->post('score');
		$gametime = $this->input->post('gametime');

		$arrayInsert = [
			"idUser" 		=> $idUser,
			"score"			=> $score,
			"gametime"		=> $gametime
		];
		
		$erro = false;
		$perguntaId = $this->games->saveNewGame($arrayInsert);

		if ($perguntaId !== false) {
			$score = $this->games->getGamesForScore();
		} else {
			$erro = true;
			$message = "Erro ao registrar nova pergunta. Por favor, tente novamente.";
		}
		
		if (!$erro) {
			$this->sendJSON(
				array(
					'success' => true,
					'title' => 'Tudo certo!',
					'message' => 'Novo jogo cadastrado com sucesso',
					'data' => $score['data']
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

	public function getRanking()
	{
		$this->hasActiveSession();
		$score = $this->games->getGames();

		$this->data['ranking'] = $score['data'];

		if ($score['numRows'] > 0) {
			$this->sendJSON(
				array(
					'success' => true,
					'data' => $score['data']
				),
				200
			);
		} else {
			$this->sendJSON(
				array(
					'success' => false,
					'title' => 'Ops',
					'message' => 'Rankeamento não disponível'
				),
				400
			);
		}
	}

}
