<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PacienteVacuna extends CI_Controller
{

  public function index()
  {
    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');

    //$idUsuario = $this->session->userdata('idUsuario');
    $vacuna = $this->pacientevacuna_model->lista();
    if (count($vacuna->result())) {
      $data['vacuna'] = $vacuna;
    }

    $this->load->view('inc_header');
    $this->load->view('inc_menu', $data);
    $this->load->view('paciente_vacuna/paciente_vacuna_lista', $data);
    $this->load->view('inc_footer');
  }

  public function registrarPacienteFormulario()
  {
    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');

    $dosis = $this->dosis_model->listaDosisVacunas();
    $data['listaDosis'] = $dosis;

    $data['pacienteCodigo'] = $this->paciente_model->lista();

    $this->load->view('inc_header');
    $this->load->view('inc_menu', $data);
    $this->load->view('paciente_vacuna/paciente_vacuna_form', $data);
    $this->load->view('inc_footer');
  }

  public function registrarPacienteVacuna()
  { 
    $idPaciente = $_POST['paciente'];
    $idAuthor = $this->session->userdata('idUsuario');
    $data['idPaciente'] = $idPaciente;
    
    if (isset($_POST['selecteddosis'])) {
      foreach ($_POST['selecteddosis'] as $key => $id) {
        //buscar 
        $fecha = $_POST['fechavacunapacientes'][$id];
        $siguienteVacunaProgramado = $this->pacientevacuna_model->obtenerPacienteConSiguienteVacuna($idPaciente, $id);
        if ($siguienteVacunaProgramado->num_rows() > 0) {
          $dataUpdate['idDosis'] = $id;
          $dataUpdate['fechaVacuna'] = date("Y-m-d", strtotime($fecha[0]));
          foreach ($siguienteVacunaProgramado->result() as $row) {
            $this->pacientevacuna_model->actualizarPacienteVacuna($idAuthor, $row->idPaciente, $row->idSiguienteDosis, $dataUpdate);
          }
        }
        else {
          $data['idDosis'] = $id;
          $data['fechaVacuna'] = date("Y-m-d", strtotime($fecha[0]));
          $this->pacientevacuna_model->agregarPacienteVacuna($idAuthor, $data);
        }
      }
    }
    
    if (isset($_POST['selectedsiguientedosis'])) {
      foreach ($_POST['selectedsiguientedosis'] as $key => $id) {
        $fechaSiguienteVacuna = $_POST['fechasiguientevacunapacientes'][$id];
        $dataDosis['idPaciente'] = $idPaciente;
        $dataDosis['idSiguienteDosis'] = $id;
        $dataDosis['fechaSiguienteDosis'] = date("Y-m-d", strtotime($fechaSiguienteVacuna[0]));
        $this->pacientevacuna_model->agregarPacienteVacuna($idAuthor, $dataDosis);
      }
    }
    
    redirect('pacientevacuna', 'refresh');
  }

  public function buscarPacientes()
  {
    $idTutor = $_POST['idTutor'];
    $pacientes = $this->paciente_model->recuperarPacientesPorIdUsuario($idTutor);
    echo (json_encode($pacientes->result()));
  }

  public function buscarDosisPaciente()
  {
    if (isset($_POST['idPaciente']))
    {
      $idPaciente = $_POST['idPaciente'];
      $dosis = $this->dosis_model->listaDosisVacunasPorIdPaciente($idPaciente);
      echo (json_encode($dosis->result() ));
    } 
  }
}
