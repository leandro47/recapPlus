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

        $user = $this->userRepository->getUser($login);

        $hashVerify =  $this->verifyHash($user->password, $password);

        if ($hashVerify) {
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

    public static function getPermission(int $idModule)
    {
        $userRepository = new UserRepository();
        $result = $userRepository->getPermission($idModule, session()->get('id'));

        if ($result)
            return true;
        return false;
    }

    /**
     * Verify password with hash
     * 
     * @param $pwd - Hash of password bd
     * @param $plainTextPwd - Password typed by user
     * 
     * @return bool - Result verify of hash
     */
    private function verifyHash(string $pwd, string $plainTextPwd): bool
    {
        $key = $_ENV['encryption.key'];

        $pwd_peppered = hash_hmac("sha256", $plainTextPwd, $key);

        if (password_verify($pwd_peppered, $pwd))
            return true;
        return false;
    }
}
