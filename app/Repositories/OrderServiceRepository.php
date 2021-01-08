<?php

namespace App\Repositories;

use App\Models\OrderServiceModel;

class OrderServiceRepository
{
    function __construct()
    {
        $this->orderService = new OrderServiceModel();
    }

    public function insert(array $data)
    {
        return $this->orderService->insert($data);
    }

    public function getOrderServiceByID(int $idOrderService)
    {
        $sql = "SELECT 
        (os.id)idOs,
        (cli.name)clientName,
        (cnpjCpf)cpfCnpj,
        (os.openDate)openDate,
        (os.deliveryDate)deliveryDate,
        (pay.description)formPay,
        (os.sellerObservation)observation
        from orderservice as os
         join client as cli 
         join formpay as pay
         on os.idClient = cli.id and
        os.idFormpay = pay.id
        and os.id = ?;";

        return $this->orderService->query($sql,[$idOrderService])->getRow();
    }
}
