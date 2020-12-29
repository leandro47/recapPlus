<?php

namespace App\Controllers;

use App\Services\TireSizeServices;

class TireSize extends BaseController
{
    public function __construct()
    {
        $this->data['titlePage'] = 'Medidas';
        $this->data['userName'] = session()->get('name');
        $this->data['login'] = session()->get('login');
    }

    public function index()
    {
        echo view('includes/head', $this->data);
        echo view('includes/menu', $this->data);
        echo view('tireSize/index', $this->data);
        echo view('includes/footer', $this->data);
        echo view('includes/scripts', $this->data);
    }

    public function getAll()
    {
        $tireSize = new TireSizeServices;
        response($tireSize->getAll());
    }
}

