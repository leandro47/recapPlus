<?php

namespace App\Controllers;

class User extends BaseController
{
    // ==================================================

    public function __construct()
    {
        $this->data['titlePage'] = 'Login';
    }

    // ==================================================

    // Formulário de login
    public function index()
    {
        echo view('includes/header', $this->data);
        echo view('user/login', $this->data);
        echo view('includes/footer', $this->data);
        echo view('includes/scripts', $this->data);
    }

    // ==================================================

    //Recebe os dados de login
    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            echo 'é post';
            // $login    = $this->request->getPost("login", FILTER_SANITIZE_STRING);
            // $password = $this->request->getPost("password", FILTER_SANITIZE_STRING);
        } else {
            echo $this->request->getMethod();
        }
    }
}
