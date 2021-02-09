<?php

namespace App\Controllers;

use App\Services\TireSizeServices;
use App\Validation\TireSizeValidation;

class TireSizeController extends BaseController
{
    protected $validate;

    public function __construct()
    {
        $this->data['titlePage'] = 'Medida';
        $this->data['userName'] = session()->get('name');
        $this->data['login'] = session()->get('login');
    }

    public function index()
    {
        echo view('includes/head', $this->data);
        echo view('includes/menu', $this->data);
        echo view('tireSize/index', $this->data);
        echo view('includes/footer', $this->data);
        echo view('tireSize/modals', $this->data);
        echo view('includes/scripts', $this->data);
    }

    public function getAll()
    {
        $tireSize = new TireSizeServices;
        response($tireSize->getAll());
    }

    public function insert()
    {
        $tireSizeServices = new TireSizeServices();
        $this->validate = TireSizeValidation::validateInsert($this->request);

        if ($this->validate)
            response($this->validate);
        else
            response($tireSizeServices->insert($this->request));
    }

    public function update()
    {
        $tireSizeServices = new TireSizeServices();
        $this->validate = TireSizeValidation::validateUpdate($this->request);

        if ($this->validate)
            response($this->validate);
        else
            response($tireSizeServices->update($this->request));
    }

    public function delete()
    {
        $tireSizeServices = new TireSizeServices();
        response($tireSizeServices->delete($this->request));
    }
}
