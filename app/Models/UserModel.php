<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'atendente';
    // ==================================================

    public function getUser(string $login, string $pass)
    {
        $sql   = "SELECT * from cidades limit 1";
        $query = $this->db->query($sql);

        return $query->getRow();
    }
}
