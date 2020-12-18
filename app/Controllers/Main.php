<?php

namespace App\Controllers;

class Main extends BaseController
{

	public function __construct()
	{
		
	}

	public function index()
	{
		if (!session()->has('username')) {
			return redirect()->to('user');
		} else {
			// $newdata = [
			// 	'username'  => 'johndoe',
			// 	'email'     => 'johndoe@some-site.com',
			// 	'logged_in' => TRUE
			// ];

			// session()->set($newdata);

			echo session()->get('username');
		}
	}
	//--------------------------------------------------------------------

}
