<?php

require APPPATH . 'libraries/REST_Controller.php';

class Cliente extends REST_Controller
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
    $consulta = $this->dosis_model->listaDosisVacunasPorIdPaciente($id);
    $result = [];
    if ($consulta->num_rows() > 0) {
      foreach ($consulta->result() as $row) {
        array_push($result, (object)[
          'idDosis' => $row->idDosis,
          'idVacuna' => $row->idVacuna,
          'nombrevacuna' => $row->nombrevacuna,
          'dosis' => $row->dosis,
          'nombrevia' => $row->nombrevia,
          'rangoMesInicial' => $row->rangoMesInicial,
          'idPacienteVacuna' => $row->idPacienteVacuna,
          'fechaVacuna' => $row->fechaVacuna,
          'fechaSiguienteDosis'=> $row->fechaSiguienteDosis,
          'idSiguienteDosis'=> $row->idSiguienteDosis,
        ]);

        $this->output->set_status_header(REST_Controller::HTTP_OK)->set_content_type('application/json')->set_output(json_encode($result));
      }
    } else {
      $result = array(
        'message' => "No se encuentra el cliente"
      );
      $this->response(json_encode($result), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    }
  }
}
