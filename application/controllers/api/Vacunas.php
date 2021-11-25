<?php

require APPPATH . 'libraries/REST_Controller.php';

class Vacunas extends REST_Controller
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
   
        $lista = $this->vacuna_model->lista();
        $result = [];
        if ($lista->num_rows() > 0) {
            foreach ($lista->result() as $row) {
                $res = array(
                'idVacuna' => $row->idVacuna,
                'nombre' => $row->nombre,
                'descripcion' => $row->descripcion
                );
                $listaDosis = $this->dosis_model->listaDosisPorIdVacuna($row->idVacuna);
                if ($listaDosis->num_rows() > 0) {
                $res["dosis"] = $listaDosis->result();
                } else {
                $res["dosis"]  = [];
                }
                array_push($result, $res);
            }

            $this->output->set_status_header(REST_Controller::HTTP_OK)->set_content_type('application/json')->set_output(json_encode($result));

        } else {
            $result = array(
                'message' => "No se encuentra el usuario"
            );
            $this->response(json_encode($result), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}