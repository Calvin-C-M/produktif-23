<?php

namespace App\Controllers;

class Home extends BaseController {
    protected $session;

    public function __construct() {
        $this->session = \Config\Services::session();
    }
    
    public function login() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function forgot_password() {
        return view('forgot_password');
    }

    public function reset_password() {
        if($this->session->getFlashdata("email") != null) {
            return view('reset_password');
        } return redirect()->to(base_url("/forgot"))
                        ->with("error", "Email tidak dikenal!");
    }
}
