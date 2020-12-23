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

    public static function get(string $login, string $password)
    {
        // $db = \Config\Database::connect();

        // $builder = $db->table('user');

        // $builder->select('id, name, login');
        // $builder->where([
        //     'login' => 'leandro.silva',
        //     'password' => 'teste',
        // ]);

        // return $builder->get()->getRow();
        $userModel = new UserModel();
        $result = $userModel->getUser('', '');
        return $result;
    }
}
