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
        $sql = 'SELECT 
		(us.name)saller,
        (os.id)idOs,
        (cli.name)clientName,
        (cnpjCpf)cpfCnpj,
        (DATE_FORMAT(os.openDate, "%d/%m/%Y %H:%i"))openDate,
		(DATE_FORMAT(os.deliveryDate, "%d/%m/%Y"))deliveryDate,
        (pay.description)formPay,
        (os.sellerObservation)observation
        from orderservice as os
         join client as cli 
         join formpay as pay
         join user as us
         on os.idClient = cli.id and
			os.idFormpay = pay.id and
            os.idUser = us.id and
			os.id = :id:';

        return $this->orderService->query($sql, [
            'id' => $idOrderService
        ])->getRow();
    }
}
