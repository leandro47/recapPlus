<?php

namespace App\Controllers;

class Main extends BaseController
{
	public function __construct()
	{
		$this->data['titlePage'] = 'Inicio';
		$this->data['userName'] = session()->get('name');
		$this->data['login'] = session()->get('login');
	}

	public function index(string $access = '')
	{
		if ($access) {
			$this->data['message'] = 'Sem Permissão de acesso';
			$this->data['status'] = 'warning';
		}

		echo view('includes/head', $this->data);
		echo view('includes/menu', $this->data);
		echo view('application/welcome', $this->data);
		echo view('includes/footer', $this->data);
		echo view('includes/scripts', $this->data);
	}
	//--------------------------------------------------------------------

}
