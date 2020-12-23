<?php

namespace App\Services;

use CodeIgniter\HTTP\IncomingRequest;
use App\Repositories\UserRepository;

class UserServices
{
    public static function auth(IncomingRequest $request): ?bool
    {
        $login    = $request->getPost("login", FILTER_SANITIZE_STRING);
        $password = $request->getPost("password", FILTER_SANITIZE_STRING);

        $user = UserRepository::get($login, $password);

        if ($user) {
            session()->set([
                'id'         => $user->id,
                'name'       => $user->name,
                'login'      => $user->login,
                'isLoggedIn' => true
            ]);
            return true;
        }
        return false;
    }
}
