<?php

/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 8/5/17
 * Time: 19:53
 */

require_once('Common.php');
class Login extends CI_Controller
{
    public function index()
    {
        if (!isset($_SESSION['pk'])) {
            $this->load->view('vLogin');
        } else {
            goHome();
            //echo "<a href='" . base_url('Login') . "'>Cerrar sesión</a>";
        }
    }

    function doLogin()
    {
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        $this->load->model('mUser');



        if ( ($data =  $this->mUser->requestLogin($email, $password)) > 0) {

            $_SESSION['pk'] = $data[0]['usr_PK'];
            $_SESSION['username'] = $data[0]['usr_name'];

            goHome();

        } else {
            header("Location: " . base_url(). "Login/index");
        }

    }

    function closeSession()
    {
        goHome();
        session_destroy();
    }



}