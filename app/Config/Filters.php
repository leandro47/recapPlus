<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'           => \CodeIgniter\Filters\CSRF::class,
		'toolbar'        => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot'       => \CodeIgniter\Filters\Honeypot::class,
		'LoginFilter' 	 => \App\Filters\LoginFilter::class,
		'IsLoggedFilter' => \App\Filters\IsLoggedFilter::class,

		//Permission by Modules
		'TireSizeFilter' => \App\Filters\TireSizeFilter::class,
		'TireBandFilter' => \App\Filters\TireBandFilter::class,
		'TireBrandFilter' => \App\Filters\TireBrandFilter::class,
		'FormPayFilter' => \App\Filters\FormPayFilter::class,

	];

	// Always applied before every request
	public $globals = [
		'before' => [
			'LoginFilter' => [
				'except' => [
					'user',
					'user/*',
					'login'
				]
			],
			// 'honeypot',
			// 'csrf',
		],
		'after'  => [
			'toolbar',
			// 'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [
		'IsLoggedFilter' => ['before' => ['user', 'user/index', 'user/login']],
		'TireSizeFilter' => ['before' => ['TireSize', 'TireSize/*']],
		'TireBandFilter' => ['before' => ['TireBand', 'TireBand/*']],
		'TireBrandFilter' => ['before' => ['TireBrand', 'TireBrand/*']],
		'FormPayFilter' => ['before' => ['FormPay', 'FormPay/*']],
	];
}
