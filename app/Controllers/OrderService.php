<?php

namespace App\Controllers;

use App\Services\ClientServices;
use App\Services\OrderServiceServices;
use App\Validation\OrderServiceValidation;

class OrderService extends BaseController
{
    protected $validate;

    public function __construct()
    {
        $this->data['titlePage'] = 'Novo';
        $this->data['userName'] = session()->get('name');
        $this->data['login'] = session()->get('login');

        $this->orderService = new OrderServiceServices();
        $this->client = new ClientServices();
    }

    public function index()
    {
        echo view('includes/head', $this->data);
        echo view('includes/menu', $this->data);
        echo view('orderService/searchClient', $this->data);
        echo view('includes/footer', $this->data);
        echo view('includes/scripts', $this->data);
    }

    public function newOrderService(int $id = null)
    {
        $this->data['client'] = $this->client->getById($id);

        echo view('includes/head', $this->data);
        echo view('includes/menu', $this->data);
        echo view('orderService/newOrder', $this->data);
        echo view('includes/footer', $this->data);
        echo view('includes/scripts', $this->data);
    }

    public function insert()
    {
        $fogo = $this->request->getPost("fire", FILTER_SANITIZE_STRING);
        debugDatas($fogo);
    }
}
