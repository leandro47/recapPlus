<?php

namespace App\Controllers;

class Main extends BaseController
{
	public function __construct()
	{
		$this->data['titlePage'] = 'Inicio';
		$this->data['userName'] = session()->get('name');
	}

	public function index()
	{
		echo view('includes/head', $this->data);
		echo view('includes/menu', $this->data);
		echo view('application/welcome', $this->data);
		echo view('includes/footer', $this->data);
		echo view('includes/scripts', $this->data);
	}
	//--------------------------------------------------------------------

}
