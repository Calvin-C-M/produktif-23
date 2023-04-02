<?php

namespace App\Controllers;

use App\Models\Users;
use Codeigniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class User extends ResourceController {
    use ResponseTrait;
    protected $model;
    protected $format = "json";

    public function __construct() {
        $this->model = new Users();
    }

    protected function formatResponse(int $status, $data = null, $error = null, string $message) {
        return [
            'status' => $status,
            'data' => $data,
            'error' => $error,
            'message' => $message
        ];
    }

    public function index() {
        $data = $this->model->findAll();

        return $this->respond($this->formatResponse(200, $data, null, 'Semua user telah terquery'), 200);
    }

    public function show($id=null) {
        $data = $this->model->find($id);
        if($data) {
            return $this->respond($this->formatResponse(200, $data, null, 'Data ditemukan'), 200);
        } return $this->failNotFound('Data tidak ditemukan');
    }

    public function create() {
        $data = [
            'nama'      => $this->request->getVar("nama"),
            'alamat'    => $this->request->getVar("alamat"),
        ];

        if($this->model->insert($data)) {
            return $this->respondCreated($this->formatResponse(201, null, null, 'Data berhasil disimpan'));
        } return $this->failServerError();
    }

    public function update($id=null) {
        $input = $this->request->getRawInput();
        $data = [
            'nama'      => $input["nama"],
            'alamat'    => $input["alamat"]
        ];

        if($this->model->update($id, $data)) {
            return $this->respondUpdated($this->formatResponse(200, null, null, 'Data berhasil disimpan'));
        } return $this->failNotFound('Data tidak ditemukan');
    }

    public function delete($id=null) {
        if($this->model->find($id)) {
            $this->model->delete($id);
            return $this->respondDeleted($this->formatResponse(200, null, null, 'Data berhasil dihapuskan'));
        } return $this->failNotFound('Data tidak ditemukan');
    }
}

?>