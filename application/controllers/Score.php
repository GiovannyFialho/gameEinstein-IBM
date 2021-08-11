<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Score extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->hasActiveSession();

		$this->load->model("Log");
		$this->load->model("ScoreModel", "score");
		
		$this->data['scripts'][] = 'score';
		
	}

	public function index()
	{
		redirect('admin/score/gerenciar/');
	}

	public function gerenciar($page = null)
	{
		$result = $this->score->getScore();
		
		$page = $page ? $page : 1;
		$this->data['Breadcrumb'] = array('Score', "Gerenciar");
		$this->data['score'] = $result['data'];
		$this->content = "admin/score/index";
		$this->renderer();
	}

}
