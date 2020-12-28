<?php

namespace App\Repositories;

use App\Models\UserModel;

class UserRepository
{
    protected $user;

    public function getUser(string $userName)
    {
        $user = new UserModel();

        return $user->where([
            'login' => $userName
        ])->get()->getRow();
    }
}
