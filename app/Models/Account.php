<?php namespace App\Models;

use CodeIgniter\Model;

class Account extends Model {
    protected $table = "akun";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "email", "password", "id_user"
    ];
}

?>