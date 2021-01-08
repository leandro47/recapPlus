<?php

namespace App\Controllers;

use App\Services\ClientServices;
use App\Services\FormPayServices;
use App\Services\ItensOsServices;
use App\Services\OrderServiceServices;
use App\Services\TireBandServices;
use App\Services\TireBrandServices;
use App\Services\TireSizeServices;

use App\Validation\OrderServiceValidation;

class OrderService extends BaseController
{
    protected $validate;

    public function __construct()
    {
        //Services
        $this->orderService = new OrderServiceServices();
        $this->client = new ClientServices();
        $this->brand = new TireBrandServices();
        $this->band = new TireBandServices();
        $this->size = new TireSizeServices();
        $this->formPay = new FormPayServices();
        $this->itensOrderService = new ItensOsServices();

        //Datas
        $this->data['titlePage'] = 'Novo';
        $this->data['userName'] = session()->get('name');
        $this->data['login'] = session()->get('login');
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
        $this->data['brand'] = $this->brand->getAtives();
        $this->data['band'] = $this->band->getAtives();
        $this->data['size'] = $this->size->getAtives();
        $this->data['formPay'] = $this->formPay->getAtives();

        echo view('includes/head', $this->data);
        echo view('includes/menu', $this->data);
        echo view('orderService/newOrder', $this->data);
        echo view('includes/footer', $this->data);
        echo view('includes/scripts', $this->data);
    }

    public function insert()
    {
        $this->validate = OrderServiceValidation::validateInsert($this->request);

        //Get ID client
        $idClient = $this->request->getPost("clientId", FILTER_SANITIZE_STRING);

        //Need find method validation multiples fields with names iguals
        if (false) {

            $this->datas['validation'] = $this->validate;
            $this->newOrderService($idClient);
        } else {

            //Create Order
            $resultInsert = $this->orderService->insert($this->request);

            if (!$resultInsert['code'] === 200) {

                $this->data['errorInsertOS'] = $resultInsert;
                $this->newOrderService($idClient);
            } else {

                //Create itens
                $result = $this->itensOrderService->insert($resultInsert['data']['idOs'], $this->request);

                if (!$result['code'] === 200) {

                    $this->data['errorInsertOS'] = $result;
                    $this->newOrderService($idClient);
                } else {

                    return redirect()->to('OrderService/printerRomaneio/'. $result['data']['numberOrder'] );
                }
            }
        }
    }

    public function printerRomaneio(int $idOs)
    {
        $this->data['orderService'] = $this->orderService->getOrderService($idOs);
        
        debugDatas($this->data);
    }
}
