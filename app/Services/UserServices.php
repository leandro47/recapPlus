<?php

namespace App\Services;

use CodeIgniter\HTTP\IncomingRequest;
use App\Repositories\UserRepository;
use CodeIgniter\HTTP\Response;


class UserServices
{
    public function auth(IncomingRequest $request): ?array
    {
        $this->userRepository = new UserRepository();

        $login    = $request->getPost("login", FILTER_SANITIZE_STRING);
        $password = $request->getPost("password", FILTER_SANITIZE_STRING);

        $user = $this->userRepository->getAuth($login, $password);

        if ($user) {
            session()->set([
                'id'         => $user->id,
                'name'       => $user->name,
                'login'      => $user->login,
                'isLoggedIn' => true
            ]);
            return null;
        }
        return  [
            'code'    => Response::HTTP_UNAUTHORIZED,
            'message' => 'Usuário ou senha incorretos',
            'data'    => [
                'status' => 'warning'
            ]
        ];
    }
}
