<?php

namespace App\Controllers;

use App\Services\TireBandServices;
use App\Validation\TireBandValidation;

class TireBand extends BaseController
{
    protected $validate;

    public function __construct()
    {
        $this->data['titlePage'] = 'Banda';
        $this->data['userName'] = session()->get('name');
        $this->data['login'] = session()->get('login');
    }

    public function index()
    {
        echo view('includes/head', $this->data);
        echo view('includes/menu', $this->data);
        echo view('tireBand/index', $this->data);
        echo view('includes/footer', $this->data);
        echo view('tireBand/modals', $this->data);
        echo view('includes/scripts', $this->data);
    }

    public function getAll()
    {
        $tireBand = new TireBandServices;
        response($tireBand->getAll());
    }

    public function insert()
    {
        $tireBandServices = new TireBandServices();
        $this->validate = TireBandValidation::validateInsert($this->request);

        if ($this->validate)
            response($this->validate);
        else
            response($tireBandServices->insert($this->request));
    }

    public function update()
    {
        $tireBandServices = new TireBandServices();
        $this->validate = TireBandValidation::validateUpdate($this->request);

        if ($this->validate)
            response($this->validate);
        else
            response($tireBandServices->update($this->request));
    }

    public function delete()
    {
        $tireBandServices = new TireBandServices();
        response($tireBandServices->delete($this->request));
    }
}
