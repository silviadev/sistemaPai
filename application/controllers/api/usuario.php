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
        /* $json = file_get_contents('php://input');
        $data = json_decode($json, true); */
        $consulta = $this->usuario_model->recuperarUsuario($id);
        $result = [];
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $row) {
                $result = array(
                    'idUsuario' => $row->idUsuario,
                    'nombreUsuario' => $row->nombreUsuario,
                    'tipoUsuario' => $row->tipoUsuario,
                    'nombre' => $row->nombre,
                    'primerApellido' => $row->primerApellido,
                    'segundoApellido' => $row->segundoApellido,
                );

                $consultaPacientes = $this->paciente_model->recuperarPacientesPorIdUsuario($row->idUsuario);
                $resultPacientes = [];
                if ($consultaPacientes->num_rows() > 0) {
                    $result["pacientes"] = $consultaPacientes->result();
                }
                else {
                    $result["pacientes"] = $resultPacientes;
                }


                $this->output->set_status_header(REST_Controller::HTTP_OK)->set_content_type('application/json')->set_output(json_encode($result));
                break;
            }
        } else {
            $result = array(
                'message' => "No se encuentra el usuario"
            );
            $this->response(json_encode($result), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}