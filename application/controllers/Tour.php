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
        if (isUserLogged()) {
            $this->load->view('vHeader');
        } else {
            goHome();
        }
    }

    public function search()
    {
        if (isUserLogged()) {
            $this->load->view('vHeader');
            $this->load->view('vSearchTour');
        } else {
            goHome();
        }
    }

    public function create()
    {
        if (isUserLogged()) {
            $this->load->view('vHeader');
            $this->load->view('vCreateTour');
        } else {
            goHome();
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