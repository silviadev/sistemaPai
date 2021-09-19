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
      var_dump("llega hasta aqui!!!!!");
      $data['tipoUsuario']  = $this->session->userdata('tipoUsuario');
      $data['nombre']  = $this->session->userdata('nombre');
      $data['primerApellido']  = $this->session->userdata('primerApellido');
      $data['segundoApellido']  = $this->session->userdata('segundoApellido');

      $lista = $this->usuario_model->lista();
      $data['usuario'] = $lista;

      $this->load->view('inc_header');
      $this->load->view('inc_menu', $data);
      $this->load->view('paciente_vacuna/paciente_vacuna_form', $data);
      $this->load->view('inc_footer');
  }
}
