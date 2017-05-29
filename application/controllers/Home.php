<?php

/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 27/5/17
 * Time: 16:56
 */

require_once('Common.php');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view(getHeader());

        $this->load->view('vHome');

        $this->load->view('vFooter');

    }
}