<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Services\UserServices;

class FormPayFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        //Id of module in the table Module
        $idModule = 4;

        if (!UserServices::getPermission($idModule))
            return redirect()->to(base_url('main/index/' . 'No alowed'));
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}