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
}

?>