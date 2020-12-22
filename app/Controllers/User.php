<?php

namespace App\Controllers;

class User extends BaseController
{

    // Formulário de login
    public function index()
    {
        echo view('includes/header');
        echo view('user/login');
        echo view('includes/footer');
        echo view('includes/scripts');
    }

    // ==================================================

}
