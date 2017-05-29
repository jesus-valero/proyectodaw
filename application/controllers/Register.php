<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 7/5/17
 * Time: 13:25
 */
class Register extends CI_Controller
{
    public function index()
    {
        $this->load->view('vRegister');
    }

    public function check()
    {
        $email = $this->input->post("email");
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $repassword = $this->input->post("repassword");

        if (isset($email) && isset($password) && isset($repassword)) {
            $this->load->model('mUser');

            $valido = $this->mUser->validateRegister($email, $password, $repassword);
            switch ($valido) {
                case VALIDATION_STATUS::WRONG_PASSWORD:
                    // TODO: Reload page
                    header('location: ' . base_url('Register'));
                    break;
                case VALIDATION_STATUS::VALIDATION_USER_OK:
                    // TODO: procedemos a crear al usuario
                    $this->mUser->addNewAccount($email, $password, $username);
                    header('location: ' . base_url('Login/index'));

                    break;
                case VALIDATION_STATUS::USER_ALREADY_EXISTS:
                    header('location: ' . base_url('Register'));
                    break;
            }

        } else {
            // TODO: Throw error 404 message
        }
    }


}

abstract class VALIDATION_STATUS
{
    const WRONG_PASSWORD = -1;
    const VALIDATION_USER_OK = 0;
    const USER_ALREADY_EXISTS = 1;
}