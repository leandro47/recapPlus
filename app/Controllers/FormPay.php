<?php

namespace App\Controllers;

use App\Services\FormPayServices;
use App\Validation\FormPayValidation;

class FormPay extends BaseController
{
    protected $validate;

    public function __construct()
    {
        $this->data['titlePage'] = 'Forma de Pagamento';
        $this->data['userName'] = session()->get('name');
        $this->data['login'] = session()->get('login');
    }

    public function index()
    {
        echo view('includes/head', $this->data);
        echo view('includes/menu', $this->data);
        echo view('formPay/index', $this->data);
        echo view('includes/footer', $this->data);
        echo view('formPay/modals', $this->data);
        echo view('includes/scripts', $this->data);
    }

    public function getAll()
    {
        $formPay = new FormPayServices;
        response($formPay->getAll());
    }

    public function insert()
    {
        $formPayServices = new FormPayServices();
        $this->validate = FormPayValidation::validateInsert($this->request);

        if ($this->validate)
            response($this->validate);
        else
            response($formPayServices->insert($this->request));
    }

    public function update()
    {
        $formPayServices = new FormPayServices();
        $this->validate = FormPayValidation::validateUpdate($this->request);

        if ($this->validate)
            response($this->validate);
        else
            response($formPayServices->update($this->request));
    }

    public function delete()
    {
        $formPayServices = new FormPayServices();
        response($formPayServices->delete($this->request));
    }
}
