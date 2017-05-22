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
        goHome();
    }

    function tours()
    {

        $this->load->view(getHeader());
        $this->load->model('mUser');
        $tours['data'] = $this->mUser->getMyTours($_SESSION['pk']);

        $this->parser->parse('vProfileTravels', $tours);

        $this->load->view('vFooter');
    }

    function travels()
    {
        $this->load->view(getHeader());
        $this->load->model('mUser');
        $tours['data'] = $this->mUser->getToursJoined();
        $this->parser->parse('vProfileTours', $tours);
        $this->load->view('vFooter');
    }
}