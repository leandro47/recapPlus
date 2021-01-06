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
}
