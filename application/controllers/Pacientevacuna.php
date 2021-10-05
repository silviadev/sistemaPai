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
    if (count($vacuna->result()))
    { 
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
    //$tutor = $_POST['usuario_tutor'];
    //var_dump($tutor);
  }

  public function buscarPacientes()
  {
    $idTutor = $_POST['idTutor'];
    $pacientes = $this->paciente_model->recuperarPacientesPorIdUsuario($idTutor);
    echo ( json_encode ( $pacientes->result() ) );
  }

  public function buscarDosisPaciente()
  {
    $idPaciente = 6; //$_POST['idPaciente'];
   /*  $dosis = $this->dosis_model->listaDosisPaciente($idPaciente);
    if (count($dosis->result()) > 0) {
      echo ( json_encode ( $dosis->result() ) );
    }
    else {
      $dosis = $this->dosis_model->listaDosis($idPaciente);
      echo ( json_encode ( $dosis->result() ) );
    } */

    //$dosis = $this->dosis_model->listaDosis($idPaciente);
    $dosis = $this->dosis_model->listaDosisVacunas();
    echo ( json_encode ( $dosis->result() ) );
  }
}
