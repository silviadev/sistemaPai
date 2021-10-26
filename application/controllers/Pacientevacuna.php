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
    
    foreach ($_POST['selecteddosis'] as $key => $id) {
      $fecha = $_POST['fechavacunapacientes'][$id];
      $data['idDosis'] = $id;
      $data['idSiguienteDosis'] = $id;
      $data['fechaVacuna'] = date("Y-m-d H:i:s", strtotime($fecha[0]));
      $this->pacientevacuna_model->agregarPacienteVacuna($idAuthor, $data);
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
