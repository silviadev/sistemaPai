<?php

require APPPATH . 'libraries/REST_Controller.php';

class Usuario extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        header("Access-Control-Allow-Origin: http://localhost:8100");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST, DELETE, OPTIONS");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    }

    public function index_get($id = 0)
    {
     //TODO obtener la lista de pacientes que pernecen al usuario con el id
    }
}