<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        echo 'login';
    }


    public function logar()
    {
        session()->set('isLoggedIn', true);
    }
}
