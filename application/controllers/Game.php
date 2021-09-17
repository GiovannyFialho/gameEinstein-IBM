<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model("GamesModel", "games");
		$this->load->model("UsuariosModel", "usuarios");
		
		$this->data['title'] = 'Desafio';
		
	}

	public function index()
	{
		redirect('/');
		$this->hasActiveSession();
		$this->rendererSite('site/game/index');
	}

	public function login()
	{
		$this->data['title'] = 'Login';
		if(isset($_GET['hash'])){
			if($this->usuarios->activeUserByHash($_GET['hash']));{
				$this->data['usuarioAprovado'] = true;
			}
		}
		$this->rendererSite('site/game/login');
	}

	public function ranking()
	{
		$this->data['title'] = 'Ranking';
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

	public function getRanking($isClear = false)
	{
		$score = $this->games->getGames();

		if(!$isClear){
			foreach ($score['data'] as $key => $value) {
				$value->name = substr_replace($value->name, '***', 3);
			}
		}

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

	public function rankingClear()
	{
		$this->data['title'] = 'Resultado';

		$users = $this->usuarios->getUsers();
		$totalUsers = $users['totalRows'];
		$this->data['totalUsers'] = $totalUsers;

		$this->rendererSite('site/game/rankingClear');
	}

}
