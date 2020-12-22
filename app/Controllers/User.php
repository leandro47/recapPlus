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

}
