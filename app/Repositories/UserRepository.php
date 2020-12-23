<?php

namespace App\Repositories;

use App\Models\UserModel;

class UserRepository
{
    protected $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public static function get(string $login, string $password): ?object
    {
        $db = \Config\Database::connect();

        $builder = $db->table('user');

        $builder->select('id, name, login');
        $builder->where([
            'login' => $login,
            'password' => $password,
        ]);

        return $builder->get()->getRow();
    }
}
