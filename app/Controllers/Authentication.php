<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\Account;

class Authentication extends BaseController {
    protected $userModel;
    protected $accModel;
    protected $session;

    public function __construct() {
        $this->session = \Config\Services::session();
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
        if($this->accModel->where("email", $this->request->getVar("email"))->first()) {
            return redirect()->to(base_url('/register'))
                            ->with('warning', 'Email sudah terdaftar');
        }

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
            ->with("success", "Anda berhasil mendaftarkan diri");
    }

    public function send_reset_password() {
        $email = $this->request->getVar("email");

        $accData = $this->accModel->where("email", $email)
                                ->first();

        if($accData == null) {
            return redirect()->to(base_url("/forgot"))
                            ->with("error", "Email tidak terdaftar!");
        } else {
            $this->session->set("email", $email);
            return redirect()->to(base_url("/reset-password"));
        }
    }

    public function reset_password() {
        $newPassword = md5($this->request->getVar("new-password"));
        $confirmPassword = md5($this->request->getVar("confirm-password"));
        $email = $this->request->getVar("email");

        if($newPassword !== $confirmPassword) {
            return redirect()->to(base_url("/reset-password"))
                            ->with("error", "Password tidak cocok!");
        } else {
            $acc = $this->accModel->where("email", $email)
                                ->first();
            $newAccData = [
                "id"        => $acc["id"],
                "email"     => $email,
                "password"  => $newPassword,
                "id_user"   => $acc["id_user"]
            ];

            $this->accModel->update($acc["id"], $newAccData);

            return redirect()->to(base_url("/"))
                            ->with("success", "Password berhasil diubah!");
        }
    }
}
