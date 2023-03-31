<?php

namespace App\Controllers;

class Home extends BaseController {
    public function login() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function forgot_password() {
        return view('forgot_password');
    }
}
