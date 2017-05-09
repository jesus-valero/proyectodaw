<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        echo "[Login]Logeado con exito";
    }

    public function doLogin()
    {
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        if (isset($email) && isset($password)) {
            $this->load->model('mUser');
            $valido = $this->mUser->doLogin($email, $password);
            if ($valido > 0) {
                // TODO: Login correcto
                $_SESSION['pk'] = $valido;
                header('location: ' . base_url('Landing'));
            } else {
                // TODO: Reload page
                echo "Ese usuario no existe!";
            }

        } else {
            // TODO: Throw error 404 message
        }
    }

    public function closeSession()
    {
        session_destroy();
        header('location: ' . base_url('Landing'));
    }

}