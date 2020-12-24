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

    public static function getAuth(string $login, string $password)
    {
        $user = new UserModel();
        return $user->where([
            'login' => $login,
            'password' => $password
        ])->get()->getRow();
    }
}
