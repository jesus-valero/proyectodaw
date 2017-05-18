<?php

/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 16/5/17
 * Time: 20:01
 */

require_once('Common.php');

class Profile extends CI_Controller
{
    function index()
    {
        $this->load->view(getHeader());
        $this->load->model('mUser');
        $this->load->view('vProfile');
        $this->load->view('vFooter');

    }

    function travels()
    {

        $this->load->view(getHeader());
        $this->load->model('mUser');
        //$this->load->view('vProfile');
        $tours['data'] = $this->mUser->getMyTours($_SESSION['pk']);

        //echo $tours;
        //$this->load->view('vProfileMyTours');

        //$data['tours'] = $tours;

        $this->parser->parse('vProfile', $tours);

        $this->load->view('vFooter');
    }

    function tours()
    {
        $this->load->model('mUser');
        echo $this->mUser->getToursJoined();
    }
}