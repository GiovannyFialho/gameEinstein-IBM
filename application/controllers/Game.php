<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->hasActiveSession();

		$this->load->model("GamesModel", "games");
		
		$this->data['scripts'][] = 'games';
		
	}

	public function index()
	{
		$this->rendererSite('site/game/index');
	}

	public function salvar() 
	{
		$this->validateRequiredParameters(
			$_POST,
			array(
				'idUser',
				'score',
				'gametime'
			)
		);

		$idUser = $this->input->post('idUser');
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
					'text' => 'Nova pergunta cadastrado com sucesso',
					'data' => $score['data']
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
