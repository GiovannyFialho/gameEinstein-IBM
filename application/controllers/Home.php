<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		// echo 'ok';
		$this->data['title'] = "Home";
		$this->rendererSite('site/home/index');
	}
}
