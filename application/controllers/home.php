<?php

class Home extends CI_Controller {

	
	public function index()	{

		$this->load->view('vHome');
	}

	public function map() {

		$locations = array(
			array('lat' => 41.5053062, 'lng' => 2.1176510000000004, 'type' => 'bar', 'title' => 'Titulo Prueba 1', 'text' => 'Texto de prueba 1'),
			array('lat' => 41.5153062, 'lng' => 2.1176510000000004, 'type' => 'sport', 'title' => 'Titulo Prueba 2', 'text' => 'Texto de prueba 2'),
			array('lat' => 41.5153062, 'lng' => 2.1276510000000004, 'type' => 'arts', 'title' => 'Titulo Prueba 3', 'text' => 'Texto de prueba 3'),
			array('lat' => 41.5053062, 'lng' => 2.1276510000000004, 'type' => 'bar', 'title' => 'Titulo Prueba 4', 'text' => 'Texto de prueba 4')
			);

		$locations = json_encode($locations);	

		$data = array('locations' => $locations);

		$this->load->view('vMap', $data);
	}

}