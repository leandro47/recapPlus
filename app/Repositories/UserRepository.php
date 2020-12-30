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

    public function getPermission(int $idModule, int $idUser)
    {
        $user = new UserModel();

        $sql = "SELECT id from permission where idModule = ? and idUser = ? and permission = ?";
        return $user->query($sql, [$idModule, $idUser, 'yes'])->getRow();
    }
}
