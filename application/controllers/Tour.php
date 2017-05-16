<?php

/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 10/5/17
 * Time: 20:05
 */

require_once('Common.php');

class Tour extends CI_Controller
{
    public function index()
    {

        $this->load->view(getHeader());

        $locations = array(
            array('lat' => 41.5053062, 'lng' => 2.1176510000000004, 'category' => 'bar', 'title' => 'Titulo Prueba 1', 'description' => 'Texto de prueba 1', 'id' => '12', 'date_start' => '2017-05-18', 'date_end' => '2017-05-24'),
            array('lat' => 41.5153062, 'lng' => 2.1176510000000004, 'type' => 'sport', 'title' => 'Titulo Prueba 2', 'description' => 'Texto de prueba 2', 'id' => '12', 'date_start' => '2017-05-18', 'date_end' => '2017-05-24' ),
            array('lat' => 41.5153062, 'lng' => 2.1276510000000004, 'type' => 'arts', 'title' => 'Titulo Prueba 3', 'description' => 'Texto de prueba 3', 'id' => '12', 'date_start' => '2017-05-18', 'date_end' => '2017-05-24' ),
            array('lat' => 41.5053062, 'lng' => 2.1276510000000004, 'type' => 'bar', 'title' => 'Titulo Prueba 4', 'description' => 'Texto de prueba 4', 'id' => '12', 'date_start' => '2017-05-18', 'date_end' => '2017-05-24' )
        );

        $locations = json_encode($locations);

        $data = array('locations' => $locations);

        $this->load->view('vMap', $data);


        // TODO: get all tours
        $this->load->model('mTour');
        $this->mTour->getTours();
    }


    public function create()
    {
        if (isUserLogged()) {
            $this->load->view(getHeader());
            $this->load->view('vCreateTour');
        } else {
            $this->load->view(getHeader());
        }

    }

    public function addNewLocalTour()
    {
        $tourName = $this->input->post("name");
        $tourDescription = $this->input->post("description");
        $dtIni = $this->input->post("sin-limite-ini");
        $dtEnd = $this->input->post("sin-limite-end");
        $lat = $this->input->post("lat");
        $lng = $this->input->post("lng");
        $category = $this->input->post("category");
        $address = $this->input->post("address");

        $this->load->model('mTour');
        $this->mTour->addNewLocalTour($_SESSION['pk'], $tourName, $tourDescription, $dtIni, $dtEnd, $category, $lat, $lng, $address);
    }
}