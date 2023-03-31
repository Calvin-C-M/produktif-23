<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\Account;

class Admin extends BaseController {
    protected $userModel;
    protected $accModel;

    public function __construct() {
        $this->userModel = new Users();
        $this->accModel = new Account();
    }
    
    public function index() {
        return view('/Admin/home');
    }
}
