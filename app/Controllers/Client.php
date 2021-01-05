<?php

namespace App\Controllers;

use App\Services\ClientServices;
use App\Validation\ClientValidation;
use App\Services\UfServices;

class Client extends BaseController
{
    protected $validate;

    public function __construct()
    {
        $this->data['titlePage'] = 'Cliente';
        $this->data['userName'] = session()->get('name');
        $this->data['login'] = session()->get('login');

        $this->ClientServices = new ClientServices();
    }

    public function index()
    {
        $this->data['ufs'] = $this->getAllUf();

        echo view('includes/head', $this->data);
        echo view('includes/menu', $this->data);
        echo view('client/index', $this->data);
        echo view('includes/footer', $this->data);
        echo view('client/modals', $this->data);
        echo view('includes/scripts', $this->data);
    }

    public function getAll()
    {
        response($this->ClientServices->getAll());
    }

    public function insert()
    {
        $this->validate = ClientValidation::validateInsert($this->request);

        if ($this->validate)
            response($this->validate);
        else
            response($this->ClientServices->insert($this->request));
    }

    public function update()
    {
        $this->validate = ClientValidation::validateUpdate($this->request);

        if ($this->validate)
            response($this->validate);
        else
            response($this->ClientServices->update($this->request));
    }

    public function delete()
    {
        response($this->ClientServices->delete($this->request));
    }

    // ==================================================
    // Private functions
    // ==================================================

    private function getAllUf()
    {
        $uf = new UfServices();
        return $uf->getAll();
    }
}
