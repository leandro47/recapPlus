<?php

namespace App\Repositories;

use App\Models\UserModel;

class UserRepository
{
    protected $user;

    function __construct()
    {
        $this->user = new UserModel();
    }

    public function getUser(string $userName)
    {
        return $this->user->where([
            'login' => $userName
        ])->get()->getRow();
    }

    public function getPermission(int $idModule, int $idUser)
    {
        $sql = "SELECT id from permission where idModule = ? and idUser = ? and permission = ?";
        return $this->user->query($sql, [$idModule, $idUser, 'yes'])->getRow();
    }
}
