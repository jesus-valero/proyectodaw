<?php

class Home extends CI_Controller {

	
	public function index()	{

		$this->load->view('vHome');
	}

	public function map()	{

		$this->load->view('vMap');
	}

}