<?php
/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 8/5/17
 * Time: 19:53
 */
class Landing extends CI_Controller
{
    public function index()
    {
        if (!isset($_SESSION['pk'])) {
            $this->load->view('vLanding');
        } else {
            echo "<a href='". base_url('Login/closeSession')."'>Cerrar sesión</a>";
        }
    }
}