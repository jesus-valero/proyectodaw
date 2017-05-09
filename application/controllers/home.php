<?php

class Home extends CI_Controller {

	
	public function index()	{

		$this->load->view('Home');
	}

	public function map()	{

		$this->load->view('vMap');
	}

}