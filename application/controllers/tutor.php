<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tutor extends CI_Controller
{

  public function index()
  {
    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');

    $idUsuario = $this->session->userdata('idUsuario');
    $pacientes = $this->paciente_model->recuperarPacientesPorIdUsuario($idUsuario);
    if (count($pacientes->result()))
    { $data['pacientes'] = $pacientes;
    } 

    $this->load->view('inc_header');
    $this->load->view('inc_menu_tutor', $data);
    $this->load->view('perfil_tutor/perfil_tutor', $data);
    $this->load->view('inc_footer');
  }

  public function paciente_historial()
  {   
    $idPaciente = $_GET["idPaciente"];
    $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
    $data['nombre']  = $this->session->userdata('nombre');
    $data['primerApellido']  = $this->session->userdata('primerApellido');
    $data['segundoApellido']  = $this->session->userdata('segundoApellido');

    $data['pacienteDosis'] = $this->dosis_model->listaDosisVacunasPorIdPaciente($idPaciente);
    $data['pacienteTutor'] = $this->paciente_model->recuperarUsuarioPorIdPaciente($idPaciente);

    $data['idPaciente'] = $idPaciente;
    
    $this->load->view('inc_header');
    $this->load->view('inc_menu_tutor', $data);
    $this->load->view('perfil_tutor/perfil_tutor_paciente', $data);
    $this->load->view('inc_footer');
  }
}
