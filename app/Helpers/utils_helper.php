<?php


function debugDatas($d)
{
    if (is_array($d) || is_object($d)) {
        echo '<pre>';
        var_dump($d);
    } else {
        echo $d;
    }
}

function response(array $data): void
{
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Content-Type: application/json');

    echo json_encode($data);
}

/**
 * Used for create passwords
 *
 * @return void
 */
function createPassword()
{
    // $pwd = 'mercedes2020';
    // $pwd_peppered = hash_hmac("sha256", $pwd, 'c1isvFdDMDdmjsdlvsddfxpecFw');
    // $pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);
    // echo $pwd_hashed;

    // $pwd = 'mercedes2020';
    // $pwd_peppered = hash_hmac("sha256", $pwd, 'c1isvFdDMDdmjsdlvsddfxpecFw');
    // $pwd_hashed = '$argon2id$v=19$m=65536,t=4,p=1$bm01SE1zZFZBVEwuSFlpcg$tJNbsoRvqRGoxCNaCNL33mPJuf6Ou0f2CQgSrBjdn88';

    // if (password_verify($pwd_peppered, $pwd_hashed)) {
    //     echo "Password matches.";
    // } else {
    //     echo "Password incorrect.";
    // }
}
