<?php

namespace App\Controllers;

use App\Services\TireBrandServices;
use App\Validation\TireBrandValidation;

class TireBrandController extends BaseController
{
    protected $validate;

    public function __construct()
    {
        $this->data['titlePage'] = 'Marca';
        $this->data['userName'] = session()->get('name');
        $this->data['login'] = session()->get('login');
    }

    public function index()
    {
        echo view('includes/head', $this->data);
        echo view('includes/menu', $this->data);
        echo view('tireBrand/index', $this->data);
        echo view('includes/footer', $this->data);
        echo view('tireBrand/modals', $this->data);
        echo view('includes/scripts', $this->data);
    }

    public function getAll()
    {
        $tireBrand = new TireBrandServices;
        response($tireBrand->getAll());
    }

    public function insert()
    {
        $tireBrandServices = new TireBrandServices();
        $this->validate = TireBrandValidation::validateInsert($this->request);

        if ($this->validate)
            response($this->validate);
        else
            response($tireBrandServices->insert($this->request));
    }

    public function update()
    {
        $tireBrandServices = new TireBrandServices();
        $this->validate = TireBrandValidation::validateUpdate($this->request);

        if ($this->validate)
            response($this->validate);
        else
            response($tireBrandServices->update($this->request));
    }

    public function delete()
    {
        $tireBrandServices = new TireBrandServices();
        response($tireBrandServices->delete($this->request));
    }
}
