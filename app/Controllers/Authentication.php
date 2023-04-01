<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\Account;

class Authentication extends BaseController {
    protected $userModel;
    protected $accModel;


    public function __construct() {
        $this->userModel = new Users();
        $this->accModel = new Account();
    }

    public function login() {
        $inputData = [
            "email" => $this->request->getVar("email"),
            "password" => $this->request->getVar("password"),
        ];
        $accData = $this->accModel->where("email", $inputData["email"])->first();

        if($accData != null && $accData["password"] == md5($inputData["password"])) {
            return redirect()->to(base_url('/admin/home'));
        } else {
            return redirect()->to(base_url("/"))
                ->with("invalidLogin", true);
        }
    }

    public function register() {
        $userData = [
            "nama" => $this->request->getVar("nama"),
            "alamat" => $this->request->getVar("alamat"),
        ];

        $this->userModel->insert($userData);
        $user = $this->userModel->where("nama", $userData["nama"])
                                ->first();

        $accData = [
            "email" => $this->request->getVar("email"),
            "password" => md5($this->request->getVar("password")),
            "id_user" => $user["id"]
        ];

        $this->accModel->insert($accData);

        return redirect()->to(base_url("/"))
            ->with("successfulLogin", true);
    }
}
