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

    public function update() {
        $id = $this->request->getVar("id");

        $data = [
            "userData" => $this->userModel->find($id),
        ];
        return view('/Admin/update', $data);
    }

    public function update_control() {
        $id = $this->request->getVar('id');
        $inputData = [
            "nama"      => $this->request->getVar("nama"),
            "alamat"    => $this->request->getVar("alamat"),
        ];

        $this->userModel->update($id, $inputData);

        return redirect()->to(base_url('/admin/home'))
                        ->with('success', 'Data berhasil diupdate');
    }
}
