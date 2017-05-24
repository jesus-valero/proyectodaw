<?php

/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 10/5/17
 * Time: 20:05
 */

require_once('Common.php');

class Tour extends CI_Controller {

    public function index() {

        $this->load->view(getHeader());

        // TODO: get all tours
        $this->load->model('mTour');

        $locations = $this->mTour->getTours()['tours'];
        $categories = $this->mTour->getTours()['category'];
        isset($_SESSION['pk']) ? $loged = true : $loged = false;        

        $data['locations'] = json_encode($locations);                                
        $data['categories'] = json_encode($categories);        
        $data['loged'] = json_encode($loged);     

        $this->load->view('vMap', $data);

        // TODO: get all tours
        $this->load->model('mTour');
        $this->mTour->getTours();
        /*$this->load->view('vFooter');*/

    }

    public function create() {
        if (isUserLogged()) {
            $this->load->view(getHeader());
            $this->load->view('vCreateTour');
        } else {
            $this->load->view(getHeader());
        }

    }

    public function addNewLocalTour() {
        $tourName = $this->input->post("name");
        $tourDescription = $this->input->post("description");
        $dtIni = $this->input->post("sin-limite-ini");
        $dtEnd = $this->input->post("sin-limite-end");
        $lat = $this->input->post("lat");
        $lng = $this->input->post("lng");
        $category = $this->input->post("category");
        $address = $this->input->post("address");
        $locCity = $this->input->post("loccity");

        $this->load->model('mTour');
        $this->mTour->addNewLocalTour($_SESSION['pk'], $tourName, $tourDescription, $dtIni, $dtEnd, $category, $lat, $lng, $address, $locCity);

        goHome();
    }

    public function tourPreview($id) {

        if (isUserLogged()) {       
            $this->load->view(getHeader());              
            $this->load->model('mTour');
            $tour_data = $this->mTour->getTourById($id)[0];             
            $this->parser->parse('vTourPreview', $tour_data);
        } else {
            $this->load->view(getHeader());
        }
    }

    public function tourEdit($id) {
        if (isUserLogged()) {
            $this->load->view(getHeader());
            $this->load->model('mTour');
            $tour_data = $this->mTour->getTourById($id)[0];
            $this->parser->parse('vTourEdit', $tour_data);
        } else {
            $this->load->view(getHeader());
        }
    }

    public function newDataTour(){
                
        $new_values = array();
        $new_values['tur_name'] = $this->input->post("tur_name");
        $new_values['tur_description'] = $this->input->post("tur_description");
        $new_values['dt_ini'] = $this->input->post("dt_ini");
        $new_values['dt_end'] = $this->input->post("dt_end");
        $new_values['pk'] = $this->input->post("pk");

        $this->load->model('mTour');
        $test = $this->mTour->updateTour($new_values);
       
        $this->tourEdit($new_values['pk']);
    }
}