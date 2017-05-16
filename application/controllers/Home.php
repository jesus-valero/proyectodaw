<?php

/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 10/5/17
 * Time: 19:05
 */

require_once('Common.php');

class Home extends CI_Controller
{
    public function index()
    {
        if (!isset($_SESSION['pk'])) {
            $this->load->view('vLanding');
        } else {
            $this->load->view('vHeader');
        }
    }
}